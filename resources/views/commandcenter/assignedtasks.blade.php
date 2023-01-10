		<ul class="nav nav-tabs" role="tablist" id="assigned-task-data"> 
			@if(!empty($assign_orderlist->data))
				@php $i=0; @endphp
				@foreach($assign_orderlist->data as $staff_order)
				@php $i++; @endphp
				
				@php
				$orderdate=date('d M Y',strtotime($staff_order->time_book_order));
				$todaydate=date('d M Y');
				$order_date=date('d M Y H:i:s',strtotime($staff_order->time_book_order));
				$todaystartdate=date('d M Y 00:00:00');
				$todayenddate=date('d M Y 23:59:59');
				@endphp
			  <li role="presentation" >
			   <a href="#Sections1-{{$i}}" aria-controls="#Sections1-{{$i}}" @if($i==1)class="active" @endif role="tab" data-toggle="tab" data-value="{{$i}}" onclick="tracking_details('@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif',$(this).data('value'))" >
				 <div class="order-heading-titlee">
				  @php $car_count=0; @endphp @if(!empty($staff_order->cars)) @foreach($staff_order->cars as $cars) @if(!empty($cars->_id)) @php $car_count++; @endphp @endif @endforeach @endif
				  @php $service_count=0; @endphp @if(!empty($staff_order->items)) @foreach($staff_order->items as $item) @if(!empty($item->slug)) @php $service_count++; @endphp @endif @endforeach @endif
				  @if($car_count==1)
				   <h3 class="mb-3">@if(strtotime($order_date) >= strtotime($todayenddate) && strtotime($order_date) <= strtotime($todayenddate)) Today's Order  @else {{$orderdate}} @endif</h3>
					<div class="order-main-box-nav">
					  <div class="customer-icon-box-up">
					   <div class="customer-sn">
					      <div class="customer-detail-01">
						  @if(!empty($staff_order->cars))
						  @foreach($staff_order->cars as $cars)
					       <div class="sn-customer-rr">
					       <img class="iconn-image" src="@if(!empty($cars->make_by->image)) {{$cars->make_by->image}} @endif" alt="">
					       <div>
						  		<h5>  @if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif </h5>
							   	<p> @if(!empty($cars->car_model)) {{$cars->car_model}} @endif @if(!empty($cars->car_year)) {{$cars->car_year}} @endif <br>
							   	<span class="chceckk" style="background:#{{$cars->color->code}}"> </span> @if(!empty($cars->make_by->name)) {{$cars->make_by->name}} @endif @if(!empty($cars->vehicle->name)) {{$cars->vehicle->name}} @endif</p>
						   </div>
						   </div>
							@endforeach
						  @endif
						</div>
						</div>
						<div class="customer-detail-02"> 
						  	<!-- <img src="{{ asset('public/assets/image/iccc.png')}}" alt=""> -->
						  	<p class="customer-detail-002">
								<img src="@if(!empty($staff_order->cleaner->avatar->default_path)){{$staff_order->cleaner->avatar->default_path}}@endif" alt="" class="customer_box_icon_img"> @if(!empty($staff_order->cleaner->cleaner_first_name)){{$staff_order->cleaner->cleaner_first_name}}@endif @if(!empty($staff_order->cleaner->cleaner_last_name)){{$staff_order->cleaner->cleaner_last_name}}@endif <span class="ti-eye"></span>
							</p>
						  	<p><i class="far fa-clock"></i> Be there at: @if(!empty($staff_order->time_enroute) && !empty($staff_order->duration->value)) @php $tot_tm=strtotime($staff_order->time_enroute)+$staff_order->duration->value; echo date('M-d-Y H:i',$tot_tm); @endphp @endif </p>
						  	<p class="danger-color"> Late by: @if(!empty($staff_order->time_started) && !empty($staff_order->time_enroute) && !empty($staff_order->duration->value)) @php $late_b = (strtotime($staff_order->time_enroute)+$staff_order->duration->value) - strtotime($staff_order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp minutes @endif </p>
						</div>        
					  </div>
					  <div class="zones-reach-boxx">
						<div class="zones-reach-text">
						 <p> Zone: @if(!empty($staff_order->zone->zone_cluster->name)) {{$staff_order->zone->zone_cluster->name}} @endif</p>
						 <p class="pan_t_add"> <strong>@if(!empty($staff_order->address->label)){{$staff_order->address->label}}@endif:</strong><span>@if(!empty($staff_order->address->description)) {{$staff_order->address->description}} @endif </span></p>
						 <p>
						 @if(!empty($staff_order->address->apartment_number))
						 {{$staff_order->address->apartment_number}} {{$staff_order->address->additional_detail}}
						 @endif
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
                <!-- Tab panes -->
  	   	<div class="tab-content tabs commond_sidebar_tabcontent" id="assigned-task-data1">
			@if(!empty($assign_orderlist->data))
			@php $i=0; @endphp
			@foreach($assign_orderlist->data as $staff_order)
			@php $i++; @endphp
		  <div role="tabpanel" class="commond_side_bar_fixed tab-pane @if($i==1) active @endif" id="Sections1-{{$i}}">
		  	<div class="action-buttons">
			  <ul class="list-inline">
			    <li class="nav-item command-dropdown show">
				  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-ellipsis-v" ></i> Action </a>
					<div class="dropdown-menu dropdown-menu-right">
						<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
						  <h5> Action  </h5>
							<ul class="timeline p-3">
							  <!-- <li> <a href=""> Add Vehicle  </a></li>	 -->
							  <li> <a href="" class="action-dis" > <span class="ti-plus"></span> Add Order <small>(Under development)</small> </a></li>	
							  <li> <a href="" class="action-dis" > <span class="ti-pencil"></span> Edit Order <small>(Under development)</small> </a></li>
							  <li> <a href="" class="action-dis" > <span><i class="far fa-circle"></i></span> UnAssign <small>(Under development)</small> </a></li>	
							  <li> <a class="danger-color"> <span class="ti-close"></span> Cancel  </a></li>	
							</ul>
					   </div>
					</div>
				  </li>
				</ul>  
			</div>


			<div class="fixed_task_detail">
				<div class="customer_online_detail_box">
					<div class="d-flex align-items-center justify-content-between">
						<div class="customer_online_detail">						
							<a href="#" class="task_profile_img_3"><img src="@if(!empty($staff_order->cleaner->avatar->default_path)){{$staff_order->cleaner->avatar->default_path}}@endif" alt="" class="iconn-image">
							<span class="task_profile_online_dot task_profile_online_dot_3"></span></a>
							<div>
								<h6>@if(!empty($staff_order->cleaner->cleaner_first_name)){{$staff_order->cleaner->cleaner_first_name}}@endif @if(!empty($staff_order->cleaner->cleaner_last_name)){{$staff_order->cleaner->cleaner_last_name}}@endif</h6>
								<!-- <p class="text-info">Tasks: 3/1/4</p> -->
								<!-- <p class="text-secondary">Ranches Zone</p> -->
								<p style="color: #fef200;">Assigned</p>
							</div>												
						</div>
						<!-- <div class="customer_star_rating">
							<p class="fw-bold"><i class="fas fa-star"></i> 5.0</p>
							<p class="text-info">ETR: 13:00</p>
							<p class="auto_assign"><i class="fas fa-check-double"></i> Auto assigned</p>
						</div> -->
						<div class="social-iconn">
						  <p> <a href="https://wa.me/@if(!empty($staff_order->cleaner->phone)){{$staff_order->cleaner->phone}}@endif?text={{config('constants.whatsaap_msg')}}"> <img src="{{asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>
						  <p> <a href="tel:@if(!empty($staff_order->cleaner->phone)){{$staff_order->cleaner->phone}}@endif"> <img src="{{asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
						</div>
					</div>
				</div>

			   <div class="customers-detail-edits-main-box">
				 <div class="customer-icon-box-ri">
					<div class="stated-boxs">
					  <h5>@if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif</h5>
					</div>
					<div class="social-iconn">
					  <p> <a href="https://wa.me/@if(!empty($staff_order->customer->cust_mobile)){{$staff_order->customer->cust_mobile}}@endif?text={{config('constants.whatsaap_msg')}}"> <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>
					   <p> <a href="#"> <img src="{{ asset('public/assets/image/comment.png')}}" alt=""> </a></p>
					  <p> <a href="tel:@if(!empty($staff_order->customer->cust_mobile)){{$staff_order->customer->cust_mobile}}@endif"> <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
					</div>
			
				  </div>

				   <div class="body-small-details">
					 <p> Order Id <span> <b> @if(!empty($staff_order->bucket_id)) {{$staff_order->bucket_id}} @endif </b></span> </p>
					 <p> Order Count <span>@if(!empty($staff_order->cust_order_count)) {{$staff_order->cust_order_count}} @endif </span> </p>
					 <p> Scheduled For <span> <b>@if(!empty($staff_order->time_book_type)) @if($staff_order->time_book_type=="datetime")  @if(!empty($staff_order->time_book_order)) {{ date('d M Y h:i A',strtotime($staff_order->time_book_order))}} @endif @else  @if(!empty($staff_order->flexi->time)) {{$staff_order->flexi->time}} @endif @endif @endif </b> </span> </p>
				  </div> 
			    </div>
			   
			     <div class="body-small-details assign-ninja-boxx">
				   @if(!empty($staff_order->cars))
					   @foreach($staff_order->cars as $mcars)
							 <div class="customer-icon-box-up-02">
								<img class="iconn-image" src="@if(!empty($mcars->make_by->image)) {{$mcars->make_by->image}} @endif" alt="@if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif">
								<div class="customer-detail-012">
								  <h5>@if(!empty($mcars->make_by->name)) {{$mcars->make_by->name}} @endif @if(!empty($mcars->make_by->car_model)) {{$mcars->make_by->car_model}} @endif @if(!empty($mcars->make_by->car_year)) {{$mcars->make_by->car_year}} @endif  </h5>
								  <p><span class="chceckk" style="background: #{{$mcars->color->code}};"> </span> @if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif @if(!empty($mcars->make_by->car_number)) {{$mcars->make_by->car_number}} @endif</p>
								</div>
							  </div>
					   @endforeach
					@endif	
					
					@php $total_price=0; @endphp
					 @if(!empty($staff_order->items))
					   @foreach($staff_order->items as $item)
				   @php $total_price+=$item->cost; @endphp
							 <p> <strong> @if(!empty($item->name)) {{$item->name}} @endif </strong> <span>@if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
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

					    <div class="accordion" id="assign_tracking_accordion-{{$i}}">

						  	

						</div>	
				    </div>
				</div>
			 
			   	<div class="notee-boxx">
				 	<h3> Note: <span> <small>@if(!empty($staff_order->note)) {{$staff_order->note}} @endif </small> </span></h3>
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

		   </div>
		   
			<div class="fixed-bottom-buttonn start-task-buttonnn">
				<form action="{{ route('start_task') }}" method="post" name="start_task" id="start_task" >
					{{ csrf_field() }}
					<input type="hidden" value="@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif" name="bucket_id" >
					<div>		
						<button class="gree-custom-btn" >Start Task </button>
					</div>		
				</form>
			</div>
		</div>
		@endforeach
 @endif
        <div role="tabpanel" class="tab-pane" id="Section123">
	   
		</div>

	</div>
