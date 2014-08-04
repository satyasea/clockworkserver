
<b> tSheets API Test on clock user</b><p>
<?php

//url example ---- http://ineeduneed.com/clockwork/tsheets/tsheets_onclock.php?worker_id=1636899
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
$id_input = isset($_GET['worker_id']) ? $_GET['worker_id'] :  '0';

print("Display TSheets user on clock<br>");
//$user_id = "1635347";
//REQUEST
//curl -H "Authorization: Bearer <Access-Token>" -i "https://rest.tsheets.com/api/v1/timesheets?start_date=2014-08-01&end_date=2014-08-04&on_the_clock=yes";
$headr = array();
$headr[] = 'Content-length: 0';
//$headr[] = 'Content-type: application/json';
$headr[] = "Authorization: Bearer ".$access_token;
     $ch = curl_init("https://rest.tsheets.com/api/v1/timesheets?start_date=2014-08-01&end_date=2014-08-04&user_ids=".$id_input."&on_the_clock=yes");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
?>

