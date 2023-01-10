<!-- @if(isset($categories))
				@foreach($categories as $category)
				    <div class="car-wash-c-order">
					  <div class="car-wash-headingg">
					    <img src="@if(!empty($category->ot_icon)) {{$category->ot_icon}} @endif" alt="@if(!empty($category->ot_icon)) {{$category->ot_icon}} @endif">
						<h5> @if(!empty($category->ot_name)) {{$category->ot_name}} @endif </h5>
					  </div>
					  <div class="car-wash-details-box" >
                        @foreach($services as $service)
		                    <p> @if(!empty($service->service_name)) {{$service->service_name}} @endif <span>  @if(!empty($service->service_charge)) {{$service->service_charge}} @endif AED <input type="checkbox" class="carwash-check"> </span> </p>
	                    @endforeach
					  </div>
					</div>
				@endforeach
				@endif -->


<!-- @if(isset($services))
	@foreach($services as $service)
		<p> @if(!empty($service->service_name)) {{$service->service_name}} @endif <span>  @if(!empty($service->service_charge)) {{$service->service_charge}} @endif AED <input type="checkbox" class="carwash-check"> </span> </p>
	@endforeach
@endif -->