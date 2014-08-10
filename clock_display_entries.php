<?php
if($_GET['worker_id']==null){
	header('Location: http://failblog.cheezburger.com/');
}
?>
<html>
<center><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSCA=new Object;objUSCA.wtsclock="wtsclock001.swf";objUSCA.color="FF9900";objUSCA.wtsid="US-CA";objUSCA.width=200;objUSCA.height=200;objUSCA.wmode="transparent";showClock(objUSCA);</script></td></tr><tr><td align="center"><h2>Los Angeles</h2></td></tr></table>
</head><br><B><font size=5>ClockWork Crowd Cloud<br>Employee Time Log Monitor</font></b><br><br>
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

//$result = mysql_query("SELECT * from punches;") or die("DB Error. No such User ID");
$result = mysql_query("Select p.worker_id, u.worker_fname, u.worker_lname, p.entry_type, p.entry_time, u.phone_num, p.latitude, p.longitude FROM punches p LEFT OUTER JOIN user u ON p.worker_id=u.worker_id ORDER BY p.entry_time DESC") or die("DB Error. No such User ID");

// Select p.worker_id as punch_worker_id, u.worker_fname, u.worker_lname, p.entry_type, p.entry_time, u.phone_num, p.latitude, p.longitude FROM punches p, user u where p.worker_id=u.worker_id;
//Select p.worker_id, u.worker_fname, u.worker_lname, p.entry_type, p.entry_time FROM punches p LEFT OUTER JOIN user u ON p.worker_id=u.worker_id ORDER BY p.worker_id, p.entry_time;

echo "<table border=1><tr><th>last name</th><th>first name</th><th>employee number</th><th>phone number</th><th>action type</th><th>clock time</th><th>latitude</th><th>longitude</th><th>map</th></tr>";

	while($row = mysql_fetch_array($result)){	
	//	$id = $row['id'];
	//	$username = $row['username'];

	$id = $row['worker_id'];
		$fname = $row['worker_fname'];
		$lname = $row['worker_lname'];
		$entry_type = $row['entry_type'];
		$entry_time = $row['entry_time'];
		$phone = $row['phone_num'];
			$lat = $row['latitude'];
				$long = $row['longitude'];
		
		$entry_text = "";
		if($entry_type=="0"){
			$entry_text="clocked in";
		}else{
			$entry_text="clocked out";
		}
		
		// http://ineeduneed.com/clockwork/maptest.php?
		// worker_id=104&fname=sam&lname=wang&type=clocked+out&lat=37.7498335&long=-122.4212158&time=2014-07-26+16:36:06
		$entry_time_url = str_replace(" ", "+", $entry_time);
		$entry_text_url = str_replace(" ", "+", $entry_text);
		$url = "http://ineeduneed.com/clockwork/clock_entry_map.php";
		$link= "?worker_id=".$id."&fname=".$fname."&lname=".$lname."&type=".$entry_text_url."&lat=".$lat."&long=".$long."&time=".$entry_time_url ;
		$url= $url.$link;

			echo "<tr>";
		echo "<td>" .  $lname . "</td><td> " . $fname . "</td><td>". $id . "</td><td> " . $phone . "</td><td>" . $entry_text . " </td><td> " . $entry_time ."</td><td>". $lat . "</td><td> " . $long . "</td><td><a href=".$url.">map</a></td";
		echo "</tr>";
	}
	echo "</table></center>";

?>



