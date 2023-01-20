<?php

namespace App\Arabian;

use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Auth {

    public static function login(string $username, string $password)
    {
        $url = env('API_FIREBASE_AUTH_URL');
        $stack = HandlerStack::create();
        $logger =   new Logger('Logger');
        $logger->pushHandler(new StreamHandler(storage_path('logs') . '/arabian.auth.log'), Logger::DEBUG);

        $stack->push(
            Middleware::log(
                $logger,
                new MessageFormatter(MessageFormatter::DEBUG)
            )
        );
        try {
            $client = new \GuzzleHttp\Client([ 'handler' => $stack]);
            $response = $client->request('POST', $url, ["form_params" => ["email" => $username, "password" => $password, "returnSecureToken" => true ]]);
            $payload = json_decode($response->getBody()->__toString());
            $payload->valid_till = Carbon::now()->addSeconds($payload->expiresIn)->toDateTimeString();
            Storage::put('arabian-oauth.json', json_encode($payload));
            return json_decode($response->getBody());
        } catch (ClientException $e) {
            return json_decode($e->getResponse()->getBody());
        }
    }

    public static function forgotPassword(string $username){
        $url = env('API_URL')."/api/forgot-password";
        try{
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $url, ["form_params" => ["username" => $username]]);
            return json_decode($response->getBody()->__toString()); 
        } catch(ClientException $e) {
            Log::error($e);
            return json_decode($e->getResponse()->getBody()->getContents()); 
        }
    }

    public static function refreshToken()
    {
        $storage = Storage::disk('local');

        if (!$storage->exists('arabian-oauth.json') ) return false;

        $access_token = $storage->get('arabian-oauth.json');
        $access_token = json_decode($access_token);

        if ( ! isset($access_token->refreshToken) ) return false;

        $url = env('API_REFRESH_TIKEN_URL');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, ["form_params" => ["grant_type" => "refresh_token", "refresh_token" => $access_token->refreshToken ]]);

        $response = json_decode($response->getBody());
        if ( isset($response->error) ) return false;
        $access_token->access_token = $response->access_token;

        $access_token->valid_till = Carbon::now()->addHour()->toDateTimeString();
        $storage->put('arabian-oauth.json', json_encode($access_token));
        return $access_token;
    }

    static function getAccessToken()
    {
        if (! Storage::disk('local')->exists('arabian-oauth.json')){
            return new \Exception("Login is required");
        }
        $token =  Storage::disk('local')->get('arabian-oauth.json');
        $access_token = json_decode($token);
        if ($access_token->valid_till && Carbon::parse($access_token->valid_till)->lt(Carbon::now())) {
            $token = self::refreshToken();
        }
        return $access_token;
    }
}
