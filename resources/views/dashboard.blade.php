@extends('layouts.app')

@section('content')
     
	 
	 <div class="left-side-navv">
     @extends('layouts.sidebar')
	   
     @extends('layouts.fixed_s')
	
     
	 </div>
          @extends('layouts.headerup')
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
					  <div class="change-period-box-main">
					    <!-- <i class="far fa-calendar"></i> -->
					    <span class="ti-calendar"></span>
						<div class="text-box-period">
						  <h5> Change periode </h5>
						  <small> August 28 - October 28, 2020</small>
						</div>
						<i class="fas fa-chevron-down"></i>
					  </div>
					 </li>
					 <li> <a href="#" class="gree-custom-btn"> Generat Report</a> </li>
					</ul>
				  </div>
				</div>
			  </div>
		
                <div class="row">
					<div class="col-xl-9 col-xxl-12 p-0">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">2000</h5>
												<span class="text-success">Total Sale</span>
											</div>
										</div>
									</div>
									<div class="chart-wrapper">
										<canvas id="areaChart_2" class="chartjs-render-monitor" height="90"></canvas>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card bg-success	overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col">
												<h5 class="text-white mb-1">$14000</h5>
												<span class="text-white">Total Eraning</span>
											</div>
										</div>
									</div>
									<div class="chart-wrapper" style="width:100%">
										<span class="peity-line" data-width="100%">6,2,8,4,3,8,4,3,6,5,9,2</span>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
								<div class="card bg-primary overflow-hidden">
									<div class="card-body pb-0 px-4 pt-4">
										<div class="row">
											<div class="col text-white">
												<h5 class="text-white mb-1">570</h5>
												<span>VIEWS OF YOUR PROJECT</span>
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
										<h5 class="mb-3">1700 / <small class="text-primary">Sales Status</small></h5>
										<div class="chart-point">
											<div class="check-point-area">
												<canvas id="ShareProfit2"></canvas>
											</div>
											<ul class="chart-point-list">
												<li><i class="fa fa-circle text-primary mr-1"></i> 40% Tickets</li>
												<li><i class="fa fa-circle text-success mr-1"></i> 35% Events</li>
												<li><i class="fa fa-circle text-warning mr-1"></i> 25% Other</li>
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
        <!--**********************************
            Content body end
        ***********************************-->
        @endsection
