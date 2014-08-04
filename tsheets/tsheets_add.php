
<b> tSheets API Test: Clock In</b><p>
<?php
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
//echo "accesstoken [" .$access_token ."]<br>";
include_once "tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);

//http://ineeduneed.com/clockwork/tsheets/tsheets_add.php?worker_id=1635347&start=2014-08-03T00:25:15-07:00
$id_input = isset($_GET['worker_id']) ? $_GET['worker_id'] :  '0';
$start_input = isset($_GET['start']) ? $_GET['start'] : '2014-01-01T11:11:11-07:00';

$job_code = '25100809';


$request = array();
$request[] = array(
    'user_id' => $id_input,
    'jobcode_id' => $job_code,
    'type' => 'regular',
    'start' => $start_input,
      'end' => ''
);

$result = $tsheets->add(ObjectType::Timesheets, $request);
print "Create timesheet returned:\n";
print_r($result);



?>