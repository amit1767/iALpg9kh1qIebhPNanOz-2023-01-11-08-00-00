<?php
namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class StaffController extends ApiController
{
	    public function __construct(){
			
		}
   
/******************************/
/*********-STAFF-TRACK*******/
/******************************/
	    public function trackstaff(){
			if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0&sort=cleaner_first_name&blocked=0');
			$allcity=array();
			$citylist=$this->getapi($UserToken,'countries/cities');
			if($citylist['status']==1){
				$allcity=$citylist['output']->data;
			}
			
			if($results['status']==1){
			$staffdetails=$results['output']->data;
			return view('trackstaff/view',compact('staffdetails','allcity'));
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
	
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-FILTER-TRACK*******/
/******************************/
	    public function filterstaff(Request $request){
			if(session()->has('LoggedInUserId')){
			$city_id=$request->city_id;
			$UserToken= Session::get('token');
			$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0&sort=cleaner_first_name&city_id='.$city_id);
			if($results['status']==1){
			$staffdetails=$results['output']->data;
			$html= view('trackstaff/filterview',compact('staffdetails','city_id'))->render();;
			echo json_encode(array('status'=>'success','htm'=>$html));
			
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
	
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-SEARCH-FILTER*******/
/******************************/
	    public function searchstaff(Request $request){
			if(session()->has('LoggedInUserId')){
			$searchkeyword=$request->searchkeyword;
			$UserToken= Session::get('token');
			$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0');
			if($results['status']==1){
			$staffdetails=$results['output']->data;
			$html= view('trackstaff/searchview',compact('staffdetails','searchkeyword'))->render();;
			echo json_encode(array('status'=>'success','htm'=>$html));
			
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
	
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-SINGLE-STAFF*******/
/******************************/
	    public function singlestaff($staff_id){
			if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			$results1=$this->getapi($UserToken,'ninja/staffs/tracking_detail/'.$staff_id);
			$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0');
			
			if($results['status']==1){
			$staffdetails=$results['output']->data;
			$singlestaffdetail=$results1['output']->data;
			
			return view('trackstaff/staff_details',compact('staffdetails','singlestaffdetail'));
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
	
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/***************/
	    public function individualstaff(){
			if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			
			
			
			}else{
				echo json_encode(array('status'=>'loggedout','msg'=>' Please Login'));
			}
	    }
/***************/
	    public function staff(){
			if(session()->has('LoggedInUserId')){
			return view('staff/staff');	
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/***************/

}
