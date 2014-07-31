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
$id = $_POST['worker_id'];
$pass = $_POST['password'];
// $result = mysql_query("SELECT  from table punches where worker_id='$username';") or die("DB Error. No such User ID");
$result = mysql_query("SELECT p.entry_type FROM punches p LEFT OUTER JOIN user u ON p.worker_id = u.worker_id WHERE u.worker_id=$id ORDER BY p.entry_time DESC LIMIT 5;") or die("DB Error. No such User ID");


//SELECT p.worker_id, u.worker_fname, p.entry_type, p.entry_time FROM punches p LEFT OUTER JOIN user u ON p.worker_id = u.worker_id WHERE u.worker_id=101 ORDER BY p.entry_time DESC LIMIT 1

//SELECT p.entry_type FROM punches p LEFT OUTER JOIN user u ON p.worker_id = u.worker_id WHERE u.worker_id=101 ORDER BY p.entry_time DESC LIMIT 1

//echo "id: ".$id."<br>";

$row = mysql_fetch_array($result);
$data = $row[0];
echo $data;
mysql_close($con);
?>