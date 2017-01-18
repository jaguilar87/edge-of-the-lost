<?php include_once 'header.php';
if ($_GET[cre]<=0){
	 		 echo "Valor NO Válido";
	 }else{
			 
			 $us[creditos] -= $_GET[cre];	 
	 	   if ($us[creditos]<0){
		   	  Echo "Créditos insuficientes";
		   }else{
		      echo "Donados $_GET[cre] Créditos al Clan!";
			  $cl[fondos] += $_GET[cre];


			  mysql_query("UPDATE `sw_clan` SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
			  mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
			  mysql_query("INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$cl[nombre]', 'INFORMACION', '$us[dia]', '$us[nombre] ha donado $_GET[cre] Créditos al Clan!')")or die(mysql_error());
			  mysql_query("INSERT INTO sw_control_transferencias (dia, origen, destino, cantidad) VALUES ($fe[val], 'Jugador $us[nombre]', 'Clan $cl[nombre]', '$_GET[cre]')")or die(mysql_error());

			}
	 }
include_once 'footer.php'; ?>
