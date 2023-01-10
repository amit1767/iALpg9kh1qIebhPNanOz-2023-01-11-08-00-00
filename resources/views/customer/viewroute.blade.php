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
		 	<h3> Tracking Details </h3>
		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Assign</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	10:43 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p><i class="far fa-user"></i> Abid</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 10:43</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Seen</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	10:45 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p><i class="far fa-user"></i> Alfredo</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 10:45</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Enroute</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	10:47 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p><i class="far fa-user"></i> Alfredo</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 10:47</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Unassigned</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	11:00 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p> Abid</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 11:00</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Assign</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	11:29 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p>Abid</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 11:29</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Enroute</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	11:45 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p><i class="far fa-user"></i> Alfredo</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 11:45</p>
				</div>
		 	</div>

		 	<div class="tracking_detail_info">
		 		<div class="tracking_detail_info_row">		 		
			 		<p class="tracking_detail_title">Stared</p>
				 	<div class="btn-group">
						<button class="tracking_time_dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					   	12:00 <i class="fas fa-chevron-down"></i>
					  	</button>
					  	<ul class="dropdown-menu">
					    	<li><a class="dropdown-item" href="#">Action</a></li>
						    <li><a class="dropdown-item" href="#">Another action</a></li>
						    <li><a class="dropdown-item" href="#">Something else here</a></li>
						    <li><hr class="dropdown-divider"></li>
						    <li><a class="dropdown-item" href="#">Separated link</a></li>
					  	</ul>
					</div>
				</div>
				<div class="tracking_detail_info_row">
					<p><i class="far fa-user"></i> Alfredo</p>
					<p><i class="far fa-clock"></i> 09/09/2020, 12:00</p>
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
<!----------------->	
	<?php } ?>