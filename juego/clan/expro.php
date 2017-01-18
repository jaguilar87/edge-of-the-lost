<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("UPDATE `sw_city` SET rey='$us[nombre]' WHERE nombre='$_GET[ci]'")or die(mysql_error());

		echo 'Ciudad expropiada';
		echo "<script> location.href=\"ciudad/?ciudad=$_GET[ci]\" </script>";
     }else{
	    echo "No eres el lider del Clan.";
     }




include_once 'footer.php'; ?>
