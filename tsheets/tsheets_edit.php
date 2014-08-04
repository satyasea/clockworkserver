
<b> tSheets API Test: Clock Out</b><p>
<?php

// test url (need new sheet id each time) --- http://ineeduneed.com/clockwork/tsheets/tsheets_edit.php?sheet_id=163074983

$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);




$id_input = isset($_GET['sheet_id']) ? $_GET['sheet_id'] :  '0';

// Edit a timesheet
$request = array();
$request[] = array('id' => $id_input, 'end' => date("c"));
$result = $tsheets->edit(ObjectType::Timesheets, $request);
print "Edit timesheet returned:\n";
print_r($result);



?>