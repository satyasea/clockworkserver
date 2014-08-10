<?php

$debug=false;
if($debug){
	$username = isset($_POST['username']) ? $_POST['username'] :  'fail';
	$first_name = isset($_POST['first_name']) ? $_POST['first_name'] :  'fail';
	$last_name = isset($_POST['last_name']) ? $_POST['last_name'] :  'fail';
	$password = isset($_POST['password']) ? $_POST['password'] :  'fail';
	$email = isset($_POST['email']) ? $_POST['email'] :  'fail';
	$mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] :  'fail';
	$admin = isset($_POST['admin']) ? $_POST['admin'] :  '0';
	
	echo $username . "<br>";
	echo $first_name. "<br>";
	echo $last_name. "<br>";
	echo $password . "<br>";
	echo $email. "<br>";
	echo $mobile_number. "<br>";
	echo $admin. "<br>";
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>ClockWork Admin Add Worker Form</title>
</head>
<body>
<center><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSCA=new Object;objUSCA.wtsclock="wtsclock001.swf";objUSCA.color="FF9900";objUSCA.wtsid="US-CA";objUSCA.width=200;objUSCA.height=200;objUSCA.wmode="transparent";showClock(objUSCA);</script></td></tr><tr><td align="center"><h2>Los Angeles</h2></td></tr></table>
<br><B><font size=5>ClockWork Crowd Cloud<br>Admin - Add Worker Form</font></b>
<p>
<form action="clock_admin_addtsheetsuser.php" method="post">

* Notice --> All Fields are required.
<br><br>
Worker ID: <input type="text" name="worker_id"><br> *Check Employee Log Page for last worker id number, or check with supervisor or database admin.<br>
Username: <input type="text" name="username"><br>
First name: <input type="text" name="first_name"><br>
Last name: <input type="text" name="last_name"><br>
	Password: <input type="text" name="password"> <br>
	* 7 digits long - include uppercase, symbol, number<br>
			Email: <input type="text" name="email"><br>
		Mobile Number: <input type="text" name="mobile_number"><br> *10 digits long<br>		
<input type="radio" name="admin" value="1">Admin<br>
<input type="radio" name="admin" value="0">Worker
<p>
<input type="submit" value="Add User">

</form>
</center>
</body>
</html>