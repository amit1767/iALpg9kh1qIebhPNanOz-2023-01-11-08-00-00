@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3> Permissions </h3>
		   
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
				<li >
				 
				</li>
				<li> 
				  
				</li>
				<li> <a href="#" class="useradd-custom-btn" data-toggle="modal" data-target="#exampleModalCenter">
				  	<!-- <i class="fas fa-filter"></i>  -->
				  	 <span class="ti-plus"></span> Add User </a> 									
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
		
                <table class="dataTable table permission_table" id="example">
                   <thead>
                   		<tr>
                    	    <th>ID</th>
                    		<th>First Name</th>
                    		<th>Last Name</th>
                    		<!-- <th>Role</th> -->
                    		<th>Email</th> 
                    		<th>Mobile</th> 
                    		<th>Action</th>                     	
                    	</tr>
                    </thead>
                    
                    <tbody>
                    	<tr>
                    		<td>1</td> <td>Abid </td> <td>rizavi </td>                    		 
                    		<td>abid69@gmail.com</td>
                    		<td>+917895678524</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>2</td> <td>Naziur  </td> <td>rahman </td>                     		               
                    		<td>nazir23@gmail.com</t>
                    		<td>+917578946847</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td> 
                    	</tr>
                    	<tr>
                    		<td>3</td> <td>Abid </td> <td>rizavi</td>                     	                    	
                    		<td>abid58@gmail.com</td>
                    		<td>+918958453675</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn " data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>4</td> <td>Naziur </td><td>rahman</td>                                        		
                    		<td>nazir@gmail.com</td>
                    		<td>+917942586348</td> 
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>5</td> <td>Sunil</td> <td>Rajput</td>                                         		
                    		<td>sunil@gmail.com</td>
                    		<td>+919907732688</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td> 
                    	</tr>
                    	<tr>
                    		<td>6</td> <td>Amit</td> <td>Singh</td>                                        		
                    		<td>amit@gmail.com</td> 
                    		<td>+919145367826</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td>
                    	</tr>
                    	<tr>
                    		<td>7</td> <td>jack</td> <td>Ton</td>                     		
                    		<td>jack@gmail.com</td> 
                    		<td>+917854934827</td>
                    		<td class="permission_table_btn">
                    			<button type="button" class="permission_btn" data-toggle="modal" data-target="#exampleModalCenter01">Permission</button> 
                    			<button type="button" class="permission_btn Edit_btn" data-toggle="modal" data-target="#exampleModalCenter02">Edit</button> 
                    		</td>
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
	<div class="modal fade permission_btn_modal" id="exampleModalCenter01">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			
				<div class="modal-header">
					<!-- <h5 class="modal-title">Column Setting</h5> -->
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="permission_modal">

						<div class="permission_modal_body">
						
							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Dashboard </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Customers </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Orders </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Command Centre </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Zones </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Promotions </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Subscriptions </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Revenue </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Notifications </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Menu Settings </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Track Staff </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Staff Report </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Staff </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>SIte Admin </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Popup Msg </span> 
							</p>

							<p class="permission_modal_data">
							  	<input type="checkbox" checked="" name="column_setting[]" onclick="fillvalue(this)" value="cust_code">					  	
							  	<span>Service Setting </span> 
							</p>
						</div>	

					</div>					 
				</div>
				
				<div class="modal-footer">
				 <button type="submit" class="btn btn-black-new float-right">Submit</button>
				</div>
				</form>  
			</div>
		</div>
	</div>





	<!-- Modal Add User -->

