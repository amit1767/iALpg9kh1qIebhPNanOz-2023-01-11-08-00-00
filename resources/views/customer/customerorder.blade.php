@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<link rel="stylesheet" href="/resources/demos/style.css"> -->

<style>
.service_row2 p em{
	font-style:normal !important;
}
</style>

<div class="content-body">  

	<!-- row -->
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-5 col-md-12">
				<div class="heading-content-nav">
					<h3> Add New Order </h3>
					<p> <small> <i class="fas fa-chart-pie"></i> </small> <small> Customers </small> > <small> Customer Details </small> > <small> Add New Order </small> </p>
				</div>
			</div>
			<div class="col-lg-7 col-md-12">
				<div class="dashboard-right-content dashboard-r-c-res">
					<ul class="list-inline list-in-res">
					<!-- <li> <a href="#" class="danger-custom-btn"><i class="fas fa-filter"></i>  Cancel  </a> </li>
					<li> <a href="#" class="gree-custom-btn"> Next </a> </li>
					<li> <a href="javascript:void(0)" class="gree-custom-btn" onclick="document.getElementById('createorderButton').click()"> Submit </a> </li> -->
					</ul>
				</div>
			</div>
		</div>
		
		<div id="errorMSG" style="display:none;" >
			<div class="alert alert-warning" role="alert" >
				<ul>
					<li id="error_message" ></li>
				</ul>
			</div>
		</div>
		<!-- <div class="alert alert-success alert-dismissible fade show">
					<ul>
						<li>Info! You have got 5 new email.
					</li>
					</ul>
		</div> -->

		<div class="row mt-22">

			<div class="col-lg-3">
				<div class="customer-detail-boxx">
					<div class="customer-p-namee">
					<img class="logo-image" src="{{ asset('public/assets/image/user.png')}}" alt="">
						<div class="c-name">
							<h5> @if(isset($customerdata->cust_first_name)) {{$customerdata->cust_first_name}} @endif @if(isset($customerdata->cust_last_name)) {{$customerdata->cust_last_name}} @endif </h5>
							<p> Customer ID: <strong> @if(!empty($customerdata->_id)) {{$customerdata->_id}} @endif </strong></p>
							<!-- <a class="edit" href="#"><i class="fas fa-user-edit"></i></a>
							<a class="save" href="#"><i class="far fa-save"></i></i></a> -->
						</div>
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
							<p>LTV <span> <input readonly type="text" value="@if(isset($customerdata->lifeTimeValue)) {{$customerdata->lifeTimeValue}} @endif" /> </span> </p>
							<p>Device Model <span> <input readonly type="text" value="@if(isset($customerdata->cust_device_model)) {{$customerdata->cust_device_model}} @endif" /> </span> </p>
							<p>Device OS <span> <input readonly type="text" value="@if(isset($customerdata->cust_device_model)) {{$customerdata->cust_device_model}} @endif" /> </span> </p>
							<p>Reg Date <span> <input readonly type="text" value="@if(isset($customerdata->cust_reg_date)) {{ date('d/m/Y',strtotime($customerdata->cust_reg_date)) }} @endif" /> </span> </p>
							<p>Reg Time <span> <input readonly type="text" value="@if(isset($customerdata->cust_reg_date)) {{ date('H:i:s',strtotime($customerdata->cust_reg_date)) }} @endif" /> </span> </p>
						</form>
					</div>
				</div>
			</div>

			<div class="col-lg-9">

				<div class="add-new-order-tabss-nav" >

					<div class="card-body" id="msform">

						<ul class="nav nav-pills mb-4 light" id="progressbar">
							<li class="nav-item active tab_wizard">
								<!-- <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="true"> -->
									<div class="car-tabsss wizard_tabs">
									<i class="fas fa-check"></i>
									<div class="car-tab-text-n">
									<h6> Services </h6>
									<p> Select Services </p>
									</div>
									</div>
								<!-- </a>	 -->
							</li>
							<li class="nav-item w-36 tab_wizard">
								<!-- <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="true"> -->
									<div class="car-tabsss wizard_tabs">
										<i class="fas fa-check"></i>
										<div class="car-tab-text-n">
										<h6> Location Date & time </h6>
										<p> When whould you like your order? </p>
										</div>
									</div>
								<!-- </a> -->
							</li>
							<li class="nav-item w-36 tab_wizard">
								<!-- <a href="#navpills-1" class="nav-link active" data-toggle="tab" aria-expanded="true"> -->
									<div class="car-tabsss wizard_tabs">
										<i class="fas fa-check"></i>
										<div class="car-tab-text-n">
										<h6> Confirm Order </h6>
										<p> Preview & complete order </p>
										</div>
									</div>
								<!-- </a>	 -->
							</li>
						</ul>							

						<fieldset>
								
							<div class="mb-3">
								<div class="row">
									<div class="col-lg-4 col-md-12">
										<div class="d-flex align-items-center justify-content-between bg-white p-2 border border-info rounded">
											@if(!empty($category))
											@foreach($category as $categories)
											@if(!empty($categories->ot_id) && $categories->ot_id==$ot_id)
											<div class="d-flex align-items-center justify-content-between fw-bold">
												<img src="@if(!empty($categories->ot_icon)) {{$categories->ot_icon}} @endif" class="vichel_row"/>
												<p class="mb-0 ms-2">@if(!empty($categories->ot_name)) {{$categories->ot_name}} @endif</p>
											</div>
											@endif
											@endforeach
											@endif
											<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><p class="text-danger mb-0">Change</p></a>
										</div>
										@if(isset($customercars))
										@foreach($customercars->data as $car)
										<div class="vichle-detailss">
											<input type="checkbox" id="select-cars" class="select-cars" data-car_id="@if(!empty($car->_id)){{$car->_id}}@endif" data-ot_type="@if(!empty($ot_type)){{$ot_type}}@endif" data-ot_id="@if(!empty($ot_id)){{$ot_id}}@endif" data-car_image="@if(!empty($car->make_by->image)){{$car->make_by->image}}@endif" data-car_color="@if(!empty($car->color->name)){{$car->color->name}}@endif" data-car_year="@if(!empty($car->car_year)){{$car->car_year}}@endif" data-car_model="@if(!empty($car->car_model)){{$car->car_model}}@endif" data-car_name="@if(!empty($car->make_by->name)){{$car->make_by->name}}@endif" data-car_type="@if(!empty($car->car_type)){{$car->car_type}}@endif" data-subscription_id="@if(!empty($car->subscription_id)){{$car->subscription_id}}@endif" data-action_url="{{ route('checkuncheck') }}" />
											<img src="@if(!empty($car->make_by->image)) {{$car->make_by->image}} @endif" alt=""/>								 	
											<div class="car-tab-text-n">
											<h6> @if(!empty($car->make_by->name)) {{$car->make_by->name}} @endif </h6>
											<p> @if(!empty($car->car_model)) {{$car->car_model}} @endif |  @if(!empty($car->car_year)) {{$car->car_year}} @endif </p>
											<p> <span class="color-code"> </span> @if(!empty($car->color->name)) {{$car->color->name}} @endif</p>
											</div>
										</div>
										@endforeach
										@endif
										<div class="add-carr-vichles">
											<p> + Add car</p> 
										</div>
									</div>	
									
									<div class="col-lg-4 col-md-12">
										<div class="body_wash_aed">
																				
										</div>						 		
									</div>

									<div class="col-lg-4 col-md-12">
										<div class="service_added">
											<h6>Service Added <span>(<span class="total_service">0</span> Total)</span></h6>
											<div class="d-flex align-items-center justify-content-between service_added_head fw-bold">
												<p class="mb-0">Service Name</p><p class="mb-0">Price</p>
											</div>
											<div class="p-3">
												<div  id="c_service_selected" class="service_row">
													<!-- <p>sdsad<span class="service_row1"> 00 AED </span> </p>
													<p>sdsad<span class="service_row1"> 00 AED </span> </p> -->
												</div>

												<hr class="opacity-50 ">
												
												<div  class="service_row2">
													<p> Subtotal </p> 
													<b><p> <span class="subtotal"> 00 </span> AED </p>	</b>
												</div>

												<div class="service_row2">
													<p> VAT  </p> 
													<b><p> <span class="vat"> 00 </span> AED </p></b>
												</div>

												<div class="service_row2 fw-bold text-info">
													<p> Order Charges </p><p> <span class="order_charges"> 00 </span> AED </p>
												</div>	

											</div>
										</div>
									</div>									
								</div>	
							</div>
							
							<a href="{{url('dashboard/viewcustomer')}}/{{$customerdata->_id}}" class="danger-custom-btn wizard_cancle_btn"><i class="fas fa-times"></i></i>  Cancel  </a>
							<button type="button" name="next" class="next action-button gree-custom-btn wizard_next_btn">Next <i class="fas fa-chevron-right"></i></button>									
						</fieldset>

						<fieldset>

							<div class="mb-3">
								<div class="row">
									@if(!empty($address))
									@php
									
										$main_array=array();
											foreach($address as $cust_add){
												if(isset($cust_add->location->coordinates)){
													$lat=$cust_add->location->coordinates[1];
													$long=$cust_add->location->coordinates[0];
													$description = $cust_add->description;
													$main_array[]=array('<p>'.$description.'</p>',
														$lat,
														$long,
														'',asset('public/assets/images/marker.png')
													);
												}
											}
									@endphp
							
									<div class="col-lg-8 col-md-12">
									  	<div class="iframe-order-nav-new">
											<div class="iframe-car-vichless">
												<div class="search-onifrmaee">
													<form action="" method="" class="map_search_form">
														<div class="form-group">
															<input type="text" id="location-input" class="form-control" for="searchlocation" name="searchlocation" placeholder="Search for your location"/>
														</div>
													</form>
													@php $iteration=0; @endphp
													@if(!empty($address))
													<div class="map_address_tag">
														@foreach($address as $addresses)
														@if($iteration < 2)
															<div class="home_address">
																<div class="form-check">
																	<input type="radio" name="flexRadioDefault" data-is_default="@if(!empty($addresses->is_default)){{$addresses->is_default}}@endif" data-address_sub_locality="@if(!empty($addresses->sub_locality)){{$addresses->sub_locality}}@endif" data-address_notes="@if(!empty($addresses->notes)){{$addresses->notes}}@endif" data-address_id="@if(!empty($addresses->_id)){{$addresses->_id}}@endif" data-apartment_number="@if(!empty($addresses->apartment_number)){{$addresses->apartment_number}}@endif" data-additional_detail="@if(!empty($addresses->additional_detail)){{$addresses->additional_detail}}@endif" data-type="@if(!empty($addresses->location->type)){{$addresses->location->type}}@endif" data-description="@if(!empty($addresses->description)){{$addresses->description}}@endif" data-label="@if(!empty($addresses->label)){{$addresses->label}}@endif" data-lat="@if(!empty($addresses->location->coordinates[1])){{$addresses->location->coordinates[1]}}@endif" data-long="@if(!empty($addresses->location->coordinates[0])){{$addresses->location->coordinates[0]}}@endif" data-id="{{$iteration}}" id="address_info-{{$iteration}}" class="address_info"/>	
																</div>
																<div class="map_address_tag_content">
																	<p>@if(!empty($addresses->label)) {{$addresses->label}} @endif</p>
																	<p>@if(!empty($addresses->description)) {{$addresses->description}} @endif </p>
																</div>
															</div>			
														@php if(!empty($addresses->location->coordinates)){ $iteration++; } @endphp
														@endif
														@endforeach
													@endif
													</div>
												</div>		

												<div id="map_wrapper">
													<div id="showmap_order" style="width:100%; height:550px "></div>
												</div>
											</div>
										</div>
									</div>	

									<div class="col-lg-4 col-md-12">
										<div class="datetime-c-order">
											<div id="accordion-one" class="accordion accordion-primary">
												<div class="accordion__item">
													<div class="accordion__header rounded-lg" data-toggle="collapse" data-target="#default_collapseOne" aria-expanded="true">
														<h4> <span> </span>Date & Time </h4>
														<span class="accordion__header--indicator"></span>
													</div>
													<div id="default_collapseOne" class="accordion__body collapse show" data-parent="#accordion-one">
														<div class="accordion__body--text">

															<div class="order_celender">
																<div class="calendar" > </div>
															</div>
										
															<div class="time-formate" id="available-time"></div>
														</div>
													</div>
												</div>
												<div class="accordion__item">
													<div class="accordion__header rounded-lg collapsed" data-toggle="collapse" data-target="#default_collapseTwo" aria-expanded="false">
														<h4> <span> </span>Flexi Order </h4>
														<span class="accordion__header--indicator"></span>
													</div>
													<div id="default_collapseTwo" class="accordion__body collapse" data-parent="#accordion-one">
														<div class="accordion__body--text" id="flexi-order">
															<div class="flexi-order-inner">
																<ul>
																	<li class="active"><a href="javascript:void(0)" class="flexi_before" data-flexi_before="@if(!empty($date->flexi->before)) {{$date->flexi->before}} @endif" > Before @if(!empty($date->flexi->before)) {{$date->flexi->before}} @endif </a> </li>
																	
																	<li><a href="javascript:void(0)" class="flexi_after" data-flexi_after="@if(!empty($date->flexi->after)) {{$date->flexi->after}} @endif" > After @if(!empty($date->flexi->after)) {{$date->flexi->after}} @endif </a> </li>
																</ul>
															</div>
														</div>
													</div>
												</div>								
											</div>							
										</div>																	
									</div>		
									@endif									

								</div>
							</div>	
							<a href="{{url('dashboard/viewcustomer')}}/{{$customerdata->_id}}" class="danger-custom-btn wizard_cancle_btn"><i class="fas fa-times"></i>  Cancel  </a>
							<button type="button" name="next" class="next action-button gree-custom-btn wizard_next_btn">Next <i class="fas fa-chevron-right"></i><button>	

						</fieldset>

						<fieldset>

							<div class="mb-3">
								<div class="row">

									<div class="col-lg-4 col-md-12">
										<div class="confirm-order-boxed">
											<div class="confirm-order-home-add">
												<p id="address-selected"> <i class="fas fa-map-marker-alt"></i> <span> <b> Home </b> <br> <small>  </small></span></p> 
												<p id="date-time-selected"> <i class="fas fa-calendar-alt"></i> <span> <b> Date & Time </b> <br> <small>  </small></span></p>
											</div>
											<div class="vichle-detailss" id="selected-cars"></div>

											<div class="moreiInfo">
											<p> <b> Payment Method</b> </p> 
												<div class="payment-select">
													<div class="dropdown bootstrap-select">
													<select class="" tabindex="-98" onchange="document.getElementById('payment_method').value=this.value" > 
														<option value="@php echo NULL; @endphp" > Select Payment </option>
														<option value=0> Cash </option>
														<option value=1> Credit Card  </option>
													</select>
													</div>
												</div>
											</div>
											<div class="customer-notes-boxx">
												<textarea onkeyup="document.getElementById('customer_note').value=this.value" class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Customer Note"></textarea>
											</div>
										</div>
									</div>	
								
									<div class="col-lg-4 col-md-12">
										<div class="service-added-c-order">
										<h5> Service Added </h5>
											<div class="body-small-details">
												<p class="bg-light"> Service <span> Price </span></p>

												<div id="c_service_selected1"></div>

												<div class="service_row2">
													<p> Subtotal </p>
													<p><b> <em class="subtotal"> 00  </em> AED </b></p>
												</div>

												<div class="service_row2">
													<p> VAT </p> 
													<p> <b><em class="vat">00 </em> AED  </b></p>
												</div>

												<div class="service_row2">
													<p> <strong style="color:#23BAF0;"> Order Charges </strong></p>
													<p> <b style="color:#23BAF0;"> <em class="order_charges">00  </em> AED </b></p>
												</div>
											</div>
										</div>

										<div class="inter-promo-boxx">
											<form action="" method="">
												<div class="form-group">
												<input type="text" for="" name="" class="form-control" placeholder="Enter Promo Code">
												<button type="submit" class="btn promo-submit-button"> Apply </button>
												</div>
											</form>
										</div>
									</div>

								</div>	
							</div>	
													 
							<a href="{{url('dashboard/viewcustomer')}}/{{$customerdata->_id}}" class="danger-custom-btn wizard_cancle_btn"><i class="fas fa-times"></i>  Cancel  </a>
							<button onclick="document.getElementById('createorderButton').click()" type="submit"class="action-button gree-custom-btn wizard_next_btn">Submit <i class="fas fa-chevron-right"></i></button>									
						</fieldset>
													
					</div>	
				</div>


				<!-- test -->

					

				<!-- close  -->

			</div>	<!-- col-lg-9 closed -->
		</div><!-- row closed -->			

	</div>
