<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
class ApiController extends Controller
{
	 public function __construct()
    {
		
    }
	
	private function getbaseurl(){
		$BASEURL=env('API_URL');
		return $BASEURL;
	}
 	/******************************/
	/************POST-API**********/
	/******************************/
	public function postapi($UserToken,$data_arr,$endpoint)
    {
		        $base_url=$this->getbaseurl();
      			$curl = curl_init();
				curl_setopt_array($curl, array(
				// CURLOPT_PORT => "5000",
				CURLOPT_URL => $base_url.$endpoint,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "PATCH",
				CURLOPT_POSTFIELDS => json_encode($data_arr),
				CURLOPT_HTTPHEADER => array(
				"authorization: Bearer $UserToken",
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: 2561e40f-80f7-3125-19de-30b932e3bf0d"
				),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					$return=array('status'=>0,'msg'=>"cURL Error #:" . $err,'output'=>array());
				    return $return; 
				} else {
					$outputs=json_decode($response);
					if($outputs->success){
						$return=array('status'=>1,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}else{
						$return=array('status'=>2,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}
				}  
    }

	public function postapi2($UserToken,$data_arr,$endpoint)
    {
		        $base_url=$this->getbaseurl();
      			$curl = curl_init();
				curl_setopt_array($curl, array(
				// CURLOPT_PORT => "5000",
				CURLOPT_URL => $base_url.$endpoint,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => json_encode($data_arr),
				CURLOPT_HTTPHEADER => array(
				"authorization: Bearer $UserToken",
				"cache-control: no-cache",
				"content-type: application/json",
				"postman-token: 2561e40f-80f7-3125-19de-30b932e3bf0d"
				),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					$return=array('status'=>0,'msg'=>"cURL Error #:" . $err,'output'=>array());
				    return $return; 
				} else {
					$outputs=json_decode($response);
					if($outputs->success){
						$return=array('status'=>1,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}else{
						$return= array('status'=>2,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}
				}  
    }

	/******************************/
	/************GET**********/
	/******************************/
	public function getapi($UserToken,$endpoint)
    {
		$base_url=$this->getbaseurl();
		  $curl2 = curl_init();
		  curl_setopt_array($curl2, array(
		//   CURLOPT_PORT => "5000",
		  CURLOPT_URL => $base_url.$endpoint,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Bearer $UserToken",
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded",
			"postman-token: 8af88095-01be-6e83-5bc2-24b23ff747b5"
		  ),
		  ));

		$response2 = curl_exec($curl2);
		$err2 = curl_error($curl2);
		curl_close($curl2);

		if ($err2) {
		   $return=array('status'=>0,'msg'=>"cURL Error #:" . $err2,'output'=>array());
			return $return; 
		} else {
			$outputs2=json_decode($response2);
			
			if(!empty($outputs2)){
				if($outputs2->success){
					$return=array('status'=>1,'msg'=>$outputs2->message,'output'=>$outputs2);
					return $return;
				}else{
					$return=array('status'=>2,'msg'=>$outputs2->message,'output'=>$outputs2);
				}
			}
		}   
    }
 	/******************************/
	/************Login**********/
	/******************************/
	public function login($data_arr,$endpoint)
    {
	  $base_url=$this->getbaseurl();
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	//   CURLOPT_PORT => "5000",
	  CURLOPT_URL => $base_url.$endpoint,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($data_arr),
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/json",
		"postman-token: 9c97dc0e-52a3-d71b-aaf8-32da1db3e7bd"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

				if ($err) {
					$return=array('status'=>0,'msg'=>"cURL Error #:" . $err,'output'=>array());
				    return $return; 
				} else {
					$outputs=json_decode($response);
					if($outputs->success){
						$return=array('status'=>1,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}else{
						$return=array('status'=>2,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}
				}  
    }
	/******************************/
	/**********PATCH************/
	/******************************/
	public function patchapi($UserToken,$data_arr,$endpoint)
    {
	  $base_url=$this->getbaseurl();
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	//   CURLOPT_PORT => "5000",
	  CURLOPT_URL => $base_url.$endpoint,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "PATCH",
		CURLOPT_POSTFIELDS => json_encode($data_arr),
	  CURLOPT_HTTPHEADER => array(
	   "authorization: Bearer $UserToken",
		"cache-control: no-cache",
		"content-type: application/json",
		"postman-token: 9c97dc0e-52a3-d71b-aaf8-32da1db3e7bd"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

				if ($err) {
					$return=array('status'=>0,'msg'=>"cURL Error #:" . $err,'output'=>array());
				    return $return; 
				} else {
					$outputs=json_decode($response);
					if($outputs->success){
						$return=array('status'=>1,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}else{
						$return=array('status'=>2,'msg'=>$outputs->message,'output'=>$outputs);
						return $return;
					}
				}  
    }
	/******************************/
	/******************************/
	/******************************/
	//$a="{{V1}}/ninja/customer?page=0&limit=2&search=nam&sortBy=cust_last_name";
	/******************************/
}