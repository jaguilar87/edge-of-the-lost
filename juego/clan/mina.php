<?php include_once 'header.php';
  if ($cl[lider]==$us[nombre]){ 
	  if (!$cl[cambiado]){
	 	if ($_GET[pago]<0 ||$_GET[pago] > 1200){
		   echo 'Valor NO valido o superior a 1200C';
		}else{
	  	   mysql_query("UPDATE `sw_clan` SET pago='$_GET[pago]', cambiado='1' WHERE nombre='$us[clan]'")or die(mysql_error());

		   echo 'Precio modificado';
		   echo "<script> location.href='clan/?id=gest' </script>";
		}
	  }else{
		echo "Ya se ha cambiado el pago de la mina una vez hoy.";
	  }
  }else{
	    echo "No eres el lider del Clan.";
  }




include_once 'footer.php'; ?>
