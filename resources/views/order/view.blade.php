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
</style>
	  
<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  
	  <div class="row">
		<div class="col-lg-3 col-md-12">
		    <div class="heading-content-nav">
		   <h3> Orders </h3>
		   <p> <small><img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> orders </small> </p>
		  </div>
		</div>
		<div class="col-lg-9 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
			<ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_2">
			 <form action="{{route('ordersearch')}}" method="post" name="search-order" id="search-order" >
			 {{ csrf_field() }}
				<input class="form-control search_option" name="search_order" type="search" placeholder="&#xF002; Search order" aria-label="Search" >
			 </form>
			</li>
		
			 <li> 
			  <div class="column-setting">
			   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">
			   	<!-- <i class="fas fa-retweet"></i>  -->
			   	<span class="ti-exchange-vertical"></span> Column Setting </a>
			   
			   <!-- Modal -->
				<div class="modal fade" id="exampleModalCenter01">
					<div class="modal-dialog modal-dialog-centered " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Column Setting</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('dashboard/orders/updatecolumnsetting')}}" method="post" name="updateColumnSetting" id="updateColumnSetting" >
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
									  	 <!-- <i class="fas fa-arrows-alt"></i> -->
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
									  	<!-- <i class="fas fa-arrows-alt"></i> -->
									  	<span class="ti-move"></span>
									</p>	  
										@endif
									@endforeach
									@endif
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
					<form action="{{route('changeperiode')}}" method="post" name="change-periode" id="change-periode" >
					 {{ csrf_field() }}					  
					   <!-- 	<div class=" change_period_date_filed input-group d-flex date_filed"> 					
							<input type="text" id="datepicker-from" class="datepicker1 pl-5" placeholder="From">
							
							<span class="change_periode_celender_icon"><i class="far fa-calendar"></i></span>
							
							<input type="text" id="datepicker-to" class="datepicker1" placeholder="To">								
						</div> -->
						<div class=" change_period_date_filed input-group d-flex date_filed">						
							<span class="change_periode_celender_icon"><span class="ti-calendar"></span></span>
							<div class="from_to">
								<span>from</span>
								<span>to</span>
							</div>									
							<input type="text" id="order-change-periode" class="change_period_daterange" placeholder="To" >						
						</div>

					   	<div class="input-group mb-4 date_filed">
							<input type="text" for="" name="" class="form-control"  value="" placeholder="Today">
							<i class="fas fa-chevron-right"></i>
					   	</div>
					   	<div class="form-submit-button-box">
						 	<button type="reset" class="reset-button"> Reset</button>
						 	<button type="submit" class="apply-button"> Apply </button>
					   	</div>
					</form>
				</div>			  
			</li>
			<!-- <li> <a href="#" class="gree-custom-btn"><i class="fas fa-file-alt"></i>  Generat Report</a> </li> -->
			</ul>
		   </div>
		 </div>
	   </div>
	
	   <div class="row">
		<div class="col-lg-12">
		  <div class="table-responsive mt-5">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
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
				<tbody>
					@if(!empty($maindatas['maindata']))
					@foreach($maindatas['maindata'] as $row)
					<tr class="odd table-row" role="row" data-href="">
					@if(!empty($maindatas['columns'])) @foreach($maindatas['columns'] as $column)
						@if(isset($column->active) && $column->active==1)
						@php
							$clm_name1=$column->column;
							if(isset($row->{$clm_name1})){ $clm_name=$row->{$clm_name1}; }
						@endphp 
						@if($column->column=='order_id') @php $clm_name=$row->_id @endphp   @endif
						@if($column->column=='customer_name') @php $clm_name=$row->customer->cust_first_name.' '.$row->customer->cust_last_name @endphp   @endif
						@if($column->column=='plate_number' OR $column->column=='manufacturer' ) 
						@php $cars=$row->cars; $clm_name="";  @endphp
						@foreach($cars as $car) @php if($column->column=='plate_number'){ $clm_name.=!empty($car->car_number) ? $car->car_number.' ' : '';}else if($column->column=='manufacturer'){ $clm_name.=$car->make_by->name.' '; }else{ $clm_name.=""; } @endphp @endforeach
						@endif
						@if($column->column=='category') @php $clm_name=$row->category->ot_name; @endphp   @endif
						
						@if($column->column=='services')
							@php $items=$row->items; @endphp
						    @foreach($items as $item) @php $clm_name.=!empty($item->name) ? $item->name.' ' : ''; @endphp @endforeach
						@endif
						@if($column->column=='status')
							@php
								$status=$row->status;
								if($status==0){ $clm_name='Initiate'; }
								if($status==1){ $clm_name='Confirm'; }
								if($status==2){ $clm_name='Assigned'; }
								if($status==3){ $clm_name='Going'; }
								if($status==4){ $clm_name='Started'; }
								if($status==5){ $clm_name='Completed'; }
								if($status==6){ $clm_name='Canceled'; }
								if($status==7){ $clm_name='Unpaid'; }
								if($status==8){ $clm_name='Rejected'; }
								if($status==9){ $clm_name='Refund'; }
								if($status==21){ $clm_name='Draff'; }
							@endphp
						@endif
						@if($column->column=='customer_id') @php $clm_name=$row->customer->_id; @endphp @endif
						@if($column->column=='payment_status') @php $clm_name=$row->payment_status; @endphp @endif
						@if($column->column=='payment_method') @php $clm_name=$row->payment_method; @endphp @endif
						@if($column->column=='cleaner_username') @php $clm_name=!empty($row->cleaner->cleaner_username) ? $row->cleaner->cleaner_username : ' '; @endphp @endif
						@if($column->column=='cleaner_email') @php $clm_name=!empty($row->cleaner->cleaner_email) ? $row->cleaner->cleaner_email : ' '; @endphp @endif
						@if($column->column=='cleaner_first_name') @php $clm_name=!empty($row->cleaner->cleaner_first_name) ? $row->cleaner->cleaner_first_name : ' '; @endphp @endif
						@if($column->column=='cleaner_last_name') @php $clm_name=!empty($row->cleaner->cleaner_last_name) ? $row->cleaner->cleaner_last_name : ' '; @endphp @endif
						@if($column->column=='phone') @php $clm_name=!empty($row->cleaner->phone) ? $row->cleaner->phone : ' '; @endphp @endif
						
							<td class="">		
							{{$clm_name}}
							</td>
						@endif	
					@endforeach	
					@endif
						</tr>                                           
					@endforeach
					@endif
			   </tbody>
			</table>
		  </div>
		</div>
	  </div>
    </div>
	
  </div>
</div>
        <!--**********************************
            Content body end
        ***********************************-->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script type="text/javascript">

$(function() {
$("#order-change-periode").daterangepicker();
});

</script>
<!----END-YOUR-CODE-HERE----->

@endsection