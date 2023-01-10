<?php
namespace App\Http\Controllers\Revenue;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class RevenueController extends ApiController
{
	    public function __construct(){
			
		}

        public function revenue(){
			if(session()->has('LoggedInUserId')){
				return view('revenue/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }

}

?>