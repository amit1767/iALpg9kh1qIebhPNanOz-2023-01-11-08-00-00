<?php
namespace App\Http\Controllers\Orders;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
class OrderController extends ApiController
{
	    public function __construct(){
			
		}
   
public function view($page=0){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				if($page>0){
					$page=$page-1;
				}
				$limit=10;
				$maindatas=array();

			$results=$this->getapi($UserToken,'ninja/config');
			if($results['status']==1){
				if(empty($results['output']->data->column_orders)){
					$final_array=array(
					array("sort"=> 0,"column"=> "order_id","name"=> "Order Id","active"=>1),
					array("sort"=> 1,"column"=> "customer_name","name"=> "Customer Name","active"=> 1),
					array("sort"=> 2,"column"=> "plate_number","name"=> "Plate Number","active"=> 1),
					array("sort"=> 3,"column"=> "manufacturer","name"=> "Manufacturer","active"=> 1),
					array("sort"=> 4,"column"=> "category","name"=> "Category","active"=> 1),
					array("sort"=> 5,"column"=> "services","name"=> "Services","active"=> 1),
					array("sort"=> 6,"column"=> "status","name"=> "Status","active"=> 1),
					array("sort"=> 7,"column"=> "customer_id","name"=> "Customer Id","active"=> 1),

					array("sort"=> 8,"column"=> "payment_status","name"=> "Payment status","active"=> 0),
					array("sort"=> 9,"column"=> "payment_method","name"=> "Payment method","active"=> 0),
					array("sort"=> 10,"column"=> "cleaner_username","name"=> "Cleaner username","active"=> 0),
					array("sort"=> 11,"column"=> "cleaner_email","name"=> "Cleaner email","active"=> 0),
					array("sort"=> 12,"column"=> "cleaner_first_name","name"=> "Cleaner first name","active"=> 0),
					array("sort"=> 13,"column"=> "cleaner_last_name","name"=> "Cleaner last name","active"=> 0),
					array("sort"=> 14,"column"=> "cleaner_last_name","name"=> "Cleaner last name","active"=> 0),
					array("sort"=> 15,"column"=> "phone","name"=> "cleaner Phone","active"=> 0),
					
					);
					$postarr=array('key'=>'column_orders','value'=>$final_array);
			        $resultss=$this->patchapi($UserToken,$postarr,'ninja/config');
					$results=$this->getapi($UserToken,'ninja/config');

			$maindatas['columns']=$results['output']->data->column_orders;  
				}else{
					
			$maindatas['columns']=$results['output']->data->column_orders;
				}
			
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
			$resultss=$this->getapi($UserToken,"ninja/buckets?page=$page&limit=$limit");
			if($resultss['status']==1){	
			
			$maindatas['maindata']=$resultss['output']->data->data;
			$maindatas['total']=$resultss['output']->data->total;
			$maindatas['limit']=$limit;
			$maindatas['totalPages']='';
			$maindatas['page']=$page;
			$maindatas['prevPage']='';
			$maindatas['nextPage']='';
			
			return view('order.view',compact('maindatas'));
			}else if($resultss['status']==0){
				return redirect('/dashboard')->with('login-error',$resultss['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$resultss['msg']);
			}	
			
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-UPDATE-COLUMN-SETTING-*******/
   public function updatecolumnsetting(Request $request){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$column_setting = $request->column_setting;
				$column_name = $request->column_name;
				$column_title = $request->column_title;
				$column_checked = $request->column_checked;
				$new_array=array();
				$final_array=array();
				$i=0;

				foreach($column_name as $cn){
					$new_array['sort']=$i;
					$new_array['column']=$column_title[$i];
					$new_array['name']=$cn;
					$new_array['active']=$column_checked[$i];
					$final_array[]=$new_array;
					$i++;
				}
				$data=array('key'=>'column_orders','value'=>$final_array);
				$results=$this->patchapi($UserToken,$data,'ninja/config');
				if($results['status']==1)
				{
					return redirect('/dashboard/orders')->with('success_msg',$results['msg']);
				}
				else
				{
					return redirect('/dashboard/orders')->with('error_msg',$results['msg']);
				}
					
			}else{
				return redirect('/dashboard')->with('login-error',"Please login");  
			}
	    }

/********************************/
/*********** SEARCH *************/

		public function ordersearch(Request $request){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$search_order = $request->search_order;
				$results = $this->getapi($UserToken,"ninja/buckets");	
			}else{
					return redirect('/dashboard')->with('login-error',"Please login");  
			}
		}

/****************************************/
/*********** CHANGE_PERIODE *************/

		public function changeperiode(Request $request){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				
				$results = $this->getapi($UserToken,"ninja/buckets");
			}else{
				return redirect('/dashboard')->with('login-error',"Please login");  
			}
		}


/******************************/		
/*********-VIEW-CUSTOMER-*******/
	    public function viewcustomer($cust_id){
			if(session()->has('LoggedInUserId')){
		  	$UserToken= Session::get('token');
		  	$order_list=array();
			$results1=$this->getapi($UserToken,"admin/orders/list/$cust_id?page=0&limit=10&sortBy=createdAt&sortType=1");
			if($results1['status']==1)
			{
				$order_list=$results1['output']->data;
			}
			$results=$this->getapi($UserToken,"ninja/customer/show/$cust_id");
			if($results['status']==1)
			{
				$customerdata=$results['output']->data;

				return view('customer.details',compact('customerdata','order_list','order_status'));
			}
			else
			{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
			
	//	$order_status = array( "Initiate"=> "0","Confirmed"=> "1","Assigned"=> "2","Going"=> "3","Started"=> "4","Completed"=> "5","Canceled"=> "6","Unpaid"=> "7","Rejected"=> "8","Refund"=> "9","Draff"=> "21" );

			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/******************************/
/******************************/
/*********-CUSTOMER-ORDER*******/
	    public function updatecustomer(Request $request){
			if(session()->has('LoggedInUserId')){
				$this->validate($request,[
				'firstname'=>'required',
				'phone'=>'required',
				'email'=>'required',
				'address'=>'required',
				'city'=>'required',
				]);
				$UserToken= Session::get('token');
				$firstname = $request->firstname;
				$lastname = $request->lastname;
				$email = $request->email;
				$phone = $request->phone;
				$city = $request->city;
				$address = $request->address;
				$device = $request->inputDevice;
				$active = $request->active;
				$vip_status = $request->vip_status;
				
				$customer_id = $request->customer_id;
				
				$inputs=array('firstName'=>$firstname,'lastName'=>$lastname,'phone'=>$phone,'email'=>$email,'city'=>$city,'address'=>$address,'deviceType'=>$device,'active'=>$active,'vip_status'=>$vip_status);	

				$results=$this->postapi($UserToken,$inputs,'ninja/customer/'.$customer_id);

				if($results['status']==1)
				{
					return redirect('/dashboard/viewcustomer/'.$customer_id)->with('success_msg','Customer successfully updated. ');
				}
				else
				{
					return redirect('/dashboard/viewcustomer/'.$customer_id)->with('error_msg',$results['msg']);
				}

			}else{
				return redirect('/dashboard')->with('login-error',"Please login");  
			}
	    }

/******************************/
/*********-CUSTOMER-ORDER*******/

	    public function customerorder($cust_id){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$customer_data=$this->getapi($UserToken,'ninja/customer/show/'.$cust_id);
				$categories_data=$this->getapi($UserToken,'categories');
				$categories = $categories_data['output']->data;
				$customer_cars=$this->getapi($UserToken,'ninja/cars?cust_id='.$cust_id);
				$customercars = $customer_cars['output']->data;
				// $services_data = $this->getapi($UserToken,'services?ot_id=1&car_type=saloon&subscription_id='.$cust_id);
				// $services = $services_data['output']->data;
				$dates_data = $this->getapi($UserToken,'categories/date-available?category_id=1');
				$date = $dates_data['output']->data;

				if($customer_data['status']==1)
				{
					$customerdata = $customer_data['output']->data;
					return view('customer/customerorder',compact('customerdata','customercars','categories','date'));
				}
				else
				{
					return Redirect::back()->with('error_msg',$results['msg']);
				}	
			}
			else
			{
				return redirect()->route('mainpage'); 
			}
	    }
/***************/

}