@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->
<style>
.ninza_image{
	border-radius:100px;
}
</style>
<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
	    <div class="row">
		<div class="col-lg-4 col-md-12">
		  <div class="heading-content-nav">
		   <h3>  Staff Details </h3>
		   <p> <small> <i class="fas fa-chart-pie"></i> </small> > <small> Track Staff </small></p>
		  </div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content">
			<ul class="list-inline">
			 <li> <a href="#" class="whiteshadow-custom-btn"><i class="fas fa-filter"></i>  Filter  </a> </li>
			</ul>
		  </div>
		</div>
	  </div>
	  
	  <div class="row mt-3">
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
							<input name="viewMarkerInfo" type="radio" data-id="{{$iteration}}"  class="marker-link view_ninja_info-{{$iteration}}">
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
					   <p><strong> Current Order ID </strong> <br>'.$current_order_id.'</p>
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
		    <form>
			 <input type="text" for="mapsearch" name="mapsearch" class="form-control" placeholder="Search"> 
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
			 <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103070.16352999647!2d55.184521110648284!3d25.117585949518197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bc13cd5fb61%3A0xb8eba7dbb3225fa2!2sKeno%20Car%20Wash!5e0!3m2!1sen!2sin!4v1628247478710!5m2!1sen!2sin"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
			 <div id="showmap" style="width:100%; height:100%;">
		     </div>
			 
		<?php $main_array=array(
		array($singlestaffdetail->location->coordinates[1],$singlestaffdetail->location->coordinates[0],'Ninja','Start'),
		array($singlestaffdetail->current_order_address->location->coordinates[1],$singlestaffdetail->current_order_address->location->coordinates[0],'Destination','End')
		);?>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFzzVfXfUc91Eb1CWCfPVZZzgMB0U5xVU&callback=initMap"></script>
                  <script type="text/javascript">
				var locations=<?php echo json_encode($main_array); ?>;
				var map = new google.maps.Map(document.getElementById('showmap'), {
                       mapTypeId: google.maps.MapTypeId.ROADMAP,
					   mapTypeControl: false,
						mapTypeControlOptions:{
							style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
						},
						navigationControl: true,
						navigationControlOptions:{
						style: google.maps.NavigationControlStyle.SMALL
						 }
                     });
                     var infowindow = new google.maps.InfoWindow();
                     var bounds = new google.maps.LatLngBounds();
                     //Sunil Icon
                     var marker, i, newicon;
                     var markers1 = new Array();
                     for (i = 0; i < locations.length; i++) {
						 //addMarker(item.lat, item.long, '<b>' + item.name + '</b><br />' + item.desc);
						 
					 var icons = {
						url: locations[i][4], // url
						scaledSize: new google.maps.Size(40, 40), // scaled size
						origin: new google.maps.Point(0,0), // origin
						anchor: new google.maps.Point(0,0), // anchor
						fillColor: '#23BAF0',
					};
                       marker = new google.maps.Marker({
                         position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                         map: map,
                         icon: icons,
                         title: locations[i][2]
                       });
                        bounds.extend(marker.position);
                       google.maps.event.addListener(marker, 'click', (function(marker, i) {
                         return function() {
                           infowindow.setContent(locations[i][3]);
                           infowindow.open(map,marker);
                           $('.view_ninja_info-'+i).click();
						   map.setCenter(marker.getPosition());
						   infowindow.open(map,marker);
						   map.setZoom(11);
                         }
                       })(marker, i));
                       markers1.push(marker);  
                     }
                   map.fitBounds(bounds);
                       var listener = google.maps.event.addListener(map, "idle", function () {
                         map.setZoom(14);
                         google.maps.event.removeListener(listener);
                     });
					 
			   var route= new google.maps.Polyline({
				path: markers1,
				strokeColor: "#23BAF0",
				strokeOpacity: 1.0,
				strokeWeight: 2
			  });
				route.setMap(map);
				center = bounds.getCenter();
			map.fitBounds(bounds);
                  </script>
				  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<style>
.abcds{ border:10px solid #900!important; }
</style>
<script>
$('.marker-link').on('click', function (){
    google.maps.event.trigger(markers1[$(this).data('id')], 'click');
});

$(document).ready(function() {
    $('#staffTable').DataTable( {
        "paging":   false,
        "ordering": true,
        "info":     false
    } );
} );

setTimeout(function(){
	$(document).find('.gm-style').find('img').addClass('ninza_image'); 
	$('.ninja_img').each(function(i, obj) {
    $(document).find('.gm-style').find('img[src="'+obj.src+'"]').addClass($(this).attr('class'));
});
	}, 1500);

</script>			  
<!----------------->
			
		  </div>
		</div>
	  </div>
	
	</div>
   </div>
</div>

<!----END-YOUR-CODE-HERE----->
@endsection