@if(!empty($unpaid_orderlist->data))
				@php $i=$increment; @endphp
				@foreach($unpaid_orderlist->data as $staff_order)
				@php $i++; @endphp
		  	<div role="tabpanel" class="commond_side_bar_fixed tab-pane @if($i==1) active @endif" id="Sections4-{{$i}}">
			  	<div class="action-buttons">
				  	<ul class="list-inline">
					    <li class="nav-item command-dropdown show">
						  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> Action </a>
							<!-- <div class="dropdown-menu dropdown-menu-right">
								<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
								  <h5> Action  </h5>
									<ul class="timeline p-3">
									  <li> <a href=""> Add Vehicle  </a></li>	
									  <li> <a href=""> Add Order  </a></li>	
									  <li> <a href=""> Edit Order  </a></li>	
									  <li> <a href=""> UnAssign  </a></li>	
									  <li> <a href="" class="danger-color"> Cancel  </a></li>	
									</ul>
							   </div>
							</div> -->
						</li>
					</ul>  
				</div>

			<div class="fixed_task_detail">	
				<div class="customer_online_detail_box">
					<div class="d-flex align-items-center justify-content-between">
						<div class="customer_online_detail">						
							<a href="#" class="task_profile_img_3"><img src="@if(!empty($staff_order->cleaner->avatar->default_path)){{$staff_order->cleaner->avatar->default_path}}@endif" alt="" class="iconn-image">
							<span class="task_profile_online_dot"></span></a>
							<div>
								<h6>@if(!empty($staff_order->cleaner->cleaner_first_name)){{$staff_order->cleaner->cleaner_first_name}}@endif @if(!empty($staff_order->cleaner->cleaner_last_name)){{$staff_order->cleaner->cleaner_last_name}}@endif</h6>
								<!-- <p class="text-info">Tasks: 3/1/4</p> -->
								<!-- <p class="text-secondary">Ranches Zone</p> -->
								<p style="color: #ff0000;">Unpaid</p>
							</div>												
						</div>
						<!-- <div class="customer_star_rating">
							<p class="fw-bold"><i class="fas fa-star"></i> 5.0</p>
							<p class="text-info">ETR: 13:00</p>
							<p class="auto_assign"><i class="fas fa-check-double"></i> Auto assigned</p>
						</div> -->
						<div class="social-iconn">
						  <p> <a href=" https://wa.me/@if(!empty($staff_order->cleaner->phone)){{$staff_order->cleaner->phone}}@endif?text={{config('constants.whatsaap_msg')}}"> <img src="{{asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>					 
						  <p> <a href="tel:@if(!empty($staff_order->cleaner->phone)){{$staff_order->cleaner->phone}}@endif"> <img src="{{asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
						</div>
					</div>
					<div class="d-flex align-items-start justify-content-between pt-2">
						<div>
							<h6 style="color: #0fca93;">EXCELENT</h6>
							<a href="#" class="customer_online_box_pills">On time</a>
							<a href="#" class="customer_online_box_pills">Care</a>
							<a href="#" class="customer_online_box_pills">Clean</a>						
						</div>
						<div class="customer_star_rating">
							<p class="fw-bold"><i class="fas fa-star"></i> @if(!empty($staff_order->cleaner->ratings->avg)) {{  number_format($staff_order->cleaner->ratings->avg,2)}} @endif</p>						
						</div>					
					</div>	
					<p class="para_5">Excellent service, he comes on the time, and he is amicable behavior</p>
					<div class="d-flex align-items-center justify-content-between">
						<p class="mb-0 fw-bold">Tips</p>
						<p class="mb-0 fw-bold">40 <span>AED</span></p>
					</div>			
				</div>
			
			   <div class="customers-detail-edits-main-box">
				 <div class="customer-icon-box-ri">
					<div class="stated-boxs">
					  <h5>@if(!empty($staff_order->customer->cust_first_name)) {{$staff_order->customer->cust_first_name}} @endif @if(!empty($staff_order->customer->cust_last_name)) {{$staff_order->customer->cust_last_name}} @endif</h5>
					</div>
					<div class="social-iconn">
					  <p> <a href="https://wa.me/@if(!empty($staff_order->customer->cust_mobile)){{$staff_order->customer->cust_mobile}}@endif?text={{config('constants.whatsaap_msg')}}"> <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>
					  <p> <a href="@if(!empty($staff_order->cleaner->phone)) https://wa.me/{{$staff_order->cleaner->phone}} @endif"> <img src="{{ asset('public/assets/image/comment.png')}}" alt=""> </a></p>
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
								@php $VAT=!empty($staff_order->vat->amount) ? $staff_order->vat->amount : 0 ; @endphp
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
					    

					    <div class="accordion" id="unpaid_tracking_accordion-{{$i}}">

						  	

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
		   
		   <!-- <div class="fixed-bottom-buttonn">
			<a href="" class="custom-btn-black"> Assign Ninja </a>
		   </div> -->
		</div>
		@endforeach
 @endif