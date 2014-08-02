
<b> tSheets API Test: Add timesheet</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);



// Edit a timesheet
$request = array();
$request[] = array('id' => '162939279', 'end' => '2014-08-02T00:48:00-07:00');
$result = $tsheets->edit(ObjectType::Timesheets, $request);
print "Edit timesheet returned:\n";
print_r($result);



?>