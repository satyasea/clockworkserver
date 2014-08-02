
<b> tSheets API Test: Add Geoz</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';

$jsonData = '{"data":[{"created": "2014-08-02T15:37:15-07:00","user_id": 1635347,"accuracy": 20,"altitude": 0,"latitude": 37.794446,"longitude": -122.27831}]}';

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
        echo "Output: ". $output;

?>