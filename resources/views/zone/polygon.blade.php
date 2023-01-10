@extends('layouts.layout')
@section('content')
<!----YOUR-CODE-HERE----->

<div class="content-body">
	<!-- row -->
	<div class="container-fluid">
  
	  <div class="row">
		<div class="col-lg-4 col-md-12">
		 <div class="heading-content-nav">
		   <h3> Zones</h3>
		   <p> <small> <i class="fas fa-chart-pie"></i> </small> > <small> Polygon </small> </p>
		  </div>
		</div>
  </div>

	  <div class="row" >
		<div class="col-lg-12 col-md-12">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <div id="map_polygon" style="width:100%; height:500px"></div>

    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFzzVfXfUc91Eb1CWCfPVZZzgMB0U5xVU&callback=initMap&v=weekly"
      async
    ></script>
<script>
// This example creates a simple polygon representing the Bermuda Triangle.
function initMap() {
  const map = new google.maps.Map(document.getElementById("map_polygon"), {
    zoom: 14,
    center: { lat: 25.238554999999998, lng: 55.28691 },
    mapTypeId: "terrain",
  });
  // Define the LatLng coordinates for the polygon's path.
  const triangleCoords = [
    { lat: 25.23627, lng: 55.27943 },
    { lat: 25.24348, lng: 55.28803 },
    { lat: 25.23979, lng: 55.29523 },
    { lat: 25.23627, lng: 55.27943 },
  ];

  // Construct the polygon.
  const bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });

  bermudaTriangle.setMap(map);
}
</script>

	
    </div>
 </div>
</div>
</div>
<!----END-YOUR-CODE-HERE----->

@endsection