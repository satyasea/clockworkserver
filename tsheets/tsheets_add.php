<?php
/*
 * input is worker_id GET  --- todo: change to post
 * job code is hardcoded
 * date is set to pacific/la
 *  adds an open timesheet (clocked in)
 *  creates a date (now)
 * test url http://ineeduneed.com/clockwork/tsheets/tsheets_add.php?worker_id=1635347
 */
$debug=false;
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
$job_code = '25100809';
date_default_timezone_set("America/Los_Angeles");
$creation_date = date("c");
//echo"<br>clockindate ". $creation_date. "<br>";
//echo"<br>timezone ". date_default_timezone_get(). "<br>";
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$id_input = "";
if($debug){
	$id_input = isset($_GET['worker_id']) ? $_GET['worker_id'] :  '0';
}else{
	$id_input = isset($_POST['worker_id']) ? $_POST['worker_id'] :  '0';
}
$request = array();
$request[] = array(
    'user_id' => $id_input,
    'jobcode_id' => $job_code,
    'type' => 'regular',
    'start' => $creation_date,
      'end' => ''
);
$tsheets = new TSheetsRestClient(1, $access_token);
$result = $tsheets->add(ObjectType::Timesheets, $request);
//print "Create timesheet returned:\n";
echo (json_encode($result));
?>