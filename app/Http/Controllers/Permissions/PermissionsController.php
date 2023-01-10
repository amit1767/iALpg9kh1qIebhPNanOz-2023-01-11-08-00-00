<?php
namespace App\Http\Controllers\Permissions;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class PermissionsController extends ApiController
{
	    public function __construct(){
			
		}

	    public function view(){
			if(session()->has('LoggedInUserId')){
				return view('permissions.view');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }   


				
}
