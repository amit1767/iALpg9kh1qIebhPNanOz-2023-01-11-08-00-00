@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">	  
		<div class="row">
			<div class="col-lg-3 col-md-12">
			    <div class="heading-content-nav">
			   		<h3> Daily Schedule </h3>
			   		<p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Daily Schedule </small> </p>
			  	</div>
			</div>

			<div class="col-lg-9 col-md-12">
			  	<div class="dashboard-right-content dashboard-r-c-res">
					<ul class="list-inline list-in-res">
						<li class="order-searchh common_search_box_2">
							<form action="{{route('search-ninja')}}" method="POST" id="search_ninja" >
							 @csrf
								<input class="form-control search_option" name="search_ninja" type="search" placeholder="&#xF002; Search" aria-label="Search" required>
								<input type="hidden" name="default_page_value" value="0" >
							</form>	
						</li>			 
						<!-- by ninja, user name, mobile, email -->
						<li class="time_filter_box me-lg-3 me-md-3 me-sm-0 dropdown_box_link"> 
							<div class="change-period-box-main filter_by_city" id="toggle-form">
								<div class="d-inline-flex align-items-center">							
									<span class="ti-filter"></span>
									<div class="text-box-period">
									  <h5> Filter by city </h5>
									  <small> @if(!empty($cityList)) @if(!empty($cityList->name)) {{$cityList->name}} @endif @endif </small>
									</div>
								</div>
								<i class="fas fa-chevron-down"></i>
							</div>
						  	
						  	<div class="position-relative">
								<form method="POST" action="{{route('attendance-by-city')}}" >
								@csrf								  	
									<div class="form-toggle-box change_periode_box time_filter_content dropdown_content_box">
								  		<span class="date-carret"><i class="fas fa-caret-up"></i></span>
													   
									   	<!-- <div class=" change_period_date_filed input-group d-flex date_filed"> 					
											<input name="fromdate" type="text" id="datepicker-from" class="datepicker1 pl-5" placeholder="From" autocomplete="off" required >
											
											<span class="change_periode_celender_icon"><i class="far fa-calendar"></i></span>
											
											<input name="todate" type="text" id="datepicker-to" class="datepicker1" placeholder="To" autocomplete="off" required >								
										</div> -->
									   	<div class="input-group mb-4 date_filed">							
											<select name="city" id="city" required class="date_today_dropdown form-select form-select-sm" aria-label=".form-select-sm example">
												<option value=''>All</option>
												@if(!empty($allcity))
	 												@foreach($allcity as $city)
									  					<option value="@if(!empty($city->_id)){{$city->_id}}@endif">@if(!empty($city->name)){{$city->name}}@endif</option>
													@endforeach
	 											@endif
											</select>
									   	</div>
										<input type="hidden" name="default_page_value" value="0" >
									   	<div class="form-submit-button-box">
										   	<a href="{{route('attendance')}}" type="reset" class="reset-button" > Reset </a>
										 	<button type="submit" class="apply-button" > Apply </button>
									   	</div>								
									</div>	
								</form>
							</div>		  
						</li>

						<li class="time_filter_box dropdown_box_link"> 
							<div class="change-period-box-main filter_by_city" id="toggle-form-1">
								<div class="d-inline-flex align-items-center">							
									<span class="ti-filter"></span>
									<div class="text-box-period">
									  <h5> Zone Cluster </h5>
									  <small> @if(!empty($ZoneList->name)) {{$ZoneList->name}} @endif </small>
									</div>
								</div>
								<i class="fas fa-chevron-down"></i>
							</div>
						  	
						  	<div class="position-relative">			
								<form method="POST" action="{{route('attendance-by-zone-cluster')}}" >
								@csrf
								<div class=" form-toggle-box01 change_periode_box time_filter_content dropdown_content_box">
							  		<span class="date-carret"><i class="fas fa-caret-up"></i></span>
												   
								   	<!-- <div class=" change_period_date_filed input-group d-flex date_filed"> 					
										<input name="fromdate" type="text" id="datepicker-from-1" class="datepicker1 pl-5" placeholder="From" autocomplete="off" required >
										
										<span class="change_periode_celender_icon"><i class="far fa-calendar"></i></span>
										
										<input name="todate" type="text" id="datepicker-to-1" class="datepicker1" placeholder="To" autocomplete="off" required >				

									</div> -->
								   	<div class="input-group mb-4 date_filed">

										<select name="zone" id="zone" required class="date_today_dropdown form-select form-select-sm" aria-label=".form-select-sm example">
											<option value=''>All</option>
											@if(!empty($zones))
											@foreach($zones as $zonelist)
												<option value="@if(!empty($zonelist->_id)){{$zonelist->_id}}@endif">@if(!empty($zonelist->name)) {{$zonelist->name}} @endif</option>
											@endforeach
										 	@endif
										</select>
								   	</div>
									<input type="hidden" name="default_page_value" value="0" >
								   	<div class="form-submit-button-box">
									   	<a href="{{route('attendance')}}" type="reset" class="reset-button" > Reset </a>
									 	<button type="submit" class="apply-button" > Apply </button>
								   	</div>	
									   <!--   onclick="return $('#zonecluster').valid()"    -->
								</div>	
								</form>
							</div>		  
						</li>						

						<li class="">
							<a href="javascript:void(0)" class="import_btn"  id="toggle-form-2"><span class="ti-plus"> </span> Import </a>

							<div class="position-relative">			
								<form method="POST" action="{{route('importfile')}}" enctype="multipart/form-data" >
								@csrf								
								<div class="form-toggle-box02 change_periode_box time_filter_content import_dropdown ">
							  		<span class="date-carret"><i class="fas fa-caret-up"></i></span>
									<input type="file" name="import_file" class="form-control" required>
									<div class="d-flex align-items-center justify-content-between">							
										<a class="btn btn-danger import_cancle_btn " id="import-close" > Cancel </a>
										<button type="submit" class="gree-custom-btn export_btn"> Submit </button>
									</div>
								</div>	
								</form>
							</div>
					  	</li>

						<li> 
							<form method="POST" action="{{route('exportfile')}}" id="exportform" >
							@csrf
								<input type="hidden" name="currentmonth" id="currentmonth" value="@if(!empty($month_dates)){{$month_dates[0]}}@endif" >
								<a href="javascript:void(0)" id="export" onclick="document.getElementById('exportform').submit()" class="gree-custom-btn export_btn"><i class="fas fa-file-alt"></i> Export </a> 
							</form>
						</li>			
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

  		<!-- attendance Table -->
	  	<div class="row"> 
	  		<div class="col-lg-12">
		  		<div class="attendance_sheet">
		  			<div class="attendance_sheet_top_heading">
		  				<div class="attendance_sheet_arrow">		  							  			
		  					<span class="ti-angle-left preme @if(Session::has('is_active')) @if(Session::get('is_active') == 'week' ) attendance-week @else attendance-m-w @endif @else attendance-m-w @endif " data-angle_value="0" style="cursor: pointer;"></span>
		  					<span class="ti-angle-right nextme @if(Session::has('is_active')) @if(Session::get('is_active') == 'week' ) attendance-week @else attendance-m-w @endif @else attendance-m-w @endif " data-angle_value="1" style="cursor: pointer;"></span>
		  				</div>
		  				
					  	<ul class="nav nav-pills change_w-m_btn" id="pills-tab" role="tablist">
						  	<li class="nav-item" role="presentation">
						   		<button class="nav-link @if(Session::has('is_active')) @if(Session::get('is_active') == 'week' ) active @endif @endif " data-btn="attendance-week" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Week</button>
						  	</li>
						  	<li class="nav-item" role="presentation">
						    	<button class="nav-link @if(Session::has('is_active')) @if(Session::get('is_active') == 'month' ) active @endif @else active @endif " data-btn="attendance-m-w" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Month</button>
						  	</li>						  	
						</ul>
					</div>

					<div class="tab-content" id="pills-tabContent">
					  	<div class="tab-pane fade attendance_week_table @if(Session::has('is_active')) @if(Session::get('is_active') == 'week' ) active @endif @endif " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						  	<h5 class="atten_sh_caption">
							  	@if(Session::has('week'))
									@if(!empty($week_start)){{date('M d',strtotime($week_start))}}@if(date('Y',strtotime($week_start)) != date('Y',strtotime($week_end))),{{date('Y',strtotime($week_start))}}@endif @endif - @if(date('M',strtotime($week_start)) == date('M',strtotime($week_end))){{date('d',strtotime($week_end))}}@else{{date('M d',strtotime($week_end))}}@endif,{{date('Y',strtotime($week_end))}}
								@else 
									@if(date('M',strtotime('sunday last week')) == date('M',strtotime('saturday this week'))) {{date('M d',strtotime('sunday last week'))}} - {{date('d',strtotime('saturday this week'))}},{{date('Y')}} @endif @if(date('M',strtotime('sunday last week')) != date('M',strtotime('saturday this week'))) {{date('M d',strtotime('sunday last week'))}},@if(date('Y',strtotime('sunday last week')) != date('Y',strtotime('saturday this week')) ){{date('Y',strtotime('sunday last week'))}}@endif - {{date('M d',strtotime('saturday this week'))}},{{date('Y',strtotime('saturday this week'))}} @endif 
								@endif
							</h5>
							  
						  		<!-- Dubai,  Jumairah zone week days-->
						  		<table class="table table-responsive table-bordered">
								 	<thead>
								 		<tr>
								 			<th scope="col" rowspan="2" class="attendance_placezone"> @if(!empty($ZoneList->name)) {{$ZoneList->name}} @endif @if(!empty($cityList->name)) {{$cityList->name}} @endif @if(empty($ZoneList->name) && empty($cityList->name) && empty($keyword)) All Ninja @endif </th>
								 			<th colspan="24" class="text-center">
												@if(Session::has('week'))
													@if(!empty($week_start)){{date('M d',strtotime($week_start))}}@if(date('Y',strtotime($week_start)) != date('Y',strtotime($week_end))),{{date('Y',strtotime($week_start))}}@endif @endif - @if(date('M',strtotime($week_start)) == date('M',strtotime($week_end))){{date('d',strtotime($week_end))}}@else{{date('M d',strtotime($week_end))}}@endif,{{date('Y',strtotime($week_end))}}
												@else 
													@if(date('M',strtotime('sunday last week')) == date('M',strtotime('saturday this week'))) {{date('M d',strtotime('sunday last week'))}} - {{date('d',strtotime('saturday this week'))}},{{date('Y')}} @endif @if(date('M',strtotime('sunday last week')) != date('M',strtotime('saturday this week'))) {{date('M d',strtotime('sunday last week'))}},@if(date('Y',strtotime('sunday last week')) != date('Y',strtotime('saturday this week')) ){{date('Y',strtotime('sunday last week'))}}@endif - {{date('M d',strtotime('saturday this week'))}},{{date('Y',strtotime('saturday this week'))}} @endif 
												@endif
											</th>
								 		</tr>
									    <tr>

									@foreach($week_d as $d_week) 
										
										  <th scope="col" colspan=""> {{date('l',strtotime($d_week))}} </th>
										
									@endforeach

									    </tr>
								  	</thead>
								  	<tbody>
								@if(!empty($ninja_attendance1))
									@foreach($ninja_attendance1 as $ninja)
									    <tr>
									      <td scope="row" class="attendance_user_cell" ><img src="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" alt="" class="img-fluid"><span>@if(!empty($ninja->name)) {{$ninja->name}} @endif</span></td>								
									     
									@if(!empty($ninja->attendance))
									
										@php $ninja_cleaner=array(); $att_detail=array(); @endphp
									   
									   	@foreach($ninja->attendance as $attendance)
										 	@php $ninja_cleaner[]=$attendance->date; 
										 	$att_detail[$attendance->date]=$attendance; @endphp 
									 	@endforeach
						 
									 	@foreach($week_d as $d_week)
										 
									  	 @if(in_array($d_week,$ninja_cleaner))

									  		@php $attendance=$att_detail[$d_week]; @endphp 

											@if(!empty($attendance->absent_dates)) @php  $len = count($attendance->absent_dates) - 1 ;  @endphp 
											@if($len > 0) @php $startdate=date('d/m/Y', strtotime($attendance->absent_dates[0])); $enddate=date('d/m/Y', strtotime($attendance->absent_dates[$len])); @endphp 
											@else @php $startdate=date('d/m/Y', strtotime($attendance->absent_dates[0])); $enddate=date('d/m/Y', strtotime($attendance->absent_dates[0])); @endphp
											@endif
											@endif

										   	<td class="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) atten_sh_color_cell atten_sh_P_caribbean_green @endif @endif
												   @if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) atten_sh_color_cell atten_sh_A_pastel_red @endif @endif
												   @if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) atten_sh_color_cell atten_sh_H_salmon_pink @endif @endif @endif" 
											 	id="ninja-attendance" data-date="@if(!empty($attendance->date)){{$attendance->date}}@endif" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" 
											 	data-city_name="@if(!empty($attendance->zone_cluster[0]->cities[0]->name)){{$attendance->zone_cluster[0]->cities[0]->name}}@endif" data-city_id="@if(!empty($attendance->zone_cluster[0]->cities[0]->_id)){{$attendance->zone_cluster[0]->cities[0]->_id}}@endif"
											 	data-zone_id="@if(!empty($attendance->zone_cluster[0]->_id)){{$attendance->zone_cluster[0]->_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" data-zone_name="@if(!empty($attendance->zone_cluster[0]->name)){{$attendance->zone_cluster[0]->name}}@endif" 
												data-absent_reason="@if(!empty($attendance->absent_reason)){{$attendance->absent_reason}}@endif" data-approve_by="@if(!empty($attendance->approve_by)){{$attendance->approve_by}}@endif"
												data-halfDay-f="@if(!empty($attendance->halfDay[0]->from)){{$attendance->halfDay[0]->from}}@endif" data-halfDay-t="@if(!empty($attendance->halfDay[0]->to)){{$attendance->halfDay[0]->to}}@endif"
												data-present="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif" data-absent_fullday="@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif"
												data-absent_halfday="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif"
												data-celldate="@if(!empty($attendance->date)){{date('d-m-Y',strtotime($attendance->date))}}@endif" data-startdate="@if(!empty($startdate)){{$startdate}}@endif" data-enddate="@if(!empty($enddate)){{$enddate}}@endif" data-comment="@if(!empty($attendance->comment)){{$attendance->comment}}@endif" data-today_date="{{date('Ymd')}}" data-is_active="1" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										 	  	
											   	@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif
											   	@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif
												@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif
										  	</td>
											
									   	@else
										   
										   <td id="ninja-attendance" data-date="{{$d_week}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($d_week))}}" data-is_active="1" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										   
										   </td>
										   
									   @endif
									   
									   @endforeach
										
									@else
										@foreach($week_d as $d_week) 
											<td id="ninja-attendance" data-date="{{$d_week}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($d_week))}}" data-is_active="1" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										  
											</td>
										@endforeach
									@endif

									    </tr>
									@endforeach
								@endif
											    					  
								  	</tbody>
								</table>
						  		<!-- close -->
								  		  
					  	</div>


					  	<div class="tab-pane fade @if(Session::has('is_active')) @if(Session::get('is_active') == 'month' ) active @endif @else active @endif " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
					  		<h5 class="atten_sh_caption"> @if(!empty($month)) @if(gettype($month)=='string') {{$month}} @else {{$month[0]}} - {{$month[1]}} @endif @endif
								   </h5>
					  		<!-- Dubai,  Jumairah zone mont days-->
						  		<table class="table table-responsive table-bordered">
								 	<thead>
									    <tr>
									      <th scope="col" class="attendance_placezone"> @if(!empty($ZoneList->name)) {{$ZoneList->name}} @endif @if(!empty($cityList->name)) {{$cityList->name}} @endif @if(empty($ZoneList->name) && empty($cityList->name) && empty($keyword)) All Ninja @endif </th>
					
									@foreach($month_dates as $mdays)	
										  <th scope="col" colspan=""> {{substr(date('d D',strtotime($mdays)),0,4)}}</th>
							  		@endforeach

									    </tr>
								  	</thead>
								  	<tbody>
									 
								@if(!empty($ninja_attendance))
									@foreach($ninja_attendance as $ninja)
									    <tr> 
									
									     <td scope="row" class="attendance_user_cell" ><img src="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" alt="" class="img-fluid"><span>@if(!empty($ninja->name)) {{$ninja->name}} @endif</span></td>
									@if(!empty($ninja->attendance))

										@php $ninja_cleaner=array(); $att_detail=array(); @endphp
									   
							  			@foreach($ninja->attendance as $attendance)
											@php $ninja_cleaner[]=$attendance->date; 
											$att_detail[$attendance->date]=$attendance; @endphp 
										@endforeach
							
										@foreach($month_dates as $mdays)
										  @if(in_array($mdays,$ninja_cleaner))
										  
										 @php $attendance=$att_detail[$mdays]; $absent_date=''; @endphp
										 @if(!empty($attendance->absent_dates)) @php  $absent_date = implode(" ",$attendance->absent_dates); @endphp @endif

										  	<td class="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) atten_sh_color_cell atten_sh_P_caribbean_green @endif @endif
							  						@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) atten_sh_color_cell atten_sh_A_pastel_red @endif @endif
													@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) atten_sh_color_cell atten_sh_H_salmon_pink @endif @endif @endif" 
												id="ninja-attendance" data-date="@if(!empty($attendance->date)){{$attendance->date}}@endif" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" 
												data-city_name="@if(!empty($attendance->zone_cluster[0]->cities[0]->name)){{$attendance->zone_cluster[0]->cities[0]->name}}@endif" data-city_id="@if(!empty($attendance->zone_cluster[0]->cities[0]->_id)){{$attendance->zone_cluster[0]->cities[0]->_id}}@endif"
											 	data-zone_id="@if(!empty($attendance->zone_cluster[0]->_id)){{$attendance->zone_cluster[0]->_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" data-zone_name="@if(!empty($attendance->zone_cluster[0]->name)){{$attendance->zone_cluster[0]->name}}@endif"
												data-absent_reason="@if(!empty($attendance->absent_reason)){{$attendance->absent_reason}}@endif" data-approve_by="@if(!empty($attendance->approve_by)){{$attendance->approve_by}}@endif" 
												data-halfDay-f="@if(!empty($attendance->halfDay[0]->from)){{$attendance->halfDay[0]->from}}@endif" data-halfDay-t="@if(!empty($attendance->halfDay[0]->to)){{$attendance->halfDay[0]->to}}@endif"
												data-present="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif" data-absent_fullday="@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif"
												data-absent_dates="{{$absent_date}}" data-comment="@if(!empty($attendance->comment)){{$attendance->comment}}@endif" data-absent_halfday="@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif"
												data-celldate="@if(!empty($attendance->date)){{date('d-m-Y',strtotime($attendance->date))}}@endif" data-today_date="{{date('Ymd')}}" data-is_active="2" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
												
							  					@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==0) P @endif @endif
							  					@if(isset($attendance->is_present) && $attendance->is_present==false) @if(isset($attendance->absent_type) && $attendance->absent_type==0) A @endif @endif
												@if(isset($attendance->is_present) && $attendance->is_present==true) @if(isset($attendance->present_type) && $attendance->present_type==1) @if(isset($attendance->absent_type) && $attendance->absent_type==1) H @endif @endif @endif
											</td>
						
										  @else
										  	<td id="ninja-attendance" data-date="{{$mdays}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($mdays))}}" data-is_active="2" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										      
											</td>
										  @endif
							  			@endforeach

									@else
										@foreach($month_dates as $mdays)	 
											<td  id="ninja-attendance" data-date="{{$mdays}}" data-cleaner_name="@if(!empty($ninja->name)){{$ninja->name}}@endif" data-cleaner_id="@if(!empty($ninja->id)){{$ninja->id}}@endif" data-city_name="" data-city_id=""
												data-zone_id="" data-today_date="{{date('Ymd')}}" data-default_zone_id="@if(!empty($ninja->default_zone_id)){{$ninja->default_zone_id}}@endif" data-cleaner_pic="@if(!empty($ninja->cleaner_avatar->default_path)){{$ninja->cleaner_avatar->default_path}}@endif" 
												data-celldate="{{date('d-m-Y',strtotime($mdays))}}" data-is_active="2" data-zone_name="" data-bs-toggle="modal" data-bs-target="#exampleModal" >    
										   
											</td>
							  			@endforeach
									@endif
									 
									    </tr>
									@endforeach
								@endif

								  	</tbody>
								</table>
						  		<!-- close -->
					  	</div>
					  	<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">asdassd</div>
					</div>
				</div>
			</div>
	  	</div>
  	</div>
  	

  	<!-- close -->
