<?php //print_r($taskdetails); 
$start_lat=isset($taskdetails->cleaner->location->coordinates[1]) ? $taskdetails->cleaner->location->coordinates[1] : 22.699859;
$start_long=isset($taskdetails->cleaner->location->coordinates[0]) ? $taskdetails->cleaner->location->coordinates[0] : 75.867255;
$end_lat=isset($taskdetails->location->coordinates[1]) ? $taskdetails->location->coordinates[1] : 22.7635;
$end_long=isset($taskdetails->location->coordinates[0]) ? $taskdetails->location->coordinates[0] : 75.8725;
	?>
	<div class="col-lg-8 col-md-12">
	   <div class="map-vieww">
		   <div id="showmap" style="width:90%; height:90%;">
		   <?php if(empty($start_lat) && empty($start_long) && empty($start_lat) && empty($start_long)){ echo '<p>Coordinate Missing</p>'; } ?>
		   </div>
	   </div>
	</div>
	<div class="col-lg-4 col-md-12">	   		
		<div class="tracking-detail-box">
		  	<div class="traking_details">
		  		<h3> Tracking Details </h3>

		  		<div class="accordion" id="tracking_accordion_1">

				  	<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_1">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_1" aria-expanded="true" aria-controls="tracking_collapse_1">
					        	<p>Assign</p>
					      		<p>10:43 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_1" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_1" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p> <img class="mr-2" src="{{asset('public/assets/image/tracking_user_icon.png')}}" alt=""> Abid </p>
								<p><i class="far fa-clock"></i> 09/09/2020, 10:43 <img class="ml-2" src="{{asset('public/assets/image/keno_pin.png')}}" alt=""></p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_2">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_2" aria-expanded="true" aria-controls="tracking_collapse_2">
					        	<p>Seen</p>
			      				<p>10:45 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_2" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_2" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p><img class="mr-2" src="{{asset('public/assets/image/ninja_face.png')}}" alt=""> Alfredo</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 10:45 </p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_3">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_3" aria-expanded="true" aria-controls="tracking_collapse_3">
					        	<p>Enroute</p>
			      				<p>10:47 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_3" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_3" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p><img class="mr-2" src="{{asset('public/assets/image/ninja_face.png')}}" alt=""> Alfredo</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 10:47</p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_4">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_4" aria-expanded="true" aria-controls="tracking_collapse_4">
					        	<p>Unassigned</p>
			      				<p>11:00 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_4" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_4" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p> <img class="mr-2" src="{{asset('public/assets/image/tracking_user_icon.png')}}" alt=""> Abid</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 11:00</p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_5">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_5" aria-expanded="true" aria-controls="tracking_collapse_5">
					        	<p>Assign</p>
			      				<p>11:15 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_5" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_5" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p> <img class="mr-2" src="{{asset('public/assets/image/tracking_user_icon.png')}}" alt=""> Abid</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 11:15</p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_6">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_6" aria-expanded="true" aria-controls="tracking_collapse_6">
					        	<p>Seen</p>
			      				<p>11:29 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_6" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_6" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p><img class="mr-2" src="{{asset('public/assets/image/ninja_face.png')}}" alt=""> Alfredo</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 11:29 </p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_7">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_7" aria-expanded="true" aria-controls="tracking_collapse_7">
					        	<p>Enroute</p>
			      				<p>11:45 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_7" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_7" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p><img class="mr-2" src="{{asset('public/assets/image/ninja_face.png')}}" alt=""> Alfredo</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 11:45</p>
					      	</div>
					    </div>
					</div>

					<div class="accordion-item tracking_detail_card">
					    <h2 class="accordion-header" id="tracking_heading_8">
					      	<button class="tracking_detail_title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tracking_collapse_8" aria-expanded="true" aria-controls="tracking_collapse_8">
					        	<p>Stared</p>
			      				<p>12:00 <i class="fas fa-chevron-down"></i></p>					      	
					      	</button>
					    </h2>

					    <div id="tracking_collapse_8" class="accordion-collapse collapse border-0" aria-labelledby="tracking_heading_8" data-bs-parent="#tracking_accordion_1">
					      	<div class="accordion-body tracking_detail_info_row">
					        	<p><img class="mr-2" src="{{asset('public/assets/image/ninja_face.png')}}" alt=""> Alfredo</p>
								<p><i class="far fa-clock"></i> 09/09/2020, 12:00</p>
					      	</div>
					    </div>
					</div>

				</div>			  			   			  			   
		    </div>
		</div>

	</div>


	</div>
	<?php
	if(!empty($start_lat) && !empty($start_long) && !empty($start_lat) && !empty($start_long)){
    $main_array=array();
	$main_array=array(
	array($start_lat,$start_long,'Ninja','Start','https://static.thenounproject.com/png/17626-200.png'),
	array(22.704131,75.880275,'Ninja','Middle','https://static.thenounproject.com/png/17626-200.png'),
	array(22.70864,75.883079,'Ninja','Middle','https://static.thenounproject.com/png/17626-200.png'),
	array(22.7149,75.8899,'Ninja','Middle','https://static.thenounproject.com/png/17626-200.png'),
	array(22.7244,75.8839,'Ninja','Middle','https://static.thenounproject.com/png/17626-200.png'),
	array(22.7373,75.8909,'Ninja','Middle','https://static.thenounproject.com/png/17626-200.png'),
	array($end_lat,$end_long,'Destination','End','https://static.thenounproject.com/png/17626-200.png')
	);?>
	
			
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
                     var markers1 =  [];
                     for (i = 0; i < locations.length; i++) {
						 /********/
					 var icons = {
						url: locations[i][4], // url
						scaledSize: new google.maps.Size(40, 40), // scaled size
						origin: new google.maps.Point(0,0), // origin
						anchor: new google.maps.Point(0,0), // anchor
						fillColor: '#23BAF0',
					};
					if(i==0 || i==locations.length-1){
                       marker = new google.maps.Marker({
                         position: new google.maps.LatLng(parseFloat(locations[i][0]), parseFloat(locations[i][1])),
                         map: map,
                         title: locations[i][2]
                       });
                        bounds.extend(marker.position);
						
                       google.maps.event.addListener(marker, 'click', (function(marker, i) {
                         return function() {
                           infowindow.setContent(locations[i][3]);
                           infowindow.open(map,marker);
                         }
                       })(marker, i));
					}
					   /************/
                       markers1.push(new google.maps.LatLng(parseFloat(locations[i][0]),parseFloat(locations[i][1])));					   
                     }
					 
                   map.fitBounds(bounds);
				   center = bounds.getCenter();
                       var listener = google.maps.event.addListener(map, "idle", function () {
                         map.setZoom(13);
                         google.maps.event.removeListener(listener);
                     });
					 
			   var route= new google.maps.Polyline({
				path: markers1,
				strokeColor: "#23BAF0",
				strokeOpacity: 2.0,
				strokeWeight: 5
			  });
				route.setMap(map);
                  </script>

                  

                  <!-- js -->

   <script src="{{asset('public/assets/js/custom.min.js')}}"></script>
    
<!----------------->	
	<?php } ?>