<!-- 	<div class="modal fade" id="exampleModalCenter" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">			
			<input type="hidden" name="_token" value="pMPEiGfYyCx8nWcXOkbGaPB2H1wi8rQaBaLWR190">
				<div class="modal-header">
					<h5 class="modal-title">Add User</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span>
					</button>
				</div>
				<div class="modal-body">
				   	<div class="customer-add-form-box">
					   	<div class="responseAddCustomer" id="responseAddCustomer"></div>
						 
						  <div class="form-row">
						  
						  	<div class="mb-3 col-lg-6 col-md-12">
								<label for="firstname" class="form-label">First Name</label>
								<input type="text" name="firstname" class="form-control check_empty" id="firstname" required="" placeholder="First name">
								<span class="input_error_msg danger-color">First name is required</span>
						  	</div>
						  
						  	<div class="mb-3 col-lg-6 col-md-12">
								<label for="lastname" class="form-label">Last Name</label>
								<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name">
								<span class="input_error_msg danger-color">Last Name is required</span>
						  	</div>
						 
						  	<div class="mb-3 col-lg-12 col-md-12">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" class="form-control check_empty" id="email" required="" placeholder="hello@keno.ae">
								<span class="input_error_msg danger-color">Email is required</span>
						  	</div>
						 
						  	<div class="mb-3 col-lg-12 col-md-12">
						  		<label for="email" class="form-label">Mobile</label>
								 <input type="tel" name="phone" class="form-control check_empty" id="phone" required="" placeholder="50 123 4567">
								 <span class="input_error_msg danger-color">Phone is required</span>
						  	</div>

						  	<div class="mb-3 col-lg-12 col-md-12">
							    <label for="exampleInputPassword1" class="form-label">Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1">
						  	</div>

						  	<div class="mb-3 col-lg-12 col-md-12">
							    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
							    <input type="password" class="form-control" id="exampleInputPassword1">
						  	</div>

						  </div>					
					   	</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-black float-right w-50">Add </button>
					</div>
				</form>
			</div>
		</div>
	</div> -->

	<!-- modal add user 1 -->
	<div class="modal fade" id="exampleModalCenter">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> Add User </h5>
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
								     <label> First Name </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="User full name">
								    </div>

								    <div class="form-group">
									    <label> Last Name </label>
										<input type="text" for="fullname" name="fullname" class="form-control" placeholder="User full name">
								    </div>
								
									<div class="form-group">
								     <label> Email </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="User email address">
								    </div>

								    <div class="form-group">
									    <label for="email" class="form-label">Mobile</label>
										<input type="tel" name="phone" class="form-control check_empty" id="phone" required="" placeholder="50 123 4567">
										<span class="input_error_msg danger-color">Phone is required</span>
								    </div>								
								
									<div class="form-group">
								     <label> Password </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="Write Password">
								    </div>

								    <div class="form-group">
								     <label> confirm Password </label>
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
									   <!-- <th> Modify  </th> -->
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
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Customers </td>
									   <td> 
		                                 <div class="switch">
										 <input name="Customers" type="checkbox" value="1" id="Customers" checked="">
										 <label for="Customers"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Orders </td>
									   <td> 
		                                 <div class="switch">
										 <input name="Orders" type="checkbox" value="1" id="Orders" checked="">
										 <label for="Orders"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Command Center </td>
									   <td> 
		                                 <div class="switch">
										 <input name="CommandCenter" type="checkbox" value="1" id="CommandCenter" checked="">
										 <label for="CommandCenter"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Zones </td>
									   <td> 
		                                 <div class="switch">
										 <input name="zones" type="checkbox" value="1" id="zones" checked="">
										 <label for="zones"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Promotions </td>
									   <td> 
		                                 <div class="switch">
										 <input name="Promotions" type="checkbox" value="1" id="Promotions" checked="">
										 <label for="Promotions"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Subscription </td>
									   <td> 
		                                 <div class="switch">
										 <input name="Subscription" type="checkbox" value="1" id="Subscription" checked="">
										 <label for="Subscription"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Revenue </td>
									   <td> 
		                                 <div class="switch">
										 <input name="Revenue" type="checkbox" value="1" id="Revenue" checked="">
										 <label for="Revenue"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="dashboard1" type="checkbox" value="1" id="dashboard1" checked="">
										 <label for="dashboard1"></label> 
										  </div> 
									   </td> -->
									  </tr>
									  <tr>
									   <td> Notifications </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Menu Settings </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Track Staff </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Staff Report </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Staff </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Site Admin </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Popup Msg </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>

									  <tr>
									   <td> Service Setting </td>
									   <td> 
		                                 <div class="switch">
										 <input name="dashboard" type="checkbox" value="1" id="dashboard" checked="">
										 <label for="dashboard"></label> 
										  </div> 
									   </td>
									   <!-- <td> 
		                                 <div class="switch black">
										 <input name="MenuSettings" type="checkbox" value="1" id="MenuSettings" checked="">
										 <label for="MenuSettings"></label> 
										  </div> 
									   </td> -->
									  </tr>									  
									  
									 </tbody>
								   </table>
								 </div>
							   </div>
						   
							  <!-- 	<div class="col-lg-12">
								    <div class="add-zones-button">
									  <button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
									  <button type="submit" class="btn custom-btn-black w-50">Submit</button>
									</div>
							   </div>  -->
						  	</div>
						</form>
				   </div>

				   <div class="modal-footer w-100">
						<div class="add-zones-button">
							<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
							<button type="submit" class="btn custom-btn-black w-50">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	 </div>


	<!-- Modal Edit User -->

	<div class="modal fade" id="exampleModalCenter02" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">			
			<input type="hidden" name="_token" value="pMPEiGfYyCx8nWcXOkbGaPB2H1wi8rQaBaLWR190">
				<div class="modal-header">
					<h5 class="modal-title">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal"><span>×</span>
					</button>
				</div>
				<div class="modal-body">
				   	<div class="customer-add-form-box">
					   	<div class="responseAddCustomer" id="responseAddCustomer"></div>
						 
						  <div class="form-row">
						  
						  	<div class="mb-3 col-lg-6 col-md-12">
								<label for="firstname" class="form-label">First Name</label>
								<input type="text" name="firstname" class="form-control check_empty" id="firstname" required="" placeholder="First name">
								<span class="input_error_msg danger-color">First name is required</span>
						  	</div>
						  
						  	<div class="mb-3 col-lg-6 col-md-12">
								<label for="lastname" class="form-label">Last Name</label>
								<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last name">
								<span class="input_error_msg danger-color">Last Name is required</span>
						  	</div>
						 
						  	<div class="mb-3 col-lg-12 col-md-12">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" class="form-control check_empty" id="email" required="" placeholder="hello@keno.ae">
								<span class="input_error_msg danger-color">Email is required</span>
						  	</div>
						 
						  	<div class="mb-3 col-lg-12 col-md-12">
						  		<label for="email" class="form-label">Mobile</label>
								 <input type="tel" name="phone" class="form-control check_empty" id="phone" required="" placeholder="50 123 4567">
								 <span class="input_error_msg danger-color">Phone is required</span>
						  	</div>						  	
						  </div>					
					   	</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger light float-left w-30" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-black float-right w-50">Update </button>
					</div>
				</form>
			</div>
		</div>
	</div>
   

<!----END-YOUR-CODE-HERE----->
@endsection




   
 