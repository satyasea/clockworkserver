<?php
//http://ineeduneed.com/clockwork/web/clock_admin_console.php?worker_id=106&fname=blake&sauce=9
	if($_GET['sauce']=='9'){
	?>	
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>ClockWork Admin Console</title>
	</head>
	<body>	
<center><table border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><script type="text/javascript" src="http://www.worldtimeserver.com/clocks/embed.js"></script><script type="text/javascript" language="JavaScript">objUSCA=new Object;objUSCA.wtsclock="wtsclock001.swf";objUSCA.color="FF9900";objUSCA.wtsid="US-CA";objUSCA.width=200;objUSCA.height=200;objUSCA.wmode="transparent";showClock(objUSCA);</script></td></tr><tr><td align="center"><h2>Los Angeles</h2></td></tr></table>
<br><B><font size=5>ClockWork Crowd Cloud<br>ClockWork Admin Console</font></b>

	<p>
	<p>
    	Welcome <?php echo $_GET['fname'] . " admin worker# " . $_GET['worker_id'] . "."; ?>	
    	
    		</center>
    		
    		
		<h2>Links</h2>
		<ul>
		<li><a href = "http://ineeduneed.com/clockwork/clock_display_entries.php?worker_id=<?php echo $_GET['worker_id']; ?>">Clockwork Cloud Worker Monitor </a>
		
		
	<li>	<a href = "http://ineeduneed.com/clockwork/web/clock_admin_adduserform.php?worker_id=<?php echo $_GET['worker_id']; ?>"">Add User </a>
	</ul>
	

		</body>
</html>
<?php 
	}else{
		header('Location: http://failblog.cheezburger.com/');
	}
?>

