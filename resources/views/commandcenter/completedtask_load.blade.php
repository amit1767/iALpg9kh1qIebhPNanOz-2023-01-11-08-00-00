@if(!empty($complete_orderlist->data))
				@php $i=$increment; @endphp
				@foreach($complete_orderlist->data as $staff_order)
				@php $i++; @endphp
				
				@php
				$time_book_order=isset($staff_order->time_book_order) ? $staff_order->time_book_order : 'Time Not Available';
				$todaydate=date('d M Y');
				$todaystartdate=date('d M Y 00:00:00');
				$todayenddate=date('d M Y 23:59:59');
				
				if($time_book_order=='Time Not Available'){
					$orderdate='Time Not Available';
					$order_date="Time Not Available";
				}else{
					$orderdate=date('d M Y',strtotime($staff_order->time_book_order));
					$order_date=date('d M Y H:i:s',strtotime($staff_order->time_book_order));
				}
				
				@endphp
			  <li role="presentation" >
			   <a href="#Sections3-{{$i}}" aria-controls="#Sections3-{{$i}}" @if($i==1)class="active" @endif role="tab" data-toggle="tab" data-value="{{$i}}" onclick="tracking_details('@if(!empty($staff_order->bucket_id)){{$staff_order->bucket_id}}@endif',$(this).data('value'))" >
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
							       <h5>
								  @if(!empty($staff_order->customer->cust_first_name))
									  {{$staff_order->customer->cust_first_name}} {{$staff_order->customer->cust_last_name}}
								  @endif</h5>
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
								<img src="@if(!empty($staff_order->cleaner->avatar->default_path)){{$staff_order->cleaner->avatar->default_path}}@endif" alt="" class="customer_box_icon_img"> @if(!empty($staff_order->cleaner->cleaner_first_name)){{$staff_order->cleaner->cleaner_first_name}}@endif @if(!empty($staff_order->cleaner->cleaner_last_name)){{$staff_order->cleaner->cleaner_last_name}}@endif 
							</p>

							<p class="danger-color"> <i class="far fa-clock danger-color"></i> Completed: @if(!empty($staff_order->time_completed)) {{ date('d M Y h:i A',strtotime($staff_order->time_completed))}} @endif </p>


							<p>Late to reach: <span class="text-danger"> @if(!empty($staff_order->time_started) && !empty($staff_order->time_enroute) && !empty($staff_order->duration->value)) @php $late_b = (strtotime($staff_order->time_enroute)+$staff_order->duration->value) - strtotime($staff_order->time_started); $late_by = $late_b/60; echo (int)$late_by; @endphp minutes @endif </span></p>

							<p> service time: <span class="" style="color: #0fca93;">25(19)</span></p>
							<!-- <p><i class="far fa-clock"></i> Started At: @if(!empty($staff_order->time_started)) {{ date('d M Y h:i A',strtotime($staff_order->time_started))}} @endif</p> -->
						</div>
					  </div>
					  <div class="zones-reach-boxx">
						<div class="zones-reach-text">
						 <p> Zone: @if(!empty($staff_order->zone->zone_cluster->name)) {{$staff_order->zone->zone_cluster->name}} @endif</p>
						 <p class="pan_t_add"> <strong>@if(!empty($staff_order->address->label)){{$staff_order->address->label}}@endif:</strong> <span> @if(!empty($staff_order->address->description)) {{$staff_order->address->description}} @endif </span></p>
						 <p>
						  @if(!empty($staff_order->address->apartment_number))
						 {{$staff_order->address->apartment_number}} {{$staff_order->address->additional_detail}}
						  @endif
						 </p>
						</div>
						<div class="verticle-middle">
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
							  	<!-- <img src="http://admindev.keno.ae/public/assets/image/iccc.png" alt="">
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