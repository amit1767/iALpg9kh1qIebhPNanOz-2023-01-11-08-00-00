@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  
<style>
div#toggle-form {
    margin-left: 25px;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 10px 25px;
    border-bottom: 0 !important;
}
table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    background-position: left !important;
}
table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
    border-top: 0 !important;
}
tr:first-child , td:first-child { border-top-left-radius: 10px; }
tr:first-child , td:last-child { border-top-right-radius: 10px; }
tr:last-child , td:first-child { border-bottom-left-radius: 10px; }
tr:last-child , td:last-child { border-bottom-right-radius: 10px; }

.tabs_wrapper-customer-detailss ul.tabs{
	width:20%;
}
.tabs_wrapper-customer-detailss .tab_container{
	width:79%;
}

.chart-sidebar .card {
    padding: 20px 0;
    box-shadow: none;
}

</style>

<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		 <div class="heading-content-nav">
		   <h3> Subscription  </h3>
		   <p> <small><img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""></small> > <small> Subscription  </small> </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
		   <ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_2">
			 <form>
			   <input class="form-control" type="search" placeholder="&#xF002; Search" aria-label="Search">
			 </form>
			</li> 
			 <li> 
			  <div class="column-setting">
			   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">
			   	<!-- <i class="fas fa-retweet"></i>  -->
			   	<span class="ti-exchange-vertical mr-2"></span>Column Setting </a>
			   
			   <!-- Modal -->
				<div class="modal fade" id="exampleModalCenter01">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Column Setting</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							 	<div class="column-setting-box">
								    <div class="col-set-box connected-sortable droppable-area1">
									  <p class="draggable-item"> <input type="checkbox"/> <span> Customer ID </span> <i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> First Name </span><i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> Last Name  </span><i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> Mobile </span><i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> Email </span> <i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> Package </span> <i class="fas fa-arrows-alt"></i> </p>
									  <p class="draggable-item"> <input type="checkbox"/> <span> Renewal </span> <i class="fas fa-arrows-alt"></i> </p>
									</div>
									
							 	</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-black-new float-right"> Apply</button>
							</div>
							
						</div>
					</div>
				  </div>
			   
			   </div>
			 </li>
			 
			 <li> 
			  <div class="change-period-box-main" id="toggle-form">
				<i class="far fa-calendar"></i>
				<div class="text-box-period">
				  <h5> Change periode </h5>
				  <small> August 28 - October 28, 2020</small>
				</div>
				<i class="fas fa-chevron-down"></i>
			  </div>
			  
			  <div class="form-toggle-box change_periode_box">
			  	<span class="date-carret"><i class="fas fa-caret-up"></i></span>
				 <form action="" method="">	

				   <div class=" change_period_date_filed input-group d-flex date_filed">					
						<span class="change_periode_celender_icon"><span class="ti-calendar"></span></span>
						<div class="from_to">
							<span>from</span>
							<span>to</span>
						</div>									
						<input type="text" id="subscription-change-periode" class="change_period_daterange" placeholder="To" >						
					</div>

				   <div class="input-group mb-4 date_filed">
					<input type="text" for="" name="" class="form-control" value="" placeholder="Today">
					<i class="fas fa-chevron-right"></i>
				   </div>
				   <div class="form-submit-button-box">
					 <button type="reset" class="reset-button"> Reset</button>
					 <button type="submit" class="apply-button"> Apply </button>
				   </div>
				 </form>
			  </div>
			  
			 </li>
			 
			</ul>
		   </div>
		 </div>
	   </div>
	
	   <div class="row">
	    <div class="col-lg-2">
			<div class="chart-sidebar">
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>This Week <span style="float:right;"> All </span></h6>
					</div>
					<span class="btn btn-primary light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect><rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect><path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path><rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect></g></svg>
					</span>
				</div>
				<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
					<canvas id="daily-sales-chart" height="85" style="height: 85px; display: block; width: 195px;" width="195" class="chartjs-render-monitor"></canvas>
				</div>
			</div>
			<div class="card bg-card-01 mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>Total/ <span style="color:#23BAF0;">345</span> </h6>
						<p>Check out each colum for more details</p>
					</div>
					<span class="btn btn-warning light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"></path><path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"></path></g></svg>
					</span>
				</div>
				<div class="card-body">
					<div class="chart-point">
						<div class="check-point-area"><div class="chartjs-size-monitor">
						<div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
							<canvas id="ShareProfit" width="100" height="100" style="display: block; width: 100px; height: 100px;" class="chartjs-render-monitor"></canvas>
						</div>
						<ul class="chart-point-list">
							<li><i class="fa fa-circle text-primary mr-1"></i> 60% Shine </li>
							<li><i class="fa fa-circle text-success mr-1"></i> 30 % Shine Plus </li>
							<li><i class="fa fa-circle text-warning mr-1"></i> 10 % Royal Shin </li>
						</ul>
					</div>
				</div>
			</div>
			<div class="card bg-card-02 mb-00">
				<div class="card-header align-items-start mb-3">
					<div>
						<h6>Todays visitor</h6>
					</div>
					<span class="btn btn-info light sharp ml-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M3,4 L20,4 C20.5522847,4 21,4.44771525 21,5 L21,7 C21,7.55228475 20.5522847,8 20,8 L3,8 C2.44771525,8 2,7.55228475 2,7 L2,5 C2,4.44771525 2.44771525,4 3,4 Z M10,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,19 C21,19.5522847 20.5522847,20 20,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,11 C9,10.4477153 9.44771525,10 10,10 Z" fill="#000000"></path><rect fill="#000000" opacity="0.3" x="2" y="10" width="5" height="10" rx="1"></rect></g></svg>
					</span>
				</div>
				<div class="card-body">
					<p class="mb-2 d-flex"> Shine
						<span class="pull-right text-warning ml-auto">85%</span>
					</p>
					<div class="progress mb-3" style="height:4px">
					  <div class="progress-bar bg-warning progress-animated" style="width:85%; height:4px;" role="progressbar">
						<span class="sr-only">60% Complete</span>
					  </div>
				    </div>
					
					<p class="mb-2 d-flex"> Shine Plus
					    <span class="pull-right text-success ml-auto">90%</span>
					</p>
					<div class="progress mb-3" style="height:4px">
					  <div class="progress-bar bg-success progress-animated" style="width:90%; height:4px;" role="progressbar">
						<span class="sr-only">60% Complete</span>
					  </div>
					</div>
					
					<p class="mb-2 d-flex"> Royal Shine
					   <span class="pull-right text-success ml-auto">90%</span>
					</p>
					<div class="progress mb-3" style="height:4px">
					  <div class="progress-bar bg-danger progress-animated" style="width:14%; height:4px;" role="progressbar">
						<span class="sr-only">60% Complete</span>
					  </div>
				  </div>
		       </div>
			</div>
		 </div>
	  </div>
	<div class="col-lg-10">
		
		@if(!empty($subscription)) @php $subscriber=0; @endphp @foreach($subscription->data as $subscribe) @if(!empty($subscribe->customer->_id)) @php $subscriber++; @endphp @endif @endforeach @endif
		@if(!empty($subscription)) @php $shine=0; @endphp @foreach($subscription->data as $subscribe) @if(!empty($subscribe->name) && $subscribe->name=="SHINE™") @php $shine++; @endphp @endif @endforeach @endif
		@if(!empty($subscription)) @php $shine_plus=0; @endphp @foreach($subscription->data as $subscribe) @if(!empty($subscribe->name) && $subscribe->name=="SHINE PLUS") @php $shine_plus++; @endphp @endif @endforeach @endif
		@if(!empty($subscription)) @php $royal_shine=0; @endphp @foreach($subscription->data as $subscribe) @if(!empty($subscribe->name) && $subscribe->name=="ROYAL SHINE") @php $royal_shine++; @endphp @endif @endforeach @endif

	 <div class="tabs_wrapper-customer-detailss">
		<ul class="tabs">
		  <li class="active" rel="tab1">All Subscriber  <span> (@if(!empty($subscription->total)) {{$subscription->total}} @else 0 @endif ) </span></li>
		  <li rel="tab2">Shine <span>(@if(!empty($shine)) {{$shine}} @else 0 @endif )</span></li>
		  <li rel="tab3">Shine Plus <span>(@if(!empty($shine_plus)) {{$shine_plus}} @else 0 @endif)</span></li>
		  <li rel="tab4">Royal Shine <span>(@if(!empty($royal_shine)) {{$royal_shine}} @else 0 @endif)</span></li>
		  <li class="menu-setting-buttonn"> <a href="#"> Package Setting </a> </li>
		</ul>
		
		<div class="tab_container">
		  <h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1</h3>
		   <div id="tab1" class="tab_content">
			<div class="table-responsive">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
				   <tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Customer ID: activate to sort column ascending">Customer ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending">Mobile </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Package: activate to sort column ascending">Package</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Renewal: activate to sort column ascending">Renewal</th>
					</tr>
				</thead>
				<tbody>

				@if(!empty($subscription))
				@foreach($subscription->data as $subscribe)
				<tr role="row">
					<td class="">@if(!empty($subscribe->customer->_id)) {{$subscribe->customer->_id}} @endif</td>
					<td class="sorting_1"><strong> @if(!empty($subscribe->customer->cust_first_name)) {{$subscribe->customer->cust_first_name}} @endif </strong></td>
					<td><strong> @if(!empty($subscribe->customer->cust_last_name)) {{$subscribe->customer->cust_last_name}} @endif </strong></td>
					<td>@if(!empty($subscribe->customer->cust_mobile)) {{$subscribe->customer->cust_mobile}} @endif</td>
					<td> @if(!empty($subscribe->customer->cust_email)) {{$subscribe->customer->cust_email}} @endif </td>
					<td> @if(!empty($subscribe->name)) {{$subscribe->name}} @endif </td>
					<td> <a href="#" class="blue-color"> <strong> @if(!empty($subscribe->next_repeat)) {{ date('d/m/y',strtotime($subscribe->next_repeat)) }} @endif </strong> </a> </td>
				</tr>
				@endforeach
				@endif
                  
			   </tbody>		
			</table>
		  </div>
		</div>
		 </div>
		  <!-- #tab1 -->
		  
		<h3 class="tab_drawer_heading" rel="tab2">Tab 2</h3>
		  <div id="tab2" class="tab_content">
			<div class="table-responsive">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
				   <tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Customer ID: activate to sort column ascending">Customer ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending">Mobile </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Package: activate to sort column ascending">Package</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Renewal: activate to sort column ascending">Renewal</th>
					</tr>
				</thead>
				<tbody>
				  
				@if(!empty($subscription))
				@foreach($subscription->data as $subscribe)
				@if(!empty($subscribe->name) && $subscribe->name=="SHINE™")
				<tr role="row">
					<td class="">@if(!empty($subscribe->customer->_id)) {{$subscribe->customer->_id}} @endif</td>
					<td class="sorting_1"><strong> @if(!empty($subscribe->customer->cust_first_name)) {{$subscribe->customer->cust_first_name}} @endif </strong></td>
					<td><strong> @if(!empty($subscribe->customer->cust_last_name)) {{$subscribe->customer->cust_last_name}} @endif </strong></td>
					<td>@if(!empty($subscribe->customer->cust_mobile)) {{$subscribe->customer->cust_mobile}} @endif</td>
					<td> @if(!empty($subscribe->customer->cust_email)) {{$subscribe->customer->cust_email}} @endif </td>
					<td> @if(!empty($subscribe->name)) {{$subscribe->name}} @endif </td>
					<td> <a href="#" class="blue-color"> <strong> @if(!empty($subscribe->next_repeat)) {{ date('d/m/y',strtotime($subscribe->next_repeat)) }} @endif </strong> </a> </td>
				</tr>
				@endif
				@endforeach
				@endif

			   </tbody>
			</table>
		  </div>
		</div>
		 </div>
		 
		<h3 class="tab_drawer_heading" rel="tab3">Tab 3</h3>
		  <div id="tab3" class="tab_content">
			 <div class="table-responsive">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
				   <tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Customer ID: activate to sort column ascending">Customer ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending">Mobile </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Package: activate to sort column ascending">Package</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Renewal: activate to sort column ascending">Renewal</th>
					</tr>
				</thead>
				<tbody>
				  
				@if(!empty($subscription))
				@foreach($subscription->data as $subscribe)
				@if(!empty($subscribe->name) && $subscribe->name=="SHINE SHINE")
				<tr role="row">
					<td class="">@if(!empty($subscribe->customer->_id)) {{$subscribe->customer->_id}} @endif</td>
					<td class="sorting_1"><strong> @if(!empty($subscribe->customer->cust_first_name)) {{$subscribe->customer->cust_first_name}} @endif </strong></td>
					<td><strong> @if(!empty($subscribe->customer->cust_last_name)) {{$subscribe->customer->cust_last_name}} @endif </strong></td>
					<td>@if(!empty($subscribe->customer->cust_mobile)) {{$subscribe->customer->cust_mobile}} @endif</td>
					<td> @if(!empty($subscribe->customer->cust_email)) {{$subscribe->customer->cust_email}} @endif </td>
					<td> @if(!empty($subscribe->name)) {{$subscribe->name}} @endif </td>
					<td> <a href="#" class="blue-color"> <strong> @if(!empty($subscribe->next_repeat)) {{ date('d/m/y',strtotime($subscribe->next_repeat)) }} @endif </strong> </a> </td>
				</tr>
				@endif
				@endforeach
				@endif

				<!-- <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad </strong></td>
					<td><strong> Naziur </strong></td>
					<td>052 470 7083</td>
					<td> naziur@keno.ae </td>
					<td> Shine </td>
					<td> <a href="#" class="blue-color"> <strong> 12/12/2020 </strong> </a> </td>
				</tr>	 -->

			   </tbody>
			</table>
		  </div>
		</div>
		 </div>
		<h3 class="tab_drawer_heading" rel="tab4">Tab 4</h3>
		  <div id="tab4" class="tab_content">
			<div class="table-responsive">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
				   <tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Customer ID: activate to sort column ascending">Customer ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending">Mobile </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Package: activate to sort column ascending">Package</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Renewal: activate to sort column ascending">Renewal</th>
					</tr>
				</thead>
				<tbody>
				  
				@if(!empty($subscription))
				@foreach($subscription->data as $subscribe)
				@if(!empty($subscribe->name) && $subscribe->name=="ROYAL SHINE")
				<tr role="row">
					<td class="">@if(!empty($subscribe->customer->_id)) {{$subscribe->customer->_id}} @endif</td>
					<td class="sorting_1"><strong> @if(!empty($subscribe->customer->cust_first_name)) {{$subscribe->customer->cust_first_name}} @endif </strong></td>
					<td><strong> @if(!empty($subscribe->customer->cust_last_name)) {{$subscribe->customer->cust_last_name}} @endif </strong></td>
					<td>@if(!empty($subscribe->customer->cust_mobile)) {{$subscribe->customer->cust_mobile}} @endif</td>
					<td> @if(!empty($subscribe->customer->cust_email)) {{$subscribe->customer->cust_email}} @endif </td>
					<td> @if(!empty($subscribe->name)) {{$subscribe->name}} @endif </td>
					<td> <a href="#" class="blue-color"> <strong> @if(!empty($subscribe->next_repeat)) {{ date('d/m/y',strtotime($subscribe->next_repeat)) }} @endif </strong> </a> </td>
				</tr>
				@endif
				@endforeach
				@endif

				<!-- <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad </strong></td>
					<td><strong> Naziur </strong></td>
					<td>052 470 7083</td>
					<td> naziur@keno.ae </td>
					<td> Shine </td>
					<td> <a href="#" class="blue-color"> <strong> 12/12/2020 </strong> </a> </td>
				</tr>	 -->

			   </tbody>
			</table>
		  </div>
		</div>
		 </div>
		 
		   </div>
		  <!-- .tab_container -->
		  </div>
		
	  </div>
    </div>
	
  </div>
