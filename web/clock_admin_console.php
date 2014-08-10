<?php
	if($_GET['sauce']=='9'){
	?>	
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>ClockWork Admin Login Form</title>
	</head>
	<body>	
		<center>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSCA=new Object;objUSCA.wtsclock="wtsclock001.swf";objUSCA.color="FF9900";objUSCA.wtsid="US-CA";objUSCA.width=200;objUSCA.height=200;objUSCA.wmode="transparent";showClock(objUSCA);</script></td></tr><tr><td align="center"><h2>Los Angeles</h2></td></tr></table>
	<h1>
	ClockWork Admin Console
	</h1>
	</center>
	<p>
    	Welcome, Admin <?php echo $_GET['worker_id'] ."/". $_GET['fname']; ?>	
		<h2>Links</h2>
		<a href = "http://ineeduneed.com/clockwork/clock_display_entries.php?worker_id=<?php echo $_GET['worker_id']; ?>">Clockwork Cloud Worker Monitor </a>
		</body>
</html>
<?php 
	}else{
		header('Location: http://failblog.cheezburger.com/');
	}
?>

