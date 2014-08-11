<?php
$debug=false;
if($debug){
	$worker_id = 112;
	$username = 'anastacia_brewer';  
	$first_name = 'Anastacia';
	$last_name = 'Brewer';
	$password = 'ana$tmp';
	$email = 'anastacia.brewer@gmail.com';
	$mobile_number = '8057052832';
	$admin = 1;
}else{
	$worker_id = isset($_POST['worker_id']) ? $_POST['worker_id'] :  '666';
	$username = isset($_POST['username']) ? $_POST['username'] :  'fail';
	$first_name = isset($_POST['first_name']) ? $_POST['first_name'] :  'fail';
	$last_name = isset($_POST['last_name']) ? $_POST['last_name'] :  'fail';
	$password = isset($_POST['password']) ? $_POST['password'] :  'fail';
	$email = isset($_POST['email']) ? $_POST['email'] :  'fail';
	$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] :  'fail';
	$admin = isset($_POST['admin']) ? $_POST['admin'] :  '0';
}
$access_token = 'f609738cade64e72030b27269224c6b72f486218';
include_once "../tsheets/tsheets.inc.php";
//new utility object
$tsheets = new TSheetsRestClient(1, $access_token);
$request = array();
$request[] = array(
    'username' => $username,
	'first_name' => $first_name,
	'last_name' => $last_name,
    'password' => $password,
    'email' => $email,
	'mobile_number' => $mobile_number,
	'permissions' => array (
				'admin' => $admin)	
);
$result = $tsheets->add(ObjectType::Users, $request);
//print "Create User returned:\n";
//echo json_encode($result);
//echo "<br><br>";
$tsheetsId = $result['results']['users']['1']['id'];
//php server/mysql clockwork...
//convert types to clockwork db
if($admin=='1'){
	$admin="admin";
}else{
	$admin="worker";
}
$server = "localhost";
	$user = "pulp_pulp";
	$pass = "Flmg5WJkd6R@";
	$db = "pulp_clock_db";
//log into database for session of each php page, close on main page
$con = mysql_connect($server, $user, $pass) ;
if (!$con)
  {
	  if($debug)
		die('Database connection failure. Check network Connection. Could not connect: ' . mysql_error());
	  else
		 die('Database connection failure. Check network Connection. ' );
  }
mysql_select_db($db) or die(mysql_error());
/*
 *INSERT INTO user (worker_id, tsheets_id, role, worker_fname, worker_lname, base_lat, base_long, phone_num, password) VALUES (110,1535322,'worker','foo','gilman',0,0,'5556667777','123456');
 */
//echo "logged in to db...<br>";
mysql_query("INSERT INTO user (worker_id, tsheets_id, role, worker_fname, worker_lname, base_lat, base_long, phone_num, password) VALUES ($worker_id,$tsheetsId,'$admin','$first_name','$last_name',0,0,'$mobile_number','$password');") or die("DB Error. Could not insert.");
$id_new = mysql_insert_id();
 $result = mysql_query("select role, worker_fname, worker_lname, tsheets_id, worker_id from user where id=$id_new;") or die("DB Error. No such new User");
$row = mysql_fetch_assoc($result);
mysql_close($con);
//echo $row['role']. " ". $row['worker_fname'] . " ".$row['worker_lname'] . " " . $row['tsheets_id'];	
	header('Location: http://ineeduneed.com/clockwork/web/clock_admin_adduserconfirm.php?admin='.$row['role'].'&first_name='.$row['worker_fname'].'&last_name='.$row['worker_lname'].'&tsheets_id='.$row['tsheets_id'].'&worker_id='.$row['worker_id']);
?>