@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
	
	<div class="container-fluid">
	  
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3> Pop Up Message </h3>
		   <p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Pop Up Message </small> </p>
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
								  <p class="draggable-item"> <input type="checkbox"/> <span>Title </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Message En  </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Message Ar </span><span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Button En </span> <span class="ti-move"></span> </p>
								  <p class="draggable-item"> <input type="checkbox"/> <span>Button Ar </span> <span class="ti-move"></span></p>
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
			  <li> <a href="#" class="customeradd-custom-btn" data-toggle="modal" data-target="#exampleModalCenter"> <span class="ti-plus"></span> Add New </a> 
			
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title"> Add New Pop Up Message </h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
							   <div class="popup-messagee-form-box">
								 <form>
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
		  <div class="pop-up-message-box">
		   <div class="table-responsive mt-5">
				<div id="example_wrapper" class="dataTables_wrapper">
				<table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
					<thead>
						<tr role="row">
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label=" ID: activate to sort column ascending"> ID </th>
						<th class="sorting_desc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" aria-sort="descending">Title</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Message En: activate to sort column ascending">Message En</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Message Ar: activate to sort column ascending">Message Ar </th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Button En: activate to sort column ascending">Button En</th>
						
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Button Ar: activate to sort column ascending">Button Ar</th>

						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="action: activate to sort column ascending">Action</th>
						<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="action: activate to sort column ascending"> <span style="opacity:0;">Button </span></th>
						</tr>
					</thead>
					<tbody>
					  
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. You may order services for your new  ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات  رحلتك الجديدة من الشاشة  الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span></a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span></a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span></a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>  Your ride has been added successfully. You may order services for your new  ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات  رحلتك الجديدة من الشاشة  الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span> </a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
					<tr class="odd" role="row">
						<td class="">57050</td>
						<td class="sorting_1"><strong> Ride Added </strong></td>
						<td>Your ride has been added successfully. 
You may order services for your new 
ride from the main screen.</td>
						<td>تمت إضافة رحلتك بنجاح. يمكنك طلب خدمات 
رحلتك الجديدة من الشاشة 
الرئيسية.</td>
						<td>ok </td>
						<td> 
						 نعم
						</td>
						<td> <a href="#" class="success-color action-act"> <span class="ti-pencil"></span></a> </td>
						<td> <a href="#" class="gree-custom-btn"> Preview </a> </td>
				    </tr>
				  </tbody>
					
				</table>
				</div>
			</div>
		  </div>
		  </div>
	   </div>
	</div>
</div>

<!----END-YOUR-CODE-HERE----->
@endsection