<!DOCTYPE html>
<?php

// http://ineeduneed.com/clockwork/maptest.php?worker_id=204&type=clock in&lat=37.7756&long=-122.4193&time=2014-07-26 16:36:06



$worker_id = $_GET['worker_id'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];
$type = $_GET['type'];
$lat = $_GET['lat'];
$longit = $_GET['long'];
$time = $_GET['time'];

/*
echo "id: " .$worker_id."<br>" ;
echo "type: " .$type."<br>" ;
echo "time: " .$time."<br>" ;
echo "lat: " .$lat."<br>" ;
echo "long: " .$longit."<br>" ;
*/
if($type="clockin") $type= "clocked in";
if($type="clockout") $type= "clocked out";
?>


<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA62-ogFW0awUItYnprarqej9RYfu31D6A">
    </script>
    <script type="text/javascript">
      function initialize() {
		latLong = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $longit ?>);
	//	var latLong = new google.maps.LatLng(37.7756, -122.4193);
        var mapOptions = {
          center: latLong,
          zoom: 12
        };
		
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);
			
		// To add the marker to the map, use the 'map' property
		var marker = new google.maps.Marker({
			position: latLong,
			map: map,
			title:"<?php echo $fname . " " . $lname . " ". $type . " at ". $time ?>"
		});
	}
      google.maps.event.addDomListener(window, 'load', initialize);
	  
    </script>
  </head>
  <body>
    <div id="map-canvas"/>
  </body>
</html>