<?php
namespace App\Http\Controllers\Authentication;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class LoginController extends Controller
{
    public function login(){
		return view('login');
	}
    public function clear(){
		\Artisan::call('route:clear');
		\Artisan::call('config:clear');
		\Artisan::call('cache:clear');
       return "Cache is cleared";
	}
	public function signin(Request $request){
	  $api= new ApiController;
	  $username = $request->email;
	  $pass = $request->password; 
	  $postarr=array('email'=>$username,'password'=>$pass,'device_token'=>'fqehwf9032r90jwe0rfwf','device_type'=>'android');
	  $resultss=$api->login($postarr,'ninja/login');
	  
	  if($resultss['status']==1){
		  $outputs=$resultss['output'];
		  $id=$outputs->data->data->_id;
		  $name=$outputs->data->data->cleaner_first_name;
		  $email=$outputs->data->data->cleaner_email;
		  $phone=$outputs->data->data->phone;
		  $token=$outputs->data->token;
		$user = array("id" =>$id,"name" => $name,"email" => $email,"phone" => $phone);
		session()->put('UserDetails',$user);
		session()->put('LoggedInUserId',$id);
		session()->put('token',$token);
		return redirect('dashboard')->with('message','IT WORKS!');
		
			}else if($resultss['status']==0){
				return redirect('/')->with('login-error',$resultss['msg']);
			}else{
				return redirect('/')->with('login-error',$resultss['msg']);
			}
	}

    public function logout() {
        session()->forget('UserDetails');
        session()->forget('LoggedInUserId');
        session()->forget('LoggedInUserRole');
		Session::forget('UserDetails');
		Session::forget('LoggedInUserId');
		Session::forget('LoggedInUserRole');
        session()->flush();
        return redirect('/')->with('success-error','Logged out!');;
    }
	
	
}
