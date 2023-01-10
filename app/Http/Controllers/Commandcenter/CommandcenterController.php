<?php
namespace App\Http\Controllers\Commandcenter;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class CommandcenterController extends ApiController
{
	    public function __construct(){
			
		}
   
/******************************/
/*********-VIEW-*******/
/******************************/
	    public function view(){
			if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			$results=$this->getapi($UserToken,'ninja/buckets/commandboard');
			$stafflist=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0');
			$pendingList=$this->getapi($UserToken,'ninja/buckets/search?tab=pending&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
			//$assignedList=$this->getapi($UserToken,'ninja/buckets/search?tab=assigned&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
			//$completelist=$this->getapi($UserToken,'ninja/buckets/search?tab=complete&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
			//$startedlist=$this->getapi($UserToken,'ninja/buckets/search?tab=started&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
			//$unpaidlist=$this->getapi($UserToken,'ninja/buckets/search?tab=unpaid&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
			
			if($stafflist['status']==1){
				$staffdetails=$stafflist['output']->data;
			}else{
				$staffdetails=array();
			}
			if($pendingList['status']==1){
				$pending_orderlist=$pendingList['output']->data;
			}else{
				$pending_orderlist=array();
			}

 			$allcity=array();
			$citylist=$this->getapi($UserToken,'countries/cities');
			if($citylist['status']==1){
				$allcity=$citylist['output']->data;
			}
			$categories_data = $this->getapi($UserToken,'categories');
			$category = $categories_data['output']->data;

			if($results['status']==1){
			$allcounters=$results['output']->data;
			// echo '<pre>'; print_r($pending_orderlist); echo '</pre>'; 
			// die(); 
			return view('commandcenter/view',compact('allcounters','staffdetails','allcity','pending_orderlist','category'));
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/********************************************/
/*********-PENDING TASK LOAD MORE DATA*******/
/********************************************/
public function pendingtask($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	// if($page>0){
	// 	$page=$page-1;
	// }
	$pendingList=$this->getapi($UserToken,'ninja/buckets/search?tab=pending&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page='.$page);
	
	if($pendingList['status']==1){
	$pending_orderlist=$pendingList['output']->data;

	$returnHTML= view('commandcenter.load_pendingtask',compact('pending_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.load_pendingtask1',compact('pending_orderlist','increment'))->render();
	$page++;
		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$page,'increment'=>$increment+10,'total'=>$pending_orderlist->total));

	}else if($pendingList['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}	

	}else{
   		return response()->json(array('success' => false, 'html'=>'return home'));
	}
}

/********************************************/
/*********-ASSIGNED TASK LOAD MORE DATA*******/
/********************************************/
public function assignedtask($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	// if($page>0){
	// 	$page=$page-1;
	// }
	// $assignedList=$this->getapi($UserToken,'ninja/buckets/search?tab=assigned&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page='.$page);
	$assignedList=$this->getapi($UserToken,'ninja/buckets/search?tab=assigned&count_today=1&limit=10&page='.$page);

	if($assignedList['status']==1){
		$assign_orderlist=$assignedList['output']->data;

	$returnHTML= view('commandcenter.assignedtask_load',compact('assign_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.assignedtask_load1',compact('assign_orderlist','increment'))->render();
	$page++;
		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$page,'increment'=>$increment+10,'total'=>$assign_orderlist->total));

	}else if($assignedList['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}	

	}else{
   		return response()->json(array('success' => false, 'html'=>'return home'));
	}
}

/********************************************/
/*********-STARTED TASK LOAD MORE DATA*******/
/********************************************/
public function startedtask($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	// if($page>0){
	// 	$page=$page-1;
	// }
	$startedlist=$this->getapi($UserToken,'ninja/buckets/search?tab=started&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page='.$page);
	
	if($startedlist['status']==1){
	$started_orderlist=$startedlist['output']->data;

	$returnHTML= view('commandcenter.startedtask_load',compact('started_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.startedtask_load1',compact('started_orderlist','increment'))->render();
	$page++;
		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$page,'increment'=>$increment+10,'total'=>$started_orderlist->total));

	}else if($startedlist['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}	

	}else{
   		return response()->json(array('success' => false, 'html'=>'return home'));
	}
}

/********************************************/
/*********-COMPLETED TASK LOAD MORE DATA*******/
/********************************************/
public function completedtask($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	// if($page>0){
	// 	$page=$page-1;
	// }
	$completelist=$this->getapi($UserToken,'ninja/buckets/search?tab=completed&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page='.$page);

	if($completelist['status']==1){
	$complete_orderlist=$completelist['output']->data;

	$returnHTML= view('commandcenter.completedtask_load',compact('complete_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.completedtask_load1',compact('complete_orderlist','increment'))->render();
	$page++;
		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$page,'increment'=>$increment+10,'total'=>$complete_orderlist->total));

	}else if($completelist['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}	

	}else{
   		return response()->json(array('success' => false, 'html'=>'return home'));
	}
}

/********************************************/
/*********-UNPAID TASK LOAD MORE DATA*******/
/********************************************/
public function unpaidtask($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	// if($page>0){
	// 	$page=$page-1;
	// }
	$unpaidlist=$this->getapi($UserToken,'ninja/buckets/search?tab=unpaid&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page='.$page);
	
	if($unpaidlist['status']==1){
	$unpaid_orderlist=$unpaidlist['output']->data;

	$returnHTML= view('commandcenter.unpaidtask_load',compact('unpaid_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.unpaidtask_load1',compact('unpaid_orderlist','increment'))->render();
	$page++;
		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$page,'increment'=>$increment+10,'total'=>$unpaid_orderlist->total));

	}else if($unpaidlist['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}

	}else{
   		return response()->json(array('success' => false, 'html'=>'return home'));
	}
}

/********************************************/
/*********-ORDER REQUEST LOAD MORE DATA*******/
/********************************************/
public function orderrequest($page=0,$increment=0){
	if(session()->has('LoggedInUserId')){
	$UserToken= Session::get('token');
	if($page>0){
		$page=$page-1;
	}
	$limit=10;
	$orderrequest=$this->getapi($UserToken,'ninja/requests?status=1&page='.$page.'&limit='.$limit);
	
	if($orderrequest['status']==1){
	$orderrequest_orderlist=$orderrequest['output']->data;
		
	$returnHTML= view('commandcenter.orderrequest_load',compact('orderrequest_orderlist','increment'))->render();
	$returnHTML1= view('commandcenter.orderrequest_load1',compact('orderrequest_orderlist','increment'))->render();

		return response()->json(array('success' => true, 'html'=>$returnHTML,'html1'=>$returnHTML1,'page_id'=>$orderrequest_orderlist->nextPage,'increment'=>$increment+$limit));

	}else if($orderrequest['status']==0){
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}else{
   		return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
	}	

	}else{
   		return response()->json(array('success' => false, 'html'=>'Return home'));
	}
}

/******************************/
/*********-FILTER-TRACK*******/
/******************************/
	    public function viewroute(Request $request){
			if(session()->has('LoggedInUserId')){
			$order_id=$request->order_id;
			$UserToken= Session::get('token');
			$results=$this->getapi($UserToken,'ninja/tasks/'.$order_id);
			
			if($results['status']==1){
			$taskdetails=$results['output']->data;
			$html= view('commandcenter/viewroute',compact('taskdetails','order_id'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
			}else if($results['status']==0){
				echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
			}else{
				echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
			}
			}else{
				echo json_encode(array('status'=>'loggedout','htm'=>''));
			}
	    }
/******************************/
/*********-STAFF LIST*******/
/******************************/
public function assignNinjaList(Request $request){
	if(session()->has('LoggedInUserId')){
	$bucket_id=$request->bucket_id;
	$UserToken= Session::get('token');
	$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0');
	
	if($results['status']==1){
	$ninjadetails=$results['output']->data;
	$html= view('commandcenter/assignNinjaList',compact('ninjadetails','bucket_id'))->render();
	echo json_encode(array('status'=>'success','htm'=>$html));
	}else if($results['status']==0){
		echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
	}else{
		echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
	}
	}else{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}



/******************************/
/*********-ASSIGN TASK*******/
/******************************/

public function assign_task(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$bucket_id=$request->bucket_id;
		$cleaner_id=$request->cleaner_id;
		$UserToken= Session::get('token');
		$data=array("cleaner_id"=>$cleaner_id);
		$results=$this->postapi($UserToken,$data,'ninja/buckets/'.$bucket_id);
		if($results['status']==1)
		{
			return redirect('dashboard/commandcenter')->with('success_msg','Ninja Assigned. ');
		}
		else
		{
			return redirect('dashboard/commandcenter')->with('error_msg',$results['msg']);
		}				
	}else{
		return redirect()->route('mainpage'); 
	}
}

/************************************/
/********* approving_cleaner *******/
/***********************************/

public function approving_cleaner(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$bucket_id=$request->bucket_id;
		$cleaner_id=$request->approving_cleaner_id;
		$UserToken= Session::get('token');
		$data=array("cleaner_id"=>$cleaner_id);
		$results=$this->patchapi($UserToken,$data,'ninja/buckets/auto_assign_approve/'.$bucket_id);
		
		if($results['status']==1)
		{
			return redirect('dashboard/commandcenter')->with('success_msg','Auto assigned approved. ');
		}
		else
		{
			return redirect('dashboard/commandcenter')->with('error_msg',$results['msg']);
		}				
	}else{
		return redirect()->route('mainpage'); 
	}
}

/******************************************/
/********* cancle_approving_cleaner *******/
/*****************************************/

public function cancle_approving_cleaner(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$bucket_id=$request->bucket_id;
		$cleaner_id=$request->approving_cleaner_id;
		$UserToken= Session::get('token');
		$data=array("cleaner_id"=>$cleaner_id);
		$results=$this->patchapi($UserToken,$data,'ninja//buckets/auto_assign_cancel/'.$bucket_id);
		if($results['status']==1)
		{
			return redirect('dashboard/commandcenter')->with('success_msg','Auto assigned cancled. ');
		}
		else
		{
			return redirect('dashboard/commandcenter')->with('error_msg',$results['msg']);
		}				
	}else{
		return redirect()->route('mainpage'); 
	}
}


/******************************/
/*********-START TASK*******/
/******************************/

public function start_task(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$bucket_id=$request->bucket_id;
		$UserToken= Session::get('token');
		$data=array("status"=>3);
		$results=$this->postapi($UserToken,$data,'ninja/buckets/'.$bucket_id);
		if($results['status']==1)
		{
			return redirect('dashboard/commandcenter')->with('success_msg','Task Started. ');
		}
		else
		{
			return redirect('dashboard/commandcenter')->with('error_msg',$results['msg']);
		}				
	}else{
		return redirect()->route('mainpage'); 
	}
}

/*************************************/
/*********-PENDING TASK SECTION*******/
/*************************************/
public function pendingTaskSection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		$pendingList=$this->getapi($UserToken,'ninja/buckets/search?tab=pending&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
		
		if($pendingList['status']==1)
		{
			$pending_orderlist=$pendingList['output']->data;
			$html= view('commandcenter/pendingtask',compact('pending_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($pendingList['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}

/******************************/
/*********-ASSIGN TASK SECTION*******/
/******************************/
public function assignedTaskSection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		// $assignedList=$this->getapi($UserToken,'ninja/buckets/search?tab=assigned&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
		$assignedList=$this->getapi($UserToken,'ninja/buckets/search?tab=assigned&count_today=1&limit=10&page=0');
		
		if($assignedList['status']==1)
		{
			$assign_orderlist=$assignedList['output']->data;
			$html= view('commandcenter/assignedtasks',compact('assign_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($assignedList['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}

/******************************/
/*********-STARTED SECTION*******/
/******************************/

public function startedsection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		$startedlist=$this->getapi($UserToken,'ninja/buckets/search?tab=started&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
		
		if($startedlist['status']==1)
		{
			$started_orderlist=$startedlist['output']->data;
			$html= view('commandcenter/started',compact('started_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($startedlist['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}

/******************************/
/*********-COMPLETED TASK SECTION *******/
/******************************/
public function completedTaskSection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		$completelist=$this->getapi($UserToken,'ninja/buckets/search?tab=completed&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
		if($completelist['status']==1)
		{
			$complete_orderlist=$completelist['output']->data;
			$html= view('commandcenter/completedtasks',compact('complete_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($completelist['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}

/******************************/
/*********-UNPAID TASK SECTION *******/
/******************************/
public function unpaidTaskSection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		$unpaidlist=$this->getapi($UserToken,'ninja/buckets/search?tab=unpaid&sortType=1&count_today=1&limit=10&sortBy=time_book_order&page=0');
		
		if($unpaidlist['status']==1)
		{
			$unpaid_orderlist=$unpaidlist['output']->data;
			$html= view('commandcenter/unpaidtasks',compact('unpaid_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($unpaidlist['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
	}
}

/***************************************/
/*********-ORDER REQUEST SECTION *******/
/***************************************/
public function orderrequestsection()
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken= Session::get('token');
		$orderrequest=$this->getapi($UserToken,'ninja/requests?status=1&page=0&limit=10');
		
		if($orderrequest['status']==1)
		{
			$orderrequest_orderlist=$orderrequest['output']->data;
			$html= view('commandcenter/orderrequest',compact('orderrequest_orderlist'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
		}
		else if($unpaidlist['status']==0)
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
		else
		{
			echo json_encode(array('status'=>'fail','msg'=>$results['msg']));
		}
	}
	else
	{
		echo json_encode(array('status'=>'loggedout','htm'=>''));
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
			$html= view('trackstaff/searchview',compact('staffdetails','searchkeyword'))->render();
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

/****************************************/
/*********-SELECT CITY [ NINJA ]*******/
/**************************************/
public function selectcity(Request $request){
	if(session()->has('LoggedInUserId')){
	$city_id=$request->city_id;
	$UserToken= Session::get('token');
	if($city_id == "1"){
		$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0');
	}else{
		$results=$this->getapi($UserToken,'ninja/tracking/staffs?status=1&role=0&paging=0&sort=cleaner_first_name&city_id='.$city_id);
	}
	if($results['status']==1){
	$staffdetails=$results['output']->data;
	$html= view('commandcenter/liveninjas',compact('staffdetails','city_id'))->render();
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
/***************/
/*******************************************/
/***************-EDIT ORDER-**************/
	public function editorder($order_id="",$ot_id="",$ot_type=""){
		if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			if(!empty($order_id)){
				$results=$this->getapi($UserToken,'ninja/tasks/'.$order_id);	
				if($results['status']==1){
					$order_details=$results['output']->data;
					$customer_id=$order_details->customer->_id;
					$customer_details=$this->getapi($UserToken,'ninja/customer/show/'.$customer_id);
					$customerdata=$customer_details['output']->data;
					$customer_cars=$this->getapi($UserToken,'ninja/cars?cust_id='.$customer_id);
					$customercars = $customer_cars['output']->data;
					$categories_data = $this->getapi($UserToken,'categories');
					$category = $categories_data['output']->data;
					$customer_address = $this->getapi($UserToken,'ninja/address?cust_id='.$customer_id);
					$address = $customer_address['output']->data;
				
					$car_type="";
					$subscription_id="";
					foreach($customercars->data as $car){
						if($car->_id==$order_details->car->_id){
							$car_type = (!empty($car->car_type)) ? $car->car_type : '';
							$subscription_id = (!empty($car->subscription_id)) ? $car->subscription_id : '';
						}
					}
					$services_data = $this->getapi($UserToken,'services?ot_id='.$ot_id.'&car_type='.$car_type.'&subscription_id='.$subscription_id);
					if($services_data['status']==1){
						$services = $services_data['output']->data;
					}

					$date_available=$this->getapi($UserToken,'ninja/categories/date-available?category_id='.$ot_id);
					if($date_available['status']==1)
					{
						$date = $date_available['output']->data;

						$alldt=array();
						$all_date=array();
						$datetime=$date->datetime;
						foreach($datetime as $dt){ 
							$ddd=array();
							$ddd['date']=date('Y-m-d',strtotime($dt->date));
							$ddd['time']=date('H:i:s',strtotime($dt->date));
							$all_date[]=date('Y-m-d',strtotime($dt->date));
							$alldt[]=$ddd;
						}
					}

					return view('commandcenter/edit_order',compact('order_details','customerdata','customercars','category','address','order_id','services','date','all_date','ot_id','ot_type','customer_id'));
				}else{
					return redirect('dashboard/commandcenter')->with('login-error',$results['msg']);	
				}
			}else{
				return redirect()->route('commandcenterview');
			}
		}else{
			return redirect()->route('mainpage');
		}
	}

/*********** SHOW CATEGORY MODEL *************/

		public function categorymodel(Request $request){
			if(session()->has('LoggedInUserId')){
				$UserToken = Session::get('token');
				$customer_order_id = $request->customer_order_id;
				$categories_data = $this->getapi($UserToken,'categories');
				$html="";
				if($categories_data['status']==1){
					$category = $categories_data['output']->data;
					
					if(!empty($category)){
						foreach($category as $categories){
							$ot_name = (!empty($categories->ot_name)) ? $categories->ot_name : '';
							$ot_icon = (!empty($categories->ot_icon)) ? $categories->ot_icon : '';
							$ot_id = (!empty($categories->ot_id)) ? $categories->ot_id : '';
							$ot_type = (!empty($categories->ot_type)) ? $categories->ot_type : '';
							$html.='<div class="col-sm-4">
										<a href="'.url('dashboard/commandcenter/addorder/'.$customer_order_id.'/'.$ot_id.'/'.$ot_type).'">
											<div class="category_img">
												<img src='.$ot_icon.'>
												<p>'.$ot_name.'</p>		      				
											</div>
										</a>
									</div>';
						}
					}		
				echo json_encode(array('status'=>'success','htm'=>$html));
				}
			}else{
				return redirect()->route('mainpage'); 
			}
		}

/******* ADD ORDER ********/
	    public function addorder($order_id="",$ot_id="",$ot_type=""){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				if(!empty($order_id)){
					$results=$this->getapi($UserToken,'ninja/tasks/'.$order_id);	
					if($results['status']==1){
						$order_details = $results['output']->data;
						$customer_id = $order_details->customer->_id;
						$customer_details = $this->getapi($UserToken,'ninja/customer/show/'.$customer_id);
						$customerdata = $customer_details['output']->data;
						$categories_data = $this->getapi($UserToken,'categories');
						$category = $categories_data['output']->data;
						$customer_cars = $this->getapi($UserToken,'ninja/cars?cust_id='.$customer_id);
						$customercars = $customer_cars['output']->data;
						$customer_address = $this->getapi($UserToken,'ninja/address?cust_id='.$customer_id);
						$address = $customer_address['output']->data;

						$date_available=$this->getapi($UserToken,'ninja/categories/date-available?category_id='.$ot_id);
				
						if($date_available['status']==1)
						{
							$date = $date_available['output']->data;

							$alldt=array();
							$all_date=array();
							$datetime=$date->datetime;
							$before = (!empty($date->flexi->before)) ? $date->flexi->before : '';
							$after = (!empty($date->flexi->after)) ? $date->flexi->after : '';

							foreach($datetime as $dt){ 
								$ddd=array();
								$ddd['date']=date('Y-m-d',strtotime($dt->date));
								$ddd['time']=date('H:i:s',strtotime($dt->date));
								$all_date[]=date('Y-m-d',strtotime($dt->date));
								$alldt[]=$ddd;
							}
						}

						return view('commandcenter/add_order',compact('ot_id','ot_type','order_id','order_details','customerdata','category','customercars','address','all_date','date','customer_id'));
            		}else{
						return redirect('/dashboard/commandcenter')->with('login-error',$results['msg']);	
					}
				}else{
					return redirect()->route('commandcenterview');
				}
			}else{
				return redirect()->route('mainpage'); 
			}
				
	    }
/***************/

/********************************************/
/*********ADD ORDER CARS CHECKUNCHECK*******/

public function checkuncheck(Request $request){

	if(session()->has('LoggedInUserId'))
	{	
		$UserToken= Session::get('token');
		$numberOfChecked=$request->numberOfChecked;
		$car_type=$request->car_type;
		$subscription_id=$request->subscription_id;
		$car_id=$request->car_id;
		$ot_id=$request->ot_id;	
		$ot_type=$request->ot_type;		
		$car_image=$request->car_image;
		$car_color=$request->car_color;
		$car_year=$request->car_year;
		$car_model=$request->car_model;
		$car_name=$request->car_name;

		$selected_cars='<div class="vichle_details_box'.$car_id.'" id="selected_cars_show">
							<img src="'.$car_image.'" alt="">
							<div class="car-tab-text-n">
								<h6> '.$car_name.' </h6>
								<p> '.$car_model.' | '.$car_year.' </p>
								<p> <span class="color-code"> </span> '.$car_color.' </p>
	   						</div>
						</div>';

		$services_data = $this->getapi($UserToken,'services?ot_id='.$ot_id.'&car_type='.$car_type.'&subscription_id='.$subscription_id);

		if($services_data['status']==1){
			$services = $services_data['output']->data;
		}

		$html="";

		foreach($services as $service)
		{
			$service_name = (!empty($service->service_name)) ? $service->service_name : '';
			$slug = (!empty($service->slug)) ? $service->slug : '';
			$service = (!empty($service->service_charge)) ? $service->service_charge : 0 ;
			$service_charge = $service * $numberOfChecked;

			$html.='<div class="d-flex align-items-center justify-content-between py-2 border-bottom">
						<p class="mb-0 service'.$slug.'">'.$service_name.'</p>
						<div class="d-flex align-items-center justify-content-between">
							<p class="mb-0 me-3 service'.$slug.'">'.$service_charge.' AED </p>	
							<input type="checkbox" class="select-services-customer" data-no_of_cars="'.$numberOfChecked.'" data-ot_id="'.$ot_id.'" data-ot_type="'.$ot_type.'" data-slug="'.$slug.'" data-service_name="'.$service_name.'" data-car_id="'.$car_id.'" data-action_url="'.route('servicecalculation_add_order').'">
						</div>
					</div>';
		}

		echo json_encode(array('status'=>'success','htm'=>$html,'cars'=>$selected_cars,'no_of_cars'=>$numberOfChecked));
	}
	else
	{
		return redirect()->route('mainpage'); 
	}
}


/*******************************************/
/*********-SERVICE AMOUNT CALCULATION*******/

public function servicecalculation(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$UserToken = Session::get('token');
		$service_name = $request->service_name;
		$slug = $request->slug;
		$ot_type = $request->ot_type;
		$ot_id = $request->ot_id;
		$car_id = $request->car_id;
		$cars = $request->cars;
		$mmdata=array();
		$items=array();
		foreach($cars as $car){
			$items=array();
			foreach($slug as $slugs){
				$items[]=array ('slug' => $slugs ,'count' => 1);
			}
			$mmdata[]=array('car_id' => $car,'items'=>$items);
		}
		$data=array('cars'=>$mmdata,'order_type_id'=>$ot_id,'ot_type'=>$ot_type);

		$results = $this->postapi2($UserToken,$data,'ninja/buckets/calc');
		// echo "<pre>"; print_r($results); echo "</pre>"; die();
		$service="";
		if($results['status']==1)
		{
			$calc_data = $results['output']->data;
			$subtotal = $calc_data->total_services;
			$vat = $calc_data->vat->amount;
			$total = $calc_data->total_real;

			foreach($calc_data->items as $data){
				
				// $service = '<div class="d-flex align-items-center justify-content-between fw-bold"> <p>'.$data->name.'</p> <p>'.$data->cost.' AED</p> </div>';
				// $service.='<p class="added_service'.$data->slug.'">'.$data->name.'</p><p class="added_service'.$data->slug.'">'.$data->cost.' AED</p>';
				$service.='<p class="added_service'.$data->slug.'">'.$data->name.'<span class="service_row1"> '.$data->cost.' AED </span> </p>';

			}
		}
		echo json_encode(array('status'=>'success','services'=>$service,'subtotal'=>$subtotal,'vat'=>$vat,'total'=>$total,));

	}
	else
	{
		return redirect()->route('mainpage'); 
	}
}

/******************************/
/*********-TIME AVAILABLE*******/
/******************************/
public function timeavailable(Request $request){

	if(session()->has('LoggedInUserId'))
	{
		$ot_id=$request->ot_id;
		$s_date=$request->s_date;
		$lat=$request->lat;
		$long=$request->long; 
		$UserToken= Session::get('token');
		$time_available=$this->getapi($UserToken,'ninja/categories/timeavailable?category_id='.$ot_id.'&date='.$s_date.'&lat='.$lat.'&lng='.$long.'');
		$available_time="";

		if($time_available['status']==1)
		{
			$time = $time_available['output']->data;

			$available_time.= '<ul class="list-inline">';
			if(!empty($time)){
			foreach($time as $tim)
			{	
				$date = date('d-m-Y',strtotime($tim->hour));
				$all_time = date('H:i A',strtotime($tim->hour));
				$available_time.= '<li> <a href="javascript:void(0)" class="booking-time" data-datetime="'.$tim->hour.'" data-book_date="'.$date.'" data-book_time="'.$all_time.'"> '.$all_time.' </a> </li>';
			}
			}							
		   	$available_time.='</ul>';
		}
		echo json_encode(array('status'=>'success','avl_time'=>$available_time));
	}
	else
	{
		return redirect()->route('mainpage'); 
	}
}


/*******************************************/
/***************-CREATE ORDER-**************/

public function createorder(Request $request){ 
	if(session()->has('LoggedInUserId')){
		$UserToken = Session::get('token');

		$customer_id=$request->customer_id;

		$address_id=$request->address_id;
		$address_label=$request->address_label;
		$address_type=$request->address_type;
		$address_lat=floatval($request->address_lat);
		$address_long=floatval($request->address_long);
		$is_default=$request->is_default;
		if($is_default==1){ $default = true; }else{ $default = false; }
		$address_description=$request->address_description;
		$address_apartment_number=$request->address_apartment_number;
		$address_additional_detail=$request->address_additional_detail;
		$address_notes=$request->address_notes;
		$address_sub_locality=$request->address_sub_locality;
		$payment_method= (int)$request->payment_method;
		$customer_note=$request->customer_note;
		$order_type_id=$request->order_type_id;
		$ot_type= (int)$request->ot_type;
		$time_book_order=$request->time_book_order;
		$time_book_type=$request->time_book_type;
		if($time_book_order==NULL){ $time_book_order = ""; }

		$cars=$request->cars;
		$slug=$request->slug;
		$selected_cars = explode(',', $cars);
		$selected_slug = explode(',', $slug);
		
		$car_data=array();
		$items=array();
		foreach($selected_cars as $car){
			$items=array();
			foreach($selected_slug as $slugs){
				$items[]=array('slug' => $slugs);
			}
			$car_data[]=array('car_id' => $car,'items'=>$items);
		}

		$data = array ('customer_id' => $customer_id,
						'address' => array (
										  'additional_detail' => $address_additional_detail,
										  'alreadySave' => true,
										  'apartment_number' => $address_apartment_number,
										  'description' => $address_description,
										  '_id' => $address_id,
										  'is_default' => $default,
										  'label' => $address_label,
										  'location' => array (
														'coordinates' => array (
																			0 => $address_long,
																			1 => $address_lat,
																			),
														'type' => $address_type,
														  ),
										  'notes' => $address_notes,
										  'sub_locality' => $address_sub_locality,
										),
						'cars' => $car_data,
						'order_type_id' => $order_type_id,
						'ot_type' => $ot_type,
						'note' => $customer_note,
						'payment_method' => $payment_method,
						'time_book_order' => $time_book_order,
						'time_book_type' => $time_book_type,
				);
	// echo "<pre>"; print_r($data); echo "</pre>"; die();
		$results = $this->postapi2($UserToken,$data,'ninja/buckets');
		
		if($results['status']==1)
		{
			return redirect('dashboard/commandcenter')->with('success_msg',"Order created successfully");
		}
		else
		{
			return redirect('dashboard/commandcenter')->with('error_msg',$results['msg']);
		}	

	}else{
		return redirect()->route('mainpage');
	}
	
}

/***************** Tracking Details ************/

	public function trackingDetails(Request $request){
		if(session()->has('LoggedInUserId')){
			$UserToken= Session::get('token');
			$bucket_id = $request->bucket_id;
			$results=$this->getapi($UserToken,'ninja/logs?refer_id='.$bucket_id.'&paging=0');
			if($results['status']==1){
			$trackingdetails=$results['output']->data;
			$html= view('commandcenter/trackingdetails',compact('trackingdetails','bucket_id'))->render();
			echo json_encode(array('status'=>'success','htm'=>$html));
			}else if($results['status']==0){
				echo json_encode(array('msg' => $results['msg']));
			}else{
				echo json_encode(array('msg' => $results['msg']));
			}
			
		}else{
			return redirect()->route('mainpage');
		}
	}




}
