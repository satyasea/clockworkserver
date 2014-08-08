<?php
$debug=true;
//url test == http://ineeduneed.com/clockwork/clock_auth.php?phone_num=4159557047&password=123456
	$host = "http://ineeduneed.com/ineed/";
//	echo "testing mysql connection....<br>";
	//	$server = "50.87.144.113";
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

$phone='';
$pass='';
if($debug){
	$phone = isset($_GET['phone_num']) ? $_GET['phone_num'] :  '0';
	$pass = isset($_GET['password']) ? $_GET['password'] :  '0';
}else{
	$phone = isset($_POST['phone_num']) ? $_POST['phone_num'] :  '0';
	$pass = isset($_POST['password']) ? $_POST['password'] :  '0';
}


$result = mysql_query("SELECT worker_id, tsheets_id, worker_fname, worker_lname, phone_num from user where phone_num='$phone' and password='$pass';") or die("DB Error. No such User Phone");

/*
$row = mysql_fetch_array($result);
mysql_close($con);
$data = $row[0];
if($data){
echo $data;
}
*/


$rows = array();

	while($row = mysql_fetch_assoc($result)){
		$rows[]=$row;	
		
	}

mysql_close($con);
print json_encode($rows);









?>