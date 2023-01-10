@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<style>
.sn-customer-rr img {
    width: 52px !important;
}
.sn-customer-rr {
    display: flex;
    margin-bottom: 10px;
}
.customer-icon-box-up {
    display: flex;
    justify-content: space-between;
}
</style>

<div class="content-body">
	<!-- row -->
<div class="container-fluid">
  <div class="row">
	<div class="col-lg-4 col-md-12">
	  <div class="heading-content-nav">
	   <h3> Command Center </h3>
	   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Command Center </small> </p>
	  </div>
	</div>
	<div class="col-lg-8 col-md-12">
	  <div class="dashboard-right-content">
		<ul class="list-inline">
		
		 <!-- <li> <a href="#" class="whiteshadow-custom-btn"><i class="fas fa-filter"></i>  Filter  </a> </li>
		 <li> <a href="#" class="gree-custom-btn"><i class="fas fa-file-alt"></i>  Generate Report </a> </li> -->
		
		</ul>
	  </div>
	</div>
  </div>
  
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
  
  <div class="row mt-3">
   <div class="col-lg-3">
   		<div class="task_update_fixed">
   
		    <div class="task-upadet-commandcenter command-center-sn">
			    <div class="c-name">
					<h5> Status <span class="text-info">(ETA:@if(!empty($allcounters->ETA)){{$allcounters->ETA}} @endif)</span> </h5>
					<div class="customer-command-drp">
					  <select class="form-control" disabled > 
					    <option value="" >Select City</option>
					@if($allcity)
						@foreach($allcity as $city)
						<option value="{{$city->_id}}" >{{$city->name}}</option>
						@endforeach
					@endif
					  </select>
					</div>
			  	</div>
			    <ul class="tabs">
				  <li class="active" rel="tab1" onclick="pendingTaskSection('{{ route('pendingTaskSection') }}','#tab1')" > Pending Task <span>(@if(!empty($allcounters->pendingTodayCount)){{$allcounters->pendingTodayCount}}@else 0 @endif)</span></li>
				  <li rel="tab2" onclick="assignedTaskSection('{{ route('assignedTaskSection') }}','#tab2')" >Assigned Tasks <span>(@if(!empty($allcounters->assignedTodayCount)){{$allcounters->assignedTodayCount}}@else 0 @endif)</span></li>
			{{--	  <li rel="tab3" onclick="startedSection('{{ route('startedSection') }}','#tab3')" >Started <span>(@if(!empty($allcounters->completedTodayCount)){{$allcounters->completedTodayCount}}@else 0 @endif)</span></li>             --}}
				  <li rel="tab4" onclick="completedTaskSection('{{ route('completedTaskSection') }}','#tab4')" >Completed Tasks <span>(@if(!empty($allcounters->startedTodayCount)){{$allcounters->startedTodayCount}}@else 0 @endif)</span></li>
				  <li rel="tab5" onclick="unpaidTaskSection('{{ route('unpaidTaskSection') }}','#tab5')" >Unpaid Tasks <span>(@if(!empty($allcounters->unpaidTodayCount)){{$allcounters->unpaidTodayCount}}@else 0 @endif)</span></li>
				  <li rel="tab6" onclick="orderRequestSection('{{ route('orderRequestSection') }}','#tab6')" >Order Request <span>(@if(!empty($allcounters->ordRequestTotal)){{$allcounters->ordRequestTotal}}@else 0 @endif)</span></li>
				</ul>
			</div>
		   
		   	<div class="customer-detail-boxx">
				<div class="customer-p-namee">
				   <div class="c-name">
					<h5> Live Ninjas  </h5>
					<div class="customer-command-drp">
					  <select class="form-control" onchange="selectcity(this.value,'{{url('dashboard/selectcity')}}')">
					    <option value="1">All</option>
					@if($allcity)
						@foreach($allcity as $city)
						<option value="{{$city->_id}}" >{{$city->name}}</option>
						@endforeach
					@endif
					  </select>
					 
					</div>
				   </div>
				</div>
			 	<div class="common_search_box">
					 <!-- <form> -->
				        <input class="form-control" id="searchninja" onkeyup="searchninja()" type="search" placeholder="Search" aria-label="Search">
				        <img class="search_icon_img" src="{{asset('public/assets/image/search_icon.png')}}" alt="">
				    <!-- </form> -->
		    	</div>
			   	<div class="live-ninja-commandcenter" id="LiveninjaList">
					 <ul class="list-inline" id="myUL" >
					 @if(!empty($staffdetails))
						 @foreach($staffdetails as $staff)
					   <li> 
			             <div class="live-ninjaas">
						   <div class="live-ninjaas-in">
						    <img src="@if(!empty($staff->avatar->default_path)) {{$staff->avatar->default_path}} @endif" alt="">
						    <p><strong>@if(!empty($staff->cleaner_first_name)){{$staff->cleaner_first_name.' '.$staff->cleaner_last_name}}@endif</strong> <br> <small>@if(!empty($staff->cleaner_city_name)) {{$staff->cleaner_city_name}} @endif</small> </p>
						   </div>
						   <div class="live-ninja-in-02">
						    <p><span style="color:#EC5F62;"> @if(!empty($staff->assignedCount)) {{$staff->assignedCount}} @endif </span> 
							<span style="color:#57B8EB;"> @if(!empty($staff->stratedCount)) {{$staff->stratedCount}} @endif </span>
							<span style="color:#5CC697;"> @if(!empty($staff->completedCount)) {{$staff->completedCount}} @endif </span>
							</p>
						   </div>
						 </div>
					   </li>
					   @endforeach
					   @endif
					 </ul>
			   	</div>
			</div>
		</div>
	</div>
 
 <div class="col-lg-9">
   <div class="tabs_wrapper-customer-detailss command-center-section-n">
	
	<div class="tab_container">
	   <div id="tab1" class="tab_content" >
		 <div class="vertical-tab" role="tabpanel" id="PendingTask">
			<!-- Nav tabs -->
			<!-- <div class="commond_center_nav_tabs_fixed"> -->
				<ul class="nav nav-tabs" role="tablist" id="pending-task-data">
				@if(!empty($pending_orderlist->data))
					@php $i=0; @endphp
					@foreach($pending_orderlist->data as $staff_order)
					@php $i++; @endphp
					
					@php
					$orderdate=date('d M Y',strtotime($staff_order->time_book_order));
					$todaydate=date('d M Y');
					$order_date=date('d M Y H:i:s',strtotime($staff_order->time_book_order));
					$todaystartdate=date('d M Y 00:00:00');
					$todayenddate=date('d M Y 23:59:59');
					@endphp
				  <li role="presentation" >
				   <a href="#Sections-{{$i}}" aria-controls="#Sections-{{$i}}" @if($i==1)class="active" @endif role="tab" data-toggle="tab" data-value="{{$i}}" onclick="tracking_details('@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif',$(this).data('value'))" >
					 <div class="order-heading-titlee">
					@php $car_count=0; @endphp @if(!empty($staff_order->cars)) @foreach($staff_order->cars as $cars) @if(!empty($cars->_id)) @php $car_count++; @endphp @endif @endforeach @endif
					@php $service_count=0; @endphp @if(!empty($staff_order->items)) @foreach($staff_order->items as $item) @if(!empty($item->slug)) @php $service_count++; @endphp @endif @endforeach @endif
						@if($car_count==1)
					   <h3 class="mb-3">@if(strtotime($order_date) >= strtotime($todayenddate) && strtotime($order_date) <= strtotime($todayenddate)) Today's Order  @else {{$orderdate}} @endif </h3>
						<div class="order-main-box-nav">
						  <div class="customer-icon-box-up">
						   <div class="customer-sn">
						      <div class="customer-detail-01">
							  @if(!empty($staff_order->cars))
							  @foreach($staff_order->cars as $cars)
						       <div class="sn-customer-rr">
						       <img class="iconn-image" src="@if(!empty($cars->make_by->image)) {{$cars->make_by->image}} @endif" alt="">
						       	<div>
							       <h5> @if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif</h5>
								   <p> @if(!empty($cars->car_model)) {{$cars->car_model}} @endif @if(!empty($cars->car_year)) {{$cars->car_year}} @endif <br>
								   <span class="chceckk" style="background:#{{$cars->color->code}}"> </span> @if(!empty($cars->make_by->name)) {{$cars->make_by->name}} @endif @if(!empty($cars->vehicle->name)) {{$cars->vehicle->name}} @endif </p>
							   	</div>
							   </div>
								@endforeach
							  @endif
							</div>
							</div>
							<div class="customer-detail-02"> 
							  <img src="{{ asset('public/assets/image/iccc.png')}}" alt="">
							 <p class="danger-color"> ETA: @if(!empty($staff_order->time_arrived)) {{$staff_order->time_arrived}} @endif</p>
							  <p><i class="far fa-clock"></i> @if(!empty($staff_order->time_book_type)) @if($staff_order->time_book_type=="datetime") Schedule At: @if(!empty($staff_order->time_book_order)) {{ date('d M Y h:i A',strtotime($staff_order->time_book_order))}} @endif @else Flexi: @if($staff_order->time_book_type=="flexi-before") Before @else After @endif @if(!empty($staff_order->flexi->time)) {{$staff_order->flexi->time}} @endif @endif @endif </p>
							</div>
						  </div>
						  <div class="zones-reach-boxx">
							<div class="zones-reach-text">
							 <p> Zone: @if(!empty($staff_order->zone->zone_cluster->name)) {{$staff_order->zone->zone_cluster->name}} @endif</p>
							 <p class="pan_t_add"> <strong> @if(!empty($staff_order->address->label)){{$staff_order->address->label}}@endif: </strong><span> @if(!empty($staff_order->address->description)) {{$staff_order->address->description}} @endif </span></p>
							 <p>
							 @if(!empty($staff_order->address->apartment_number)) {{ $staff_order->address->apartment_number}} @endif
							 @if(!empty($staff_order->address->additional_detail)) {{$staff_order->address->additional_detail}} @endif 
							 </p>
							</div>
							<div class="view-route-button-box verticle-middle">
							   <button class="view-route-button" onclick="viewroute('{{ url('dashboard/viewroute')}}','@if(!empty($staff_order->cars[0]->order_id)){{$staff_order->cars[0]->order_id}}@endif')">View Route</button>
							</div>
						  </div>
						</div>
						@else
						<h3 class="mb-3"> @if(strtotime($order_date) >= strtotime($todayenddate) && strtotime($order_date) <= strtotime($todayenddate)) Today's Order  @else {{$orderdate}} @endif </h3>
						<div class="order-main-box-nav order-m-box-side-color">
						  	<div class="customer-icon-box-up">
							   <div class="customer-sn">					   
							      	<div class="customer-detail-01">
									  	<div class="sn-customer-rr">
								       		<img src="@if(!empty($staff_order->category->ot_icon)) {{$staff_order->category->ot_icon}} @endif" class="icon_img-1">
									       	<div>
										       <h5> @if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif </h5>
											   <p class="pan_t_vich"> {{$car_count}} Cars  </p>
											   <span class="pan_t_cust_services"> {{$service_count}} Services </span> 
											</div>
								   		</div>
									</div>
								</div>
								<div class="customer-detail-02"> 
								  	<!-- <img src="{{asset('public/assets/image/iccc.png')}}" alt="">
								 	<p class="danger-color"> ETA: </p> -->
								 	<div>
								 		<p class="customer-detail-002">
										<img src="{{asset('public/assets/image/iccc.png')}}" alt="" class="mr-4"> @if(!empty($staff_order->approving_cleaner->cleaner_first_name)) {{$staff_order->approving_cleaner->cleaner_first_name}} @endif @if(!empty($staff_order->approving_cleaner->cleaner_last_name)) {{$staff_order->approving_cleaner->cleaner_last_name}} @endif <span class="ti-eye"></span></p>
								 	</div>
								  	<p><i class="far fa-clock"></i> @if(!empty($staff_order->time_book_type)) @if($staff_order->time_book_type=="datetime") Schedule At: @if(!empty($staff_order->time_book_order)) {{ date('d M Y h:i A',strtotime($staff_order->time_book_order))}} @endif @else Flexi: @if($staff_order->time_book_type=="flexi-before") Before @else After @endif @if(!empty($staff_order->flexi->time)) {{$staff_order->flexi->time}} @endif @endif @endif </p>
								</div>
						  	</div>
						  	<div class="zones-reach-boxx">
								<div class="zones-reach-text">
								 	<p> Zone: @if(!empty($staff_order->zone->zone_cluster->name)) {{$staff_order->zone->zone_cluster->name}} @endif</p>
								 	<p class="pan_t_add"> <strong> @if(!empty($staff_order->address->label)){{$staff_order->address->label}}@endif: </strong><span> @if(!empty($staff_order->address->description)) {{$staff_order->address->description}} @endif </span></p>
								 	<p>
									 @if(!empty($staff_order->address->apartment_number)) {{ $staff_order->address->apartment_number}} @endif
							 		 @if(!empty($staff_order->address->additional_detail)) {{$staff_order->address->additional_detail}} @endif
									</p>
								</div>
								<div class="view-route-button-box verticle-middle">
								   <button class="view-route-button" onclick="viewroute('{{ url('dashboard/viewroute')}}','@if(!empty($staff_order->cars[0]->order_id)){{$staff_order->cars[0]->order_id}}@endif')">View Route</button>
								</div>
						  	</div>
						</div>
						@endif
					   </div>
					  </a>
					</li>
					@endforeach
					@endif
				</ul>
			<!-- </div> -->
                <!-- Tab panes -->
  	<div class="tab-content tabs commond_sidebar_tabcontent" id="pending-task-data1">  	
	   @php $i=0; @endphp
			@if(!empty($pending_orderlist->data))
				@foreach($pending_orderlist->data as $staff_order)
				@php $i++; @endphp
			
		<div role="tabpanel" class="commond_side_bar_fixed tab-pane @if($i==1) active @endif" id="Sections-{{$i}}">
		  @if(!empty($staff_order->customer_order_id))
		  	<div class="action-buttons">
			  	<ul class="list-inline">
				    <li class="nav-item command-dropdown show">
					  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-ellipsis-v" ></i> Action </a>
						<div class="dropdown-menu dropdown-menu-right action_btn_set">
							<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
							  <h5> Action  </h5>
								<ul class="timeline p-3 action_btn_points">
									<li> <a href="{{url('dashboard/commandcenter/editorder')}}/{{$staff_order->customer_order_id}}/@if(!empty($staff_order->category->ot_id)){{$staff_order->category->ot_id}}@endif/@if(!empty($staff_order->category->ot_type)){{$staff_order->category->ot_type}}@endif" class="action-dis" > <span class="ti-pencil"></span> Edit Order <small>(Under development)</small> </a></li>
									<li> <a class="commandcenteraddorder action-dis" data-customer_order_id="{{$staff_order->customer_order_id}}" href="" data-bs-toggle="modal" data-bs-target="#commandcenteraddorderModal" > <span class="ti-plus"></span> Add Order <small>(Under development)</small> </a> </li>
									<li> <a href="{{url('page')}}" > page  </a></li>	
									<li> <a  class="danger-color"> <span class="ti-close"></span> Cancel  </a></li>			  
								</ul>
						   </div>
						</div>
					 </li>
				</ul>  
			</div>
			@else
			<div class="action-buttons">
			  	<ul class="list-inline">
				    <li class="nav-item command-dropdown show">
					  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-ellipsis-v" ></i>  Action </a>
						<div class="dropdown-menu dropdown-menu-right action_btn_set">
							<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
							  <h5> Action  </h5>
								<ul class="timeline p-3">
									@php if(!empty($staff_order->cars[0]->order_id)){ $customer_order__id = $staff_order->cars[0]->order_id; } @endphp
									<li> <a href="{{url('dashboard/commandcenter/editorder')}}/{{$customer_order__id}}/@if(!empty($staff_order->category->ot_id)){{$staff_order->category->ot_id}}@endif/@if(!empty($staff_order->category->ot_type)){{$staff_order->category->ot_type}}@endif" class="action-dis" > <span class="ti-pencil"></span> Edit Order <small>(Under development)</small> </a></li>
									<li> <a class="commandcenteraddorder action-dis" data-customer_order_id="{{$customer_order__id}}" href="" data-bs-toggle="modal" data-bs-target="#commandcenteraddorderModal"> <span class="ti-plus"></span> Add Order <small>(Under development)</small> </a> </li>	
									<li> <a href="{{url('page')}}" > page  </a></li>
									<li> <a class="danger-color"> <span class="ti-close"></span> Cancel  </a></li>	  
								</ul>
						   </div>
						</div>
					 </li>
				</ul>  
			</div>
			@endif
			<div class="fixed_task_detail">
				@if(!empty($staff_order->approving_cleaner->_id) && !empty($staff_order->approving_cleaner_id))
				<div class="customer_online_detail_box">
					<div class="d-flex align-items-center justify-content-between">
						<div class="customer_online_detail">						
							<a href="#" class="task_profile_img_1"><img src="@if(!empty($staff_order->approving_cleaner->avatar->default_path)) {{$staff_order->approving_cleaner->avatar->default_path}} @endif" alt="" class="iconn-image">
							<span class="task_profile_online_dot_1"></span></a>
							<div>
								<h6>@if(!empty($staff_order->approving_cleaner->cleaner_first_name)) {{$staff_order->approving_cleaner->cleaner_first_name}} @endif @if(!empty($staff_order->approving_cleaner->cleaner_last_name)) {{$staff_order->approving_cleaner->cleaner_last_name}} @endif</h6>
								<p class="text-info">Tasks: 3/1/4</p>
								<p class="text-secondary">Ranches Zone</p>
							</div>												
						</div>
						<div class="customer_star_rating">
							<p class="fw-bold"><i class="fas fa-star"></i> @if(!empty($staff_order->approving_cleaner->ratings->avg)) {{  number_format($staff_order->approving_cleaner->ratings->avg,2)}} @endif</p>
							<p class="text-info">ETR: 13:00</p>
							<p class="auto_assign"><i class="fas fa-check-double"></i> Auto assigned</p>
						</div>
					</div>	
				</div>
				@endif
			   	<div class="customers-detail-edits-main-box">
				 	<div class="customer-icon-box-ri">
						<div class="stated-boxs">
						  <h5>@if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif</h5>
						</div>
						<div class="social-iconn">
						  <p> <a href="https://wa.me/@if(!empty($staff_order->customer->cust_mobile)){{$staff_order->customer->cust_mobile}}@endif?text={{config('constants.whatsaap_msg')}}"> <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>
						  <p> <a href="#"> <img src="{{asset('public/assets/image/comment.png')}}" alt=""> </a></p>
						  <p> <a href="tel:@if(!empty($staff_order->customer->cust_mobile)){{$staff_order->customer->cust_mobile}}@endif"> <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
						</div>
				  	</div>

				   	<div class="body-small-details">
						<p> Order Id <span> <b> @if(!empty($staff_order->bucket_id)) {{$staff_order->bucket_id}} @endif </b></span> </p>
						<p> Order Count <span>@if(!empty($staff_order->cust_order_count)) {{$staff_order->cust_order_count}} @endif </span> </p>
						<p> Scheduled For <span> <b> @if(!empty($staff_order->time_book_type)) @if($staff_order->time_book_type=="datetime")  @if(!empty($staff_order->time_book_order)) {{ date('d M Y h:i A',strtotime($staff_order->time_book_order))}} @endif @else  @if(!empty($staff_order->flexi->time)) {{$staff_order->flexi->time}} @endif @endif @endif </b> </span> </p>
				  	</div> 
			    </div>
			   
			    <div class="body-small-details assign-ninja-boxx">
				   @if(!empty($staff_order->cars))
					   @foreach($staff_order->cars as $mcars)
							<div class="customer-icon-box-up-02">
								<img class="iconn-image" src="@if(!empty($mcars->make_by->image)) {{$mcars->make_by->image}} @endif" alt="@if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif">
								<div class="customer-detail-012">
								  	<h5> @if(!empty($mcars->make_by->name)) {{$mcars->make_by->name}} @endif @if(!empty($mcars->make_by->car_model)) {{$mcars->make_by->car_model}} @endif @if(!empty($mcars->make_by->car_year)) {{$mcars->make_by->car_year}} @endif  </h5>
								  	<p><span class="chceckk" style="background: #{{$mcars->color->code}};"> </span> @if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif @if(!empty($mcars->make_by->car_number)) {{$mcars->make_by->car_number}} @endif</p>
								</div>
							</div>
					   @endforeach
					@endif	
					
					@php $total_price=0; @endphp
					 @if(!empty($staff_order->items))
					   @foreach($staff_order->items as $item)
				   @php $total_price+=$item->cost; @endphp
							 <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span><b> @if(!empty($item->cost)) {{$item->cost}} @endif </b> AED</span> </p>
						@endforeach
					@endif					
							 @php $VAT=0; @endphp
							 @if(!empty($staff_order->vat->percent))
								@php $VAT=($total_price*$staff_order->vat->percent)/100; @endphp
							 @else
								@php $VAT=$staff_order->vat->amount; @endphp
							 @endif
							 
							 <p> Subtotal  <span><b> {{$total_price}} AED </b> </span>
							 <br> VAT <span> <b> {{$VAT}} AED </b> </span> <br>
							 <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @php $total=$total_price+$VAT; @endphp {{$total}} AED </b> </span>  </p>
							<div class="moreiInfo">
							  <p> Payment </p>
								<div class="payment-select">
								  <select> 
									<option @if(!empty($staff_order->payment_method)) @if($staff_order->payment_method==1) selected @endif @endif > Credit Card </option>
									<option value=""> Dabit Card </option>
									<option @if($staff_order->payment_method==0) selected @endif  > Cash </option>
								  </select>
								</div>
						    </div>
				</div>

				

			 	<div class="tracking-detail-box">
				  	<div class="traking_details">
				  		<h3> Tracking Details </h3>			    
					
					    <div class="accordion" id="panding_tracking_accordion-{{$i}}">

						  	

						</div>
					
				    </div>
				</div>

		   	</div>	

			<form method="POST" action="{{route('approving_cleaner')}}" >
			@csrf
				<input type="hidden" name="bucket_id" value="@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif" >
				<input type="hidden" name="approving_cleaner_id" value="@if(!empty($staff_order->approving_cleaner_id)){{$staff_order->approving_cleaner_id}}@endif" >
				<button id="approving_cleaner-{{$i}}" type="submit" ></button>
			</form>

			<form method="POST" action="{{route('cancle_approving_cleaner')}}" >
			@csrf
				<input type="hidden" name="bucket_id" value="@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif" >
				<input type="hidden" name="approving_cleaner_id" value="@if(!empty($staff_order->approving_cleaner_id)){{$staff_order->approving_cleaner_id}}@endif" >
				<button id="cancle_approving_cleaner-{{$i}}" type="submit" ></button>
			</form>

		   	<div class="fixed-bottom-buttonn_1">
			  @if(!empty($staff_order->approving_cleaner->_id) && !empty($staff_order->approving_cleaner_id))
				<a href="javascript:void(0)" onclick="document.getElementById('approving_cleaner-{{$i}}').click()" class="check_btn panding_control_btn"><img src="{{asset('public/assets/image/check_tick.png')}}" alt=""></a>
				<a href="javascript:void(0)" onclick="document.getElementById('cancle_approving_cleaner-{{$i}}').click()"  class="reload_btn panding_control_btn"><img src="{{asset('public/assets/image/reloads_icon.png')}}" alt=""></a>				
				<a href="javascript:void(0)" class="hand_btn panding_control_btn" onclick="assign_ninja('{{$staff_order->bucket_id}}','{{ route('assignNinjaList') }}')" > <img src="{{asset('public/assets/image/hand_icon.png')}}" alt=""> </a>
			  @else
				<a href="javascript:void(0)" class="custom-btn-black w-100" onclick="assign_ninja('{{$staff_order->bucket_id}}','{{ route('assignNinjaList') }}')" > Assign Ninja </a>
			  @endif
		   	</div>
		</div>
		@endforeach
 @endif
        <div role="tabpanel" class="tab-pane" id="Section123">
	   
		</div>
	</div>
  </div>

  	<input type="hidden" id="pending_increment" value="{{$i}}">
	<input type="hidden" id="pending_pageId" value="1">
	<input type="hidden" id="pending_targetUrl" value="{{ url('/dashboard/commandcenter/')}}">
	
