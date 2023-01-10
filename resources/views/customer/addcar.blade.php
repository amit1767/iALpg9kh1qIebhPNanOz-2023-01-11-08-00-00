@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<div class="content-body">  
	<section class="add_car_page">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="heading-content-nav">
	                    <h3> Add New Car </h3>	                    
                	</div>
				</div>
				<div class="col-lg-8 col-md-8">
					<ul class="add_car_page_btn">
						<li><a href="#" class="danger-custom-btn add_car_cancel_btn"><i class="fas fa-times"></i>  Cancel  </a></li>
						<li><a href="" class="gree-custom-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fas fa-plus"></i>  Add Now </a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="select_vehicle_category">
						<div class="nav flex-column nav-pills me-lg-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Vehicle Make <span>Alfa Romeo<i class="fas fa-chevron-right"></i></span></button>
						    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Vehicle Modal <span>Select<i class="fas fa-chevron-right"></i></span></button>
						    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Vehicle Year <span>Select<i class="fas fa-chevron-right"></i></span></button>
						    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Vehicle Color <span>Select<i class="fas fa-chevron-right"></i></span></button>
						    <button class="nav-link" id="v-pills-settings-city" data-bs-toggle="pill" data-bs-target="#v-pills-city" type="button" role="tab" aria-controls="v-pills-city" aria-selected="false">City <span>Select<i class="fas fa-chevron-right"></i></span></button>
						</div>
					</div>	

					<div class="vehicle_code_number me-lg-3">
						<input type="number" class="form-control" id="inputPlatecode" placeholder="Plate Code">
						<img class="logo-image" src="{{asset('public/assets/image/logo.png')}}" alt="">
						<input type="number" class="form-control" id="inputPlatecode" placeholder="Plate Number">
					</div>
					<div class="control-group file-upload me-lg-3" id="file-upload1">
                        <div class="image-box text-center menu_seting_img_box add_car_uplaod_box">
                            <p> <span>+</span> <br> <small> Attach Car Photo </small></p>
                            <img src="" alt="">
                        </div>
                        <div class="controls" style="display: none;">
                            <input type="file" name="contact_image_1">
                        </div>                       
                    </div>

				</div>
				<div class="col-lg-6 col-md-6">	
					<div class="select_vehicle_category_data">
						<div class="tab-content" id="v-pills-tabContent">
						  
						    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						    	<div class="add_car_vehicle_tab_data">
							    	<div class="form-group has-feedback add_car_search_bar">
									    <span class="search_input_icon"><i class="fas fa-search"></i></span>
									    <input type="text" class="form-control" placeholder="Search here">
									</div>
									<div class="px-4">
										<p class="vehicle_category"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/Acura.png " alt=" Acura ">Acura</p>

										<p class="vehicle_category"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/Alfa_Romeo.png " alt=" Alfa Romeo ">Alfa Romeo</p>				

										<p class="vehicle_category"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/Audi.png " alt=" Audi ">Audi</p>

										<p class="vehicle_category"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/Acura.png " alt=" Acura ">Austin</p>

										<p class="vehicle_category"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/BMW.png " alt=" BMW ">BMW</p>

										<p class="vehicle_category border-0"><img class="iconn-image add_carbrand_icon" src=" https://keno-app-prod.s3.me-south-1.amazonaws.com/public/images/car_logos2/Borgward.png " alt=" Borgward ">Borgward</p>
									</div>
								</div>

						    </div>
						    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						    	
						    	<div class="add_car_vehicle_tab_data">
							    	<div class="form-group has-feedback add_car_search_bar">
									    <span class="search_input_icon"><i class="fas fa-search"></i></span>
									    <input type="text" class="form-control" placeholder="Search Model">
									</div>
									<div class="px-4">										

										<p class="vehicle_category">164</p>				

										<p class="vehicle_category">4C</p>

										<p class="vehicle_category">Giulia</p>

										<p class="vehicle_category">Spider</p>

										<p class="vehicle_category border-0">Stelvio</p>

									</div>
								</div>

						    </div>

						    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

						    	<div class="add_car_vehicle_tab_data">
							    	<div class="form-group has-feedback add_car_search_bar">
									    <span class="search_input_icon"><i class="fas fa-search"></i></span>
									    <input type="text" class="form-control" placeholder="Search Year">
									</div>
									<div class="px-4">										

										<p class="vehicle_category">2021</p>				

										<p class="vehicle_category">2020</p>

										<p class="vehicle_category">2019</p>

										<p class="vehicle_category">2018</p>

										<p class="vehicle_category">2017</p>

										<p class="vehicle_category">2016</p>

										<p class="vehicle_category">2015</p>

										<p class="vehicle_category">2014</p>									

										<p class="vehicle_category border-0">2013</p>
										
									</div>
								</div>

						    </div>

						    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						    	
								 <div class="add_car_vehicle_tab_data">
								 	<ul class="px-4 vehicle_color_box">
								 		<li class="vehicle_color_box1"></li>
								 		<li class="vehicle_color_box2"></li>
								 		<li class="vehicle_color_box3"></li>
								 		<li class="vehicle_color_box4"></li>
								 		<li class="vehicle_color_box5"></li>
								 		<li class="vehicle_color_box3"></li>
								 		<li class="vehicle_color_box4"></li>
								 		<li class="vehicle_color_box1"></li>
								 		<li class="vehicle_color_box5"></li>
								 		<li class="vehicle_color_box2"></li>
								 		<li class="vehicle_color_box1"></li>
								 		<li class="vehicle_color_box4"></li>
								 	</ul>
								 </div>

						    </div>

						    <div class="tab-pane fade" id="v-pills-city" role="tabpanel" aria-labelledby="v-pills-city-tab">sdasd566sdas</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>	
<!----YOUR-CODE-HERE----->
@endsection