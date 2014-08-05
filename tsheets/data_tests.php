<?php
//2014-08-02T15:37:15-07:00
$current_time = date("c");
//echo "time " . $current_time."<br>";
//echo "json dump<br>";
//$json = '{ "results": { "timesheets": [ ] }, "more": false }';
$json = '{ "results": { "timesheets": { "163102011": { "id": 163102011, "user_id": 1635347, "jobcode_id": 25100809, "start": "2014-08-04T11:37:09-07:00", "end": "", "duration": 0, "date": "2014-08-04", "tz": -7, "tz_str": "tsPT", "type": "regular", "location": "(San Francisco, CA?)", "on_the_clock": true, "locked": 0, "notes": "", "last_modified": "2014-08-04T18:37:09+00:00", "customfields": "" } } }, "more": false, "supplemental_data": { "jobcodes": { "25100809": { "id": 25100809, "parent_id": 0, "assigned_to_all": false, "billable": false, "active": true, "type": "regular", "has_children": false, "billable_rate": 0, "short_code": "100", "name": "100ABIGCO", "last_modified": "2014-08-02T06:55:04+00:00", "created": "2014-08-02T06:54:20+00:00", "required_customfields": [ ], "filtered_customfielditems": "" } }, "users": { "1635347": { "id": 1635347, "first_name": "Blake", "last_name": "Rogers", "group_id": 0, "active": true, "employee_number": 0, "salaried": false, "exempt": false, "username": "saltyfog@gmail.com", "email": "saltyfog@gmail.com", "payroll_id": "", "hire_date": "0000-00-00", "term_date": "0000-00-00", "last_modified": "2014-08-01T21:14:04+00:00", "last_active": "2014-08-04T18:37:09+00:00", "created": "2014-08-01T20:54:43+00:00", "client_url": "clockwork", "mobile_number": "", "approved_to": "", "submitted_to": "", "manager_of_group_ids": [ ], "permissions": { "admin": true, "mobile": false, "status_box": false, "reports": false, "manage_timesheets": false, "manage_authorization": false, "manage_users": false, "manage_my_timesheets": false, "manage_jobcodes": false, "approve_timesheets": false } } } } }';
//echo "<br>json_obj:<br>";
$json_obj = json_decode($json);
//var_dump($json_obj);
//echo "<br>json_obj-results-timesheets <br>";
//$timesheets = $json_obj->results->timesheets->{"163102011"}->id;
$timesheets = $json_obj->results->timesheets;
$timesheetsArr = json_decode(json_encode($json_obj->results->timesheets), true);
//$timesheetsArr = (array) $json_obj->results->timesheets;
var_dump($timesheetsArr);
echo "<br>";
$sheet_id = 0;
while (list ($key, $val) = each ($timesheetsArr) ) {
//	echo "<br>entry key [". $key. "] value [".$val."]";
	$sheet_id = $key;
}
echo "<br>sheet id [". $sheet_id ."]";
echo "<br>count: " . count($timesheetsArr);
echo "<br>return value 0 logged in<br>";
if(count($timesheetsArr)==1){
	echo 0;
}else{
	echo 1;
}
?>