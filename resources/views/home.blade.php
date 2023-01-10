@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
 <!--  <link rel="stylesheet" href="/resources/demos/style.css">
		 -->
 <div class="content-body">
	<!-- row -->
	<div class="container-fluid">
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3> Dashboard </h3>
		   <p> Welcome to your Dashboard </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content">
			<ul class="list-inline">
				<li> 
				  <div class="change-period-box-main" id="toggle-form">
					<!-- <i class="far fa-calendar"></i> -->
					<span class="ti-calendar"></span>
					<div class="text-box-period">
					  <h5> Change periode </h5>
					  <small> August 28 - October 28, 2020</small>
					</div>
					<i class="fas fa-chevron-down"></i>
				  </div>
				  	
				  	<div class="position-relative">
					  	<div class="form-toggle-box change_periode_box mt-3">
					  	 	<span class="date-carret"><i class="fas fa-caret-up"></i></span>
							 <form action="" method="">							 
							   	<div class=" change_period_date_filed input-group d-flex date_filed">
									<!-- <form> -->
									<!-- <input type="text" id="datepicker-from" class="datepicker1 pl-5" placeholder="From"> -->
									
									<span class="change_periode_celender_icon"><span class="ti-calendar"></span></span>
									<div class="from_to">
										<span>from</span>
										<span>to</span>
									</div>									
									<input type="text" id="dashboard-change-periode" class="change_period_daterange" placeholder="To" >
									<!-- </form> -->
								</div>
							   <div class="input-group mb-4 date_filed">
								<input type="text" for="" name="" class="form-control"  value="" placeholder="Today">
								<i class="fas fa-chevron-right"></i>
							   </div>
							   <div class="form-submit-button-box">
								 <button type="reset" class="reset-button"> Reset </button>
								 <button type="submit" class="apply-button"> Apply </button>
							   </div>
							 </form>
					  	</div>	
					</div>  				  
				</li>

				<li> <a href="#" class="gree-custom-btn"> Generat Report</a> </li>
			 	
			</ul>
		   </div>
		  </div>
	    </div>
	
		<div class="row mt-22">
		  <div class="col-lg-3 w_20 w_100">
			<div class="chart-sidebar">
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>Daily Sales</h6>
						<p>Check out each colum for more details</p>
					</div>
					<!-- <span class="btn btn-primary light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect><rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect><path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path><rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect></g></svg>
					</span> -->
				</div>
				<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
					<canvas id="daily-sales-chart" height="85" style="height: 85px; display: block; width: 195px;" width="195" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
			<div class="card bg-card-01 mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>Todays Order</h6>
						<p>Check out each colum for more details</p>
					</div>
					<!-- <span class="btn btn-warning light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"></path><path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"></path></g></svg>
					</span> -->
				</div>
				<div class="card-body">
					<div class="chart-point">
						<div class="check-point-area"><div class="chartjs-size-monitor">
						<div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
							<canvas id="ShareProfit" width="100" height="100" style="display: block; width: 100px; height: 100px;" class="chartjs-render-monitor"></canvas>
						</div>
						<ul class="chart-point-list">
							<li><i class="fa fa-circle carwash-color mr-1"></i> Car Wash (78)</li>
							<li><i class="fa fa-circle detailing-color mr-1"></i> Detailing (52)</li>
							<li><i class="fa fa-circle  recovery-color mr-1"></i> Recovery (43)</li>
							<li><i class="fa fa-circle maintenance-color mr-1"></i> Maintenance (20)</li>
						</ul>	
					</div>
				</div>
			</div>
			<div class="card bg-card-02 mb-00">
				<div class="card-header align-items-start mb-3">
					<div>
						<h6>New User</h6>
						<p>Check out each colum for more details</p>
					</div>
					<!-- <span class="btn btn-info light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"></path><rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"></rect></g></svg>
					</span> -->
				</div>
				<div class="card-body">
					<p class="mb-2 d-flex"> Iphone
						<span class="pull-right text-warning ml-auto">85%</span>
					</p>
					<div class="progress mb-3" style="height:4px">
						<div class="progress-bar bg-danger progress-animated" style="width:85%; height:4px;" role="progressbar">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
					<p class="mb-2 d-flex"> Android
						<span class="pull-right text-success ml-auto">90%</span>
					</p>
					<div class="progress mb-3" style="height:4px">
						<div class="progress-bar bg-success progress-animated" style="width:90%; height:4px;" role="progressbar">
							<span class="sr-only">60% Complete</span>
						</div>
					</div>
				
				</div>
			  </div>
		    </div>
		  </div>
		
			<div class="col-lg-9">
				<div class="row">
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="card-body pb-0 px-4 pt-4">
								<div class="row">
									<div class="col dash-ic">
									   <!-- <i class="fas fa-dollar-sign"></i> -->
									  	<div class="dashboard_box_icon revenue_icon">
									  		<img class="menu_icons" src="{{asset('public/assets/image/revenue.png')}}" alt="">
										</div>
										<h5 class="mb-1"><span style="color:#0FCA93;">24,000</span><small>AED</small></h5>
										<p> Revenue</p>
										<span class="text-success" >+64.7%</span> </small> than last week </small>
									</div>
								</div>
							</div>
							<div class="chart-wrapper">
								<canvas id="areaChart_2" class="chartjs-render-monitor" height="90"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card bg-success	overflow-hidden uniq-ord">
							<div class="card-body pb-0 px-4 pt-4">
								<div class="row">
									<div class="col dash-ic">
									  <!-- <i class="fas fa-shopping-bag"></i> -->
									   	<div class="dashboard_box_icon unique_icon">
									   		<img class="menu_icons" src="{{asset('public/assets/image/unique_order.png')}}" alt="">
										</div>
										<h5 class="mb-1"><span style="color:#fff;">234 </span></h5>
										<p> Unique Orders </p>
										<span class="text-success" style="color:#fff !important;">+64.7%</span> <small style="color:#fff;"> than last week </small>
									</div>
								</div>
							</div>
							<div class="chart-wrapper" style="width:100%">
								<span class="peity-line" data-width="100%">6,2,8,4,3,8,4,3,6,5,9,2</span>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card bg-p-n overflow-hidden ne-user">
							<div class="card-body pb-0 px-4 pt-4">
								<div class="row">
									<div class="col dash-ic">
									   <!-- <i class="fas fa-user-plus"></i> -->
									   	<div class="dashboard_box_icon newuser_icon">
									    	<img class="menu_icons" src="{{asset('public/assets/image/new_user.png')}}" alt="">
										</div>
										<h5 class="mb-1"><span style="color:#fff;">234 </span></h5>
										<p style="color:#fff;"> New Users </p>
										<span class="text-success"style="color:#fff !important">+64.7%</span> <small style="color:#fff;"> than last week </small>
									</div>
								</div>
							</div>
							<div class="chart-wrapper px-2">
								<canvas id="chart_widget_2" height="100"></canvas>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="card-body px-4 py-4">
								<div class="chart-point">
									<div class="check-point-area">
										<canvas id="ShareProfit2"></canvas>
									</div>
									<ul class="chart-point-list">
										<li><i class="fa fa-circle text-primary mr-1"></i> iOS Users </li>
										<li><i class="fa fa-circle text-success mr-1"></i> Android Users </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	   </div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script type="text/javascript">
	
$(function() {
$("#dashboard-change-periode").daterangepicker();
});

// $(document).find( "#absent_daterange" ).daterangepicker({  locale: {format: 'DD-MM-YYYY',separator: " - "}, minDate:new Date(), });

</script>
@endsection
