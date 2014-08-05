
<b> tSheets API Test: Add Geoz</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';

// mike smith 
//http://ineeduneed.com/clockwork/tsheets/tsheets_geo_add.php?worker_id=1635347&lat=37.794446&lon=-122.27831

/*
$id_input = isset($_GET['worker_id']) ? $_GET['worker_id'] :  '0';
$lat_input = isset($_GET['lat']) ? $_GET['lat'] : '52.366667';
$lon_input = isset($_GET['lon']) ? $_GET['lon'] : '4.900000';
*/
$id_input = isset($_POST['worker_id']) ? $_POST['worker_id'] :  '0';
$lat_input = isset($_POST['lat']) ? $_POST['lat'] : '52.366667';
$lon_input = isset($_POST['lon']) ? $_POST['lon'] : '4.900000';


$current_time = date("c");

$jsonData = '{"data":[{"created": "'.$current_time.'","user_id": '.$id_input.',"accuracy": 20,"altitude": 0,"latitude": '.$lat_input.',"longitude": '.$lon_input.'}]}';

echo "json raw: " . $jsonData ."<br>";
echo "<br><br>";

$headr = array();
$headr[] = 'Content-type: application/json';
$headr[] = 'Content-Length: ' . strlen($jsonData);
$headr[] = "Authorization: Bearer ".$access_token;
     $ch = curl_init("https://rest.tsheets.com/api/v1/geolocations");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                                                                                       
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);  
        $output = curl_exec($ch);       
        curl_close($ch);
//        echo "Output: ". $output;

?>