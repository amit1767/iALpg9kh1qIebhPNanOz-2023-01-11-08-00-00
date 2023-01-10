@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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
		<div class="col-lg-3 col-md-12">
		<div class="heading-content-nav">
		   <h3> Revenue  </h3>
		   <p> <small><img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""></small> > <small> Revenue  </small> </p>
		  </div>
		</div>
		<div class="col-lg-9 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
		   <ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_2">
			 <form>
			   <input class="form-control" type="search" placeholder="&#xF002; Search Revenue" aria-label="Search">
			 </form>
			</li> 
			 <li> 
			  <div class="column-setting">
			   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">
			   	<!-- <i class="fas fa-retweet"></i>  -->
			   <span class="ti-exchange-vertical mr-2"></span>Column Setting </a>
			   
			   <!-- Modal -->
				<div class="modal fade" id="exampleModalCenter01">
					<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Column Setting</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							 <div class="column-setting-box">
							    <div class="col-set-box connected-sortable droppable-area1">
								  <p class="draggable-item"> <input type="checkbox"/> <span>  ID </span> 
								  	<!-- <i class="fas fa-arrows-alt"></i>  -->
								  	<span class="ti-move"></span>
								  </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> First Name <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Plate Number  <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Ninja Name <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Services </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Price </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Rating </span> <span class="ti-move"></span> </p>
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
			 <li> <a href="#" class="whiteshadow-custom-btn"><span class="ti-filter"></span>  Filter  </a> </li>
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
						<input type="text" id="revenue-change-periode" class="change_period_daterange" placeholder="To" >						
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
			 <!-- <li> <a href="#" class="gree-custom-btn"><i class="fas fa-file-alt"></i>  Generate Report </a> </li> -->
			</ul>
		   </div>
		 </div>
	   </div>
	
	   <div class="row">
	    <div class="col-lg-2 col-md-3">
			<div class="chart-sidebar">
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>Total Revenue</h6>
						<h4> 3,176 <span> AED </span> </h4>
						<span class="revenue_per">+64.7%</span>
					</div>
					<i class="fas fa-dollar-sign revenu-ttl"></i>

				</div>
				<div class="card-body">
				<div class="ico-sparkline">
					<div id="sparkline8"></div>
				</div>                              
			</div>
			</div>
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>COMMISSION</h6>
						<h4> 1,234<span> AED </span> </h4>
					</div>
					
				</div>
				<div class="card-body">
				<div id="morris_line" class="morris_chart_height">
					<div class="card bg-default">
					    <div class="card-body">
					        <div class="chart">
					            <!-- Chart wrapper -->
					            <canvas id="chart-sales" class="chart-canvas"></canvas>
					        </div>
					    </div>
					</div>
				</div>                            
			</div>
			</div>
		
		  <div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>UPAELL</h6>
						<h4> 1,234<span> AED </span></h4>
					</div>
					
				</div>
				<div class="card-body">
				
			</div>
			</div>
			
			
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>Mileage</h6>
						<h4> 1,234<span> AED </span> </h4>
					</div>
					
				</div>
				<div class="card-body">
				
				
			</div>
			</div>
			
			<div class="card mb-00">
				<div class="card-header align-items-start">
					<div>
						<h6>TIPS</h6>
						<h4> 1,234<span> AED </span> </h4>
					</div>
					
				</div>
				<div class="card-body">
				                             
			</div>
			</div>
		
		
		 </div>
	  </div>
	<div class="col-lg-10 col-md-9">
      <div class="table-responsive">
			<div id="example_wrapper" class="dataTables_wrapper">
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
				   <tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" aria-sort="descending">First Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Plate Number: activate to sort column ascending">Plate Number</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Ninja Name: activate to sort column ascending">Ninja Name </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Services: activate to sort column ascending">Services </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Price</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rating: activate to sort column ascending">Rating</th>
					</tr>
				</thead>
				<tbody>
				  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td><strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong></td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td><strong> Body wash, Super Keno Shine, Interior Safe </strong></td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong></td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td><strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Mohammad Naziur </strong></td>
					<td><strong> Dubai M 25163 </strong></td>
					<td class="blue-color">Alfredo</td>
					<td> <strong> Body wash, Super Keno Shine, Interior Safe </strong> </td>
					<td class="blue-color"> 70 AED </td>
					<td> <a href="#" class="blue-color"> <i class="fa fa-star active"></i> 5.0 </a> </td>
				</tr>				
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
$("#revenue-change-periode").daterangepicker();
});


</script>
   
<!----END-YOUR-CODE-HERE----->
@endsection


    