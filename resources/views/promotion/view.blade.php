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
		   <h3> Promotions </h3>
		   <p> <small><img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""></small> > <small> Promotions </small> </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
		   <ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_2">
			 <form>
			   <input class="form-control" type="search" placeholder="&#xF002; Search Promotions" aria-label="Search">
			 </form>
			</li> 
			 <li> 
			  <div class="column-setting">
			   <a href="#" class="whiteshadow-custom-btn" data-toggle="modal" data-target="#exampleModalCenter01">
			   	<!-- <i class="fas fa-retweet"></i>  -->
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
								  <p class="draggable-item"> <input type="checkbox"/> <span> ID </span> 
								  	<!-- <i class="fas fa-arrows-alt"></i>  -->
								  	<span class="ti-move"></span>
								  </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Code</span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Description <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Total Allowed <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Per Customer <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Start </span> <span class="ti-move"></span></p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> End </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Used </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span> Status </span><span class="ti-move"></span> </p>
								
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
			 
			  <li> <a href="#" class="blue-custom-btn" data-toggle="modal" data-target="#addzonemodal"><span class="ti-plus"></span> Add New Code </a> </li>
			 
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
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Code: activate to sort column ascending" aria-sort="descending">Code</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Description</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Total Allowed: activate to sort column ascending">Total Allowed </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Per Customer: activate to sort column ascending">Per Customer</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start: activate to sort column ascending">Start</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="End: activate to sort column ascending">End</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Used: activate to sort column ascending">Used</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Status</th>
					</tr>
				</thead>
				<tbody>
				  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
				</tr>
                  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
				</tr>
  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
				</tr>
  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
				</tr>
  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
				</tr>
  
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> KENO2020 </strong></td>
					<td><strong> Apply KENO2020 & get: 20% Off </strong></td>
					<td><strong> 100 </strong></td>
					<td> 1 </td>
					<td> 12/12/2020 </td>
					<td> 12/01/2020 </td>
					<td> 12 </td>
					<td> <a href="#" class="success-color"> <strong>Active </strong> </a> </td>
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
				<h5 class="modal-title">Add New Promo</h5>
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="">
				  	<div class="add-zone-body-boxx">
				    	<div class="container">
							<div class="row">
							    <div class="col-lg-5">
								   	<div class="add-promo code_name">
				                     	<label for="Code-name"> Code Name </label>
									 	<input type="text" for="" name="" class="form-control border-0" value="" placeholder="EXPO2021">
				                   	</div>
				                  	<div class="add-promo">
									    <div class="add-promo d-flex">
										 <div class="switch-promo">
										 <span> <strong> Start Date
										 </strong></span>
										 <span class="promoo"><input type="date" for="" name="" value="" placeholder="12/12/2020"> </span>
										</div>
					                   </div>				 
				                 	</div>		

				                  	<div class="add-promo">
									    <div class="add-promo d-flex">
										 <div class="switch-promo">
										 <span> <strong> End Date
										 </strong></span>
										 <span class="promoo"><input type="date" for="" name="" value="" placeholder="12/12/2020"> </span>
										</div>
				                   	</div>
								 
				                   </div>
								 
								    <div class="add-promo d-flex">
										<div class="switch-promo">
										 	<span> <strong> Total Allowed
										 	</strong></span>
										 	<span class="promoo"> <i> 150 </i> <input type="checkbox">  Unlimited </span>
										</div>
				                   </div>
								   
								    <div class="add-promo d-flex">
									 	<div class="switch-promo">
									 		<span> <strong> Max Usage/Customer </strong></span>
									  		<span class="promoo"> <i> 150 </i> <input type="checkbox"> Unlimited </span>
										</div>
				                   	</div>
								 
								 <div class="add-promo">
								 	<div class="switch-promo">
								   		<textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Description"></textarea>
								 	</div>
								 </div>
								 <div class="add-promo">
								    <div class="switch">
									 	<span> <strong> Active/Inactive </strong></span><strong> </strong>
									  	<input name="activeinactive" type="checkbox" value="1" id="activeinactive">
									  	<label for="activeinactive"></label> 
									</div>
								 </div>
								</div>
								<div class="col-lg-7">
								   	<div class="promo-services">
								   		<h5 class="text-dark">Services Price </h5>
									    <div class="add-promo d-flex">
											<div class="switch-promo">
												<span> <strong> Discount Type 
												</strong></span>
												<span class="promoo"> <input type="checkbox"> % Percentage &nbsp&nbsp <input type="checkbox" checked> % Price  </span>
											</div>							
					                   </div> 	
								   </div>

									<div class="promo_accordion">
										<div class="accordion-item">
						                    <h2 class="accordion-header" id="flush-heading-promo-modal1-Two">
						                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-promo-modal1-Two" aria-expanded="false" aria-controls="flush-collapse-promo-modal1-Two"><b>
						                        Car Wash </b></button>
						                    </h2>
						                   	<div id="flush-collapse-promo-modal1-Two" class="accordion-collapse collapse" aria-labelledby="flush-heading-Banners-Two" data-bs-parent="#accordionFlushExample">
							                    <div class="accordion-body">Placeholder content for this accordion,which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this
							                    </div>
						                    </div>
						                </div>
						            </div>
						            <div class="modal_promo_table">
						            	<table class="table">
						            		<thead>
						            			<tr>
						            				<th>1</th>
						            				<th>Bike</th>
						            				<th>Saloon</th>
						            				<th>SUV</th>
						            			</tr>
						            		</thead>
						            		<tbody>
						            			<tr>
						            				<td><strong>Body</strong></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"> <span>AED</span></td>	            					            				
						            			</tr>

						            			<tr>
						            				<td><strong>Covid Killer Wash</strong></td>
						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"> <span>AED</span></td>	            					            				
						            			</tr>

						            			<tr>
						            				<td><strong>Interior@ Cleaning</strong></td>
						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"><span>AED</span></td>

						            				<td><input type="number" name="" class="service_model_price" placeholder="130"> <span>AED</span></td>	            					            				
						            			</tr>
						            		</tbody>					            		
						            	</table>
						            </div>

						            <div class="promo_accordion">
										<div class="accordion-item">
						                    <h2 class="accordion-header" id="flush-heading-promo-modal-Three">
						                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-promo-modal-Three" aria-expanded="false" aria-controls="flush-collapse-promo-modal-Three"> <b>
						                        Detailing </b></button>
						                    </h2>
						                   	<div id="flush-collapse-promo-modal-Three" class="accordion-collapse collapse" aria-labelledby="flush-heading-promo-modal-Three" data-bs-parent="#accordionFlushExample">
							                    <div class="accordion-body">Placeholder content for this accordion,which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this
							                    </div>
						                    </div>
						                </div>
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