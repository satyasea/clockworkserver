<?php
//url example ---- http://ineeduneed.com/clockwork/tsheets/tsheets_onclock.php?worker_id=1636899
$access_token = 'f609738cade64e72030b27269224c6b72f486218';

//$id_input = isset($_GET['worker_id']) ? $_GET['worker_id'] :  '0';
$id_input = isset($_POST['worker_id']) ? $_POST['worker_id'] :  '0';

$start_date = "2014-01-01";
$end_date = new DateTime('tomorrow');
$end_date = $end_date->format('Y-m-d');
//curl -H "Authorization: Bearer <Access-Token>" -i "https://rest.tsheets.com/api/v1/timesheets?start_date=2014-08-01&end_date=2014-08-04&on_the_clock=yes";
$headr = array();
$headr[] = 'Content-length: 0';
$headr[] = "Authorization: Bearer ".$access_token;
     $ch = curl_init("https://rest.tsheets.com/api/v1/timesheets?start_date=".$start_date."&end_date=".$end_date."&user_ids=".$id_input."&on_the_clock=yes");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        $output = curl_exec($ch);       
        curl_close($ch);  
      //  echo $output; 
       // echo "<br><br>";
        //echo "<br>json_obj:<br>";
$json_obj = json_decode($output);
//var_dump($json_obj);
//echo "<br>json_obj-results-timesheets <br>";
//$timesheets = $json_obj->results->timesheets->{"163102011"}->id;
//$timesheets = $json_obj->results->timesheets;
$timesheetsArr = (array) $json_obj->results->timesheets;
//echo "<br>logged in?: " . count($timesheetsArr);
//echo "<br>return value<br>";
if(count($timesheetsArr)==1){
	//on clock (in clockwork 0 is logged in, 1 is logged out)
	echo 0;
}else{
	echo 1;
}       
?>