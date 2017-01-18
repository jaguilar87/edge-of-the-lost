<?php 

if ($_GET[pass]=="swcombinesux") {include 'db.php'; include 'db.php';
    $c = "UPDATE sw_city SET atacada='N'";
	$result2=mysql_query($c)or die(mysql_error());
	
   $c = "UPDATE sw_clan SET atacado='N'";
   $result2=mysql_query($c)or die(mysql_error());
   }
?>