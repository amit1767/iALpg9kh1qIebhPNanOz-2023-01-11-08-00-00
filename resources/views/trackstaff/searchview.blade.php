
		<div class="col-lg-4 col-md-12">
		  <div class="track-ninja-list">
			<div class="table-responsive mt-3">
				<div id="example_wrapper" class="dataTables_wrapper">
				<table id="staffTable" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
						<tr role="row">
						<th class="sorting_desc" tabindex="0" aria-controls="staffTable" rowspan="1" colspan="1" aria-label="Ninja: activate to sort column ascending" aria-sort="descending">Ninja</th>
						<th>Details</th>
						<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@php $main_array=array(); @endphp
					@if(!empty($staffdetails))
					@php
				$jsdata='';
				$num=0;
				$Available=0;
				$EnRoute=0;
				$Busy=0;
				$iteration=0;
				@endphp	
						@foreach($staffdetails as $staff)
						@if(strpos(strtolower($staff->cleaner_first_name), strtolower($searchkeyword))!=false ||   strpos(strtolower($staff->cleaner_last_name), strtolower($searchkeyword))!=false || strpos(strtolower($staff->cleaner_first_name.' '.$staff->cleaner_last_name), strtolower($searchkeyword))!==false)
					@php $num++; $class=""; $color="#FFF";
					
					@endphp
					           @if(isset($staff->cleaner_available) && $staff->cleaner_available==1)@php $av_status='Available'; $Available++; $color="#7ED385";  $class="green-border"; @endphp @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==2)@php $av_status='On Task'; $Busy++; $color="#23BAF0"; $class="blue-border"; @endphp @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==3)@php $av_status='Going'; $EnRoute++; $color="#23BAF0"; $class="blue-border"; @endphp@endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==4)@php $av_status='Working'; $Busy++; $color="#FE525D"; $class="red-border"; @endphp @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==0)@php $av_status='Unavailable'; $color="#FE525D"; $class="red-border"; @endphp @endif
					
					    <tr class="@if($num%2==0) even @else odd @endif " role="row">
							<td class="sorting_1">
							 <img src="{{ $staff->avatar->default_path}}" alt="" class="ninja_img {{$class}}">
							</td>
							<td>
							   <p>{{ $staff->cleaner_first_name}} {{ $staff->cleaner_last_name}} - 
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==1)<span class="green-text"> Available </span> @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==2)<span class="orange-text"> On Task</span> @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==3)<span class="blue-text"> Going </span>@endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==4)<span class="green-text"> Working</span> @endif
							   @if(isset($staff->cleaner_available) && $staff->cleaner_available==0)<span class="red-text"> Unavailable</span> @endif
							    </p>
								<p class=""><small> <strong>City-</strong> {{$staff->cleaner_city_name}} </small> </p>
							   <p class="{{$color}}-text"><small> Ninja </small> </p>
							   <div id="rating">
							   @if(isset($staff->ratings) && $staff->ratings->avg >0)
								   @for($i=1;$i<=round($staff->ratings->avg);$i++)
									<i class="fa fa-star active"></i>
								   @endfor
							   @endif
								</div>
							</td>
							<td>
							@if(isset($staff->location->coordinates))
							<input name="viewMarkerInfo" type="radio" data-id="{{$iteration}}" id="view_ninja_info-{{$iteration}}" class="marker-link view_ninja_info-{{$iteration}}">
						@else
						{{'Missing Coordinates'}}
							@endif 
							</td>
						</tr>
					@php
					$subarray=array();
			if(isset($staff->location->coordinates)){
					$lat=$staff->location->coordinates[1];
					$long=$staff->location->coordinates[0];

					$current_order_service_charge=!empty($staff->current_order_service_charge) ? $staff->current_order_service_charge : 0;
					$current_order_id =!empty($staff->current_order_id) ? $staff->current_order_id :0;
					$current_address =!empty($staff->current_order_address) ? $staff->current_order_address : '';
					$cleaner_first_name =!empty($staff->cleaner_first_name) ? $staff->cleaner_first_name : '';
					$cleaner_last_name =!empty($staff->cleaner_last_name) ? $staff->cleaner_last_name : '';
					$cleaner_id =!empty($staff->id) ? $staff->id : '';

					$main_array[]=array(
					'<div class="info_window">
					<div class="main-info-headingg">
					   <h4> Staff ID: '.$cleaner_id.' </h4>
					 </div>
					 <div class="info-window-inner">
					  <div class="left-view-map">
					   <p><strong> Name </strong> <br> '.$cleaner_first_name.' '.$cleaner_last_name.' </p>
					   <p><strong>Status</strong> <br> <span class="'.$color.'-text"><strong> '.$av_status.' </strong> </span> </p>
					   <p><strong> Service Charges </strong> <br>  '.$current_order_service_charge.' AED </p>
					   <p> </p>
					  </div>
					  <div class="right-view-map">
					   <p><strong> Staff Role </strong> <br> <span class="'.$color.'-text"> <strong>Ninja</strong> </span> </p>
					   <p><strong> Current Order ID </strong> <br> '.$current_order_id.' </p>
					   <p><strong> Order Address </strong> <br> <small>'.$current_address.'</small></p>
					  </div>
					  </div>
					</div>',
					$lat,
					$long,
					$av_status,
					$staff->avatar->default_path,
					$color
					);
					}
				if(isset($staff->location->coordinates)){ $iteration++; }
					 @endphp
					 
                      @endif
						@endforeach
					@endif
				   </tbody>
					
				</table>

				</div>
			</div>
			
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="map-overlay-boxed">
		    <form action="{{url('dashboard/searchstaff')}}" method="post" name="mapSearchForm" id="mapSearchForm">
			@csrf
			 <input type="text" for="mapsearch" name="searchkeyword" class="form-control" placeholder="Search"> 
			</form>
			
			<div class="map-color-cordinate-box">
			  <ul class="list-inline">
			    <li> <span class="green-dott"></span> Available:{{$Available}} </li>
                <li> <span class="red-dott"></span> Busy:{{$Busy}} </li> 
                <li> <span class="blue-dott"></span> EnRoute:{{$EnRoute}} </li> 				
			  </ul>
			</div>
			
		  </div>
		  <div class="tracking-ninja-mapp">
			<div id="map_wrapper">
			 <div id="showmap" style="width:100%; height:100%;">
		     </div>
                  <script type="text/javascript">
					 var locations=<?php echo json_encode($main_array); ?>;
                     var map = new google.maps.Map(document.getElementById('showmap'), {
                       mapTypeId: google.maps.MapTypeId.ROADMAP,
                     });
                     var infowindow = new google.maps.InfoWindow();
                     var bounds = new google.maps.LatLngBounds();
                     //Sunil Icon
                     var marker, i, newicon;
                     var markers1 = new Array();
                     for (i = 0; i < locations.length; i++) {
					 var icons = {
						url: locations[i][4], // url
						scaledSize: new google.maps.Size(40, 40), // scaled size
						origin: new google.maps.Point(0,0), // origin
						anchor: new google.maps.Point(0,0), // anchor
						fillColor: locations[i][5],
					};
                       marker = new google.maps.Marker({
                         position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                         map: map,
                         icon: icons,
                         title: locations[i][0]
                       });
                        bounds.extend(marker.position);
                       google.maps.event.addListener(marker, 'click', (function(marker, i) {
                         return function() {
                           infowindow.setContent(locations[i][0]);
                           infowindow.open(map,marker);
                           $('.view_ninja_info-'+i).click();
						   map.setCenter(marker.getPosition());
						   infowindow.open(map,marker);
						   map.setZoom(11);
						   //abcd(i);
                         }
                       })(marker, i));
                       markers1.push(marker);  
                     }
                     map.fitBounds(bounds);
                       var listener = google.maps.event.addListener(map, "idle", function () {
                         map.setZoom(12);
                         google.maps.event.removeListener(listener);
                     });
                     // Trigger a click event on each marker when the corresponding marker link is clicked
                  </script>
				  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<style>
.abcds{
	border:10px solid #900!important;
}
</style>
<script>
$(document).ready(function() {
    $('#staffTable').DataTable({
        "paging":   false,
        "ordering": true,
        "info":     false,
		"columnDefs": [
        { "orderable": false, "targets": 0 }
        ]
    });
});
$('.marker-link').on('click', function (){
                        google.maps.event.trigger(markers1[$(this).data('id')], 'click');
                     });

setTimeout(function(){
	$(document).find('.gm-style').find('img').addClass('ninza_image'); 
	$('.ninja_img').each(function(i, obj) {
    $(document).find('.gm-style').find('img[src="'+obj.src+'"]').addClass($(this).attr('class'));
});
	}, 800);

function abcd(i){
	$('.track-ninja-list').animate({ scrollTop: $('#view_ninja_info-'+i).offset().top},'slow');
	};

//$('.ninja_img').each(function(i, obj) {
//    $(document).find('.gm-style').find('img[src="'+obj.src+'"]').addClass($(this).attr('class'));
//});

</script>			  
                  <!----------------->
			
		  </div>
		</div>
	  </div>