@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
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
		<div class="col-lg-4 col-md-12">
		 <div class="heading-content-nav">
		   <h3> Zones List </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Zones List </small> </p>
		  </div>
		
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
		   <ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_1">
			 <form>
			   <input class="form-control" type="search" placeholder="&#xF002; Search Zone" aria-label="Search">
			 </form>
			</li> 
			 <li> 
			  <div class="column-setting">
			   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">
			   	<!-- <i class="fas fa-retweet"></i>   -->
			   	<span class="ti-exchange-vertical mr-2"></span>Column Setting   </a>
			   
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
								  <p class="draggable-item"> <input type="checkbox"/> <span>Zone ID </span> 
								
								  	<span class="ti-move"></span>
								  </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Zone Name </span>
								  	<span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Working Hours </span> 
								  	<span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>ETA </span>
								  	<!-- <i class="fas fa-arrows-alt"></i>  -->
								  	<span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>City </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Cluster </span><span class="ti-move"></span></p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Ninja Station <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Categories </span><span class="ti-move"></span></p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Status </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>LTV </span><span class="ti-move"></span> </p>
								</div>
								<button type="button" class="btn btn-black-new float-right">Apply</button>
							   </div>

							</div>
							
						</div>
					</div>
				  </div>
			   
			   </div>
			 </li>
			
			 
			 <li> <a href="#" class="blue-custom-btn" data-toggle="modal" data-target="#addzonemodal"><i class="fas fa-file-alt"></i> Add Zones </a> </li>
			 
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
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Zone ID: activate to sort column ascending">Zone ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Zone Name: activate to sort column ascending" aria-sort="descending">Zone Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Working Hours: activate to sort column ascending">Working Hours</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="ETA: activate to sort column ascending">ETA </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending">City</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Cluster: activate to sort column ascending">Cluster</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Ninja Station: activate to sort column ascending">Ninja Station</th>
					
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Categories: activate to sort column ascending">Categories</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
					</tr>
					
				</thead>
				<tbody>
				  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> 
						<!-- <i class="far fa-hand-pointer"></i>  -->
						<span class="ti-pencil"></span>
					 </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"><span class="ti-pencil"></span> </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
				</tr>
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
				</tr>
                 <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> Jumeirah 1 </strong></td>
					<td><strong> 9:00-23:00 </strong></td>
					<td><strong> 34 Minutes </strong></td>
					<td> Dubai </td>
					<td> Dubai Jumeirah Cluster </td>
					<td> Jumeirah Wirehouse </td>
					<td> <strong> Car Wash, Detailing, Tinging </strong> </td>
					<td> <a href="#" class="success-color"> Active </a> </td>
					<td> <a href="#" class="success-color action-act" data-toggle="modal" data-target="#addzonemodal"> <span class="ti-pencil"></span> </a> </td>
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
<!----END-YOUR-CODE-HERE----->
@endsection