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
		   		<h3> Track Staff </h3>
		   		<p> <small> <img class="common_dash_top_icon" src="{{asset('public/assets/image/dashbaord_Icon.png')}}" alt=""> </small> > <small> Track Staff </small></p>
		  	</div>
		</div>
		<div class="col-lg-8 col-md-12">
		  <div class="dashboard-right-content">
			<ul class="list-inline">

			   <li class="nav-item trackstaff-dropdown">
				  <a class="nav-link bell ai-icon whiteshadow-custom-btn" href="#" role="button" data-toggle="dropdown">
						<span class="ti-filter"></span>  Filter
					</a>
					<div class="dropdown-menu track-staff-drop dropdown-menu-right">
						<div id="trackstaff-center-id" class="widget-media dz-scroll ps">
						  <h5> City Filter  </h5>
						  <div class="citys-trackstaff">
						  @if(!empty($allcity))
							  @foreach($allcity as $city)
									<a onclick="changecity('{{$city->_id}}','{{url('dashboard/filterstaff')}}')" href="javascript:void(0)">{{$city->name}}</a>
						     @endforeach
				          @endif
							</div>
					   </div>
					</div>
				</li>
			</ul>
		  </div>
		</div>
	  </div>
	  
	  <div class="row mt-3" id="MainResponseId">
		<div class="col-lg-4 col-md-12">
		  <div class="track-ninja-list">
			<div class="table-responsive mt-3">
				<div id="example_wrapper" class="dataTables_wrapper">
				<table id="staffTable" class="display dataTable" role="grid" aria-describedby="example_info">
					<thead>
						<tr role="row" class="stafftable_head">
						<th  rowspan="1" colspan="1" class="border-0">Ninja</th>
						<th class="sorting_desc border-0" aria-controls="staffTable" aria-label="Details: activate to sort column ascending" aria-sort="ascending">Details</th>
						<th class="border-0">Action</th>
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
							<td class="no-sort">
							 <img src="{{ $staff->avatar->default_path}}" alt="" class="ninja_img {{$class}}">
							</td>
							<td class="sorting_1">
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
							<td class="no-sort">
							@if(isset($staff->location->coordinates))
							<input name="viewMarkerInfo" type="radio" data-id="{{$iteration}}" data-position="{lat:{{$staff->location->coordinates[1]}}, lng: {{$staff->location->coordinates[0]}}}" id="view_ninja_info-{{$iteration}}" class="marker-link view_ninja_info-{{$iteration}}">
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
					   <p>  <span class="ninja_popup_filed">Name </span> <br><span class="fw-bold"> '.$cleaner_first_name.' '.$cleaner_last_name.' </span></p>
					   <p><span class="ninja_popup_filed">Status </span><br> <span class="'.$color.'-text"><strong> '.$av_status.' </strong> </span> </p>
					   <p> <span class="ninja_popup_filed">Service Charges</span>  <br> <span class="fw-bold">'.$current_order_service_charge.' AED </span></p>
					   <p> </p>
					  </div>
					  <div class="right-view-map">
					   <p><span class="ninja_popup_filed"> Staff Role</span>  <br> <span class="'.$color.'-text"> <strong>Ninja</strong> </span> </p>
					   <p> <span class="ninja_popup_filed">Current Order ID </span>  <br> <span class="fw-bold">'.$current_order_id.'  </span></p>
					   <p><span class="ninja_popup_filed"> Order Address </span>  <br><small><span class="fw-bold">'.$current_address.'</span></small> </p>
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
		    <form action="{{url('dashboard/searchstaff')}}" method="post" name="mapSearchForm" id="mapSearchForm">
			@csrf

			 <input type="text" for="mapsearch" name="searchkeyword" class="form-control" placeholder="&#xF002; Search"> 
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
			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFzzVfXfUc91Eb1CWCfPVZZzgMB0U5xVU&callback=initMap"></script>
                  <script type="text/javascript">
					 var locations=<?php echo json_encode($main_array); ?>;
                     var map = new google.maps.Map(document.getElementById('showmap'), {
                       mapTypeId: google.maps.MapTypeId.ROADMAP,
					   center: {lat: 25.2048, lng: 55.2708},
					   zoom: 10,
					   fullscreenControl:true
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
                        //bounds.extend(marker.position);
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

					 
                     //map.fitBounds(bounds);
                      // var listener = google.maps.event.addListener(map, "idle", function () {
                      //   map.setZoom(4);
                      //   google.maps.event.removeListener(listener);
                    // });
                     // Trigger a click event on each marker when the corresponding marker link is clicked
                  </script>
				  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<style>
.abcds{
	border:10px solid #900!important;
}
</style>
<script>
$('.marker-link').on('click', function (){
                        google.maps.event.trigger(markers1[$(this).data('id')], 'click');
                     });
					 
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

setTimeout(function(){
	$(document).find('.gm-style').find('img').addClass('ninza_image'); 
	$('.ninja_img').each(function(i, obj) {
    $(document).find('.gm-style').find('img[src="'+obj.src+'"]').addClass($(this).attr('class'));
});
	}, 2000);

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
	
	</div>
   </div>
</div>

<script> 
setInterval(function(){ 
     $(document).find('[title]').each(function(){ 
			var attr = $(this).attr('aria-label');
			if (typeof attr !== 'undefined' && attr !== false) {
			    $(this).attr('title','');
			}
	 }); 
	 $(document).find('#staffTable_filter input[type="search"]').attr('placeholder','Search Ninja');
}, 200);
</script>

<!----END-YOUR-CODE-HERE----->
@endsection