</div>
	  <!-- End#tab1 -->

	   <!-- ASSIGNEDTASKS -->
	   	<div id="tab2" class="tab_content">
		 	<div class="vertical-tab" role="tabpanel" id="AssignedTasks">
			
	
  			</div>
	<input type="hidden" id="assigned_increment" value="10">
	<input type="hidden" id="assigned_pageId" value="1">
	<input type="hidden" id="assigned_targetUrl" value="{{ url('/dashboard/commandcenter/assigned/')}}">
		</div>
	  <!-- End#tab2 -->

	
		<!--Start #tab3 -->
		 <!-- STARTED -->
	   	<div id="tab3" class="tab_content">
		 	<div class="vertical-tab" role="tabpanel" id="Started" >
			
  			</div>
	<input type="hidden" id="started_increment" value="10">
	<input type="hidden" id="started_pageId" value="1">
	<input type="hidden" id="started_targetUrl" value="{{ url('/dashboard/commandcenter/started/')}}">
		</div>
	  <!--End#tab3 -->
	

	  <!--Start #tab4 -->
      <!-- COMPLETED-TASK -->
	   	<div id="tab4" class="tab_content">
		 	<div class="vertical-tab" role="tabpanel" id="CompletedTasks" >
			
  			</div>
	<input type="hidden" id="completed_increment" value="10">
	<input type="hidden" id="completed_pageId" value="1">
	<input type="hidden" id="completed_targetUrl" value="{{ url('/dashboard/commandcenter/completed/')}}">
		</div>
	  <!-- End#tab4 -->
	


	  <!--Start #tab5 -->
	  <!-- UNPAID-TASKS -->
	   	<div id="tab5" class="tab_content">
			<div class="vertical-tab" role="tabpanel" id="UnpaidTasks" >
			
  			</div>
	<input type="hidden" id="unpaid_increment" value="10">
	<input type="hidden" id="unpaid_pageId" value="1">
	<input type="hidden" id="unpaid_targetUrl" value="{{ url('/dashboard/commandcenter/unpaid/')}}">
		</div>
	  <!-- END #tab5 --> 
	

	  <!--START #tab6 -->
	  <!-- ORDER-REQUEST -->
  			<div id="tab6" class="tab_content">
		 		<div class="vertical-tab" role="tabpanel" id="OrderRequest">
		 			
				
  				</div>
	<input type="hidden" id="orderrequest_increment" value="10">
	<input type="hidden" id="orderrequest_pageId" value="2">
	<input type="hidden" id="orderrequest_targetUrl" value="{{ url('/dashboard/commandcenter/orderrequest/')}}">
			</div>
     <!-- END #tab6 --> 

