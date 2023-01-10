@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		    <div class="heading-content-nav">
		   <h3> Service Setting </h3>
		   <p> <small> <img class="common_dash_top_icon" src="http://admindev.keno.ae/public/assets/image/dashbaord_Icon.png" alt=""> </small> > <small> Service Setting </small> </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
			<ul class="list-inline list-in-res">
              <li> <a href="#" class="blue-custom-btn"><i class="fas fa-file-alt"></i> Add Service </a> </li>
			  <li> <a href="#" class="blue-custom-btn"><i class="fas fa-file-alt"></i> Add Category </a> </li>
			</ul>
		   </div>
		 </div>
	   </div>
	
	    <div class="row mt-3">
	  <div class="menu-setting-main-boxx">
	    <ul id="accordion" class="accordion">
		  <li class="open">
			<div class="link"> Car Wash <span class="float-end"><i class="fas fa-angle-down"></i></span> </div>
			<ul class="submenu">
			  <li> <a href="javascript:void(0)" class="tab-a active-a" data-id="bodywash"> Body Wash </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="Covid_killer_wash"> COVID Killer Wash   </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="Categories"> Interior Safe Cleaning </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="Reorder"> Super Keno Shine </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="bookcarwash"> Extreme Body Wash </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="todaybestdeal"> Royal Ceramic Wash </a> </li>
			  <li> <a href="javascript:void(0)" class="tab-a" data-id="todaybestdeal"> Odor Removal </a> </li>
			</ul>
		  </li>
		  <li>
			<li> <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1">  Detailing </a></div></li>		   
		   <li> <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1"> Tinting </a></div> </li>
		   <li> <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1"> Recovery </a></div> </li>
		   <li> <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1"> Maintenance </a></div> </li>
		   <li> <div class="link"> <a href="javascript:void(0)" class="tab-a" data-id="tab1"> Donate </a></div> </li>
	       <li class="menu-setting-buttonn"> <a href="#"> Package Setting </a> </li>
		</ul>
		
		<div class="tab-content-custom-main">
		    <div  class="tab tab-active" data-id="bodywash">
			   	<div class="car-wash-section-box">
					  <div class="car-wash-inactive-button">
					    <div class="switch">
						  <span> <strong> Active/Inactive</strong></span><strong> </strong>
						  <input name="active" type="checkbox" value="1" id="activeinactive">
						  <label for="activeinactive"></label>
						</div>
						
						<div class="car-wash-orde-redit-btn">
						  <button type="submit" class="apply-button"> Edit </button>
						</div>
					  </div>
					  
					  <div class="car-wash-form-section-details">
					    <form action="" method="">
						 <div class="row">
						   <div class="col-lg-6 col-md-12">
	                         <div class="form-group">
							  <label> Title En </label>
							  <input type="text" class="form-control" for="" name="" value="" placeholder="Car Wash">
	 						 </div>
							 <div class="form-group ariban-input">
							  <label> Title Ar </label>
							  <input type="text" class="form-control" for="" name="" value="" placeholder="غسيل سيارة">
	 						 </div>
							 <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Working Hours </strong></span>
								 <span class="promoo"><input type="date" for="" name="" value="" placeholder="12/12/2020"> </span>
								</div>
							   </div>
							 </div>
							  <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Delay </strong></span>
								 <span class="promoo"><input type="date" for="" name="" value="" placeholder="34 Minutes"> </span>
								</div>
							   </div>
							 </div>
							  <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Recommended ninja </strong></span>
								 <span class="promoo"><input type="text" for="" name="" value="" placeholder="Yes"> </span>
								</div>
							   </div>
							 </div>
							  <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Flexi Order
								 </strong></span>
								 <span class="promoo"><input type="text" for="" name="" value="" placeholder="Yes"> </span>
								</div>
							   </div>
							 </div>
							  <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Set Fix Schedule  </strong></span>
								 <span class="promoo"><input type="text" for="" name="" value="" placeholder="Yes"> </span>
								</div>
							   </div>
							 </div> 
							 
							 <div class="add-promo">
							  <label> Category Icon </label>
							    <div class="col-ting">
								<div class="control-group file-upload" id="file-upload1">
								  <div class="image-box text-center">
										<p> <span>+</span>  <br> <small> Attach Car Photo </small></p>
										<img src="" alt="">
									</div>
								  <div class="controls" style="display: none;">
										<input type="file" name="contact_image_1">
									</div>
								</div>
								</div>
							 </div>
							 
						   </div>
						   
						   <div class="col-lg-6 col-md-12">					   	

						   		<div class="service_setting_filter_card">
						   			<p class="service_set_filtercard_head">Country <span>(1 Total)</span></p>
						   			<div class="service_setting_filter_btn">
						   				<p>United Arab Emirates</p>
						   				<div class="">
						   					<a href="#">Dubai</a>
						   					<a href="#">Abu Dhabi</a>
						   					<a href="#" class="mt-2">Sharjah</a>
						   				</div>
						   			</div>
						   		</div>

						   		<div class="service_setting_filter_card mt-4">
						   			<p class="service_set_filtercard_head">Cluster <span>(3 Total)</span></p>
						   			<div class="service_setting_filter_btn">
						   				<p>Barsha Zone</p>
						   				<div class="">
						   					<a href="#">Al Barsha Zone</a>
						   					<a href="#" class="mt-2">Al Qouz Zone</a>
						   				</div>
						   				<div class="border my-3"></div>
						   				<p>Detailing Zone</p>
						   				<div class="">
						   					<a href="#">ALL</a>
						   				</div>
						   				<div class="border my-3"></div>
						   				<p>Downtown Zone</p>
						   				<div class="">
						   					<a href="#">ALL</a>
						   				</div>
						   			</div>					   							   				
						   		</div>                         
						   </div>
						 </div>

						</form>
					 </div>				  
			   	</div>

			</div><!--end of tab App Logo--> 

			
			<div  class="tab" data-id="Covid_killer_wash">
				<!-- <div class="h">
					 <h2>Banner </h2>
					 <p>Content of tab one</p>
			  	</div> -->

			  	<div class="car-wash-section-box">
						<div class="car-wash-inactive-button">
						    <div class="switch">
							  <span> <strong> Active/Inactive</strong></span><strong> </strong>
							  <input name="active" type="checkbox" value="1" id="activeinactive-1">
							  <label for="activeinactive-1"></label>
							</div>
							
							<div class="car-wash-orde-redit-btn">
							  <button type="submit" class="apply-button"> Publish </button>
							</div>
						</div>
					  
					  <div class="car-wash-form-section-details">
					    <form action="" method="">
						 <div class="row">
						   <div class="col-lg-6 col-md-12">
	                         <div class="form-group">
							  <label> Title En </label>
							  <input type="text" class="form-control" for="" name="" value="" placeholder="Car Wash">
	 						 </div>
							 <div class="form-group ariban-input">
							  <label> Title Ar </label>
							  <input type="text" class="form-control" for="" name="" value="" placeholder="غسيل سيارة">
	 						 </div>
							 <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Working Hours </strong></span>
								 <span class="promoo"><input type="time" for="" name="" value="" placeholder="9:00-23:00"> </span>
								</div>
							   </div>
							 </div>
							  <div class="add-promo">
								<div class="add-promo d-flex">
								 <div class="switch-promo">
								 <span> <strong> Delay </strong></span>
								 <span class="promoo"><input type="time" for="" name="" value="" placeholder="34 Minutes"> </span>
								</div>
							   </div>
							 </div>
							
							<div class="accordion-item switch-promo mb-3">
                                  	<h2 class="accordion-head mb-0">Recommended ninja</h2>
                              	<div class="d-flex align-items-center">
                                    <div class="form-check form-switch">
                                  		<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                    </div>
                                </div>
                            </div>
							<div class="accordion-item switch-promo mb-3">
                                  	<h2 class="accordion-head mb-0">Flexi Order</h2>
                              	<div class="d-flex align-items-center">
                                    <div class="form-check form-switch">
                                  		<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                    </div>
                                </div>
                            </div>
							 <div class="accordion-item switch-promo mb-3">
                                  	<h2 class="accordion-head mb-0">Set Fix Schedule</h2>
                              	<div class="d-flex align-items-center">
                                    <div class="form-check form-switch">
                                  		<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                    </div>
                                </div>
                            </div>
							 <div class="add-promo">
							  <label> Category Icon </label>
							    <div class="col-ting">
								<div class="control-group file-upload" id="file-upload1">
								  <div class="image-box text-center">
										<p> <span>+</span>  <br> <small> Attach Car Photo </small></p>
										<img src="" alt="">
									</div>
								  <div class="controls" style="display: none;">
										<input type="file" name="contact_image_1">
									</div>
								</div>
								</div>
							 </div>
							 
						   </div>
						   
						   <div class="col-lg-6 col-md-12">					   	

						   		<div class="service_setting_filter_card">
						   			<p class="service_set_filtercard_head">Country <span>(1 Total)</span></p>
						   			<div class="service_setting_filter_btn">
						   				<p>United Arab Emirates</p>
						   				<div class="red_btn">
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Dubai <i class="fas fa-times"></i></a>
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Abu Dhabi <i class="fas fa-times"></i></a>
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Sharjah <i class="fas fa-times"></i></a>
						   				</div>

						   				<div class="control-group file-upload" id="file-upload1">
		                                    <div class="image-box text-center menu_seting_img_box">
		                                        <p> <span>+</span> <small>Add New Country  </small></p>
		                                        <img src="" alt="">
		                                    </div>
		                                    <div class="controls" style="display: none;">
		                                        <input type="file" name="contact_image_1">
		                                    </div>
		                                </div>

						   			</div>
						   		</div>

						   		<div class="service_setting_filter_card mt-4">
						   			<p class="service_set_filtercard_head">Cluster <span>(3 Total)</span></p>
						   			<div class="service_setting_filter_btn">
						   				<p>Barsha Zone</p>
						   				<div class="red_btn">
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Al Barsha Zone <i class="fas fa-times"></i></a>
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Al Qouz Zone <i class="fas fa-times"></i></a>
						   				</div>
						   				<div class="border my-3"></div>
						   				<p>Detailing Zone</p>
						   				<div class="red_btn">
						   					<a href="#" class="d-inline-flex align-items-center justify-content-between">ALL <i class="fas fa-times"></i></a>
						   				</div>

						   				<div class="control-group file-upload" id="file-upload1">
		                                    <div class="image-box text-center menu_seting_img_box" data-bs-toggle="modal" data-bs-target="#exampleModal">
		                                        <p> <span>+</span> <small>Add New Country  </small></p>
		                                        <img src="" alt="">
		                                    </div>
		                                   <!--  <div class="controls" style="display: none;">
		                                        <input type="file" name="contact_image_1">
		                                    </div> -->
		                                </div>
						   				
						   			</div>					   							   				
						   		</div>                         
						   </div>
						 </div>

						</form>
					 </div>				  
			   	</div>

			   	



			</div><!--end of tab banner--> 	

			<div  class="tab" data-id="Categories">
				 <div class="h">
					 <h2>Categories</h2>
					 <p>Content of tab one</p>
			  </div>
			</div><!--end of tab Categories--> 
			
			<div  class="tab" data-id="Reorder">
				 <div class="h">
					 <h2>Reorder</h2>
					 <p>Content of tab one</p>
			  </div>
			</div><!--end of tab Reorder--> 
			
			<div  class="tab" data-id="bookcarwash">
				 <div class="h">
					 <h2>Book Car wash</h2>
					 <p>Content of tab one</p>
			  </div>
			</div><!--end of tab bookcarwash-->

			<div  class="tab" data-id="todaybestdeal">
				 <div class="h">
					 <h2>Today Best Deal</h2>
					 <p>Content of tab one</p>
			  </div>
			</div><!--end of tab todaybestdeal--> 
			
		</div>
		
	  </div>
    </div>
	
  </div>