</div>

	

<!--==== ====-->
<form method="POST" action="{{url('dashboard/customer/createorder')}}" onsubmit="return ValidationForm()" >
 	@csrf
	<input type="hidden" name="customer_id" id="customer_id" value="{{$cust_id}}" >

	<input type="hidden" name="address_id" id="address_id" value="" >
	<input type="hidden" name="address_label" id="address_label" value="" >
	<input type="hidden" name="address_type" id="address_type" value="" >
	<input type="hidden" name="address_lat" id="address_lat" value="" >
	<input type="hidden" name="address_long" id="address_long" value="" >
	<input type="hidden" name="address_description" id="address_description" value="" >
	<input type="hidden" name="address_apartment_number" id="address_apartment_number" value="" >
	<input type="hidden" name="address_additional_detail" id="address_additional_detail" value="" >
	<input type="hidden" name="address_notes" id="address_notes" value="" >
	<input type="hidden" name="address_sub_locality" id="address_sub_locality" value="" >
	<input type="hidden" name="is_default" id="is_default" value= >

	<input type="hidden" name="payment_method" id="payment_method" value="" >
	<input type="hidden" name="customer_note" id="customer_note" value="" >

	<input type="hidden" name="cars" id="cars" value="" >
	<input type="hidden" name="slug" id="slug" value="" >

	<input type="hidden" name="order_type_id" id="order_type_id" value="@if(!empty($ot_id)){{$ot_id}}@endif" >
	<input type="hidden" name="ot_type" id="ot_type" value="@if(!empty($ot_type)){{$ot_type}}@endif" >
	<input type="hidden" name="time_book_order" id="time_book_order" value="" >
	<input type="hidden" name="time_book_type" id="time_book_type" value="" >

	<button id="createorderButton" type="submit" ></button>
