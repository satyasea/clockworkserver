
<b> tSheets API Test</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);
$users = $tsheets->get(ObjectType::Users);
print("Display TSheets Users<br>");
print("<br>");
foreach($users['results']['users'] as $user) {
    print("User[ {$user['first_name']} {$user['last_name']} ]<br>");  
}

/*
$request[] = array(
    'start' => '2014-07-31T23:00:59-07:00',
    'end' => '2014-08-01T20:00:30-07:00'
);

$sheets = $tsheets->get(ObjectType::Timesheets, '2014-07-31T23:00:59-07:00');
print("Display TSheets Sheets<br>");
print("<br>");
for($i=0;$i<count($sheets);$i++) {
    print("Sheet [". $sheet[$i] ."]<br>");
}
*/
print("Display TSheets List<br>");

//REQUEST
//curl -H "Authorization: Bearer <Access-Token>" -i "https://rest.tsheets.com/api/v1/timesheets?start_date=2014-08-01&end_date=2014-08-01&on_the_clock=both";
$headr = array();
$headr[] = 'Content-length: 0';
//$headr[] = 'Content-type: application/json';
$headr[] = "Authorization: Bearer ".$access_token;
     $ch = curl_init("https://rest.tsheets.com/api/v1/timesheets?start_date=2014-08-01&end_date=2014-08-04&on_the_clock=both");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
        $output = curl_exec($ch);       
        curl_close($ch);
        echo $output;
?>