</div>
	
        <!--**********************************
            Content body end
        ***********************************-->


<input type="hidden" id="current_month" value="@if(!empty($month_dates)){{$month_dates[0]}}@endif" >
<input type="hidden" id="current_week" value="@if(Session::has('week')){{$weekdates[0]}}-{{$weekdates[1]}}@else{{date('Ymd',strtotime('sunday last week'))}}-{{date('Ymd',strtotime('saturday this week'))}}@endif" >

<input type="hidden" id="default_page" @if(isset($d_value)) value="{{$d_value}}" @else value="1" @endif >
<input type="hidden" id="zone_cluster" value="@if(!empty($ZoneList->_id)){{$ZoneList->_id}}@endif" >
<input type="hidden" id="city_id" value="@if(!empty($cityList->_id)){{$cityList->_id}}@endif" >
<input type="hidden" id="search_key" value="@if(!empty($keyword)){{$keyword}}@endif" >

<input type="hidden" id="fromdate" value="@if(!empty($fromDate)){{$fromDate}}@endif" >
<input type="hidden" id="todate" value="@if(!empty($toDate)){{$toDate}}@endif" >

<input type="hidden" id="attendance_month_url" value="{{route('attendancemonth')}}" >
<input type="hidden" id="attendance_week_url" value="{{route('attendanceweek')}}" >
		

<!-- Mark as modal -->

<!-- Modal -->

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content" id="attendancemodel">

	      	      
	    </div>
	  </div>
	</div>

<!-- Modal -->

<!-- page js -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>



<script type="text/javascript">

//datepicker filter city js
$(function() {
$( "#datepicker-from" ).datepicker();
});

$(function() {
$( "#datepicker-to" ).datepicker();
});

//datepicker filter zone cluster js

$(function() {
$( "#datepicker-from-1" ).datepicker();
});


$(function() {
$( "#datepicker-to-1" ).datepicker();
});

// import dropdown js
    $("#toggle-form-2").click(function(e){
      $(".form-toggle-box02").toggleClass("form-showw02");
      e.stopPropagation();
    });
	$("#import-close").click(function(){
      $(".form-toggle-box02").toggleClass("form-showw02");
    });

	
</script>


<!----END-YOUR-CODE-HERE----->
@endsection