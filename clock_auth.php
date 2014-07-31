<?php
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
$id = $_POST['phone_num'];
$pass = $_POST['password'];
$result = mysql_query("SELECT worker_id from user where phone_num='$id';") or die("DB Error. No such User ID");
$row = mysql_fetch_array($result);
$data = $row[0];
if($data){
echo $data;
}
mysql_close($con);
?>