</div>
        <!--**********************************
            Content body end
        ***********************************-->
<!-- Modal -->
<div class="modal fade" id="addzonemodal">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Add New Zone</h5>
			<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
			</button>
		</div>
		<div class="modal-body">
		<form action="" method="">
		  <div class="add-zone-body-boxx">
		     <div class="container">
			   <div class="row">
			     <div class="col-lg-5">
				   <div class="zone-add">
                     <label for="zone-name"> Zone Name </label>
					 <input type="" for="" name="" class="form-control" value="" placeholder="Zone Name">
                   </div>
                   <div class="zone-add">
                     <label for="zone-name"> United Arab Emirate </label>
					 <select class="form-control">
					   <option value="United Arab Emirate"> United Arab Emirate </option>
					   <option value="United Arab Emirate"> United Arab Emirate </option>
					   <option value="United Arab Emirate"> United Arab Emirate </option>
					 </select>
                   </div>
                   <div class="zone-add">
                     <label for="zone-name"> City </label>
					 <select class="form-control">
					   <option value="Dubai"> Dubai </option>
					   <option value="Dubai"> Dubai </option>
					   <option value="Dubai"> Dubai </option>
					 </select>
                   </div>	
                  
				   <div class="zone-add">
                     <label for="zone-name"> Working Hours </label>
					 <input type="text" for="" name="" value="" class="form-control" placeholder="9:00-23:00">
                   </div>
                   <div class="zone-add">
                     <label for="zone-name"> ETA </label>
					 <input type="text" for="" name="" value="" class="form-control" placeholder="37 Minutes">
                   </div>
				    <div class="zone-add d-flex">
					 <div class="switch">
					 <span> <strong> Recommended Ninja
					 </strong></span><strong> </strong>
					  <input name="recomandedninja" type="checkbox" value="1" id="recomandedninja">
					 <span class="r-alignn">  On <label for="recomandedninja"></label> </span>
					</div>
                   </div>
				    <div class="zone-add d-flex">
					 <div class="switch">
					 <span> <strong> Flexi Order </strong></span><strong> </strong>
					  <input name="flexiorder" type="checkbox" value="1" id="flexiorder">
					  <span class="r-alignn"> On <label for="flexiorder"></label> </span>
					</div>
                   </div>
                   <div class="zone-add d-flex">
					 <div class="switch">
					 <span> <strong> Set Up A Fixed Schedule </strong></span><strong> </strong>
					  <input name="setupshedule" type="checkbox" value="1" id="setupshedule">
					  <span class="r-alignn danger-color">  OFF <label for="setupshedule"></label> </span>
					</div>
                   </div>
				   
				 </div>
				 <div class="col-lg-7">
				   <div class="iframe-mapp">
				    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d97211.14423043442!2d55.15041503276925!3d25.11435745187941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bc13cd5fb61%3A0xb8eba7dbb3225fa2!2sKeno%20Car%20Wash!5e0!3m2!1sen!2sin!4v1628335044076!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				   </div>
				 </div>
				 
				 <div class="col-lg-12">
				  <div class="add-zones-button">
						<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn custom-btn-black w-50">Add Now</button>
					</div>
				 </div>
			   </div>
			 </div>
		  </div>
		  </form>
		</div>
		
	</div>
   </div>
</div>

<!-- page js -->

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script type="text/javascript">

$(function() {
$("#subscription-change-periode").daterangepicker();
});

</script>
<!----END-YOUR-CODE-HERE----->
@endsection