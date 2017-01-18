<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]){ 
	 	
		$ex=sel ("sw_users", "nombre", $_GET[us]);
		
		if ($ex[clan]==$cl[nombre]){
		   echo "¿Seguro que deseas expulsar a $_GET[us] del Clan? <br><a href=\"clan/?id=expulok&us=$_GET[us]\">Expulsar</a>";

		}else{
		   echo "No es de tu clan, no puedes expulsarlo";
		} 
     }else{
	    echo "No eres el lider del clan.";
	 }





include_once 'footer.php'; ?>
