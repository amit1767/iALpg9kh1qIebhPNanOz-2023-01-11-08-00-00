<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Session;
class DashboardController extends ApiController
{
	    public function __construct(){
			
		}
/*********DASHBOARD*******/
	    public function dashboard(){
			if(session()->has('LoggedInUserId')){
				return view('home');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }   

/*********BUCKETS*******/
	    public function buckets(){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$results=$this->getapi($UserToken,'ninja/buckets?page=0&limit=10');
				if($results['status']==1){
				$maindatas['data']=$results['output']->data;
				return view('buckets',compact('maindatas'));
				}else if($results['status']==0){
					return redirect('/dashboard')->with('login-error',$results['msg']);
				}else{
					return redirect('/dashboard')->with('login-error',$results['msg']);
				}
			}else{
				return redirect()->route('mainpage'); 
			}
			}
/*********BUCKETS*******/
	    public function subscription(){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$results=$this->getapi($UserToken,'ninja/subscription?page=0&limit=10');
				if($results['status']==1){
				$maindatas['data']=$results['output']->data;
				return view('subscriptions',compact('maindatas'));
				}else if($results['status']==0){
					return redirect('/dashboard')->with('login-error',$results['msg']);
				}else{
					return redirect('/dashboard')->with('login-error',$results['msg']);
				}
			}else{
				return redirect()->route('mainpage'); 
			}
			}	

/********* EXTRA PAGE *******/
			public function extrapage(){
				if(session()->has('LoggedInUserId')){
					return view('alert_messages');
				}else{
					return redirect()->route('mainpage'); 
				}
				}	
				

/********* DEV *******/
		public function dev(){
			if(session()->has('LoggedInUserId')){

				$UserToken=Session::get('token');
            	$ZoneClusterList=$this->getapi($UserToken,'ninja/zone-clusters?paging=0');
            	if($ZoneClusterList['status']==1){
                	$ZoneList=$ZoneClusterList['output']->data;
            	}

				$attendanceList=array();
				foreach($ZoneList as $zones){
					echo "<b>ID : </b>"; echo $zones->_id; echo "<br>";	echo "<b> Zone </b> Name : "; echo $zones->name; echo "<br>";
					$attendanceList=$this->getapi($UserToken,'ninja/attendance?fromDate=20211201&toDate=20211231&zone_id='.$zones->_id);
					$attendance=$attendanceList['output']->data;
					foreach($attendance as $attendances){
						echo "<b>Cleaner Name : </b>";	echo $attendances->name; echo "<br>";
						
					}
					echo "<pre>"; print_r($attendance); echo "</pre>"; 
				}
		/*
				$data=array("cleaner_id"=>"5ffa39c3539ddb6e30dd8be2","is_present"=>false,"date"=>20211121,"present_type"=>1,"absent_type"=>0,"halfDay"=>array("from"=>"15:00", "to"=>"21:00"),"absent_reason"=>3,"approve_by"=>"Nam","comment"=>"ABCD");
				
            	$UpdateAttendaceCaseAbsentHalfday = $this->postapi2($UserToken,$data,'ninja/attendance');
		*/


		/*
            $attendanceList=$this->getapi($UserToken,'ninja/attendance?fromDate=20211101&toDate=20211130&zone_id=5ffa2a75dd6b126477ce3b01');
            if($attendanceList['status']==1){
                $attendance=$attendanceList['output']->data;
            }

            $gen_attendance=$this->getapi($UserToken,'ninja/attendance/gen_attendance?fromDate=20211105&toDate=20211130');
            if($gen_attendance['status']==1){
                $attendance1=$gen_attendance['output']->data;
            }
       
            $data=array("cleaner_id"=>"5ffa39c3539ddb6e30dd8be2","date"=>20211115,"present_type"=>0,"comment"=>"present");

            $UpdateAttendaceCasePresent = $this->postapi2($UserToken,$data,'ninja/attendance');
        
            $data=array("cleaner_id"=>"5ffa39c3539ddb6e30dd8be2","is_present"=>false,"date"=>20211121,"present_type"=>1,"absent_type"=>0,"absent_dates"=>array(20211115,20211121,20211117),"absent_reason"=>3,"approve_by"=>"Nam","comment"=>"ABCD");
            
            $UpdateAttendaceCaseAbsentFullday = $this->postapi2($UserToken,$data,'ninja/attendance');
        */

				// echo "<pre>"; print_r($UpdateAttendaceCaseAbsentHalfday); echo "</pre>";
			$zonebycity=array();
			$allcity=array();
			$citylist=$this->getapi($UserToken,'ninja/countries/cities?bussiness=1');
			if($citylist['status']==1){
				$allcity=$citylist['output']->data;
			}

			echo "<br>"; echo "<hr>"; echo "<br>";

			foreach($allcity as $city){
				echo "City ID = "; echo $city->_id; echo "<br>";
				echo "City Name = "; echo $city->name; echo "<br>";

				$zonebycity=$this->getapi($UserToken,'ninja/zone-clusters?paging=0&cities='.$city->_id);
				if($zonebycity['status']==1){
					$zone=$zonebycity['output']->data;
				}

				foreach($zone as $allzone){
					echo "Zone ID = "; echo $allzone->_id; echo "<br>";
					echo "Zone Name = "; echo $allzone->name; echo "<br>";
				}

			}

			echo "<br>"; echo "<hr>"; echo "<br>";

			}else{
				return redirect()->route('mainpage');
			}
		}


}
