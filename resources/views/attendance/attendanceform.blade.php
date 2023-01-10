 
    	<div class="modal-header">
	      	<div class="d-flex">
	        	<h5 class="modal-title me-3" id="exampleModalLabel">Mark as</h5>
				<p class="attendance_user_cell"><img src="{{$cleaner_pic}}" alt="" class="img-fluid"><span>{{$cleaner_name}}</span></p>    
	      	</div>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>

		  		<div id="errorMSG" style="display:none;" >
					<div class="alert alert-warning" role="alert" >
					<ul>
						<li id="error_message" ></li>
						</ul>
					</div>
				</div>

	      <div class="modal-body">	      	

	        <!-- main tabs -->

	        <div class="attendance_markas_modal">
		        <ul class="nav nav-pills" id="pills-tab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <div class="nav-link active" id="pills-present-tab" data-bs-toggle="pill" data-bs-target="#present" type="button" role="tab" aria-controls="present" aria-selected="true">		  
				    	<span class="p_a_circle"></span> Present
					</div>		   
				  </li>
				  <li class="nav-item" role="presentation">
				    <div class="nav-link " id="pills-absent-tab" data-bs-toggle="pill" data-bs-target="#absent" type="button" role="tab" aria-controls="absent" aria-selected="false">		    	
				    	 <span class="p_a_circle"></span> Absent
				    </div>
				  </li>		
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<!-- present tab -->
				  	<div class="tab-pane fade show active" id="present" role="tabpanel" aria-labelledby="pills-present-tab">
					<form action="{{route('present_form')}}" method="POST" id="present_form" >
							@csrf
			             	<div class="add-promo">
								<div class="add-promo d-flex">
								 	<div class="switch-promo">
								 		<span> <strong> Date </strong> </span>
								 		<span class="promoo"><input @if($date < date('Ymd')) disabled @endif name="date" type="text" id="present-date" class="datepicker1 pl-5" value="{{ date('M d, Y',strtotime($date)) }}" placeholder="" autocomplete="off" required ><i class="far fa-calendar"></i></span>
								 		<!-- <span> <i class="far fa-calendar"></i> </span> -->
									</div>
							   	</div>
							</div>							
					
							<div class="attendance_form_select">			
								<p>Select City</p>						
								<select class="" name="city" onchange="select_city(this.value)" @if($date < date('Ymd')) disabled @endif required >
								<option value="" ></option>
 								@if(!empty($allcity))
 									@foreach($allcity as $city)
								  	<option @if(!empty($city->_id)) @if($city->_id == $city_id) selected @endif @endif value="@if(!empty($city->_id)){{$city->_id}}@endif">@if(!empty($city->name)){{$city->name}}@endif</option>
									@endforeach
 								@endif
								</select>				     
							</div>
							
							<div>
								
								<div class="attendance_form_select" id="zoneclusterdiv">			
									<p>Select Zone Cluster</p>					
									<select class="" id="zonecluster" name="zonecluster" required @if($date < date('Ymd')) disabled @endif >  
										@if(!empty($zones))
											@foreach($zones as $zonelists)
												<option value="@if(!empty($zonelists->_id)){{$zonelists->_id}}@endif"  @if(!empty($zonelists->_id) && !empty($zone_id)) @if($zonelists->_id == $zone_id) selected @endif @endif  >@if(!empty($zonelists->name)){{$zonelists->name}}@endif</option>
											@endforeach
										@endif
									</select>							     
								</div>
								
								<div class="accordion-item attendance_accordion_item" id="setdefault" style="display:none;">
	                                <h2 class="accordion-head mb-0">
	                                    Set Default
	                                </h2>
	                                <div class="switch">
								  		<input type="checkbox" name="setdefault" value="1" id="actionswitch" @if($date < date('Ymd')) disabled @endif >
								 		<label for="actionswitch"></label> 
									</div>	
	                            </div>
							</div>

							<div class="mb-3 select_filed">
							  <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
							  <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" required placeholder="Write Comment here" @if($date < date('Ymd')) disabled @endif >@if(!empty($comment)){{$comment}}@endif</textarea>
							</div> 
							<input type="text" style="position:absolute;left:-1000000000px" value="{{$cleaner_id}}" name="cleaner_id" />   
							
							
							<div class="add-zones-button mt-2">
								<button type="button" class="btn btn-danger light float-left" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
								<button type="submit" onclick="return $('#present_formm').valid()" class="btn custom-btn-black" @if($date < date('Ymd')) style="background-color: #000000;" disabled @endif >Submit</button>
							</div> 	
					</form>
				       
				  		<!-- close -->			  	
				  	</div>
				  	<!-- close -->

				  	<!-- absent tab -->
				  	<div class="tab-pane fade" id="absent" role="tabpanel" aria-labelledby="pills-absent-tab">
					  	<div>
						  	<ul class="nav nav-pills" id="pills-tab" role="tablist">
							  <li class="nav-item" role="presentation">
							    <div class="nav-link" id="pills-full-day-tab" data-bs-toggle="pill" data-bs-target="#pills-full-day" type="button" role="tab" aria-controls="pills-full-day" aria-selected="true">
							    	<span class="p_a_circle"></span> Full Day
							    </div>
							  </li>
							  <li class="nav-item" role="presentation">
							    <div class="nav-link active" id="pills-half-day-tab" data-bs-toggle="pill" data-bs-target="#pills-half-day" type="button" role="tab" aria-controls="pills-half-day" aria-selected="false">
							    	<span class="p_a_circle"></span> Half Day
							    </div>
							  </li>							  
							</ul>

							<div class="tab-content" id="pills-tabContent">
								<!-- full day code -->
							  	<div class="tab-pane fade show" id="pills-full-day" role="tabpanel" aria-labelledby="pills-full-day-tab">

								  	<form action="{{route('absent_fullday')}}" method="POST" id="absent_fullday" >							  			
	 								@csrf
							             	<div class="add-promo">
												<div class="add-promo d-flex">
												 	<div class="switch-promo">
												 		<span> <strong> Date Range </strong></span>
												 		<span class="promoo"><input @if($date < date('Ymd')) disabled @endif name="absent_daterange" type="text" id="absent_daterange" class="datepicker1 pl-5" value="" placeholder="" autocomplete="off" required > <i class="far fa-calendar"></i> </span>
													</div>
											   	</div>
											</div>
											
											<div class="attendance_form_select">			
												<p>Absent Reason</p>						
												<select class="" name="absent_reason" @if($date < date('Ymd')) disabled @endif required >
													<option value="" ></option>
												  	<option value=3 @if($absent_reason == 3) selected @endif >Emergency</option>
												  	<option value=0 @if($absent_reason == 0) selected @endif >Off</option> 
												  	<option value=1 @if($absent_reason == 1) selected @endif >Leave</option>
												  	<option value=2 @if($absent_reason == 2) selected @endif >Vacation</option>
													<option value=100 @if($absent_reason == 100) selected @endif >Other</option>
												</select>								     
											</div>

											<div class="mb-3 select_filed">
											   <label for="validationCustom01" class="form-label">Approved By</label>
											   <input required type="text" value="{{$approve_by}}" class="form-control" name="approve_by" id="validationCustom01" placeholder="Enter Name" @if($date < date('Ymd')) disabled @endif >							  
											</div>

											<div class="mb-3 select_filed">
											  <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
											  <textarea required class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3" placeholder="Write Comment here" @if($date < date('Ymd')) disabled @endif >@if(!empty($comment)){{$comment}}@endif</textarea>
											</div>	

											<input type="hidden" value="{{$date}}" name="date" /> 
											<input type="text" style="position:absolute;left:-1000000000px" value="{{$cleaner_id}}" name="cleaner_id" /> 
											
											<div class="add-zones-button mt-2">
												<button class="btn btn-danger light float-left" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
												<button type="submit" class="btn custom-btn-black" @if($date < date('Ymd')) style="background-color: #000000;" disabled @endif >Submit</button>
											</div>
									</form>				  		
							  	</div>
							  	<!-- close -->

							  	<!-- half day code -->
							  	<div class="tab-pane fade  active" id="pills-half-day" role="tabpanel" aria-labelledby="pills-half-day-tab">
							  								  		
								<form action="{{route('absent-halfday')}}" method="POST" id="absent_halfday" >
								@csrf
									<div class="form-check form-check-inline attendance_modal_radio" id="attendance_time_radio-1">
									  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required @if($halfday_f == "09:00" ) checked @endif  @if($date < date('Ymd')) disabled @endif >
									  <label class="form-check-label" for="inlineRadio1"> 09AM - 03PM</label>
									</div>
									<div class="form-check form-check-inline attendance_modal_radio" id="attendance_time_radio-2">
									  <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" required @if($halfday_f == "15:00" ) checked @endif @if($date < date('Ymd')) disabled @endif >
									  <label class="form-check-label" for="inlineRadio2">03PM - 09PM</label>
									</div>

										<div class="tab-content" id="pills-tabContent">
											
											<div class="tab-pane fade show active" id="pills-time-first" role="tabpanel" aria-labelledby="pills-time-first-tab">

												<div class="attendance_form_select">			
													<p>Absent Reason</p>						
													<select class="" name="absent_reason" @if($date < date('Ymd')) disabled @endif required >
														<option value="" ></option>
														<option value=3 @if($absent_reason == 3) selected @endif >Emergency</option>
												  		<option value=0 @if($absent_reason == 0) selected @endif >Off</option> 
												  		<option value=1 @if($absent_reason == 1) selected @endif >Leave</option>
												  		<option value=2 @if($absent_reason == 2) selected @endif >Vacation</option>
														<option value=100 @if($absent_reason == 100) selected @endif >Other</option>
													</select>								     
												</div>

												<div class="mb-3 select_filed">
													<label for="validationCustom01" class="form-label">Approved By</label>
													<input required type="text" value="{{$approve_by}}" class="form-control" name="approve_by" id="validationCustom01" placeholder="Enter Name" @if($date < date('Ymd')) disabled @endif >							  
												</div>

												<div class="mb-3 select_filed">
													<label for="exampleFormControlTextarea1" class="form-label">Comment</label>
													<textarea required class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3" placeholder="Write Comment here" @if($date < date('Ymd')) disabled @endif >@if(!empty($comment)){{$comment}}@endif</textarea>
												</div>	

												<input type="hidden" value="{{$date}}" name="date" /> 
												<input type="text" style="position:absolute;left:-1000000000px" value="{{$cleaner_id}}" name="cleaner_id" />   
												
												<div class="add-zones-button mt-2">
													<button type="button" class="btn btn-danger light float-left" data-dismiss="modal" aria-label="Close">Cancel</button>
													<button type="submit" class="btn custom-btn-black" @if($date < date('Ymd')) style="background-color: #000000;" disabled @endif >Submit</button>
												</div>											
											</div>
											<!-- close -->											

										</div>	
								</form>

							  	</div>
							  	<!-- close -->							  	
							</div>
						</div>		
				  	</div>		
				  	<!-- close -->
				</div>			
			</div>	

	        <!-- main tab close  -->
	      </div>
 
<!--js date range --> 