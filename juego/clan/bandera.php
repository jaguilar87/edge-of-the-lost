
<?php include_once 'header.php';
  if ($cl[lider]==$us[nombre]){ 

 	 	 		mysql_query("UPDATE `sw_clan` SET bandera='$_POST[bandera]' WHERE nombre='$us[clan]'")or die(mysql_error());
				echo 'Bandera modificada';

  }else{
				echo "No eres el lider del Clan.";
  }




include_once 'footer.php'; ?>
