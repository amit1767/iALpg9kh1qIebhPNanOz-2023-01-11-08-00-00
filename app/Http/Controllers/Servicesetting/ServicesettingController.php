<?php
namespace App\Http\Controllers\Servicesetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class ServicesettingController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	public function view(){
			if(session()->has('LoggedInUserId')){
				return view('servicesetting/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	}
	
}