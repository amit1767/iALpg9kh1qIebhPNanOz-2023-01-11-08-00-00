<?php
namespace App\Http\Controllers\Subscription;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class SubscriptionController extends ApiController
{
	    public function __construct(){
			
		}

        public function subscriptions(){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$results=$this->getapi($UserToken,"ninja/user-subscription?page=0");		
				if($results['status']==1){
					$subscription=$results['output']->data;
					return view('subscription/view',compact('subscription'));
				}else{
					return redirect('/dashboard')->with('login-error',$results['msg']);
				}
			}else{
				return redirect()->route('mainpage'); 
			}
	    }

}

?>