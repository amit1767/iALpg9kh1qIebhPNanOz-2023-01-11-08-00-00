<?php
namespace App\Http\Controllers\Menusetting;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class MenusettingController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	public function view(){
			if(session()->has('LoggedInUserId')){
				return view('menusetting/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	}
	
}