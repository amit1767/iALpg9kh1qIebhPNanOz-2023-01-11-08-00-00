@if(!empty($orderrequest_orderlist->data))
				@php $i=$increment; @endphp
				@foreach($orderrequest_orderlist->data as $staff_order)
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
			   <a href="#Sections5-{{$i}}" aria-controls="#Sections5-{{$i}}" @if($i==1)class="active" @endif role="tab" data-toggle="tab">
				 <div class="order-heading-titlee">
				   <h3 class="mb-3">@if(strtotime($order_date) >= strtotime($todayenddate) && strtotime($order_date) <= strtotime($todayenddate)) Today's Order  @else {{$orderdate}} @endif</h3>
					<div class="order-main-box-nav">
					  <div class="customer-icon-box-up">
					   <div class="customer-sn">
						  
						  <h5> {{$staff_order->customer->cust_first_name}} {{$staff_order->customer->cust_last_name}}</h5>
					      <div class="customer-detail-01">
						  @if(!empty($staff_order->cars))
						  @foreach($staff_order->cars as $cars)
					       <div class="sn-customer-rr">
					       <img class="iconn-image" src="@if(!empty($cars->make_by->image)) {{$cars->make_by->image}} @endif" alt="">
						   <p> @if(!empty($cars->car_model)) {{$cars->car_model}} @endif @if(!empty($cars->car_year)) {{$cars->car_year}} @endif <br>
						   <span class="chceckk" style="background:#{{$cars->color->code}}"> </span> @if(!empty($cars->make_by->name)) {{$cars->make_by->name}} @endif @if(!empty($cars->vehicle->name)) {{$cars->vehicle->name}} @endif</p>
						   </div>
							@endforeach
						  @endif
						</div>
						</div>
						<div class="customer-detail-02"> 
						  <img src="{{ asset('public/assets/image/iccc.png')}}" alt="">
						 <p class="danger-color"> ETA: @if(!empty($staff_order->time_arrived)) {{$staff_order->time_arrived}} @endif</p>
						  <p><i class="far fa-clock"></i> Started At: @if(!empty($staff_order->time_started)) {{ date('d M Y h:i A',strtotime($staff_order->time_started))}} @endif</p>
						</div>
					  </div>
					  <div class="zones-reach-boxx">
						<div class="zones-reach-text">
						 <p> Zone: @if(!empty($staff_order->zone->zone_cluster->name)) {{$staff_order->zone->zone_cluster->name}} @endif</p>
						 <p> <strong>Home:</strong> @if(!empty($staff_order->address->description)) {{$staff_order->address->description}} @endif</p>
						 <p> @if(!empty($staff_order->address->apartment_number))
						 {{$staff_order->address->apartment_number}} {{$staff_order->address->additional_detail}}
						 @endif</p>
						</div>
						<div class="verticle-middle">
						<button class="view-route-button" onclick="viewroute('{{ url('dashboard/viewroute')}}','@if(!empty($staff_order->cars[0]->order_id)){{$staff_order->cars[0]->order_id}}@endif')">View Route</button>
						</div>
					  </div>
					</div>
				   </div>
				  </a>
				</li>
				@endforeach
				@endif