</div>
        <!--**********************************
            Content body end
        ***********************************-->

			<!-- Button trigger modal -->

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-lg">
						    <div class="modal-content">
						      <div class="modal-header red_btn">
						        <h5 class="modal-title" id="exampleModalLabel">Add New Country</h5>
						        <!-- <button type="button" class="red_btn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button> -->
						        <a href="#" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></a>
						      </div>
						      <div class="modal-body">
						      	<div class="service_setting_new_country_popup">						      		
							      	<div class="row">
							      		<div class="col-lg-5">
							      			<div class="form-group has-search">
											    <span class="fa fa-search form-control-feedback"></span>
											    <input type="text" class="form-control" placeholder="Search">
											</div>
											<div class="country_popup_btn">
												<p>United Arab Emirates</p>
												<div class="px-3">
													<div class="country_popup_btn_box">
														<p>All</p>
														<a href="#" class="plus_btn">+</a>
													</div>
													<div class="country_popup_btn_box">
														<p>Abu Dhabi</p>
														<a href="#" class="min_btn">-</a>
													</div>
													<div class="country_popup_btn_box">
														<p>Dubai</p>
														<a href="#" class="min_btn">-</a>
													</div>
													<div class="country_popup_btn_box">
														<p>Sharjah</p>
														<a href="#" class="min_btn">-</a>
													</div>
													<div class="country_popup_btn_box">
														<p>Al Ain</p>
														<a href="#" class="plus_btn">+</a>
													</div>
												</div>
											</div>
												<div class="country_popup_btn_box1">
													<p>Saudi Arabia</p>
												</div>
												<div class="country_popup_btn_box1">
													<p>Oman</p>
												</div>
							      		</div>

							      		<div class="col-lg-7">
							      			<div class="service_setting_filter_card popup_right_content_set">
									   			<p class="service_set_filtercard_head">Country <span>(1 Total)</span></p>
									   			<div class="service_setting_filter_btn">
									   				<p>United Arab Emirates</p>
									   				<div class="red_btn">
									   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Dubai <i class="fas fa-times"></i></a>
									   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Abu Dhabi <i class="fas fa-times"></i></a>
									   					<a href="#" class="d-inline-flex align-items-center justify-content-between">Sharjah <i class="fas fa-times"></i></a>
									   				</div>

									   				<div class="control-group file-upload" id="file-upload1">
					                                    <div class="image-box text-center menu_seting_img_box">
					                                        <p data-bs-toggle="modal" data-bs-target="#exampleModal"> <span>+</span> <small>Add New Country  </small></p>
					                                        <img src="" alt="">
					                                    </div>
					                                    <div class="controls" style="display: none;">
					                                        <input type="file" name="contact_image_1">
					                                    </div>
					                                </div>
									   		</div>
						   				</div>
							      			
							      		</div>
							      	</div>
						      	</div>						        
						      </div>
						      <div class="modal-footer d-flex align-items-center justify-content-between">
						        <a href="#" data-bs-dismiss="modal" class="cencel_btn">CANCEL</a>
						        <a href="#" class="add_now_btn">ADD NOW</a>
						      </div>
						    </div>
						  </div>
						</div>

<!----END-YOUR-CODE-HERE----->
@endsection