</form>
<!--==== ====-->

<!--**********************************
	Content body end
***********************************-->

<!--========== Modal Category =========-->
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- <script>
  jQuery(document).ready(function() {
        
        // An array of dates
        var eventDates = {};
        
        eventDates[ new Date( '12/06/2015' )] = new Date( '12/06/2015' );

        eventDates[ new Date( '06/20/2015' )] = new Date( '06/20/2015' );
        eventDates[ new Date( '06/25/2015' )] = new Date( '06/25/2015' );
        
        // datepicker
        jQuery('.calendar').datepicker({
            beforeShowDay: function( date ) {
                var highlight = eventDates[date];
                if( highlight ) {
                     return [true, "event", highlight];
                } else {
                     return [true, '', ''];
                }
             }
        });
    });

</script> -->

							@if(!empty($main_array))

							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFzzVfXfUc91Eb1CWCfPVZZzgMB0U5xVU&callback=initMap"></script>
												<script type="text/javascript">
													var locations=<?php echo json_encode($main_array); ?>;

													var map = new google.maps.Map(document.getElementById('showmap_order'), {
													mapTypeId:google.maps.MapTypeId.ROADMAP,
													center: {
														lat:@if(!empty($lat)){{$lat}}@endif,lng: @if(!empty($long)){{$long}} @endif },zoom:9,fullscreenControl:true});

													var infowindow = new google.maps.InfoWindow();
													var bounds = new google.maps.LatLngBounds();
													//Sunil Icon
													var marker, i, newicon;
													var markers1 = new Array();
													for (i = 0; i < locations.length; i++) {
													var icons = {
													url: locations[i][4], // url
													scaledSize: new google.maps.Size(30, 50), // scaled size
													origin: new google.maps.Point(0,0), // origin
													anchor: new google.maps.Point(0,0), // anchor
													fillColor: locations[i][5],
													};
													marker = new google.maps.Marker({
													position: new google.maps.LatLng(locations[i][1], locations[i][2]),
													map: map,
													icon: icons,
													title: locations[i][0]
													});
													//bounds.extend(marker.position);
													google.maps.event.addListener(marker, 'click', (function(marker, i) {
													return function() {
													infowindow.setContent(locations[i][0]);
													infowindow.open(map,marker);
													$('#address_info-'+i).click();
													map.setCenter(marker.getPosition());
													infowindow.open(map,marker);
													map.setZoom(15);
													//abcd(i);
													}
													})(marker, i));
													markers1.push(marker);  
													}

													//map.fitBounds(bounds);
													// var listener = google.maps.event.addListener(map, "idle", function () {
													//   map.setZoom(4);
													//   google.maps.event.removeListener(listener);
													// });
													// Trigger a click event on each marker when the corresponding marker link is clicked
												</script>	
							@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>	

										
