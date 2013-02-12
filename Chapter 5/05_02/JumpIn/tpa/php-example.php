<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<p>Get ready to get warmed up on the hottest planet (well, almost) around: Venus! TPA is proud to announce the launch date for the ultimate sun cruise. So, pack your bags and lots of sunscreen!</p>
<?php
	$theTarget = mktime(0, 0, 0, 3, 31, 2022) ;
	$today = time();
	$theDiff = $theTarget-$today;
	$theDays = number_format($theDiff/(60*60*24)) ;
	print "<div class='highlight'>Venus tanning sessions start in <strong>$theDays</strong> days</div>";
?>
</body>
</html>