<?php

namespace App\Arabian;

use App\Arabian\API\RequestObject;
use App\Arabian\API\RequestObjectBuilder;
use App\Arabian\Auth;
use Carbon\Carbon;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\ClientException;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\MessageFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


abstract class Request
{
    private $access_token = null;

    abstract public function getPathName();

    public function getEndPoint() {
        return "api";
    }
    /**
     * Fetch All Records
     *
     * @param integer   $page  Current Page
     * @param integer $per_page No of records per page
     * @param string $fields Retrun only fields
     *
     * @throws Exception If token is not found
     * @return Json
     */
    public function all($page = 1, $per_page = 20, $modified_since = null)
    {
        //$response = $this->get(null, ['page' => $page, 'per_page' => $per_page, "fields" => $fields]);
        $response = $this->requestWithObject((new RequestObjectBuilder())
            ->setMethod("GET")
            ->addPage($page)
            ->addPerPage($per_page)
            ->addModifiedSince($modified_since)
            ->build());
        if (!$response) return null;

        return $response;
    }

    /**
     * Fetch All Records
     *
     * @param string   $id  Record ID
     * @throws Exception If token is not found
     * @return Json
     */
    public function retrive($id) {
        $response = $this->requestWithObject((new RequestObjectBuilder())->addPathSegment("/" . $id)->build());
        if (!$response) return null;
        return $response;
    }

    public function __construct()
    {
        $this->getAccessToken();
    }

    protected function getAccessToken()
    {
        return $this->access_token = Auth::getAccessToken();
    }

    protected function getBaseUrl() {
        return config('arabian.api_base_url');
    }

    protected function getAuthToken() {
        return $this->access_token ? $this->access_token->idToken : null;
    }

    function getFromRequest($method, $id, Array $queryParams, $params)
    {
        return $this->requestWithMethod($method, $id, $queryParams, $params);
    }

    function get($id, $queryParams = [])
    {
        return $this->requestWithMethod('GET', $id, $queryParams);
    }

    function create($id, $queryParams = null, $params = [])
    {
        return $this->requestWithMethod('POST', $id, $queryParams, $params);
    }

    function update($id, $queryParams = null, $formParams = [])
    {
        return $this->requestWithMethod('PATCH', $id, $queryParams, $formParams);
    }

    function delete($id, $queryParams = null, $formParams = null)
    {
        return $this->requestWithMethod('DELETE', $id, $queryParams, $formParams);
    }

    function requestWithObject(RequestObject $requestObject) {
        return $this->requestWithMethod(
            $requestObject->method,
            $requestObject->endpoint,
            $requestObject->queryParam,
            $requestObject->formParam,
            $requestObject->headerParam);
    }

    protected function requestWithMethod($method, $id = null, $queryParam = null, $formParams = null, $headerParam = []) {
        if (!$this->access_token) throw new \Exception("Generate Token!");
        $base_url = $this->getBaseUrl();
        $endpoint = $this->getEndPoint();
        $module = $this->getPathName();
        $request_url = "$base_url/$endpoint/$module" . ($id ? "/".$id : "");
        return $this->request($request_url, $method, $queryParam, $formParams, $headerParam);
    }


    protected function request($request_url, $method,  $queryParam, $formParams, $headerParam)
    {
        if ($this->access_token->valid_till && Carbon::parse($this->access_token->valid_till)->lt(Carbon::now())) {
            Auth::refreshToken();
            $this->getAccessToken();
        }
       
        $stack = HandlerStack::create();
        $logger =   new Logger('Logger');
        $logger->pushHandler(new StreamHandler(storage_path('logs') . '/network.log'), Logger::DEBUG);

        $stack->push(
            Middleware::log(
                $logger,
                new MessageFormatter(MessageFormatter::DEBUG)
            )
        );

        try {
            $client = new Client([ 'handler' => $stack]);
            $data = [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->getAuthToken(),
                ],
            ];
            if ($queryParam)
                $data['query'] = $queryParam;
            if ($formParams)
                $data['form_params'] = $formParams;
            $response = $client->request($method, $request_url, $data);

            Log::info("URL $request_url METHOD $method PARAM " . json_encode($data));
            return json_decode($response->getBody()->__toString());
        } catch (ClientException $e) {
            Log::error($e);
            return json_decode($e->getResponse()->getBody()->getContents());
        }
    }
}