<script>
	$('.address_info').on('click', function(){
														
		google.maps.event.trigger(markers1[$(this).data('id')], 'click');

		window.lati = $(this).attr('data-lat');
		window.longi = $(this).attr('data-long');

		var label = $(this).attr('data-label');
		var description = $(this).attr('data-description');
		var address_selected = '<i class="fas fa-map-marker-alt"></i> <span> <b> '+label+' </b> <br> <small> '+description+' </small></span>';
		$('#address-selected').html(address_selected);
												
		$('#address_label').val(label);
		$('#address_type').val($(this).attr('data-type'));
		$('#address_lat').val(window.lati);
		$('#address_long').val(window.longi);
		$('#address_description').val(description);
		$('#address_additional_detail').val($(this).attr('data-additional_detail'));
		$('#address_apartment_number').val($(this).attr('data-apartment_number'));
		$('#address_id').val($(this).attr('data-address_id'));
		$('#address_notes').val($(this).attr('data-address_notes'));
		$('#address_sub_locality').val($(this).attr('data-address_sub_locality'));
		$('#is_default').val($(this).attr('data-is_default'));					
	});
</script>

						<!--=== Calender ===-->
							<script>
								jQuery(document).ready(function() {
									var eventDates = {}; 
									<?php foreach($all_date as $dt){ ?>
										eventDates[ new Date( '<?php echo $dt; ?>' )] = new Date( '<?php echo $dt; ?>' );
									<?php } ?>
									
									/***************************/ //datepicker
									jQuery(document).ready(function() {
										jQuery('.calendar').datepicker({
            								beforeShowDay: function( date ) {							
                							var highlight = eventDates;
                								if( $.inArray( date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate(), eventDates )== 1) {
                     								return [true, "event", highlight];
                								} else {
                     								return [true, '', ''];
                								}
             								}	
											,
											onSelect: function () {
												var ot_id = {{$ot_id}};
												var date = $(this).datepicker("getDate");							
												var s_date = date.toISOString();
												 
												var flexi_date = date;
												var dd = String(flexi_date.getDate()).padStart(2, '0');
												var mm = String(flexi_date.getMonth() + 1).padStart(2, '0');
												var yyyy = flexi_date.getFullYear();
												flexi_date = dd + '-' + mm + '-' + yyyy;
												$("#flexi_date").val(flexi_date);

												var lat = window.lati;
												var long = window.longi;
												
												var action_url = "{{route("timeavailable")}}";

												addordertime(ot_id,s_date,lat,long,action_url);
											}
        								});
									});
									/***************************/	
								});
							</script>
								<input type="hidden" id="flexi_date" value="" >

<!----YOUR-CODE-HERE----->
@endsection

