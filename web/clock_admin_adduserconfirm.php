<?php

// admin='.$row['role'].'&first_name='.$row['worker_fname'].'&last_name='.$row['worker_lname'].'&tsheets_id='.$row['tsheets_id']);

$admin = isset($_GET['admin']) ? $_GET['admin'] :  'fail';
$first_name = isset($_GET['first_name']) ? $_GET['first_name'] :  'fail';
	$last_name = isset($_GET['last_name']) ? $_GET['last_name'] :  'fail';
	$tsheets = isset($_GET['tsheets_id']) ? $_GET['tsheets_id'] :  'fail';
	$worker = isset($_GET['worker_id']) ? $_GET['worker_id'] :  'fail';

?>	

	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>ClockWork Admin Console</title>
	</head>
	<body>	
<center><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSCA=new Object;objUSCA.wtsclock="wtsclock001.swf";objUSCA.color="FF9900";objUSCA.wtsid="US-CA";objUSCA.width=200;objUSCA.height=200;objUSCA.wmode="transparent";showClock(objUSCA);</script></td></tr><tr><td align="center"><h2>Los Angeles</h2></td></tr></table>
<br><B><font size=5>ClockWork Crowd Cloud<br>Admin - Add User Confirmation</font></b>
    		</center>
	<p>
	<p>  
	<p>
	<p>    	  	
    	<font size=4>Confirming Adding User to ClockWork and Tsheets! </font>
	<p>
    	 <?php 
    	 echo $first_name . " ". $last_name . "<br>" . $admin ." role <br>worker ID# <b>". $worker . "</b> ".  "<br> Tsheets Id# <b>" . $tsheets. "</b>"; 
    	 ?>	
    	
  <p><p>	<p>	
    	<a href=clock_admin_console.php?sauce=9>Main Admin Console</a>




		</body>
</html>





