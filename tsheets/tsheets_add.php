
<b> tSheets API Test: Clock In</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);



$request = array();
$request[] = array(
    'user_id' => '1635347',
    'jobcode_id' => '25100809',
    'type' => 'regular',
    'start' => '2014-08-02T00:22:00-07:00',
      'end' => ''
);

$result = $tsheets->add(ObjectType::Timesheets, $request);
print "Create timesheet returned:\n";
print_r($result);



?>