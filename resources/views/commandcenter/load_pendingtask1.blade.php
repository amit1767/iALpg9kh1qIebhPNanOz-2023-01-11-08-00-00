@if(!empty($pending_orderlist->data))
				@php $i=$increment; @endphp
				@foreach($pending_orderlist->data as $staff_order)
				@php $i++; 
                @endphp
		  <div role="tabpanel" class="commond_side_bar_fixed tab-pane @if($i==1) active @endif" id="Sections-{{$i}}">
		  @if(!empty($staff_order->customer_order_id))
		  	<div class="action-buttons">
			  <ul class="list-inline">
			    <li class="nav-item command-dropdown show">
				  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-ellipsis-v" ></i> Action </a>
					<div class="dropdown-menu dropdown-menu-right">
						<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
						  <h5> Action  </h5>
							<ul class="timeline p-3">
								<li> <a href="{{url('dashboard/commandcenter/editorder')}}/{{$staff_order->customer_order_id}}/@if(!empty($staff_order->category->ot_id)){{$staff_order->category->ot_id}}@endif/@if(!empty($staff_order->category->ot_type)){{$staff_order->category->ot_type}}@endif" class="action-dis" > <span class="ti-pencil"></span> Edit Order <small>(Under development)</small> </a></li>
								<li> <a class="commandcenteraddorder action-dis" data-customer_order_id="{{$staff_order->customer_order_id}}" href="" data-bs-toggle="modal" data-bs-target="#commandcenteraddorderModal" > <span class="ti-plus"></span> Add Order <small>(Under development)</small> </a> </li>
							  	<li> <a class="danger-color"> <span class="ti-close"></span> Cancel  </a></li>			  
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
				  		<a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> <i class="fa fa-ellipsis-v" ></i> Action </a>
						<div class="dropdown-menu dropdown-menu-right">
							<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
							  <h5> Action  </h5>
								<ul class="timeline p-3">
									@php if(!empty($staff_order->cars[0]->order_id)){ $customer_order__id = $staff_order->cars[0]->order_id; } @endphp
									<li> <a href="{{url('dashboard/commandcenter/editorder')}}/{{$customer_order__id}}/@if(!empty($staff_order->category->ot_id)){{$staff_order->category->ot_id}}@endif/@if(!empty($staff_order->category->ot_type)){{$staff_order->category->ot_type}}@endif" class="action-dis" > Edit Order <small>(Under development)</small> </a></li>
									<li> <a class="commandcenteraddorder action-dis" data-customer_order_id="{{$customer_order__id}}" href="" data-bs-toggle="modal" data-bs-target="#commandcenteraddorderModal"> Add Order <small>(Under development)</small> </a> </li>	
								  	<li> <a class="danger-color close"> Cancel  </a></li>	  
								</ul>
						   </div>
						</div>
				  	</li>
				</ul>  
			</div>
			@endif			

			<div class="fixed_task_detail">
				@if(!empty($staff_order->approving_cleaner->_id))
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
					 	<p> Scheduled For <span> <b>@if(!empty($staff_order->time_book_order)) {{ date('d/m/Y h:i A',strtotime($staff_order->time_book_order))}} @endif </b> </span> </p>
				  	</div> 
			    </div>
		   
			    <div class="body-small-details assign-ninja-boxx">
				   @if(!empty($staff_order->cars))
					   @foreach($staff_order->cars as $mcars)
					   
							 <div class="customer-icon-box-up-02">
								<img class="iconn-image" src="@if(!empty($mcars->make_by->image)) {{$mcars->make_by->image}} @endif" alt="@if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif">
								<div class="customer-detail-012">
								  <h5>{{$mcars->make_by->name}} @if(!empty($mcars->make_by->car_model)) {{$mcars->make_by->car_model}} @endif @if(!empty($mcars->make_by->car_year)) {{$mcars->make_by->car_year}} @endif  </h5>
								  <p><span class="chceckk" style="background: #{{$mcars->color->code}};"> </span> @if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif @if(!empty($mcars->make_by->car_number)) {{$mcars->make_by->car_number}} @endif</p>
								</div>
							  </div>
					   @endforeach
					@endif	
					
					@php $total_price=0; @endphp
					 @if(!empty($staff_order->items))
					   @foreach($staff_order->items as $item)
				   @php $total_price+=$item->cost; @endphp
							 <p> <strong> {{$item->name}} </strong> <span><b>{{$item->cost}}</b> AED</span> </p>
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
									<option > Dabit Card </option>
									<option @if($staff_order->payment_method==0) selected @endif > Cash </option>
								  </select>
								</div>
						   </div>
						
				 </div>
			   
			  	<div class="tracking-detail-box">
				 	<h3> Tracking Details </h3>
					
				 	<div class="accordion" id="panding_tracking_accordion-{{$i}}">

					  	
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