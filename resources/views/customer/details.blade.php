@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-4 col-md-12">
	  <div class="heading-content-nav">
	   <!-- <h3> Customer Details </h3> -->
	   <!-- <p> <small> <i class="fas fa-chart-pie"></i> </small> <small> Customers </small> > <small> Customer Details </small> </p> -->
	  </div>
	</div>
	
	
	<div class="col-lg-8 col-md-12">
	  <div class="dashboard-right-content">
		<ul class="list-inline">
		 <!-- <li> <a href="#" class="whiteshadow-custom-btn"><i class="fas fa-filter"></i>  Filter  </a> </li> -->
		 <li>  <a href="" class="gree-custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i>  New Order </a> </li>
		</ul>
	  </div>
	</div>
  </div>
  
  <div class="row mt-22">
  		@if (\Session::has('error_msg'))
			<div class="alert alert-danger">
				<ul>
					<li>{!! \Session::get('error_msg') !!}</li>
				</ul>
			</div>
		@endif
		@if (\Session::has('success_msg'))
			<div class="alert alert-success">
				<ul>
					<li>{!! \Session::get('success_msg') !!}</li>
				</ul>
			</div>
		@endif
    <div class="col-lg-3">
	   <div class="customer-detail-boxx">
	     <div class="customer-p-namee">
		   <img class="logo-image" src="{{ asset('public/assets/image/user.png')}}" alt="">
		   <div class="c-name">
			    <h5>@if(isset($customerdata->full_name)) {{$customerdata->full_name}} @endif</h5>
				<p> Customer ID: <strong> @if(isset($customerdata->_id)) {{$customerdata->_id}} @endif </strong></p>
				<a class="edit" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fas fa-user-edit"></i></a>
			    <a class="save" href="#"><i class="far fa-save"></i></i></a>
		   </div>
		   <!-- <a class="edit" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fas fa-user-edit"></i></a>
		   <a class="save" href="#"><i class="far fa-save"></i></i></a> -->
		 </div>
		  <div class="customer-detail-tables ">
		  <form>
		     <p>First Name <span> <input readonly type="text" value="@if(isset($customerdata->cust_first_name)) {{$customerdata->cust_first_name}} @endif" />  </span> </p>
			 <p>Last Name <span> <input readonly type="text" value="@if(isset($customerdata->cust_last_name)) {{$customerdata->cust_last_name}} @endif" /> </span> </p>
			 <p>Email <span> <input readonly type="email" value="@if(isset($customerdata->cust_email)) {{$customerdata->cust_email}} @endif" /> </span> </p>
			 <p>Mobile <span> <input readonly type="text" value="@if(isset($customerdata->cust_mobile)) {{$customerdata->cust_mobile}} @endif" /> </span> </p>
			 <p>City <span> <input readonly type="text" value="@if(isset($customerdata->cust_city)) {{$customerdata->cust_city}} @endif" /> </span> </p>
			 <p>Order count <span> <input readonly type="text" value="@if(isset($customerdata->cust_order_count)) {{$customerdata->cust_order_count}} @endif" /> </span> </p>
			 <p>Subscriber <span> <input readonly type="text" value="@if(!empty($customerdata->is_receive_email)) {{'Yes'}} @else {{'No'}} @endif" /> </span> </p>
			 <p>VIP <span> <input readonly type="text" value="@if(!empty($customerdata->is_vip) && $customerdata->is_vip==1) {{'Yes'}} @else {{'No'}} @endif" /> </span> </p>
			 <p>LTV  <span> <input readonly type="text" value="@if(isset($customerdata->lifeTimeValue)) {{$customerdata->lifeTimeValue}} @endif" /> </span> </p>
			 <p>Device Model <span> <input readonly type="text" value="@if(isset($customerdata->cust_device_model)) {{$customerdata->cust_device_model}} @endif" /> </span> </p>
			 <p>Device OS <span> <input readonly type="text" value="@if(isset($customerdata->cust_device_model)) {{$customerdata->cust_device_model}} @endif" /> </span> </p>
			 <p>Reg Date <span> <input readonly type="text" value="@if(isset($customerdata->cust_reg_date)) {{ date('d/m/Y',strtotime($customerdata->cust_reg_date)) }} @endif" /> </span> </p>
			 <p>Reg Time <span> <input readonly type="text" value="@if(isset($customerdata->cust_reg_date)) {{ date('H:i',strtotime($customerdata->cust_reg_date)) }} @endif" /> </span> </p>
			 </form>
		   </div>
	   </div>
	 </div>
	
	@if(!empty($order_list)) @php $current_orders=0; @endphp @foreach($order_list->data as $order)  @if(!empty($order->status) && ($order->status==0 || $order->status==1 || $order->status==2 ||$order->status==3 || $order->status==4)) @php $current_orders++; @endphp @endif @endforeach @endif 
	@if(!empty($order_list)) @php $completed=0; @endphp @foreach($order_list->data as $order)  @if(!empty($order->status) && $order->status==5) @php $completed++; @endphp @endif @endforeach @endif
	@if(!empty($order_list)) @php $unpaid=0; @endphp @foreach($order_list->data as $order) @if(!empty($order->status) && $order->status==7) @php $unpaid++; @endphp @endif @endforeach @endif
	@if(!empty($order_list)) @php $cancel=0; @endphp @foreach($order_list->data as $order) @if(!empty($order->status) && $order->status==6) @php $cancel++; @endphp @endif @endforeach @endif
	@if(!empty($address)) @php $cust_add=0; @endphp @foreach($address as $s_address) @if(!empty($s_address->_id)) @php $cust_add++; @endphp @endif @endforeach @endif

	 <div class="col-lg-9">
	   <div class="tabs_wrapper-customer-detailss">
		<ul class="tabs">
		  <li class="active" rel="tab1">Current Orders <span>(@if(!empty($current_orders)) {{$current_orders}} @else 0 @endif)</span></li>
		  <li rel="tab2">Completed Orders <span>(@if(!empty($completed)) {{$completed}} @else 0 @endif)</span></li>
		  <li rel="tab3">Unpaid Orders <span>(@if(!empty($unpaid)) {{$unpaid}} @else 0 @endif)</span></li>
		  <li rel="tab4">Cancel Orders <span>(@if(!empty($cancel)) {{$cancel}} @else 0 @endif)</span></li>
		  <li rel="tab5">Total Vehicles <span>(@if(!empty($customervehicles->total)) {{$customervehicles->total}} @else 0 @endif)</span></li>
		  <li rel="tab6">Feedback <span>(0)</span></li>
		  <li rel="tab7">Subscriptions <span>(@if(!empty($subscription->total)) {{$subscription->total}} @else 0 @endif)</span></li>
		  <li rel="tab8">Standing Instructions <span>(0)</span></li>
		  <li rel="tab9">Saved Credit Cards <span>(@if(!empty($customer_cards->total)) {{$customer_cards->total}} @else 0 @endif)</span></li>
		  <li rel="tab10">Saved Addresses <span>(@if(!empty($cust_add)) {{$cust_add}} @else 0 @endif)</span></li>
		  <li class="menu-setting-buttonn"> <a href="#"> Menu Setting </a> </li>
		</ul>

		<div class="tab_container">
		
		  <h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1 current orders</h3>
		   <div id="tab1" class="tab_content">
				<div class="vertical-tab" role="tabpanel">
	                <!-- Nav tabs -->
	                <ul class="nav nav-tabs" role="tablist">
						@php $count=0; @endphp
						@if(!empty($order_list->data))
							@foreach($order_list->data as $order)
							@if(!empty($order->status) && ($order->status==0 || $order->status==1 || $order->status==2 ||$order->status==3 || $order->status==4))
							@php $count++; @endphp
							<h1></h1>
		                  <li role="presentation" class="@if($count==1) active @endif ">
						   <a href="#Section11-{{$count}}" aria-controls="Section11-{{$count}}" @if($count==1)class="active" @endif role="tab" data-toggle="tab">
							 <div class="order-heading-titlee">
								 <div class="order-main-box-nav">
								 @if(!empty($order->cars)) @foreach($order->cars as $car)
								  <div class="customer-icon-box-up">
									<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
									<div class="customer-detail-01">
									  <h5>@if(!empty($car->car_type)) {{$car->car_type}} @endif @if(!empty($car->car_model)) {{$car->car_model}} @endif </h5>
									  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif"></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif</p>
									  <p><i class="far fa-clock"></i> Schedule At: @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif</p>
									</div>
									<div class="customer-detail-02">
									 <p> Status: 
										<strong>
											@if(!empty($order->status) && $order->status==0) Initiate @endif
									  		@if(!empty($order->status) && $order->status==1) Confirmed @endif
									  		@if(!empty($order->status) && $order->status==2) Assigned @endif
									  		@if(!empty($order->status) && $order->status==3) Going @endif
									  		@if(!empty($order->status) && $order->status==4) Started @endif							 									  							
										</strong>
									</p>
									 <p class="danger-color"> ETA: 15:40</p>
									  <p><i class="far fa-clock"></i> Started At: @if(!empty($order->time_started)) {{ date('H:i',strtotime($order->time_started)) }} @endif</p>
									</div>
								  </div>
								  @endforeach @endif
								  <div class="zones-reach-boxx">
									<div class="zones-reach-text">
									 <p> Zone: @if(!empty($order->zone->zone_cluster->name)) {{$order->zone->zone_cluster->name}} @endif  </p>
									 <p> <strong>Home:</strong> @if(!empty($order->address->description)) {{$order->address->description}} @endif </p>
									 <p> @if(!empty($order->address->sub_locality)) {{$order->address->sub_locality}} @endif</p>
									</div>
									<div class="verticle-middle">
									   <button class="view-route-button" onclick="viewroutecustomer('{{ url('dashboard/customer/viewroute')}}','@if(!empty($order->cars[0]->order_id)){{$order->cars[0]->order_id}}@endif')">View Route</button>
									</div>
								  </div>
								</div>
							   </div>
							  </a>
							 </li>
							  @endif
							@endforeach
						@endif					
							 
		                    <!--<li role="presentation">
							<a href="#Section22" aria-controls="profile" role="tab" data-toggle="tab">
							</a>
							</li> -->          
	                </ul>
					
	                <!-- Tab panes -->
	                <div class="tab-content tabs">
	                	
						@php $increment=0; @endphp
						@if(!empty($order_list->data))
						@foreach($order_list->data as $order)
						@if(!empty($order->status) && ($order->status==0 || $order->status==1 || $order->status==2 ||$order->status==3 || $order->status==4))
						@php $increment++; @endphp
	                    <div role="tabpanel" class="tab-pane fade in @if($increment==1) active @endif" id="Section11-{{$increment}}">
	                    	<div class="customer_order_details_section">
		                       <div class="customers-detail-edits-main-box">
								 <div class="customer-icon-box-ri">
								 @if(!empty($order->cleaner->avatar))
									  <img class="customer-ic-image" src="{{$order->cleaner->avatar->default_path}}" alt="" />
								  @else 
									  <img class="customer-ic-image" src="{{ asset('public/assets/image/Rectangle2175.png')}}" alt="" />
							     @endif
									<div class="stated-boxs">
									  <h5> @if(!empty($order->cleaner->cleaner_first_name)) {{$order->cleaner->cleaner_first_name}} {{$order->cleaner->cleaner_last_name}} @endif </h5>
									  <p class="danger-color"><small>
									  @if(!empty($order->status) && $order->status==0) Initiate @endif
									  @if(!empty($order->status) && $order->status==1) Confirmed @endif
									  @if(!empty($order->status) && $order->status==2) Assigned @endif
									  @if(!empty($order->status) && $order->status==3) Going @endif
									  @if(!empty($order->status) && $order->status==4) Started @endif
									  </small></p>
									</div>
									<div class="social-iconn">
										<p> @if(!empty($order->cleaner->phone)) <a href='https://wa.me/{{$order->cleaner->phone}}' target='_blank'> @endif <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""></a></p>
										<p> @if(!empty($order->cleaner->phone)) <a href="tel:{{$order->cleaner->phone}}"> @endif <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
									</div>
								  </div>
								  @foreach($order->cars as $car)
								   <div class="customer-icon-box-up-02">						   
									<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
									<div class="customer-detail-012">
									  <h5> @if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif </h5>
									  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif" ></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif </p>
									</div>
								  </div> 
								  @endforeach
								   <div class="body-small-details">
								   @php $total=0; @endphp
								   @if(!empty($order->items))
									   @foreach($order->items as $item)
								   @php $total+=$item->cost; @endphp
									 <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span> @if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
									@endforeach 
									@endif 	 
									 @php $order_charges = $total + $order->vat->amount; @endphp
									 <p> Subtotal  <span><b>{{$total}} AED </b> </span> <br> VAT <span> <b> @if(!empty($order->vat->amount)) {{$order->vat->amount}} AED @endif</b> </span> <br> <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @if(!empty($order_charges)) {{$order_charges}} @endif AED </b> </span>  </p>
									<div class="moreiInfo">
									  <p> Payment </p>
										<div class="payment-select">
										  <select> 
										  	<option @if(!empty($order->payment_method)) @if($order->payment_method==1) selected @endif @endif > Credit Card </option>
											<option > Dabit Card </option>
											<option @if($order->payment_method==0) selected  @endif > Cash </option>
										  </select>
										</div>
								   </div>
								 </div> 
							   </div>
							  
							   <div class="tracking-detail-box">
							     <h3> Tracking Details </h3> 
								 <p>Order at <span> <strong> @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif</strong> </span> </p>
								 <p>Scheduled For <span> <strong> @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </strong> </span> </p>
								 <p> Updated at <span> <strong> @if(!empty($order->updatedAt)) {{ date('M-d-Y ,H:i',strtotime($order->updatedAt)) }} @endif </strong> </span> </p>
								 <p> Update by <span> <strong> @if(!empty($order->updated_by->name)) {{$order->updated_by->name}} @endif </strong> </span> </p>
								 <p>Assign by <span> <strong> @if(!empty($order->assigned_by->name)) {{$order->assigned_by->name}} @endif </strong> </span> </p>
								 <p>Assign at <span> <strong> @if(!empty($order->time_assigned)) {{ date('M-d-Y ,H:i',strtotime($order->time_assigned)) }} @endif  </strong> </span> </p>
								 <p>En-route at <span> <strong> @if(!empty($order->time_enroute)) {{ date('M-d-Y ,H:i',strtotime($order->time_enroute)) }} @endif </strong> </span> </p>
								 <p>Be there at <span> <strong class="success-color"> @if(!empty($order->time_enroute) && !empty($order->duration->value)) @php $tot_tm=strtotime($order->time_enroute)+$order->duration->value; echo date('M-d-Y H:i',$tot_tm); @endphp @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
								 <p>Task Started <span> <strong class="success-color"> @if(!empty($order->time_started)) {{ date('M-d-Y ,H:i',strtotime($order->time_started)) }} @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
							   </div>
							   <div class="notee-boxx">
							     <h3> Note: <span> @if(!empty($order->note)) {{$order->note}} @endif </span></h3>
							   </div>
							   <div class="before-picture">
							      <h3> Before Picture </h3>
								  <form>
								  <div class="row">
								    <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									   <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
								  </div>
								  </form>
							   </div>
							   <div class="before-picture">
							      <h3> After Picture </h3>
								  <form>
								  <div class="row">
								    <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									   <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
									 <div class="col-lg-6 col-md-12">
									  <div class="pictur-upload-box">
									   <input type="file">
									    <div class="pictur-ipload-text">
									     <i class="fas fa-camera"></i>
									     <p> Front Side </p>
									   </div>
									  </div>
									</div>
								  </div>
								  </form>
							   </div>
							   @php if(!empty($order->customer_order_id)){ $customer_order_id=$order->customer_order_id; }else{ if(!empty($order->cars[0]->order_id)){ $customer_order_id = $order->cars[0]->order_id; } } @endphp
							</div>   
					  	<div class="fixed-bottom-buttonn">
					    	<a href="{{url('dashboard/customer/editorder')}}/{{$customer_order_id}}/@if(!empty($order->category->ot_id)){{$order->category->ot_id}}@endif/@if(!empty($order->category->ot_type)){{$order->category->ot_type}}@endif" class="button-success"> Edit Order </a>  <a href="#" class="button-danger"> End Task </a>
					   	</div>						    
	            	</div>

						 @endif
					  @endforeach
					@endif
             	</div>
		 </div> 
		</div>
		<!-- #tab1 -->
		
		<h3 class="tab_drawer_heading" rel="tab2">Tab 2 completed orders</h3>
		  <div id="tab2" class="tab_content">
		  	<div class="vertical-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
				@php $count_tab2=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status==5)
					@php $count_tab2++; @endphp
                  <li role="presentation" class="@if($count_tab2==1) active @endif ">
				   <a href="#Section_tab2-{{$count_tab2}}" aria-controls="Section_tab2-{{$count_tab2}}" @if($count_tab2==1)class="active" @endif role="tab" data-toggle="tab">
					 <div class="order-heading-titlee">
						 <div class="order-main-box-nav">
						 @if(!empty($order->cars)) @foreach($order->cars as $car)
						  <div class="customer-icon-box-up">
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-01">
							  <h5>@if(!empty($car->car_type)) {{$car->car_type}} @endif @if(!empty($car->car_model)) {{$car->car_model}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif"></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif</p>
							  <p><i class="far fa-clock"></i> Schedule At: @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </p>
							</div>
							<div class="customer-detail-02">
							 <p> Status: <strong> @if(!empty($order->status) && $order->status==5) Completed @endif </strong> </p>
							 <p class="danger-color"> ETA: 15:40</p>
							  <p><i class="far fa-clock"></i> Started At: @if(!empty($order->time_started)) {{ date('H:i',strtotime($order->time_started)) }} @endif</p>
							</div>
						  </div>
						  @endforeach @endif
						  <div class="zones-reach-boxx">
							<div class="zones-reach-text">
							 <p> Zone: @if(!empty($order->zone->zone_cluster->name)) {{$order->zone->zone_cluster->name}} @endif  </p>
							 <p> <strong>Home:</strong> @if(!empty($order->address->description)) {{$order->address->description}} @endif </p>
							 <p>@if(!empty($order->address->sub_locality)) {{$order->address->sub_locality}} @endif</p>
							</div>
							<div class="verticle-middle">
							   <button class="view-route-button" onclick="viewroutecustomer('{{ url('dashboard/customer/viewroute')}}','@if(!empty($order->cars[0]->order_id)){{$order->cars[0]->order_id}}@endif')">View Route</button>
							</div>
						  </div>
						</div>
					   </div>
					  </a>
					 </li>
					 @endif
					@endforeach
				@endif					
					 
                    <!--<li role="presentation">
					<a href="#Section22" aria-controls="profile" role="tab" data-toggle="tab">
					</a>
					</li> -->
                </ul>
                <!-- Tab panes -->
				
				<div class="tab-content tabs">
				@php $increment_tab2=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status == 5)
					@php $increment_tab2++; @endphp
                    <div role="tabpanel" class="tab-pane fade in @if($increment_tab2==1) active @endif" id="Section_tab2-{{$increment_tab2}}">
                       <div class="customers-detail-edits-main-box">
						 <div class="customer-icon-box-ri">
						 @if(!empty($order->cleaner->avatar))
							  <img class="customer-ic-image" src="{{$order->cleaner->avatar->default_path}}" alt="" />
						  @else 
							  <img class="customer-ic-image" src="{{ asset('public/assets/image/Rectangle2175.png')}}" alt="" />
					     @endif
							<div class="stated-boxs">
							  <h5> @if(!empty($order->cleaner->cleaner_first_name)) {{$order->cleaner->cleaner_first_name}} {{$order->cleaner->cleaner_last_name}} @endif </h5>
							  <p class="danger-color"><small>
							 		@if(!empty($order->status) && $order->status==5) Completed @endif
							  </small></p>
							</div>
							<div class="social-iconn">
								<p> @if(!empty($order->cleaner->phone)) <a href='https://wa.me/{{$order->cleaner->phone}}' target='_blank'> @endif <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""></a></p>
							  	<p> @if(!empty($order->cleaner->phone)) <a href="tel:{{$order->cleaner->phone}}"> @endif <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
							</div>
						  </div>
						  @foreach($order->cars as $car)
						   <div class="customer-icon-box-up-02">						   
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-012">
							  <h5> @if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif" ></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif </p>
							</div>
						  </div> 
						  @endforeach
						   <div class="body-small-details">
						   @php $total=0; @endphp
						   @if(!empty($order->items))
							   @foreach($order->items as $item)
						   @php $total+=$item->cost; @endphp
						   <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span> @if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
							@endforeach 
							@endif 	 
							 @php $order_charges = $total + $order->vat->amount; @endphp
							 <p> Subtotal  <span><b>{{$total}} AED </b> </span> <br> VAT <span> <b> @if(!empty($order->vat->amount)) {{$order->vat->amount}} AED @endif</b> </span> <br> <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @if(!empty($order_charges)) {{$order_charges}} @endif AED </b> </span>  </p>
							<div class="moreiInfo">
							  <p> Payment </p>
								<div class="payment-select">
								  <select> 
								  	<option @if(!empty($order->payment_method)) @if($order->payment_method==1) selected @endif @endif > Credit Card </option>
									<option > Dabit Card </option>
									<option @if($order->payment_method==0) selected  @endif > Cash </option>
								  </select>
								</div>
						   </div>
						 </div> 
					   </div>
					   
					   <div class="tracking-detail-box">
					     <h3> Tracking Details </h3>
						 <p>Order at <span> <strong> @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif</strong> </span> </p>
						 <p>Scheduled For <span> <strong> @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </strong> </span> </p>
						 <p> Updated at <span> <strong> @if(!empty($order->updatedAt)) {{ date('M-d-Y ,H:i',strtotime($order->updatedAt)) }} @endif </strong> </span> </p>
						 <p> Update by <span> <strong> @if(!empty($order->updated_by->name)) {{$order->updated_by->name}} @endif </strong> </span> </p>
						 <p>Assign by <span> <strong> @if(!empty($order->assigned_by->name)) {{$order->assigned_by->name}} @endif</strong> </span> </p>
						 <p>Assign at <span> <strong> @if(!empty($order->time_assigned)) {{ date('M-d-Y ,H:i',strtotime($order->time_assigned)) }} @endif  </strong> </span> </p>
						 <p>En-route at <span> <strong> @if(!empty($order->time_enroute)) {{ date('M-d-Y ,H:i',strtotime($order->time_enroute)) }} @endif </strong> </span> </p>
						 <p>Be there at <span> <strong class="success-color"> @if(!empty($order->time_enroute) && !empty($order->duration->value)) @php $tot_tm=strtotime($order->time_enroute)+$order->duration->value; echo date('M-d-Y H:i',$tot_tm); @endphp @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
						 <p>Task Started <span> <strong class="success-color"> @if(!empty($order->time_started)) {{ date('M-d-Y ,H:i',strtotime($order->time_started)) }} @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
					   </div>
					   <div class="notee-boxx">
					     <h3> Note: <span> @if(!empty($order->note)) {{$order->note}} @endif </span></h3>
					   </div>
					   <div class="before-picture">
					      <h3> Before Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   <div class="before-picture">
					      <h3> After Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   
					   <!-- <div class="fixed-bottom-buttonn">
					    <a href="" class="button-success"> Edit Order </a>  <a href="" class="button-danger"> End Task </a>
					   </div> -->
					   
                    </div>
					@endif
			  	@endforeach
			@endif
            </div>

              </div>
		  </div> <!-- #tab2 -->
		  
		  <!-- #tab3 -->
		  <h3 class="tab_drawer_heading" rel="tab3">Tab 3 unpaid orders</h3>
		  <div id="tab3" class="tab_content">
		  	<div class="vertical-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
				@php $count_tab3=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status == 7)
					@php $count_tab3++; @endphp
                  <li role="presentation" class="@if($count_tab3==1) active @endif ">
				   <a href="#Section_tab3-{{$count_tab3}}" aria-controls="Section_tab3-{{$count_tab3}}" @if($count_tab3==1)class="active" @endif role="tab" data-toggle="tab">
					 <div class="order-heading-titlee">
						 <div class="order-main-box-nav">
						 @if(!empty($order->cars)) @foreach($order->cars as $car)
						  <div class="customer-icon-box-up">
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-01">
							  <h5>@if(!empty($car->car_type)) {{$car->car_type}} @endif @if(!empty($car->car_model)) {{$car->car_model}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif"></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif</p>
							  <p><i class="far fa-clock"></i> Schedule At: @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </p>
							</div>
							<div class="customer-detail-02">
							 <p> Status: <strong> @if(!empty($order->status) && $order->status==7) Unpaid @endif </strong> </p>
							 <p class="danger-color"> ETA: 15:40</p>
							  <p><i class="far fa-clock"></i> Started At: @if(!empty($order->time_started)) {{ date('H:i',strtotime($order->time_started)) }} @endif</p>
							</div>
						  </div>
						  @endforeach @endif
						  <div class="zones-reach-boxx">
							<div class="zones-reach-text">
							 <p> Zone: @if(!empty($order->zone->zone_cluster->name)) {{$order->zone->zone_cluster->name}} @endif </p>
							 <p> <strong>Home:</strong> @if(!empty($order->address->description)) {{$order->address->description}} @endif </p>
							 <p>@if(!empty($order->address->sub_locality)) {{$order->address->sub_locality}} @endif</p>
							</div>
							<div class="verticle-middle">
							   <button class="view-route-button" onclick="viewroutecustomer('{{ url('dashboard/customer/viewroute')}}','@if(!empty($order->cars[0]->order_id)){{$order->cars[0]->order_id}}@endif')">View Route</button>
							</div>
						  </div>
						</div>
					   </div>
					  </a>
					 </li>
					 @endif
					@endforeach
				@endif					
					 
                    <!--<li role="presentation">
					<a href="#Section22" aria-controls="profile" role="tab" data-toggle="tab">
					</a>
					</li> -->

                </ul>
                <!-- Tab panes -->
				<div class="tab-content tabs">
				@php $increment_tab3=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status == 7)
					@php $increment_tab3++; @endphp
                    <div role="tabpanel" class="tab-pane fade in @if($increment_tab3==1) active @endif" id="Section_tab3-{{$increment_tab3}}">
                       <div class="customers-detail-edits-main-box">
						 <div class="customer-icon-box-ri">
						 @if(!empty($order->cleaner->avatar))
							  <img class="customer-ic-image" src="{{$order->cleaner->avatar->default_path}}" alt="" />
						  @else 
							  <img class="customer-ic-image" src="{{ asset('public/assets/image/Rectangle2175.png')}}" alt="" />
					     @endif
							<div class="stated-boxs">
							  <h5> @if(!empty($order->cleaner->cleaner_first_name)) {{$order->cleaner->cleaner_first_name}} {{$order->cleaner->cleaner_last_name}} @endif </h5>
							  <p class="danger-color"><small>
							 		@if(!empty($order->status) && $order->status==7) Unpaid @endif
							  </small></p>
							</div>
							<div class="social-iconn">
								<p> @if(!empty($order->cleaner->phone)) <a href='https://wa.me/{{$order->cleaner->phone}}' target='_blank'> @endif <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""></a></p>
							  	<p> @if(!empty($order->cleaner->phone)) <a href="tel:{{$order->cleaner->phone}}"> @endif <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
							</div>
						  </div>
						  @foreach($order->cars as $car)
						   <div class="customer-icon-box-up-02">						   
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-012">
							  <h5> @if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif" ></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif </p>
							</div>
						  </div> 
						  @endforeach
						   <div class="body-small-details">
						   @php $total=0; @endphp
						   @if(!empty($order->items))
							   @foreach($order->items as $item)
						   @php $total+=$item->cost; @endphp
						   <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span> @if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
							@endforeach 
							@endif 	 
							 @php $order_charges = $total + $order->vat->amount; @endphp
							 <p> Subtotal  <span><b>{{$total}} AED </b> </span> <br> VAT <span> <b> @if(!empty($order->vat->amount)) {{$order->vat->amount}} AED @endif</b> </span> <br> <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @if(!empty($order_charges)) {{$order_charges}} @endif AED </b> </span>  </p>
							<div class="moreiInfo">
							  <p> Payment </p>
								<div class="payment-select">
								  <select> 
								  	<option @if(!empty($order->payment_method)) @if($order->payment_method==1) selected @endif @endif > Credit Card </option>
									<option > Dabit Card </option>
									<option @if($order->payment_method==0) selected  @endif > Cash </option>
								  </select>
								</div>
						   </div>
						 </div> 
					   </div>
					   
					   <div class="tracking-detail-box">
					     <h3> Tracking Details </h3>
						 <p>Order at <span> <strong> @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif</strong> </span> </p>
						 <p>Scheduled For <span> <strong> @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </strong> </span> </p>
						 <p> Updated at <span> <strong> @if(!empty($order->updatedAt)) {{ date('M-d-Y ,H:i',strtotime($order->updatedAt)) }} @endif </strong> </span> </p>
						 <p> Update by <span> <strong> @if(!empty($order->updated_by->name)) {{$order->updated_by->name}} @endif </strong> </span> </p>
						 <p>Assign by <span> <strong> @if(!empty($order->assigned_by->name)) {{$order->assigned_by->name}} @endif </strong> </span> </p>
						 <p>Assign at <span> <strong> @if(!empty($order->time_assigned)) {{ date('M-d-Y ,H:i',strtotime($order->time_assigned)) }} @endif  </strong> </span> </p>
						 <p>En-route at <span> <strong> @if(!empty($order->time_enroute)) {{ date('M-d-Y ,H:i',strtotime($order->time_enroute)) }} @endif </strong> </span> </p>
						 <p>Be there at <span> <strong class="success-color"> @if(!empty($order->time_enroute) && !empty($order->duration->value)) @php $tot_tm=strtotime($order->time_enroute)+$order->duration->value; echo date('M-d-Y H:i',$tot_tm); @endphp @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
						 <p>Task Started <span> <strong class="success-color"> @if(!empty($order->time_started)) {{ date('M-d-Y ,H:i',strtotime($order->time_started)) }} @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
					   </div>
					   <div class="notee-boxx">
					     <h3> Note: <span> @if(!empty($order->note)) {{$order->note}} @endif </span></h3>
					   </div>
					   <div class="before-picture">
					      <h3> Before Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   <div class="before-picture">
					      <h3> After Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   
					   <!-- <div class="fixed-bottom-buttonn">
					    <a href="" class="button-success"> Edit Order </a>  <a href="" class="button-danger"> End Task </a>
					   </div> -->
					   
                    </div>
					@endif
			  	@endforeach
			@endif
            </div>
            </div>
		</div>
		  <!-- #tab3 -->
		  
		  <h3 class="tab_drawer_heading" rel="tab4">Tab 4 : Cancel Orders</h3>
		  <div id="tab4" class="tab_content">
		  	<div class="vertical-tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
				@php $count_tab4=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status == 6)
					@php $count_tab4++; @endphp
                  <li role="presentation" class="@if($count_tab4==1) active @endif ">
				   <a href="#Section_tab4-{{$count_tab4}}" aria-controls="Section_tab4-{{$count_tab4}}" @if($count_tab4==1)class="active" @endif role="tab" data-toggle="tab">
					 <div class="order-heading-titlee">
						 <div class="order-main-box-nav">
						 @if(!empty($order->cars)) @foreach($order->cars as $car)
						  <div class="customer-icon-box-up">
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-01">
							  <h5>@if(!empty($car->car_type)) {{$car->car_type}} @endif @if(!empty($car->car_model)) {{$car->car_model}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif"></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif</p>
							  <p><i class="far fa-clock"></i> Schedule At: @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </p>
							</div>
							<div class="customer-detail-02">
							 <p> Status: <strong> @if(!empty($order->status) && $order->status==6) Canceled @endif </strong> </p>
							 <p class="danger-color"> ETA: 15:40</p>
							  <p><i class="far fa-clock"></i> Started At: @if(!empty($order->time_started)) {{ date('H:i',strtotime($order->time_started)) }} @endif</p>
							</div>
						  </div>
						  @endforeach @endif
						  <div class="zones-reach-boxx">
							<div class="zones-reach-text">
							 <p> Zone: @if(!empty($order->zone->zone_cluster->name)) {{$order->zone->zone_cluster->name}} @endif </p>
							 <p> <strong>Home:</strong> @if(!empty($order->address->description)) {{$order->address->description}} @endif </p>
							 <p>@if(!empty($order->address->sub_locality)) {{$order->address->sub_locality}} @endif</p>
							</div>
							<div class="verticle-middle">
							   <button class="view-route-button" onclick="viewroutecustomer('{{ url('dashboard/customer/viewroute')}}','@if(!empty($order->cars[0]->order_id)){{$order->cars[0]->order_id}}@endif')">View Route</button>
							</div>
						  </div>
						</div>
					   </div>
					  </a>
					 </li>
					 @endif
					@endforeach
				@endif					
					 
                    <!--<li role="presentation">
					<a href="#Section22" aria-controls="profile" role="tab" data-toggle="tab">
					</a>
					</li> -->

                </ul>
                <!-- Tab panes -->
				<div class="tab-content tabs">
				@php $increment_tab4=0; @endphp
				@if(!empty($order_list->data))
					@foreach($order_list->data as $order)
					@if(!empty($order->status) && $order->status == 6)
					@php $increment_tab4++; @endphp
                    <div role="tabpanel" class="tab-pane fade in @if($increment_tab4==1) active @endif" id="Section_tab4-{{$increment_tab4}}">
                       <div class="customers-detail-edits-main-box">
						 <div class="customer-icon-box-ri">
						 @if(!empty($order->cleaner->avatar))
							  <img class="customer-ic-image" src="{{$order->cleaner->avatar->default_path}}" alt="" />
						  @else 
							  <img class="customer-ic-image" src="{{ asset('public/assets/image/Rectangle2175.png')}}" alt="" />
					     @endif
							<div class="stated-boxs">
							  <h5> @if(!empty($order->cleaner->cleaner_first_name)) {{$order->cleaner->cleaner_first_name}} {{$order->cleaner->cleaner_last_name}} @endif </h5>
							  <p class="danger-color"><small>
							 		@if(!empty($order->status) && $order->status==6) Canceled @endif
							  </small></p>
							</div>
							<div class="social-iconn">
								<p> @if(!empty($order->cleaner->phone)) <a href='https://wa.me/{{$order->cleaner->phone}}' target='_blank'> @endif <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""></a></p>
							  	<p> @if(!empty($order->cleaner->phone)) <a href="tel:{{$order->cleaner->phone}}"> @endif <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
							</div>
						  </div>
						  @foreach($order->cars as $car)
						   <div class="customer-icon-box-up-02">						   
							<img class="iconn-image" src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt="@if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif">
							<div class="customer-detail-012">
							  <h5> @if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif </h5>
							  <p><span class="chceckk" style="@if(!empty($car->color->code)) background:#{{$car->color->code}} @endif" ></span> @if(!empty($car->city->name)) {{$car->city->name}} @endif @if(!empty($car->car_number)) {{$car->car_number}} @endif </p>
							</div>
						  </div> 
						  @endforeach
						   <div class="body-small-details">
						   @php $total=0; @endphp
						   @if(!empty($order->items))
							   @foreach($order->items as $item)
						   @php $total+=$item->cost; @endphp
						   <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span> @if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
							@endforeach 
							@endif 	 
							 @php $order_charges = $total + $order->vat->amount; @endphp
							 <p> Subtotal  <span><b>{{$total}} AED </b> </span> <br> VAT <span> <b> @if(!empty($order->vat->amount)) {{$order->vat->amount}} AED @endif</b> </span> <br> <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @if(!empty($order_charges)) {{$order_charges}} @endif AED </b> </span>  </p>
							<div class="moreiInfo">
							  <p> Payment </p>
								<div class="payment-select">
								  <select> 
								  	<option @if(!empty($order->payment_method)) @if($order->payment_method==1) selected @endif @endif > Credit Card </option>
									<option > Dabit Card </option>
									<option @if($order->payment_method==0) selected  @endif > Cash </option>
								  </select>
								</div>
						   </div>
						 </div> 
					   </div>
					   
					   <div class="tracking-detail-box">
					     <h3> Tracking Details </h3>
						 <p>Order at <span> <strong> @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif</strong> </span> </p>
						 <p>Scheduled For <span> <strong> @if(!empty($order->time_book_type) && ($order->time_book_type=="flexi-after" || $order->time_book_type=="flexi-before")) @if(!empty($order->flexi->time)) {{$order->flexi->time}} @endif @else @if(!empty($order->time_book_order)) {{ date('M-d-Y ,H:i',strtotime($order->time_book_order)) }} @endif  @endif </strong> </span> </p>
						 <p> Updated at <span> <strong> @if(!empty($order->updatedAt)) {{ date('M-d-Y ,H:i',strtotime($order->updatedAt)) }} @endif </strong> </span> </p>
						 <p> Update by <span> <strong> @if(!empty($order->updated_by->name)) {{$order->updated_by->name}} @endif </strong> </span> </p>
						 <p>Assign by <span> <strong> @if(!empty($order->assigned_by->name)) {{$order->assigned_by->name}} @endif </strong> </span> </p>
						 <p>Assign at <span> <strong> @if(!empty($order->time_assigned)) {{ date('M-d-Y ,H:i',strtotime($order->time_assigned)) }} @endif  </strong> </span> </p>
						 <p>En-route at <span> <strong> @if(!empty($order->time_enroute)) {{ date('M-d-Y ,H:i',strtotime($order->time_enroute)) }} @endif </strong> </span> </p>
						 <p>Be there at <span> <strong class="success-color"> @if(!empty($order->time_enroute) && !empty($order->duration->value)) @php $tot_tm=strtotime($order->time_enroute)+$order->duration->value; echo date('M-d-Y H:i',$tot_tm); @endphp @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
						 <p>Task Started <span> <strong class="success-color"> @if(!empty($order->time_started)) {{ date('M-d-Y ,H:i',strtotime($order->time_started)) }} @endif </strong> <br> <span class="danger-color">@if(!empty($order->time_started) && !empty($order->time_enroute) && !empty($order->duration->value))(Late by: @php $late_b = (strtotime($order->time_enroute)+$order->duration->value) - strtotime($order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp mins)@endif </span> </span> </p>
					   </div>
					   <div class="notee-boxx">
					     <h3> Note: <span> @if(!empty($order->note)) {{$order->note}} @endif </span></h3>
					   </div>
					   <div class="before-picture">
					      <h3> Before Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   <div class="before-picture">
					      <h3> After Picture </h3>
						  <form>
						  <div class="row">
						    <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							   <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
							 <div class="col-lg-6 col-md-12">
							  <div class="pictur-upload-box">
							   <input type="file">
							    <div class="pictur-ipload-text">
							     <i class="fas fa-camera"></i>
							     <p> Front Side </p>
							   </div>
							  </div>
							</div>
						  </div>
						  </form>
					   </div>
					   
					   <!-- <div class="fixed-bottom-buttonn">
					    <a href="" class="button-success"> Edit Order </a>  <a href="" class="button-danger"> End Task </a>
					   </div> -->
					   
                    </div>
					@endif
			  	@endforeach
			@endif
            </div>
            </div>	
		</div>
		  <!-- #tab4 --> 
		 
			<h3 class="tab_drawer_heading" rel="tab5">Tab 5</h3>
		  <div id="tab5" class="tab_content">
		    <div class="row">
				<div class="col-lg-3 col-md-12">
				  <div class="heading-content-nav inner-vichel-hading">
				   <h3> Total Vehicles(@if(!empty($customervehicles->total)) {{$customervehicles->total}} @else 0 @endif) </h3>
				  </div>
				</div>
				<div class="col-lg-9 col-md-12">
				  <div class="dashboard-right-content dashboard-r-c-res">
					<ul class="list-inline list-in-res">
					<li class="order-searchh">
						 <form>
						   <input class="form-control" type="search" placeholder="Search" aria-label="Search">
						 </form>
						</li> 
					  <li> 
						  <div class="column-setting">
						   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter02"><i class="fas fa-retweet"></i>  Column Setting   </a>
						   					   
						 </li>
					 <li> <a href="{{route('customeraddcar')}}" class="blue-custom-btn" ><i class="fas fa-plus"></i> Add Car </a> </li>
					</ul>
				  </div>
				</div>
			  </div>
		    <div class="totla-vichle-order-boxed">
			   <div class="table-responsive mt-1">
				<div id="example_wrapper" class="dataTables_wrapper">
				 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
					   <tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Vehicle ID: activate to sort column ascending">Vehicle ID</th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Manufacturer: activate to sort column ascending" aria-sort="descending">Manufacturer</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Model: activate to sort column ascending">Model</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending">Type </th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending">City</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Car Number: activate to sort column ascending">Car Number</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
					
						</tr>
						
					</thead>
					<tbody>
					  
					@if(!empty($customervehicles->data))
						@foreach($customervehicles->data as $vehicles)
						<tr role="row">
							<td class="">@if(!empty($vehicles->vehicle->vehicle_id)) {{$vehicles->vehicle->vehicle_id}} @endif</td>
							<td class="sorting_1"> <img class="vichle-detail-image-small" src="@if(!empty($vehicles->make_by->image)) {{$vehicles->make_by->image}} @endif" alt=""> <strong> @if(!empty($vehicles->make_by->name)) {{$vehicles->make_by->name}} @endif </strong></td>
							<td> @if(!empty($vehicles->car_model)) {{$vehicles->car_model}} @endif </td>
							<td><strong> @if(!empty($vehicles->car_type)) {{$vehicles->car_type}} @endif </strong></td>
							<td> @if(!empty($vehicles->city->name)) {{$vehicles->city->name}} @endif </td>
							<td> <strong> @if(!empty($vehicles->car_number)) {{$vehicles->car_number}} @endif </strong> </td>
							<td> @if(!empty($vehicles->car_added_date)) {{ date('d/m/y',strtotime($vehicles->car_added_date)) }} @endif </td>
							<td> <div class="switch">
						  		<input name="actionswitch" type="checkbox" value="1" id="actionswitch" @if(!empty($vehicles->car_status) && $vehicles->car_status==1) checked @endif>
						 	<label for="actionswitch"></label> 
							</div> 
							</td>
							<td> <a href="#" class="success-color action-act"> <i class="far fa-hand-pointer"></i> </a> </td>
						</tr>
						@endforeach
					@endif
					
						<!-- <td class="">57050</td>
						<td class="sorting_1"> <img class="vichle-detail-image-small" src="{{ asset('public/assets/image/ic.png')}}" alt=""> <strong> Ferrari </strong></td>
						<td> 458 Italia </td>
						<td><strong> SUV </strong></td>
						<td> Dubai </td>
						<td> <strong> DUBAI P 94152 </strong> </td>
						<td> 13 Nov, 2020 </td>
						<td> <div class="switch">
						  <input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked>
						 <label for="actionswitch"></label> 
						</div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <i class="far fa-hand-pointer"></i> </a> </td> -->
					
				   </tbody>
					
				</table>
			  </div>
			</div>
			</div>
		  </div>
		  
		  <h3 class="tab_drawer_heading" rel="tab6">Tab 6</h3>
		  <div id="tab6" class="tab_content">
		    <div class="row">
				<div class="col-lg-3 col-md-12">
				  <div class="heading-content-nav inner-vichel-hading">
				   <h3> Feedback (0) </h3>
				  </div>
				</div>
				<div class="col-lg-9 col-md-12">
				  <div class="dashboard-right-content">
					<ul class="list-inline">
					<li class="order-searchh">
						 <form>
						   <input class="form-control" type="search" placeholder="Search" aria-label="Search">
						 </form>
						</li> 
					  	<li> 
						  <div class="column-setting">
						   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter03"><i class="fas fa-retweet"></i>  Column Setting   </a>
						   					  
					 	</li>
					</ul>
				  </div>
				</div>
			  </div>
		    <div class="totla-vichle-order-boxed">
			   <div class="table-responsive mt-1">
				<div id="example_wrapper" class="dataTables_wrapper">
				 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
					   <tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order ID: activate to sort column ascending">Order ID</th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" aria-sort="descending">Date</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rider Name: activate to sort column ascending">Rider Name</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Feedback: activate to sort column ascending">Feedback </th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rate: activate to sort column ascending">Rate</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Tip: activate to sort column ascending">Tip</th>
					
						</tr>
						
					</thead>
					<tbody>
					  
					<tr role="row" class="odd">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">Alfredo</td>
						<td> He is very good cleaning my car </td>
						<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
						<td class="blue-color"> 70 AED </td>
				   </tr>
					<tr role="row" class="even">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">Alfredo</td>
						<td> He is very good cleaning my car </td>
						<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
						<td class="blue-color"> 70 AED </td>
				   </tr>
				   <tr role="row" class="odd">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">Alfredo</td>
						<td> He is very good cleaning my car </td>
						<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
						<td class="blue-color"> 70 AED </td>
				   </tr>
					<tr role="row" class="even">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">Alfredo</td>
						<td> He is very good cleaning my car </td>
						<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
						<td class="blue-color"> 70 AED </td>
				   </tr>
				   <tr role="row" class="even">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">Alfredo</td>
						<td> He is very good cleaning my car </td>
						<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
						<td class="blue-color"> 70 AED </td>
				   </tr>
				   </tbody>
					
				</table>
			  </div>
			</div>
			</div>
		  </div>
		  <h3 class="tab_drawer_heading" rel="tab7">Tab 7</h3>
		  <div id="tab7" class="tab_content">
		  
		  </div>
		  
		 <h3 class="tab_drawer_heading" rel="tab8">Tab 8</h3>
		  <div id="tab8" class="tab_content">
		    <div class="row">
				<div class="col-lg-4 col-md-12">
				  <div class="heading-content-nav inner-vichel-hading">
				   <h3> Standing Instructions (0) </h3>
				  </div>
				</div>
				<div class="col-lg-8 col-md-12">
				  <div class="dashboard-right-content">
					<ul class="list-inline">
					<li class="order-searchh">
						 <form>
						   <input class="form-control" type="search" placeholder="Search" aria-label="Search">
						 </form>
						</li> 
					 	<li> 
						  <div class="column-setting">
						   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter04"><i class="fas fa-retweet"></i>  Column Setting   </a>
						   					  
						 </li>
					</ul>
				  </div>
				</div>
			  </div>
		    <div class="totla-vichle-order-boxed">
			   <div class="table-responsive mt-1">
				<div id="example_wrapper" class="dataTables_wrapper">
				 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
					   <tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" aria-sort="descending">Date</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="SI ID: activate to sort column ascending">SI ID</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status </th>
					
						</tr>
						
					</thead>
					<tbody>
					  
					<tr role="row" class="odd">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">SI254709143</td>
						<td class="success-color">Active </td>
				   </tr>
					<tr role="row" class="even">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">SI254709143</td>
						<td class="success-color">Active </td>
				   </tr>
				   <tr role="row" class="odd">
						<td class="sorting_1">57050</td>
						<td> 13 Nov, 2020 </td>
						<td class="blue-color">SI254709143</td>
						<td class="success-color">Active </td>
				   </tr>
					
				   </tbody>
					
				</table>
			  </div>
			</div>
			</div>
		  </div> 
		  
		  
		 <h3 class="tab_drawer_heading" rel="tab9">Tab 9</h3>
		  <div id="tab9" class="tab_content">
		    <div class="row">
				<div class="col-lg-4 col-md-12">
				  <div class="heading-content-nav inner-vichel-hading">
				   <h3> Saved Credit Cards (@if(!empty($customer_cards->total)) {{$customer_cards->total}} @else 0 @endif) </h3>
				  </div>
				</div>
				<div class="col-lg-8 col-md-12">
				  <div class="dashboard-right-content">
					<ul class="list-inline">
					<li class="order-searchh">
						 <form>
						   <input class="form-control" type="search" placeholder="Search" aria-label="Search">
						 </form>
						</li> 
					  	<li> 
						  <div class="column-setting">
						   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter05"><i class="fas fa-retweet"></i>  Column Setting   </a>
						   					   
					 	</li>
					</ul>
				  </div>
				</div>
			  </div>

		    <div class="totla-vichle-order-boxed">
			   <div class="table-responsive mt-1">
				<div id="example_wrapper" class="dataTables_wrapper">
				 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
					   <tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name On Card: activate to sort column ascending" aria-sort="descending">Name On Card</th>
						<!-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Expiry: activate to sort column ascending">Expiry</th> -->
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Visit: activate to sort column ascending">Last Digits </th>
						<!-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="SI ID: activate to sort column ascending">SI ID </th> -->
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status </th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action </th>
						</tr>
						
					</thead>
					<tbody>
			@if(!empty($customer_cards->data))
				@foreach($customer_cards->data as $credit_cards)
					<tr role="row" class="odd">
						<td class="sorting_1">@if(!empty($credit_cards->_id)) {{$credit_cards->_id}} @endif </td>
						<td>@if(!empty($credit_cards->cc_card_name)) {{$credit_cards->cc_card_name}} @endif</td>
						<!-- <td> @if(!empty($credit_cards->cc_card_exp_date)) {{$credit_cards->cc_card_exp_date}} @endif </td> -->
						<td class="blue-color">@if(!empty($credit_cards->cc_card_last_digits)) {{$credit_cards->cc_card_last_digits}} @endif</td>
						<!-- <td class="blue-color">SI254709143</td> -->
						<td> <div class="switch">
						  <input name="savecredit" type="checkbox" value="1" id="savecredit" @if(!empty($credit_cards->cc_card_status) && $credit_cards->cc_card_status==1) checked @endif>
						 <label for="savecredit"></label> 
						</div> 
						</td>
						<td> <a href="#" class="danger-color-bgg action-act"> <i class="far fa-hand-pointer"></i> </a> </td>
				   </tr>
				@endforeach
			@endif
				   </tbody>
					
				</table>
			  </div>
			</div>
			</div>
		  </div>  
		  
		  <h3 class="tab_drawer_heading" rel="tab10">Tab 10</h3>
		  <div id="tab10" class="tab_content">
		    <div class="row">
				<div class="col-lg-4 col-md-12">
				  <div class="heading-content-nav inner-vichel-hading">
				   <h3> Saved Addresses(@if(!empty($cust_add)) {{$cust_add}} @else 0 @endif) </h3>
				  </div>
				</div>
				<div class="col-lg-8 col-md-12">
				  <div class="dashboard-right-content">
					<ul class="list-inline">
					<li class="order-searchh">
						 <form>
						   <input class="form-control" type="search" placeholder="Search" aria-label="Search">
						 </form>
						</li> 
					  	<li> 
						  <div class="column-setting">
						   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter06"><i class="fas fa-retweet"></i>  Column Setting   </a>
						   					  
					 	</li>
					</ul>
				  </div>
				</div>
			  </div>
		    <div class="totla-vichle-order-boxed">
			   <div class="table-responsive mt-1">
				<div id="example_wrapper" class="dataTables_wrapper">
				 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
					   <tr role="row">
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
							<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Address Lebel : activate to sort column ascending" aria-sort="descending">Address Lebel </th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Building Name/Street: activate to sort column ascending">Building Name/Street</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Villa/Apartment Number: activate to sort column ascending">Villa/Apartment Number </th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action </th>
						</tr>						
					</thead>
					<tbody>
					
					@if(!empty($address))
					@foreach($address as $saved_address)
					<tr role="row" class="odd">
						<td class="sorting_1"> <pre></pre>@if(!empty($saved_address->_id)) {{$saved_address->_id}} @endif</td>
						<td><strong> @if(!empty($saved_address->label)) {{$saved_address->label}} @endif </strong> </td>
						<td> @if(!empty($saved_address->description)) {{$saved_address->description}} @endif </td>
						<td>  @if(!empty($saved_address->apartment_number)) {{$saved_address->apartment_number}} @endif </td>
						<td class="cust_save-add_ed-dl_btn">
						  <a href="#" class="btn danger-custom-btn shadow btn-xs sharp me-2"><i class="fa fa-trash"></i></a>
						  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn shadow btn-xs sharp mr-1"><i class="far fa-edit"></i></a>
					    </td>
				   	</tr>
					@endforeach
					@endif
					<!-- <tr role="row" class="odd">
						<td class="sorting_1">57050</td>
						<td><strong> Home </strong> </td>
						<td> Al Khubaishi Building </td>
						<td> Flat 710 </td>
						<td>
						 <a href="#" class="btn danger-custom-btn shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
						  <a href="#" class="btn success-custom-btn shadow btn-xs sharp mr-1"><i class="far fa-edit"></i></a>
					    </td>
				   </tr>
				    -->

				   </tbody>
					
				</table>
			  </div>
			</div>
			</div>
		  </div>  
		  
		  
		</div>
		<!-- .tab_container -->
	   </div>							
	</div> <!---Tab 1 closed------>
	 
   </div>
</div>
</div>
<!--**********************************
	Content body end
***********************************-->

<!--======= View Route =======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFzzVfXfUc91Eb1CWCfPVZZzgMB0U5xVU&callback=initMap"></script>
<div class="modal fade viewRoute" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
	      <div class="modal-body">
			<div class="route-view-boxx">
			 <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
				</button>
			  <div class="container">
			   <div class="row" id="CustomerViewRoute" >
			    
			   </div>
			  </div>
			 </div>
			</div>
		</div>
	</div>
</div>



<!-- Modal Total Vehicles -->
						<div class="modal fade" id="exampleModalCenter02">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Column Setting</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
									 	<div class="column-setting-box">
											<div class="col-set-box connected-sortable droppable-area1">
											  <p class="draggable-item"> <input type="checkbox"/> <span>Vehicle ID </span> <span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Manufacturer </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Model </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Type </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>City </span> <span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Car Number </span> <span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Date </span> <span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Status </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Action </span><span class="ti-move"></span> </p>
											</div>
											
									   </div>

									</div>
									<div class="modal-footer">
								        <button type="button" class="btn btn-black-new float-right">Apply</button>
								     </div>									
								</div>
							</div>
						  </div>
					   
					   </div>

 <!-- Modal Feedback-->
						<div class="modal fade" id="exampleModalCenter03">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Column Setting</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
									 <div class="column-setting-box">
										<div class="col-set-box connected-sortable droppable-area1">
										  <p class="draggable-item"> <input type="checkbox"/> <span>Order ID </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> Date </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> Rider Name </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Feedback </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Rate </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Tip </span> <span class="ti-move"></span> </p>
										</div>
										<button type="button" class="btn btn-black-new float-right">Apply</button>
									   </div>
									</div>
									
								</div>
							</div>
						  </div>
					   
					   </div>		

 
 <!-- Modal  Standing Instructions-->
						<div class="modal fade" id="exampleModalCenter04">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Column Setting</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
									 <div class="column-setting-box">
										<div class="col-set-box connected-sortable droppable-area1">
										  <p class="draggable-item"> <input type="checkbox"/> <span> ID </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> Date </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> SI ID </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Status </span><span class="ti-move"></span> </p>
										</div>
										<button type="button" class="btn btn-black-new float-right">Apply</button>
									   </div>
									</div>
									
								</div>
							</div>
						  </div>
					   
					   </div>		

<!-- Modal  Saved Credit Cards -->
						<div class="modal fade" id="exampleModalCenter05">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Column Setting</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
									 	<div class="column-setting-box">
											<div class="col-set-box connected-sortable droppable-area1">
											  <p class="draggable-item"> <input type="checkbox"/> <span> ID </span> <span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span> Name On Card </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span> Expiry </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Last Digits </span><span class="ti-move"></span> </p> 
											  <p class="draggable-item"> <input type="checkbox"/> <span>SI ID </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Status </span><span class="ti-move"></span> </p>
											  <p class="draggable-item"> <input type="checkbox"/> <span>Action </span><span class="ti-move"></span> </p>
											</div>										
									   	</div>
									</div>
									<div class="modal-footer">
								       <button type="button" class="btn btn-black-new float-right">Apply</button>
								    </div>									
								</div>
							</div>
						  </div>
					   
					   </div>			


 <!-- Modal Saved Addresses( 3 ) -->
						<div class="modal fade" id="exampleModalCenter06">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Column Setting</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
									 <div class="column-setting-box">
										<div class="col-set-box connected-sortable droppable-area1">
										  <p class="draggable-item"> <input type="checkbox"/> <span> ID </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> Address Lebel </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span> Building Name/Street  </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Villa/Apartment Number </span><span class="ti-move"></span> </p> 
										  <p class="draggable-item"> <input type="checkbox"/> <span>Action </span><span class="ti-move"></span> </p>
										</div>
										<button type="button" class="btn btn-black-new float-right">Apply</button>
									   </div>
									</div>
									
								</div>
							</div>
						  </div>
					   
					   </div>					   		   			   			  

<!-- Edit customer details -->
<div class="modal fade" id="exampleModalCenter">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Customer Details</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body p-0">
			<div class="edit-customer-details-popup">
				 <form action="{{url('dashboard/updatecustomer')}}" method="post" name="UpdateCustomerForm" id="UpdateCustomerForm">
                   <div class="row">
				   {{ csrf_field() }}
				    <input type="hidden" name="customer_id" id="customer_id" value="{{$customerdata->_id}}">
				      <div class="mb-3 col-lg-6 col-md-12">
						<!--<label for="firstname" class="form-label">First Name</label>-->
						<input type="text" name="firstname" value="@if(isset($customerdata->cust_first_name)) {{$customerdata->cust_first_name}} @endif" class="form-control check_empty" id="firstname" required placeholder="First name">
					  </div>
					   <div class="mb-3 col-lg-6 col-md-12">
						<!--<label for="lastname" class="form-label">Last Name</label>-->
						<input type="text" name="lastname" value="@if(isset($customerdata->cust_last_name)) {{$customerdata->cust_last_name}} @endif" class="form-control check_empty" id="lastname" required placeholder="Last name">
					  </div>
					  <div class="mb-3 col-lg-12 col-md-12">
						<!--<label for="email" class="form-label">Email</label>-->
						<input type="text" name="email" class="form-control check_empty" value="@if(isset($customerdata->cust_email)) {{$customerdata->cust_email}} @endif" id="email" required placeholder="Email">
					  </div>
					  <div class="mb-3 col-lg-6 col-md-12">
						<!--<label for="number" class="form-label">Mobile</label>-->
						<input type="text" name="phone" class="form-control check_empty" value="@if(isset($customerdata->cust_mobile)) {{$customerdata->cust_mobile}} @endif" id="number" required placeholder="524707083">
					  </div>
					   <div class="mb-3 col-lg-6 col-md-12">
					    <!--<label for="city" class="form-label">City</label>-->
						<select name="city" id="inputCity" required class="form-control ">
							<option value="">City</option>
							<option @if(isset($customerdata->cust_city) && $customerdata->cust_city=='Dubai') {{'selected'}} @endif value="Dubai">Dubai</option>
							<option @if(isset($customerdata->cust_city) && $customerdata->cust_city=='Abudhabi') {{'selected'}} @endif value="Abudhabi">Abudhabi</option>
							<option @if(isset($customerdata->cust_city) && $customerdata->cust_city=='Sharjah') {{'selected'}} @endif value="Sharjah">Sharjah</option>
						</select>
					  </div>
					  <div class="mb-3 col-lg-12 col-md-12">
						<!--<label for="address" class="form-label">Address (Optional)</label>-->
						<textarea class="form-control" id="address" name="address" rows="5" placeholder="Address (Optional)">@if(isset($customerdata->cust_address1)) {{$customerdata->cust_address1}} @endif</textarea>
					  </div>
					  <div class="mb-3 col-lg-3 col-md-6">
						<input type="radio" class="check_empty" name="inputDevice" @if(isset($customerdata->cust_device_model) && $customerdata->cust_device_model=='iPhone') {{'checked'}} @endif value="iPhone" id="iphone" required>  iPhone
					  </div>
					  <div class="mb-3 col-lg-3 col-md-6">
						<input type="radio" class="check_empty" name="inputDevice" @if(isset($customerdata->cust_device_model) && $customerdata->cust_device_model=='android') {{'checked'}} @endif value="android" id="android" required>  Android
					  </div>
					  <div class="mb-3 col-lg-3 col-md-6">
						<div class="switch">
						  <span> <strong> Active/Inactive </span> </strong>
						  <input name="active" type="checkbox" @if(isset($customerdata->cust_status) && $customerdata->cust_status==1) {{'checked'}} @endif value="1" id="activeinactive" />
						  <label for="activeinactive"></label>
						</div>
					  </div>
					  <div class="mb-3 col-lg-3 col-md-6">
						 <div class="switch">
							<span> <strong> VIP Status </span> </strong>
							<input name="vip_status" @if(isset($customerdata->is_vip) && $customerdata->is_vip==1) {{'checked'}} @endif value="1" type="checkbox" id="vipstatus" />
							<label for="vipstatus"></label>
						 </div>
					  </div>
					   <div class="edit-customer-editsubmitt col-12">
							<button type="button" class="btn  btn-danger light" data-dismiss="modal">Cancel</button>
							<button type="submit" class="gree-custom-btn">Update</button>
					 </div>	
				   </div>

               </form>			
			   </div>
			  </div>
			  
			</div>
		
		</div>
	</div>
</div>

<!-- Address save modal -->
<div class="modal fade" id="editaddresspopup">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Address </h5>
			<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form action="" method="">
		  <div class="add-zone-body-boxx">
		     <div class="container">
			   <div class="row">
			     <div class="col-lg-7">
				   <div class="iframe-mapp">
				    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97211.14423043442!2d55.15041503276925!3d25.11435745187941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bc13cd5fb61%3A0xb8eba7dbb3225fa2!2sKeno%20Car%20Wash!5e0!3m2!1sen!2sin!4v1628335044076!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				   </div>
				 </div>
				 
			     <div class="col-lg-5">
				   <div class="zone-add">
                     <div class="confirm-order-home-add">
				    <p> <i class="fas fa-map-marker-alt"></i> <span> <b> Current Location </b> <br> <small> Al Quoz Industrial Area 3 Dubai, UAE </small></span>  </p> 
				  </div>
                   </div>
                   <div class="zone-add">
                     <label for="zone-name"> Building Name/Street </label>
					 <select class="form-control">
					   <option value="Al Khubaishi Bulding"> Al Khubaishi Bulding </option>
					   <option value="Al Khubaishi Bulding"> Al Khubaishi Bulding </option>
					   <option value="Al Khubaishi Bulding"> Al Khubaishi Bulding </option>
					 </select>
                   </div>
                   <div class="zone-add">
                     <label for="zone-name"> Villa/Apartment Number </label>
					 <select class="form-control">
					   <option value="Flat 710"> Flat 710 </option>
					   <option value="Flat 710"> Flat 710 </option>
					   <option value="Flat 710"> Flat 710 </option>
					 </select>
                   </div>	
                  
                   <div class="zone-add">
                     <label for="zone-name"> Notes </label>
					 <input type="text" for="" name="" value="" class="form-control" placeholder="Front Of Al Madina supper market">
                   </div>
				    
				   
				 </div>
				
				 <div class="col-lg-12">
				  <div class="add-zones-button">
						<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn custom-btn-black w-50">Add Now</button>
					</div>
				 </div>
			   </div>
			 </div>
		  </div>
		  </form>
		</div>
		
	</div>
   </div>
</div>




<div class="modal fade" id="addcarr">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title"> Add New Car </h5>
			<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form action="" method="">
		  <div class="add-car-body-boxx">
		     <div class="container">
			   <div class="row">
			     <div class="col-lg-6 col-md-12">
				 
				   <div class="form-group">
				    <label> Vehicle Make </label>
				     <select id="myval" class="form-control">
					    <option value=""></option>
						<option value="0" data-active="0">Acura</option>
						<option value="1" data-active="1">Alfa Romeo</option>
						<option value="2" data-active="0">Audi</option>
						<option value="3" data-active="0">Austin</option>
						<option value="4" data-active="0">Bentley</option>
						<option value="5" data-active="0">BMW</option>
						<option value="6" data-active="0">Borgward</option>
						<option value="6" data-active="0">Brabus</option>
					 </select>
					 </div>
					 
					<div class="form-group">
					 <label> Vehicle Model </label>
					  <select class="myval form-control">
					    <option value=""></option>
						<option value="0" data-active="0">164</option>
						<option value="1" data-active="1">4c</option>
						<option value="2" data-active="0">Giulia</option>
						<option value="3" data-active="1">Spider</option>
						<option value="4" data-active="0">Stelvio</option>
					  </select>
					</div>
					
					<div class="form-group">
					 <label> Vehicle Year </label>
					  <select class="myval form-control">
					    <option value=""></option>
						<option value="0" data-active="0">2021</option>
						<option value="1" data-active="1">2020</option>
						<option value="2" data-active="0">2019</option>
						<option value="3" data-active="0">2018</option>
						<option value="4" data-active="0">2017</option>
						<option value="5" data-active="0">2016</option>
						<option value="6" data-active="0">2015</option>
						<option value="7" data-active="0">2014</option>
						<option value="8" data-active="0">2013</option>
						<option value="8" data-active="0">2012</option>
					    
					 </select>
					</div>
					
					<div class="form-group">
					 <label> Vehicle Color </label>
					  <select data-colorselect class="myval form-control">
						<option value="#ffffff">White</option>
						<option value="#2ecc71">Green</option>
						<option value="#3498db">Blue</option>
						<option value="#9b59b6">Purple</option>
						<option value="#34495e">Dark Blue</option>
						<option value="#1abc9c">Turquoice</option>
						<option value="#e74c3c">Red</option>
						<option value="#7f8c8d">Grey</option>
						<option value="#f1c40f">Yellow</option>
						<option value="#e67e22">Orange</option>
						<option value="#000000">Black</option>
					  </select>
					</div>
					
					
					<div class="form-group">
					 <label> Vehicle City </label>
					  <select class="myval form-control">
					    <option value=""></option>
						<option value="0" data-active="0">Dubai</option>
						<option value="1" data-active="1">Dubai</option>
						<option value="2" data-active="1">Dubai</option>
						<option value="3" data-active="1">Dubai</option>
					 </select>
					</div>
					
					
					<div class="form-group">
					  <div class="dubai-city-add-car">
					   <input type="text" class="form-control" for="" name="" placeholder="Plate Code">
					   <img class="logo-image" src="{{ asset('public/assets/image/dubai_logo.png')}}" alt="">
					   <input type="text" class="form-control" for="" name="" placeholder="Plate Number">
					  </div>
					</div>
					
					<div class="form-group">
					 <div class="col-ting">
					<div class="control-group file-upload" id="file-upload1">
					  <div class="image-box text-center">
							<p> <span>+</span>  <br> <small> Attach Car Photo </small></p>
							
							<img src="" alt="">
						</div>
					  <div class="controls" style="display: none;">
							<input type="file" name="contact_image_1"/>
						</div>
					</div>
					</div>
					</div>
					
				 </div>
				
				 <div class="col-lg-6 col-md-12">
				 
				 </div>
				 
				 <div class="col-lg-12">
				  <div class="add-zones-button">
						<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn custom-btn-black w-50">Add Now</button>
					</div>
				 </div>
			   </div>
			 </div>
		  </div>
		  </form>
		</div>
		
	</div>
   </div>
</div>

<!--====== Model Category ========-->

<div class="modal fade choice_category_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Chose Category</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="conatiner">
	      		<div class="row">
					@if(!empty($category))
					@foreach($category as $categories)
	      			<div class="col-sm-4">
	      				<a href="{{ url('dashboard/customer/order/')}}/{{$customerdata->_id}}/{{$categories->ot_id}}/{{$categories->ot_type}}">
		      				<div class="category_img">
		      					<img src="@if(!empty($categories->ot_icon)) {{$categories->ot_icon}} @endif">
		      					<p>@if(!empty($categories->ot_name)) {{$categories->ot_name}} @endif</p>		      				
		      				</div>
	      				</a>
	      			</div>
					@endforeach
					@endif
	      		</div>
	      	</div>        
	      </div>	      
	    </div>
  	</div>
</div>

<!----END-YOUR-CODE-HERE----->
@endsection

