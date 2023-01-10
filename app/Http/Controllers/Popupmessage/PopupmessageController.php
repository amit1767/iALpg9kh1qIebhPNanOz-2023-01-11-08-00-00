<?php
namespace App\Http\Controllers\Popupmessage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class PopupmessageController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	public function view(){
			if(session()->has('LoggedInUserId')){
				return view('popup_message/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	}
	
}