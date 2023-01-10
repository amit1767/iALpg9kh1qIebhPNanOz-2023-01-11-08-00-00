@if(!empty($orderrequest_orderlist->data))
				@php $i=$increment; @endphp
				@foreach($orderrequest_orderlist->data as $staff_order)
				@php $i++; @endphp
		  <div role="tabpanel" class="tab-pane @if($i==1) active @endif" id="Sections5-{{$i}}">
		  <!-- <div class="action-buttons">
		  <ul class="list-inline">
		    <li class="nav-item command-dropdown show">
			  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="true"> Action </a>
				<div class="dropdown-menu dropdown-menu-right">
					<div id="actionn-01" class="action-widget-box widget-media dz-scroll ps">
					  <h5> Action  </h5>
						<ul class="timeline p-3">
						  <li> <a href=""> Add Vehicle  </a></li>	
						  <li> <a href=""> Add Order  </a></li>	
						  <li> <a href=""> Edit Order  </a></li>	
						  <li> <a href=""> UnAssign  </a></li>	
						  <li> <a href="" class="danger-color"> Cancel  </a></li>	
						</ul>
				   </div>
				</div>
			  </li>
			</ul>  
			</div> -->
		   <div class="customers-detail-edits-main-box">
			 <div class="customer-icon-box-ri">
				<div class="stated-boxs">
				  <h5>@if(!empty($staff_order->cleaner->cleaner_first_name)) {{$staff_order->cleaner->cleaner_first_name}} {{$staff_order->cleaner->cleaner_last_name}} @endif</h5>
				</div>
				<div class="social-iconn">
				  <p> <a href="@if(!empty($staff_order->cleaner->phone)) https://wa.me/{{$staff_order->cleaner->phone}} @endif"> <img src="{{ asset('public/assets/image/whatsapp.png')}}" alt=""> </a></p>
				  <p> <a href="tel:@if(!empty($staff_order->cleaner->phone)) {{$staff_order->cleaner->phone}} @endif"> <img src="{{ asset('public/assets/image/calll.png')}}" alt=""> </a> </p>
				</div>
		
			  </div>

			   <div class="body-small-details">
				 <p> Order Id <span> <b> @if(!empty($staff_order->_id)) {{$staff_order->_id}} @endif </b></span> </p>
				 <p> Order Count <span>@if(!empty($staff_order->cust_order_count)) {{$staff_order->cust_order_count}} @endif </span> </p>
				 <p> Scheduled For <span> <b>@if(!empty($staff_order->time_book_order)) {{ date('d/m/Y h:i A',strtotime($staff_order->time_book_order))}} @endif </b> </span> </p>
			  </div> 
		    </div>
		   
		     <div class="body-small-details assign-ninja-boxx">
			   @if(!empty($staff_order->cars))
				   @foreach($staff_order->cars as $mcars)
						 <div class="customer-icon-box-up-02">
							<img class="iconn-image" src="@if(!empty($mcars->make_by->image)) {{$mcars->make_by->image}} @endif" alt="@if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif">
							<div class="customer-detail-012">
							  <h5> @if(!empty($mcars->make_by->name)) {{$mcars->make_by->name}} @endif @if(!empty($mcars->make_by->car_model)) {{$mcars->make_by->car_model}} @endif @if(!empty($mcars->make_by->car_year)) {{$mcars->make_by->car_year}} @endif  </h5>
							  <p><span class="chceckk" style="background: #{{$mcars->color->code}};"> </span> @if(!empty($mcars->city->name)) {{$mcars->city->name}}  @endif @if(!empty($mcars->make_by->car_number)) {{$mcars->make_by->car_number}} @endif</p>
							</div>
						  </div>
				   @endforeach
				@endif	
				
				@php $total_price=0; @endphp
				 @if(!empty($staff_order->items))
				   @foreach($staff_order->items as $item)
			   @php $total_price+=$item->cost; @endphp
						 <p> <strong>  @if(!empty($item->name)) {{$item->name}} @endif </strong> <span>@if(!empty($item->cost)) {{$item->cost}} @endif <b>AED</b></span> </p>
					@endforeach
				@endif					
						 @php $VAT=0; @endphp
						 @if(!empty($staff_order->vat->percent))
							@php $VAT=($total_price*$staff_order->vat->percent)/100; @endphp
						 @else
							@php  $VAT=!empty($staff_order->vat->amount) ? $staff_order->vat->amount : 0; @endphp
						 @endif
						 
						 <p> Subtotal  <span><b> {{$total_price}} AED </b> </span>
						 <br> VAT <span> <b> {{$VAT}} AED </b> </span> <br>
						 <strong style="color:#23BAF0;"> Order Charges </strong> <span> <b style="color:#23BAF0;"> @php $total=$total_price+$VAT; @endphp {{$total}} AED </b> </span>  </p>
						<div class="moreiInfo">
						  <p> Payment </p>
							<div class="payment-select">
							  <select> 
								<option value="Credit Card "> Credit Card </option>
								<option value="Credit Card "> Dabit Card </option>
								<option value="Credit Card "> paypal </option>
							  </select>
							</div>
					   </div>
					
			 </div>
		   
		   <div class="tracking-detail-box">
			 <h3> Tracking Details </h3>
		<p> Order at <span> <strong>@if(!empty($staff_order->time_book_order)) {{ date('d/m/Y h:i A',strtotime($staff_order->time_book_order))}} @endif </strong> </span> </p>
		<p> Scheduled For <span> <strong> @if(!empty($staff_order->time_confirmed)) {{ date('d/m/Y h:i A',strtotime($staff_order->time_confirmed))}} @endif </strong> </span> </p>	 
		<p> Update at  <span> <strong> @if(!empty($staff_order->updatedAt)) {{ date('d/m/Y h:i A',strtotime($staff_order->updatedAt))}} @endif </strong> </span> </p>
		<p> Update by <span> <strong> @if(!empty($staff_order->cleaner->cleaner_first_name)) {{$staff_order->cleaner->cleaner_first_name}} {{$staff_order->cleaner->cleaner_last_name}} @endif </strong> </span> </p>
		<p> Assign by <span> <strong> @if(!empty($staff_order->cleaner->cleaner_first_name)) {{$staff_order->cleaner->cleaner_first_name}} {{$staff_order->cleaner->cleaner_last_name}} @endif </strong> </span> </p>
			 
		   </div>
		   <div class="notee-boxx">
			 <h3> Note: <span> <small>@if(!empty($staff_order->address->notes)) {{$staff_order->address->notes}} @endif </small> </span></h3>
		   </div>
		   <div class="before-picture">
			  <h3> Before Picture </h3>
			  <form>
			  <div class="row">
				<div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
				   <div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
			  </div>
			  </form>
		   </div>
		   <div class="before-picture">
			  <h3> After Picture </h3>
			  <form>
			  <div class="row">
				<div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
				   <div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
				 <div class="col-lg-6 col-md-12">
				  <div class="pictur-upload-box">
				   <input type="file">
					<div class="pictur-ipload-text">
					 <i class="fas fa-camera"></i>
					 <p> Front Side </p>
				   </div>
				  </div>
				</div>
			  </div>
			  </form>
		   </div>
		   
		</div>
		@endforeach
 @endif