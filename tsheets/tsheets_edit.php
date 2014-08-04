
<b> tSheets API Test: Clock Out</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);


//http://ineeduneed.com/clockwork/tsheets/tsheets_edit.php?sheet_id=162939279&end=2014-08-02T00:48:00-07:00
$id_input = isset($_GET['sheet_id']) ? $_GET['sheet_id'] :  '0';
$end_input = isset($_GET['end']) ? $_GET['end'] : '2014-01-01T11:11:11-07:00';

// Edit a timesheet
$request = array();
$request[] = array('id' => $id_input, 'end' => $end_input);
$result = $tsheets->edit(ObjectType::Timesheets, $request);
print "Edit timesheet returned:\n";
print_r($result);



?>