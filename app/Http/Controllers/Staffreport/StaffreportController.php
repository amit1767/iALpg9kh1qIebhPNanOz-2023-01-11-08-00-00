<?php
namespace App\Http\Controllers\Staffreport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class StaffreportController extends ApiController
{
	public function __construct(){
			
		}
	/*********VIEW*******/
	public function view(){
			if(session()->has('LoggedInUserId')){
				return view('staffreport/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	}
	
}