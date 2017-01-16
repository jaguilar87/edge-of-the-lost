<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("UPDATE `sw_users` SET clan='$us[clan]' WHERE nombre='$_GET[us]'")or die(mysql_error());
		mysql_query("DELETE FROM sw_log WHERE ref='$_GET[us]' AND tipo='2'");

		echo 'Aceptado en el Clan!';
		echo "<script> location.href='ficha/' </script>";

	 }else{ 
	 	echo "No eres el lider del clan.";
	 }
include_once 'footer.php'; ?>
