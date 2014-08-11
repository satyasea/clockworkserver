<?php
$debug=false;

//database connection
$server = "localhost";
	$user = "pulp_pulp";
	$pass = "Flmg5WJkd6R@";
	$db = "pulp_clock_db";
$con = mysql_connect($server, $user, $pass) ;
if (!$con)
  {
	  if($debug)
		die('Database connection failure. Check network Connection. Could not connect: ' . mysql_error());
	  else
		 die('Database connection failure. Check network Connection. ' );
  }
mysql_select_db($db) or die(mysql_error());

//tsheets data
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
include_once "../tsheets/tsheets.inc.php";
$tsheets = new TSheetsRestClient(1, $access_token);
$users = $tsheets->get(ObjectType::Users);

$counter=3000;
//display data for verification.
echo "<table border=1>";
echo "<tr><th>username</th><th>tsheets_id</th><th>first_name</th><th>last_name</th><th>employee_number</th><th>mobile_number</th><th>email</th><th>admin</th><th>password</th></tr>";
foreach($users['results']['users'] as $user) {	
   $tsheets_id = isset($user['id']) ? $user['id'] :  '666';
   	$worker_id = isset($user['employee_number']) ? $user['employee_number']:  '666';
	$username = isset($user['username']) ? $user['username'] :  'fail';
	$first_name = isset($user['first_name']) ? $user['first_name'] :  'fail';
	$last_name = isset($user['last_name']) ? $user['last_name'] :  'fail';
	$password = isset($user['password']) ? $user['password'] :  'fail'; 
	$email = isset($user['email']) ? $user['email'] :  'fail';
	$mobile_number = isset($user['mobile_number']) ? $user['mobile_number'] :  'fail'; // can't input data into tsheets form, how to input?
	$admin = isset($user['permissions']['admin']) ? $user['permissions']['admin'] :  '0';
	if($admin=='1'){
		$admin="admin";
	}else{
		$admin="worker";
	}
	$password = 'ea$'.$counter;
	$mobile_number = '415555'.$counter;
	$counter = $counter+1;
		echo "<tr>";	
	echo "<td>".$username. "</td>";
   echo "<td>".$tsheets_id . "</td>";
   echo "<td>".$first_name. "</td>";
   echo "<td>".$last_name. "</td>";
   echo "<td>".$worker_id. "</td>";
   echo "<td>".$mobile_number. "</td>";
   echo "<td>".$email. "</td>";
   echo "<td>".$admin. "</td>"; 
   echo "<td>".$password. "</td>"; 
   echo "</tr>";   
}
echo "</table>";


//add data to db
$record_count = 1;
$counter=3000;
foreach($users['results']['users'] as $user) {	
   $tsheets_id = isset($user['id']) ? $user['id'] :  '666';
   	$worker_id = isset($user['employee_number']) ? $user['employee_number']:  '666';
	$username = isset($user['username']) ? $user['username'] :  'fail';
	$first_name = isset($user['first_name']) ? $user['first_name'] :  'fail';
	$last_name = isset($user['last_name']) ? $user['last_name'] :  'fail';
	$password = isset($user['password']) ? $user['password'] :  'fail'; 
	$email = isset($user['email']) ? $user['email'] :  'fail';
	$mobile_number = isset($user['mobile_number']) ? $user['mobile_number'] :  'fail'; // can't input data into tsheets form, how to input?
	$admin = isset($user['permissions']['admin']) ? $user['permissions']['admin'] :  '0';
	if($admin=='1'){
		$admin="admin";
	}else{
		$admin="worker";
	}
	$password = 'ea$'.$counter;
	$mobile_number = '415555'.$counter;
	$counter = $counter+1;
	//db insert
	echo "about to insert record ". $record_count . " "  . $first_name.  "<br>";
	mysql_query("INSERT INTO user (worker_id, tsheets_id, role, worker_fname, worker_lname, base_lat, base_long, phone_num, email, password) VALUES ($worker_id,$tsheets_id,'$admin','$first_name','$last_name',0,0,'$mobile_number','$email', '$password');") or die("DB Error. Could not insert.");
	//echo "mysql error: " . mysql_error($con) . "<br>";	
	$id_new = mysql_insert_id();
	echo "just inserted new database row id: " . $id_new . "<br>";	
}
mysql_close($con);
echo "<br><br>Done inserting all users into database.";

?>