<?php include_once 'header.php';
	 if ($cl[lider]==$us[nombre]){ 
	 	if ($_GET[pago]<0 ||$_GET[pago] > 1500){
		   echo 'Valor NO valido o superior a 1000C';
		}else{
	  	   mysql_query("UPDATE `sw_clan` SET pago='$_GET[pago]' WHERE nombre='$us[clan]'")or die(mysql_error());

		   echo 'Precio modificado';
		   echo "<script> location.href='clan/?id=gest' </script>";
		}
	 }else{
	    echo "No eres el lider del Clan.";
	 }




include_once 'footer.php'; ?>
