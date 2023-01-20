<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private function getBaseUrl(){
		$BASEURL = env('API_URL');
		return $BASEURL;
	}

    // Login
	public function login($data, $endPoint){
        $baseUrl = $this->getBaseUrl();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $baseUrl.$endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json'
                ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
    
        if($err){
            $return = array('status' => 0, 'message' => "cURL Error #:" . $err, 'data' => []);
            return $return;
        }else{
            $output = json_decode($response);
            if($output->status){
                $return = array('status' => 1,'message' => $output->message , 'data' => $output);
                return $return;
            }else{
                $return = array('status' => 2,'message' => $output->message , 'data' => $output);
                return $return;
            }
        }  
    } 

}
