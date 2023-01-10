<?php
namespace App\Http\Controllers\Promotion;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class PromotionController extends ApiController
{
	    public function __construct(){
			
		}

        public function promotions(){
			if(session()->has('LoggedInUserId')){
				return view('promotion/view');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }

}




?>