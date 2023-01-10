<?php
namespace App\Http\Controllers\Notification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class NotificationController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	    public function view(){
			if(session()->has('LoggedInUserId')){
				return view('notification/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
	
}