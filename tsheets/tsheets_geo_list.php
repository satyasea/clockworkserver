

<b> tSheets API: List Geos</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';

print("Display GeoLocations List<br>");

$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = "Authorization: Bearer ".$access_token;
     $ch = curl_init("https://rest.tsheets.com/api/v1/geolocations?modified_since=2014-08-01T12:00:00-07:00");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
?>