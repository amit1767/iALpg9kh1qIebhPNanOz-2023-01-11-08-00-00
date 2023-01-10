                
                @if(!empty($trackingdetails))
					@php $i=0; @endphp
                    @foreach($trackingdetails as $trackingdata)
					@php $i++; @endphp
                        
                            <div class="accordion-item tracking_detail_card">
							    <h2 class="accordion-header" id="panding_tracking_heading_1">
							      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panding_tracking_collapse_1-{{$i}}" aria-expanded="true" aria-controls="panding_tracking_collapse_1">
							        	<p>@if(!empty($trackingdata->message)){{$trackingdata->message}}@endif</p>
							      		<p>@if(!empty($trackingdata->createdAt)){{date('H:i',strtotime($trackingdata->createdAt))}}@endif <i class="fas fa-chevron-down"></i></p>			      	
							      	</button>
							    </h2>
							    <div id="panding_tracking_collapse_1-{{$i}}" class="accordion-collapse collapse border-0" aria-labelledby="panding_tracking_heading_1" >
							      	<div class="accordion-body tracking_detail_info_row">
							        	<p> <img class="mr-2" src="{{asset('public/assets/image/tracking_user_icon.png')}}" alt=""> @if(!empty($trackingdata->user->name)){{$trackingdata->user->name}}@endif </p>
										<p><i class="far fa-clock"></i> @if(!empty($trackingdata->createdAt)){{date('d/m/Y, H:i',strtotime($trackingdata->createdAt))}}@endif <img class="ml-2" src="{{asset('public/assets/image/keno_pin.png')}}" alt=""></p>
							      	</div>
							    </div>
							</div>
                       

                    @endforeach
                @endif