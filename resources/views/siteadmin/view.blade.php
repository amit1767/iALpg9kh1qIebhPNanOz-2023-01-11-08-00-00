@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3> Site Admin </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Site Admin </small> </p>
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
					   	 Column Setting <span class="ti-exchange-vertical mr-2"></span>  </a>
					   
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
										  <p class="draggable-item"> <input type="checkbox"/> <span>Username </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Full Name  </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Email </span><span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Role </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Permissions </span> <span class="ti-move"></span> </p>
										  <p class="draggable-item"> <input type="checkbox"/> <span>Action </span><span class="ti-move"></span> </p>
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
			  <li> <a href="#" class="customeradd-custom-btn" data-toggle="modal" data-target="#exampleModalCenter"> <span class="ti-plus"></span> Add New User </a> 
			
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter">
					<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"> <span class="ti-plus"></span> Add New User </h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <div class="addnewuser-form-box">
								 <form>
								  <div class="row">
								   <div class="col-lg-5 col-md-12">
								   
								    <div class="form-group">
								     <label> Admin Type </label>
									  <select class="form-control">
									   <option value=""> Select admin type </option>
									   <option value=""> Lorem ipsum </option>
									   <option value=""> Lorem ipsum </option>
									   <option value=""> Lorem ipsum </option>
									 </select>
								    </div>
									
									<div class="form-group">
								     <label> Full Name </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="User full name">
								    </div>
									
									<div class="form-group">
								     <label> Email </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="User email address">
								    </div>
									
									<div class="form-group">
								     <label> User Name </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="Write user name">
								    </div>
									
									<div class="form-group">
								     <label> Password </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="Write Password">
								    </div>
									
								   </div>
								   
								   <div class="col-lg-7 col-md-12">
								     <div class="perission-add-boxx">
									   <h4> Permission </h4>
									   
									   <table class="table">
									     <thead>
										   <th> Permission Name </th>
										   <th> View </th>
										   <th> Modify  </th>
										 </thead>
										 <tbody>
										  <tr>
										   <td> Dashboard </td>
										   <td> 
                                             <div class="switch">
											 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
											 <label for="dashboard"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Customers </td>
										   <td> 
                                             <div class="switch">
											 <input name="Customers" type="checkbox" value="1" id="Customers" checked="">
											 <label for="Customers"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Orders </td>
										   <td> 
                                             <div class="switch">
											 <input name="Orders" type="checkbox" value="1" id="Orders" checked="">
											 <label for="Orders"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Command Center </td>
										   <td> 
                                             <div class="switch">
											 <input name="CommandCenter" type="checkbox" value="1" id="CommandCenter" checked="">
											 <label for="CommandCenter"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Zones </td>
										   <td> 
                                             <div class="switch">
											 <input name="zones" type="checkbox" value="1" id="zones" checked="">
											 <label for="zones"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Promotions </td>
										   <td> 
                                             <div class="switch">
											 <input name="Promotions" type="checkbox" value="1" id="Promotions" checked="">
											 <label for="Promotions"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Subscription </td>
										   <td> 
                                             <div class="switch">
											 <input name="Subscription" type="checkbox" value="1" id="Subscription" checked="">
											 <label for="Subscription"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Revenue </td>
										   <td> 
                                             <div class="switch">
											 <input name="Revenue" type="checkbox" value="1" id="Revenue" checked="">
											 <label for="Revenue"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
											 <label for="dashboard1"></label> 
											  </div> 
										   </td>
										  </tr>
										  <tr>
										   <td> Dashboard </td>
										   <td> 
                                             <div class="switch">
											 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
											 <label for="dashboard"></label> 
											  </div> 
										   </td>
										   <td> 
                                             <div class="switch black">
											 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
											 <label for="MenuSettings"></label> 
											  </div> 
										   </td>
										  </tr>
										  
										 </tbody>
									   </table>
									 </div>
								   </div>
								   
								  <div class="col-lg-12">
								    <div class="add-zones-button">
									  <button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
									  <button type="submit" class="btn custom-btn-black w-50">Add Now</button>
									</div>
								   </div> 
								  </div>
								</form>
							   </div>
							</div>
						</div>
					</div>
				 </div>
			  </li>
			</ul>
		  </div>
		</div>
	  </div>
	
		<div class="row">
		  <div class="col-lg-12">
		   <div class="table-responsive mt-5">
				<div id="example_wrapper" class="dataTables_wrapper">
				<table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
					<thead>
						<tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending" aria-sort="descending">Username</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Full Name: activate to sort column ascending">Full Name</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">Email </th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending">Role</th>
						
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Permissions: activate to sort column ascending">Permissions</th>

						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="action: activate to sort column ascending">Action</th>
						</tr>
					</thead>
					<tbody>
					  
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
							<label for="actionswitch"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch1" type="checkbox" value="1" id="actionswitch1" checked="">
							<label for="actionswitch1"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch2" type="checkbox" value="1" id="actionswitch2" checked="">
							<label for="actionswitch2"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch3" type="checkbox" value="1" id="actionswitch3" checked="">
							<label for="actionswitch3"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
							<label for="actionswitch"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
							<label for="actionswitch"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
							<label for="actionswitch"></label> 
						   </div> 
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span></a> </td>
				    </tr>
					<tr class="odd" role="row" >
						<td class="">57050</td>
						<td class="sorting_1"><strong> Donilo </strong></td>
						<td><strong> Group Name </strong></td>
						<td>danilo@keno.ae</td>
						<td>Ninja </td>
						<td> 
						  <div class="switch">
							<input name="actionswitch" type="checkbox" value="1" id="actionswitch" checked="">
							<label for="actionswitch"></label> 
						   </div> 
						</td>
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

<!----END-YOUR-CODE-HERE----->
@endsection