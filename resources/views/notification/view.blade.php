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
		   <h3> Notification </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Notification </small> </p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content dashboard-r-c-res">
			<ul class="list-inline list-in-res">
			<li class="order-searchh common_search_box_2">
			 <form>
				<input class="form-control" type="search" placeholder="&#xF002; Search Notification " aria-label="Search">
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
								  <p class="draggable-item"> <input type="checkbox"/> <span> Id </span> 
								  	<!-- <i class="fas fa-arrows-alt"></i>  -->
								  	<span class="ti-move"></span>
								  </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Title</span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Discription </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Button text </span><span class="ti-move"></span></p>
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
			
			 <li> <a href="#" class="customeradd-custom-btn" data-toggle="modal" data-target="#exampleModalCenter"> <span class="ti-plus"></span> Add New Notification </a> 
			
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter">
					<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">  Add New Notification     </h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <div class="popup-messagee-form-box">
								 <form>
								  <div class="row">
								   <div class="col-lg-8 col-md-12">
								    <div class="row">
								   <div class="col-lg-6 col-md-12">
								    <div class="form-group">
								     <label> Title En </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="Ride Added">
								    </div>
								   </div>
								    <div class="col-lg-6 col-md-12">
								    <div class="form-group">
								     <label> Title Ar </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="تمت إضافة ركوب">
								    </div>
								   </div>
								    <div class="col-lg-12 col-md-12">
								    <div class="form-group">
								     <label> Message En </label>
									  <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,  </textarea>
								    </div>
								   </div> 
								   <div class="col-lg-12 col-md-12">
								    <div class="form-group">
								     <label> Message Ar </label>
									  <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Description">لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ،</textarea>
								    </div>
								   </div>
								   <div class="col-lg-6 col-md-12">
								    <div class="form-group">
								     <label> Button En </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="Ok">
								    </div>
								   </div>
								    <div class="col-lg-6 col-md-12">
								    <div class="form-group">
								     <label> Button Ar </label>
									  <input type="text" for="fullname" name="fullname" class="form-control" placeholder="حسنا">
								    </div>
								   </div>
								   <div class="col-lg-12">
								     <div class="form-group">
										 <div class="col-ting">
										<div class="control-group file-upload" id="file-upload1">
										  <div class="image-box text-center">
												<p> <span>+</span>  <br> <small> Attach Car Photo </small></p>
												
												<img src="" alt="">
											</div>
										  <div class="controls" style="display: none;">
												<input type="file" name="contact_image_1">
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
								   <div class="col-lg-4 col-md-12">
								   <div class="notifaction-imagee">
								      <img src="{{ asset('public/assets/image/notificationnn.png')}}" alt="">
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
			 <table id="example" class="display dataTable" role="grid" aria-describedby="example_info">
				<thead>
					<tr role="row">
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID</th>
					<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" aria-sort="descending">Title</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Discription: activate to sort column ascending">Discription</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Button Text: activate to sort column ascending">Button Text </th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category Type: activate to sort column ascending">Action</th>
					<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Category Type: activate to sort column ascending"><span style="opacity:0;">Action </span></th>
					</tr>
				</thead>
				<tbody>
				  
				
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1">
					  	<!-- <i class="far fa-edit"></i> -->
					  	<span class="ti-pencil"></span>
					  </a>
					</td>
					<td> <a href="#" class="gree-custom-btn">
						<!-- <i class="far fa-paper-plane"></i> -->
						<span class="ti-plus"></span>
					 Send Notification </a> </td>
				</tr>
				<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1"><span class="ti-pencil"></span></a>
					</td>
					<td> <a href="#" class="gree-custom-btn"><span class="ti-plus"></span> Send Notification </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1"><span class="ti-pencil"></span></a>
					</td>
					<td> <a href="#" class="gree-custom-btn"><span class="ti-plus"></span> Send Notification </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1"><span class="ti-pencil"></span></a>
					</td>
					<td> <a href="#" class="gree-custom-btn"><span class="ti-plus"></span> Send Notification </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1"><span class="ti-pencil"></span></a>
					</td>
					<td> <a href="#" class="gree-custom-btn"><span class="ti-plus"></span> Send Notification </a> </td>
				</tr>
<tr role="row">
					<td class="">57050</td>
					<td class="sorting_1"><strong> You get: 50% off your first order </strong></td>
					<td><strong> Thanks for signing up! OK, sure we just met, but we want to make sure you’ll ….. </strong></td>
					<td><strong> Order Now </strong></td>
					<td>
					  <a href="#" class="btn danger-custom-btn btn-xs sharp"><i class="far fa-trash-alt"></i></a>
					  <a href="#" data-toggle="modal" data-target="#editaddresspopup" class="btn success-custom-btn btn-xs sharp mr-1"><span class="ti-pencil"></span></a>
					</td>
					<td> <a href="#" class="gree-custom-btn"><span class="ti-plus"></span> Send Notification </a> </td>
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