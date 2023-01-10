@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<style>
table.dataTable thead th, table.dataTable thead td {
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
.column-setting-box {
    overflow-x: hidden;
    padding: 0 2rem;
    height: 50vh;
}
.customers div#example_filter {
    display: none;
}
.customers #example_paginate {
    display: none;
}
</style>
	  
<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3> Customers </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> <span class="ti-angle-right"></span> <small> Customers</small> </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
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
		  <div class="dashboard-right-content dashboard-r-c-res">
			<ul class="list-inline list-in-res">
				<li class="order-searchh common_search_box_2">
					<form method="post" action="{{url('dashboard/searchcustomer')}}">
						 @csrf
						 <input class="form-control" type="search" name="keyword" placeholder="&#xF002; Search Customer" aria-label="Search">
					</form>
				</li>
			 	<li> 
				  	<div class="column-setting">
				   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">  Column Setting <span class="ti-exchange-vertical"></span>  </a>
			  
				   <!-- Modal -->
					<div class="modal fade" id="exampleModalCenter01">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							<form action="{{url('dashboard/updatecolumnsetting')}}" method="post" name="updateColumnSetting" id="updateColumnSetting" >
								<div class="modal-header">
									<h5 class="modal-title">Column Setting</h5>
									<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
									{{ csrf_field() }}
								   <div class="column-setting-box">
								    <div class="col-set-box connected-sortable droppable-area1">
									@if(!empty($maindatas['columns']))
									
							           @foreach($maindatas['columns'] as $column)		
										@if(isset($column->active) && $column->active==1)
									  	<p class="draggable-item">
									  	<input type="checkbox" @if(isset($column->active) && $column->active==1) checked @endif name="column_setting[]" onclick="fillvalue(this)" value="{{ $column->column}}"/>
									  	<input type="hidden" name="column_name[]" value="@if(isset($column->name)) {{ $column->name}} @endif">
									  	<input type="hidden" name="column_title[]" value="@if(isset($column->column)) {{ $column->column}} @endif">
									  	<input type="hidden" class="column_checked"  name="column_checked[]" value="@if(isset($column->active) && $column->active==1) 1 @endif">
									  	<span>@if(isset($column->name)){{ $column->name}} @endif</span>
									  	 <!-- <i class="fas fa-arrows-alt"></i>  -->
									  	 <span class="ti-move"></span>
									  	</p>
										@endif
									  @endforeach
									
							          @foreach($maindatas['columns'] as $column)		
										@if(!(isset($column->active) && $column->active==1))
									  	<p class="draggable-item">
									  	<input type="checkbox" name="column_setting[]" onclick="fillvalue(this)" value="{{ $column->column}}"/>
									  	<input type="hidden" name="column_name[]" value="@if(isset($column->name)) {{ $column->name}} @endif">
									  	<input type="hidden" name="column_title[]" value="@if(isset($column->column)) {{ $column->column}} @endif">
									  	<input type="hidden" class="column_checked"  name="column_checked[]" value="@if(isset($column->active) && $column->active==1) 1 @endif">
									  	<span>@if(isset($column->name)){{ $column->name}} @endif</span> 
									  	<!-- <i class="fas fa-arrows-alt"></i>  -->
									  	<span class="ti-move"></span>
									  </p>
										@endif
									  @endforeach

									@endif
									</div>
									
								   </div>
								 
								</div>
								
								<div class="modal-footer">
								 <button type="submit" class="btn btn-black-new float-right">Apply</button>
								</div>
								</form>  
							</div>
						</div>
					</div>
			   
			  </div>
			 </li>
			  <li> <a href="javascript:void(0)" class="customeradd-custom-btn" data-toggle="modal" data-target="#exampleModalCenter">
			  	<!-- <i class="fas fa-filter"></i>  -->
			  	 <span class="ti-plus"></span> Add Customer </a> 
			
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<form action="{{url('dashboard/addcustomer')}}" method="post" name="AddCustomerForm" id="AddCustomerForm" >
						{{ csrf_field() }}
							<div class="modal-header">
								<h5 class="modal-title">Add New Customer</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <div class="customer-add-form-box">
							   <div class="responseAddCustomer" id="responseAddCustomer"></div>
								 
								  <div class="form-row">
								  <div class="mb-3 col-lg-6 col-md-12">
									<label for="firstname" class="form-label">First Name</label>
									<input onkeyup="addcustomervalid()" type="text" name="firstname" class="form-control check_empty" id="firstname" required placeholder="First name">
									<span class="input_error_msg danger-color">First name is required</span>
								  </div>
								   <div class="mb-3 col-lg-6 col-md-12">
									<label for="lastname" class="form-label">Last Name</label>
									<input onkeyup="addcustomervalid()" type="text" name="lastname" class="form-control" id="lastname" required placeholder="Last name">
									<span class="input_error_msg danger-color">Last Name is required</span>
								  </div>
								  <div class="mb-3 col-lg-12 col-md-12">
									<label  for="email" class="form-label">Email</label>
									<input onkeyup="addcustomervalid()" type="email" name="email" class="form-control check_empty" id="email" required placeholder="hello@keno.ae">
									<span class="input_error_msg danger-color">Email is required</span>
								  </div>
								  <div class="mb-3 col-lg-12 col-md-12 d-flex align-items-center common_border">		
									<div class="dropdown country_code_dropdwn">
									  <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
									    <img class="" src="{{asset('public/assets/image/united-arab-flag.png')}}" alt=""> +971<span class="ti-angle-down"></span>
									  </button>
									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="#"><img class="" src="{{asset('public/assets/image/united-arab-flag.png')}}" alt=""> +971</a>
									    <a class="dropdown-item" href="#"><img class="" src="{{asset('public/assets/image/united-arab-flag.png')}}" alt=""> +971</a>
									    <a class="dropdown-item" href="#"><img class="" src="{{asset('public/assets/image/united-arab-flag.png')}}" alt=""> +971</a>
									  </div>
									</div>
									 <input onkeyup="addcustomervalid()" type="tel" name="phone" class="form-control check_empty border-0" id="phone" required required="required" placeholder="50 123 4567">
									 <span class="input_error_msg danger-color">Phone is required</span>
								  </div>
								  <div class="mb-3 col-lg-12 col-md-12">
									   <select onchange="addcustomervalid()" name="city" id="inputCity" required class="form-control ">
											<option value=@php echo NULL; @endphp>City</option>
											<option value="Dubai">Dubai</option>
											<option value="Abudhabi">Abudhabi</option>
											<option value="Sharjah">Sharjah</option>
										</select>
									<span class="input_error_msg danger-color">City is required</span>	
								  </div>

								  <div class="mb-3 col-lg-12 col-md-12">
									<input onkeyup="addcustomervalid()" type="text" class="form-control" name="address" id="address" required placeholder="Address">
								  </div>
								  <div class="mb-3 col-lg-12 col-md-12">
									<select name="device" id="inputDevice" class="form-control">
											<option value="">Select Device</option>
											<option value="IOS">IOS</option>
											<option value="android">ANDROID</option>
										</select>
									<span class="input_error_msg danger-color">Device is required</span>	
								  </div>
								  <div class="mb-3 col-lg-6 col-md-12 custom-chk">
								   <div class="switch">
								     <span> <strong> Active/Inactive </span> </strong>
									  <input name="active" type="checkbox" value="1" id="activeinactive" />
									  <label for="activeinactive"></label>
									
									</div>
								  </div>
								   <div class="mb-3 col-lg-6 col-md-12 custom-chk">
								   <div class="switch">
								    <span> <strong> VIP Status </span> </strong>
									  <input name="vip_status" value="1" type="checkbox" id="vipstatus" />
									  <label for="vipstatus"></label>
									  
									</div>
								  </div>
								  </div>
								
							   </div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger light float-left w_37" data-dismiss="modal">Cancel</button>
								<button id="addcustomerbtn" disabled type="submit" class="btn btn-black float-right w_55">Add Now</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			  </li>
			 <!-- <li> <a href="#" class="gree-custom-btn"><i class="fas fa-file-alt"></i>  Generat Report</a> </li> -->
			</ul>
		  </div>
		</div>
	  </div>
	
		<div class="row">
		  <div class="col-lg-12">
		   <div class="table-responsive">
				<div id="example_wrapper" class="dataTables_wrapper">
				<table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
					<thead>
						<tr role="row">
						@if(!empty($maindatas['columns']))
							 @foreach($maindatas['columns'] as $column)
						 @if(isset($column->active) && $column->active==1) 
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Customer ID: activate to sort column ascending">{{$column->name}}</th>
							@endif	
							@endforeach
						@endif
						</tr>
					</thead>
					<tbody id="post-data">
					  @if(!empty($maindatas['maindata']))
						@foreach($maindatas['maindata'] as $row)
					<tr class="odd table-row" role="row" data-href="{{ url('/dashboard/viewcustomer/')}}/{{$row->_id}}">
					@if(!empty($maindatas['columns'])) @foreach($maindatas['columns'] as $column)
						@if(isset($column->active) && $column->active==1)
						@php $clm_name=$column->column;  @endphp
							<td class="{{$clm_name}}">		
							@php
							if(isset($row->{$clm_name})){
								if($clm_name=='createdAt'){
									$createdAt=date('d M Y h:i A',strtotime($row->createdAt)); 
									print_r($createdAt); 
								}else if($clm_name=='updatedAt'){
								$updatedAt=date('d M Y h:i A',strtotime($row->updatedAt)); 
									print_r($updatedAt);
								}else{
									print_r($row->{$clm_name}); 
								}
								 }
							@endphp
							</td>
						@endif	
					@endforeach	
					@endif
						</tr>                                           
					@endforeach
					@endif
					</tbody>
					<input type="hidden" id="pageId" value="2">
					<input type="hidden" id="targetUrl" value="{{ url('/dashboard/loadmorecustomers/')}}">
					<input type="hidden" id="totalPages" value="{{$maindatas['totalPages']}}">
				</table>
				
				{{--
				<div class="pagination1">
			@php
			$page=$maindatas['page'];
			$prev=$maindatas['prevPage'];
			$totalPages=$maindatas['totalPages'];
			$next=$maindatas['nextPage'];
			@endphp	
			
					<nav aria-label="Page navigation example mt-5">
						<ul class="pagination justify-content-center">
							<li class="page-item @php if($page <= 1){ echo 'disabled'; } @endphp">
								<a class="page-link"
									href="{{url('dashboard/customers/')}}@php if($page <= 1){ echo '#'; } else { echo "/" . $prev; } @endphp">Previous</a>
							</li>

							@php for($i = 1; $i <= $totalPages; $i++ ): @endphp
							<li class="page-item @php if($page == $i) {echo 'active'; } @endphp">
								<a class="page-link" href="{{url('dashboard/customers/')}}/{{$i;}}"> {{ $i;}}</a>
							</li>
							@php endfor; @endphp

							<li class="page-item @php if($page >= $totalPages) { echo 'disabled'; } @endphp">
								<a class="page-link"
									href="{{url('dashboard/customers/')}}/@php if($page >= $totalPages){ echo '#'; } else {echo $next; } @endphp">Next</a>
							</li>
						</ul>
					</nav>
				</div>
				--}}
				</div>
			</div>
		  </div>
	   </div>
	</div>
</div>

        <!--**********************************
            Content body end
        ***********************************-->
<!----END-YOUR-CODE-HERE----->
@endsection