<input type="hidden" id="currentActiveTab" value="Pending Task" >
<input type="hidden" id="trackingDetailsUrl" value="{{ route('trackingdetails') }}" >

	   </div>
	  <!-- .tab_container -->
	  </div>
    </div>
	 
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
			   <div class="row" id="viewRouteResponse">
			     
			   </div>
			  </div>
			 </div>
			</div>
		</div>
	</div>
</div>
<!--/*****************/ ****-->
 <div class="modal fade bd-example-modal-lg-assigned assignNinjaPopuop" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
	      <div class="modal-body">
			<div class="route-view-boxx">
				<h5>Available Ninja</h2>	
			 <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span> </button>
			  <div class="container">
			   <div class="row" id="AssignNinjaList" >
			     
			   </div>
			  </div>
			 </div>
			</div>
		</div>
	</div>
</div>
<!--/*****************/-->



<div class="modal fade bd-example-modal-lg-complete" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
	      <div class="modal-body">
			<div class="route-view-boxx">
			 <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
				</button>
			  <div class="container">
			   <div class="row">
			     <div class="col-lg-8 col-md-12">
				   <div class="map-vieww">
				     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.210557334107!2d55.213352015788914!3d25.12857134064604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bc13cd5fb61%3A0xb8eba7dbb3225fa2!2sKeno%20Car%20Wash!5e0!3m2!1sen!2sin!4v1628062467688!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				   </div>
				 </div>
				 <div class="col-lg-4 col-md-12">
				   <div class="tracking-detail-box">
					 <h3> Tracking Details </h3>
					 <p>Order at <span> <strong> 09/09/2020, 10:43</strong> </span> </p>
					 <p>Scheduled For <span> <strong> 09/09/2020, 15:00 </strong> </span> </p>
					 
					 <p>Assign by <span> <strong> Liezle </strong> </span> </p>
					 <p>Assign at <span> <strong> 09/09/2020, 15:00 </strong> </span> </p>
					 <p>En-route at <span> <strong> 09/09/2020, 15:00 </strong> </span> </p>
					 <p>En-route at <span> <strong> 09/09/2020, 15:00 </strong> </span> </p>
					 <p>Be there at <span> <strong class="danger-color"> 09/09/2020, 15:00 <br> (Late by: 8 mins) </strong> </span> </p>
					 <p>Task Started <span> <strong class="success-color"> 09/09/2020, 15:00 </strong> <br> <span class="danger-color">(Late by: 8 mins) </span> </span> </p>
				   </div>
				</div>
			   </div>
			  </div>
			 </div>
			</div>
		</div>
	</div>
</div>

<!--====== Model Category ========-->

<div class="modal fade choice_category_modal" id="commandcenteraddorderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Chose Category</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="conatiner">
	      		<div class="row" id="commandcenteraddorder">
				
	      		</div>
	      	</div>        
	      </div>	      
	    </div>
  	</div>
</div>

 <!-- Page JS -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
 
	function clickfunction() {
		$(document).find('#pending-task-data a.active').click();
	}
	setTimeout(clickfunction, 2000);

</script>


<!----END-YOUR-CODE-HERE----->
@endsection