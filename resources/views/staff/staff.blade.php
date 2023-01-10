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
		   <h3> Staff </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Staff </small> </p>
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
			   	<!-- <i class="fas fa-retweet"></i> -->
			   	  Column Setting  <span class="ti-exchange-vertical mr-2"></span> </a>
			   
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
								  <p class="draggable-item"> <input type="checkbox"/> <span> Id </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Name </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Group </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Phone </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Email </span> <i class="fas fa-arrows-alt"></i> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Role </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Availability </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Rating </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Action </span> <span class="ti-move"></span> </p>
								</div>
								
							   </div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-black-new float-right">Apply</button>
							</div>
							
						</div>
					</div>
				</div>
			   
			  </div>
			 </li>
			
			<!-- <li> 
			  <div class="change-period-box-main" id="toggle-form">
				<i class="far fa-calendar"></i>
				<div class="text-box-period">
				  <h5> Change periode </h5>
				  <small> August 28 - October 28, 2020</small>
				</div>
				<i class="fas fa-chevron-down"></i>
			  </div>
			  
			  <div class="form-toggle-box">
				 <form action="" method="">
				   <div class="input-group mb-4 d-flex">
					<input type="text" for="" name="" class="form-control" value="" placeholder="From">
					<input type="text" for="" name="" class="form-control" value="" placeholder="To">
				   </div>
				   <div class="input-group mb-4">
					<input type="text" for="" name="" class="form-control"  value="" placeholder="Today">
					<i class="fas fa-chevron-right"></i>
				   </div>
				   <div class="form-submit-button-box">
					 <button type="reset" class="reset-button"> Reset</button>
					 <button type="submit" class="apply-button"> Apply </button>
				   </div>
				 </form>
			  </div>
			  
			</li> -->
			 
			<li> <a href="#" class="gree-custom-btn"><i class="fas fa-file-alt"></i>  Generat Report</a> </li>
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
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending"> Name</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Group: activate to sort column ascending">Group</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Phone </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">Role</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Availability: activate to sort column ascending">Availability</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Availability: activate to sort column ascending">Rating</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Availability: activate to sort column ascending">Action</th>
					</tr>
				</thead>
				<tbody>
				  
				
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
						<label for="actionswitch"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				</tr>
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch0" type="checkbox" value="1" id="actionswitch0" checked="">
						<label for="actionswitch0"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				</tr>		
                <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch1" type="checkbox" value="1" id="actionswitch1" checked="">
						<label for="actionswitch1"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				</tr>	
                 <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch2" type="checkbox" value="1" id="actionswitch2" checked="">
						<label for="actionswitch2"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				</tr>	
              <tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch3" type="checkbox" value="1" id="actionswitch3" checked="">
						<label for="actionswitch3"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				</tr>	
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><img src="{{ asset('public/assets/image/ninjaa.png')}}" alt=""><strong> Danilo </strong></td>
					<td><strong> Group Name </strong></td>
					<td> 0525 707083 </td>
					<td>danilo@keno.ae </td>
					<td>Ninja</td>
					<td> 
					  <div class="switch">
						<input name="actionswitch4" type="checkbox" value="1" id="actionswitch4" checked="">
						<label for="actionswitch4"></label> 
					   </div> 
					</td>
					<td> <a href="#"> <i class="fa fa-star active"></i> <span class="blue-color">5.0</span> </a> </td>
					<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
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

<!----END-YOUR-CODE-HERE----->
@endsection