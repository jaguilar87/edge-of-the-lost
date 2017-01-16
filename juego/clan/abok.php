<?php include_once 'header.php';
$us[merito]-=250;

	 mysql_query("UPDATE `sw_users` SET clan=NULL, merito='$us[merito]' WHERE nombre='$us[nombre]'")or die(mysql_error());
	 echo 'Clan Abandonado';   

include_once 'footer.php'; ?>
