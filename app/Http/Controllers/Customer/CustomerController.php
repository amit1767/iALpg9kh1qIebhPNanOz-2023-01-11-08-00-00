<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller; 
use App\Http\Controllers\ApiController; 
use Illuminate\Http\Request;
use Session;
use Redirect;
class CustomerController extends ApiController
{
	    public function __construct(){
			
		}

/******************************/
/*********CUSTOMERS*******/
/******************************/
	    public function customers($page=0){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				if($page>0){
					$page=$page-1;
				}
				$limit=30;
				$maindatas=array();

			$results=$this->getapi($UserToken,'ninja/config');  
			if($results['status']==1){
				if(empty($results['output']->data->column_customers)){
					$final_array=array(
					array("sort"=> 0,"column"=> "cust_code","name"=> "Customer Code","active"=>1),
					array("sort"=> 1,"column"=> "cust_username","name"=> "Username","active"=> 1),
					array("sort"=> 2,"column"=> "cust_first_name","name"=> "First Name","active"=> 1),
					array("sort"=> 3,"column"=> "cust_last_name","name"=> "Last Name","active"=> 1),
					array("sort"=> 4,"column"=> "cust_mobile","name"=> "Mobile","active"=> 1),
					array("sort"=> 5,"column"=> "cust_email","name"=> "Email","active"=> 1),
					array("sort"=> 6,"column"=> "cust_city","name"=> "City","active"=> 1),
					array("sort"=> 7,"column"=> "_id","name"=> "Customer Id","active"=> 1),

					array("sort"=> 8,"column"=> "inv_rewards","name"=> "Rewards","active"=> 0),
					array("sort"=> 9,"column"=> "createdAt","name"=> "Created At","active"=> 0),
					array("sort"=> 10,"column"=> "updatedAt","name"=> "Updated At","active"=> 0),
					array("sort"=> 11,"column"=> "full_name","name"=> "Full Name","active"=> 0),
					array("sort"=> 12,"column"=> "cust_longtitude","name"=> "Longtitude","active"=> 0),
					array("sort"=> 13,"column"=> "cust_latitude","name"=> "Latitude","active"=> 0),
					array("sort"=> 14,"column"=> "cust_postcode","name"=> "Postcode","active"=> 0),
					array("sort"=> 15,"column"=> "cust_state","name"=> "State","active"=> 0),
					array("sort"=> 16,"column"=> "cust_country","name"=> "Country","active"=> 0),
					array("sort"=> 17,"column"=> "cust_telephone","name"=> "Telephone","active"=> 0),
					array("sort"=> 18,"column"=> "cust_status","name"=> "Status","active"=> 0),
					array("sort"=> 19,"column"=> "cust_device_model","name"=> "Device Type","active"=> 0),
					array("sort"=> 20,"column"=> "lifeTimeValue","name"=> "LTV","active"=> 0),
					array("sort"=> 21,"column"=> "is_vip","name"=> "VIP","active"=> 0),
					array("sort"=> 22,"column"=> "is_subscribed","name"=> "Subscriber","active"=> 0),
					array("sort"=> 23,"column"=> "cust_order_count","name"=> "Order Count","active"=> 0),
					array("sort"=> 24,"column"=> "is_receive_email","name"=> "Email Receive","active"=> 0),
					);
					$postarr=array('key'=>'column_customers','value'=>$final_array);
			        $resultss=$this->patchapi($UserToken,$postarr,'ninja/config');
					$results=$this->getapi($UserToken,'ninja/config');

			$maindatas['columns']=$results['output']->data->column_customers;
				}else{
			$maindatas['columns']=$results['output']->data->column_customers;
				}
			
			}else if($results['status']==0){
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}else{
				return redirect('/dashboard')->with('login-error',$results['msg']);
			}
				
			$resultss=$this->getapi($UserToken,"ninja/customer?page=$page&limit=$limit");
			if($resultss['status']==1){	
			$maindatas['maindata']=$resultss['output']->data->data;
			$maindatas['total']=$resultss['output']->data->total;
			$maindatas['limit']=$resultss['output']->data->limit;
			$maindatas['totalPages']=$resultss['output']->data->totalPages;
			$maindatas['page']=$resultss['output']->data->page;
			$maindatas['prevPage']=$resultss['output']->data->prevPage;
			$maindatas['nextPage']=$resultss['output']->data->nextPage;
			return view('customer.view',compact('maindatas'));
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
/*******LOAD-MORE-CUSTOMERS*****/
/******************************/
	    public function loadmorecustomers($page=0){
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				if($page>0){
					$page=$page-1;
				}
				$limit=30;
				$maindatas=array();
				$results=$this->getapi($UserToken,'ninja/config');
				$maindatas['columns']=$results['output']->data->column_customers;
				$resultss=$this->getapi($UserToken,"ninja/customer?page=$page&limit=$limit");
				if($resultss['status']==1){	
				$maindatas['maindata']=$resultss['output']->data->data;
				$maindatas['total']=$resultss['output']->data->total;
				$maindatas['limit']=$resultss['output']->data->limit;
				$maindatas['totalPages']=$resultss['output']->data->totalPages;
				$maindatas['page']=$resultss['output']->data->page;
				$maindatas['prevPage']=$resultss['output']->data->prevPage;
				$maindatas['nextPage']=$resultss['output']->data->nextPage;
				$returnHTML= view('customer.loadmore',compact('maindatas'))->render();
					 return response()->json(array('success' => true, 'html'=>$returnHTML,'page_id'=>$resultss['output']->data->nextPage));
				}else if($resultss['status']==0){
					return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
				}else{
					return response()->json(array('success' => false, 'html'=>'No more data available','page_id'=>0));
				}	
				
				}else{
					return response()->json(array('success' => false, 'html'=>'return home'));
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
				$data=array('key'=>'column_customers','value'=>$final_array);
				$results=$this->postapi($UserToken,$data,'ninja/config');
				if($results['status']==1)
				{
					return redirect('/dashboard/customers')->with('success_msg','Columns has been successfully updated');
				}
				else
				{
					return redirect('/dashboard/customers')->with('error_msg',$results['msg']);
				}
					
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
			if($results1['status']==1){
				$order_list=$results1['output']->data;
			}
			$customer_vehicles=$this->getapi($UserToken,'ninja/cars?cust_id='.$cust_id);
			if($customer_vehicles['status']==1){
				$customervehicles = $customer_vehicles['output']->data;
			}
			$customer_subscription = $this->getapi($UserToken,'ninja/user-subscription?page=0&cust_id='.$cust_id);
			if($customer_subscription['status']==1){
				$subscription = $customer_subscription['output']->data;
			}
			$customer_address = $this->getapi($UserToken,'ninja/address?cust_id='.$cust_id);
			if($customer_address['status']==1){
				$address = $customer_address['output']->data;
			}
			$category_data = $this->getapi($UserToken,'categories');
			if($category_data['status']==1){
				$category = $category_data['output']->data;
			}
			$saved_credit_cards = $this->getapi($UserToken,'ninja/payment/credit-card?cust_id='.$cust_id);
			if($saved_credit_cards['status']==1){
				$customer_cards = $saved_credit_cards['output']->data;
			}
			$results=$this->getapi($UserToken,"ninja/customer/show/$cust_id");		
			if($results['status']==1)
			{
				$customerdata=$results['output']->data;

				return view('customer.details',compact('customerdata','order_list','order_status','customervehicles','subscription','address','category','customer_cards','cust_id'));
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

/*********************************/
/*********-CUSTOMER-ORDER********/

	    public function customerorder($cust_id,$ot_id,$ot_type){
			
			if(session()->has('LoggedInUserId')){
				$UserToken= Session::get('token');
				$cust_id = $cust_id; 
				$customer_data=$this->getapi($UserToken,'ninja/customer/show/'.$cust_id);
				$customer_cars=$this->getapi($UserToken,'ninja/cars?cust_id='.$cust_id);
				$customercars = $customer_cars['output']->data;
				$category_data = $this->getapi($UserToken,'categories');
				if($category_data['status']==1){
				$category = $category_data['output']->data;
				}
				$customer_address = $this->getapi($UserToken,'ninja/address?cust_id='.$cust_id);
				$address = $customer_address['output']->data;
				$customer_subscription = $this->getapi($UserToken,'ninja/user-subscription?page=0&cust_id='.$cust_id);
				$subscription = $customer_subscription['output']->data;
				
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
			
				if($customer_data['status']==1){
					$customerdata = $customer_data['output']->data;
					return view('customer/customerorder',compact('customerdata','customercars','address','category','subscription','ot_id','ot_type','all_date','date','cust_id'));
				}
				else{
					return Redirect::back()->with('error_msg',$results['msg']);
				}	
			}
			else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-ADD-CAR*******/
	    public function addcar(){
			if(session()->has('LoggedInUserId')){
				return view('customer/addcar');
			}else{
				return redirect()->route('mainpage'); 
			}
	    }
/******************************/
/*********-CUSTOMER-ORDER*******/
	    public function addcustomer(Request $request){
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
				$device = $request->device;
				$active = $request->active;
				$vip_status = $request->vip_status;

				$inputs=array('firstName'=>$firstname,'lastName'=>$lastname,'phone'=>$phone,'email'=>$email,'city'=>$city,'address'=>$address,'deviceType'=>$device,'active'=>$active,'vip_status'=>$vip_status);	
			   
				$results=$this->postapi2($UserToken,$inputs,'ninja/customer');

				if($results['status']==1)
				{
					return redirect('/dashboard/customers')->with('success_msg',$results['msg']);
				}
				else
				{
					return redirect('/dashboard/customers')->with('error_msg',$results['msg']);
				}	

			}else{
				return redirect('/dashboard')->with('login-error',"Please login");  
			}
	    }
		
/********************************************/
/*********-ADD ORDER CARS CHECKUNCHECK*******/

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
							<input type="checkbox" class="select-services-customer" data-no_of_cars="'.$numberOfChecked.'" data-ot_id="'.$ot_id.'" data-ot_type="'.$ot_type.'" data-slug="'.$slug.'" data-service_name="'.$service_name.'" data-car_id="'.$car_id.'" data-action_url="'.route('servicecalculation').'">
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

/******************************/
/*********-SEARCH-CUSTOMER*******/
/******************************/
public function searchcustomer(Request $request)
{
	if(session()->has('LoggedInUserId'))
	{
		$keyword=$request->keyword;
		$UserToken= Session::get('token');
		$resultss=$this->getapi($UserToken,"ninja/customer?search=$keyword");
		$results=$this->getapi($UserToken,'ninja/config');
			if($resultss['status']==1){
				$maindatas['columns']=$results['output']->data->column_customers;
				$maindatas['maindata']=$resultss['output']->data->data;
				$maindatas['total']=$resultss['output']->data->total;
				$maindatas['limit']=$resultss['output']->data->limit;
				$maindatas['totalPages']=$resultss['output']->data->totalPages;
				$maindatas['page']=$resultss['output']->data->page;
				$maindatas['prevPage']=$resultss['output']->data->prevPage;
				$maindatas['nextPage']=$resultss['output']->data->nextPage;
				return view('customer.view',compact('maindatas'));
			}
			else{	
				return redirect('/dashboard/customers')->with('error_msg','No data available');
			}
		
	}else{
		return redirect()->route('mainpage'); 
	}
	
}

/******************************/
/*********-TIME AVAILABLE*******/
/******************************/
public function timeavailable(Request $request)
{
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
				return redirect('dashboard/viewcustomer/'.$customer_id)->with('success_msg',"Order created successfully");
			}
			else
			{
				return redirect('dashboard/viewcustomer/'.$customer_id)->with('error_msg',$results['msg']);
			}	

		}else{
			return redirect()->route('mainpage');  
		}
		
	}


/*********** View Route **************/

public function viewroute(Request $request){
	if(session()->has('LoggedInUserId')){
	$order_id=$request->order_id;
	$UserToken= Session::get('token');
	$results=$this->getapi($UserToken,'ninja/tasks/'.$order_id);
	
	if($results['status']==1){
	$order=$results['output']->data;
	$html= view('customer/viewroute',compact('order','order_id'))->render();
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

					return view('customer/edit_order',compact('order_details','customerdata','customercars','category','address','order_id','services','date','all_date','ot_id','ot_type','customer_id'));
				}else{
					return redirect('dashboard/customers')->with('login-error',$results['msg']);	
				}
			}else{
				return redirect()->route('customers');
			}
		}else{
			return redirect()->route('mainpage');
		}
	}

/*******************************************/
/***************-SUBMIT EDIT ORDER-**************/

public function submiteditorder(Request $request){ 
	if(session()->has('LoggedInUserId')){
		$UserToken = Session::get('token');
		$customer_id=$request->customer_id;
		$order_id=$request->order_id;
		$address_id=$request->address_id;
		$address_label=$request->address_label;
		$address_type=$request->address_type;
		$address_lat=floatval($request->address_lat);
		$address_long=floatval($request->address_long);
		$is_default=$request->is_default;
		if($is_default==1){ $is_default = true; }else{ $is_default = false; }
		$alreadySave=$request->alreadySave;
		if($alreadySave==1){ $alreadySave = true; }else{ $alreadySave = false; }
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
		if($time_book_order==NULL){ $time_book_order = ""; }
		$time_book_type=$request->time_book_type;
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
										  'alreadySave' => $alreadySave,
										  'apartment_number' => $address_apartment_number,
										  'description' => $address_description,
										  '_id' => $address_id,
										  'is_default' => $is_default,
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

   		echo $order_id;	 echo "<pre>"; print_r($data); echo "</pre>"; die();

		$results = $this->postapi2($UserToken,$data,'ninja/buckets');
		
		if($results['status']==1)
		{
			return redirect('dashboard/viewcustomer/'.$customer_id)->with('success_msg',"Order updated successfully");
		}
		else
		{
			return redirect('dashboard/viewcustomer/'.$customer_id)->with('error_msg',$results['msg']);
		}	

	}else{
		return redirect()->route('mainpage');  
	}
	
}



}
