


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

//$username=$_POST['Username'];
//$password=$_POST['Password'];
//$role=$_POST['Role'];


		$worker_id = $_POST['worker_id'];
		$entry_type = $_POST['entry_type'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		

//$sql = "insert into punches (username, entry_type, entry_time, lat, long) values ('$username ', '$entry_type', NOW(), '$lat', '$long');";

$sql = "insert into punches (worker_id, entry_type, entry_time, latitude, longitude) values ('$worker_id ', '$entry_type', NOW(), '$latitude', '$longitude');";


 mysql_query($sql) or die("DB Error. No such User ID");


mysql_close($con);

?>