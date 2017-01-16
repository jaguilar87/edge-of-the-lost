<?php include_once 'header.php';
if ($us[nv_sable]>1){
	 if ($_GET[cr]<=0){
	 		echo "Valor NO V�lido";
	 }else{
	 		
	 		if ($us[creditos]<$_GET[cr]){
				 Echo "Cr�ditos insuficientes";
			}else{
			
				 $us[creditos] -= $_GET[cr];
				 $cre=($_GET[cr]/10);
				 $_GET[cr]-=$cre;
				 $usto=textcolor($_GET[to]);
				 $usto[creditos] += $_GET[cr];
				 $usto[crecived]+=$_GET[cr];
				 
				 if ($usto[crecived]>10000){
				 		echo "$usto[nombre] ya ha recibido el limite de cr�ditos por hoy";
				 }else{ 
				 	  mysql_query("UPDATE `sw_users` SET creditos='$usto[creditos]', crecived='$usto[crecived]' WHERE nombre='$_GET[to]'")or die(mysql_error());
				 		mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
				 		mysql_query("INSERT INTO `sw_log` (user, log, dia, ref, tipo) VALUES ('$usto[nombre]', '$us[nombre] te ha enviado $_GET[cr] Cr�ditos.', '$us[dia]', '$us[nombre]', '3')")or die(mysql_error());
				 		mysql_query("INSERT INTO sw_control_transferencias (dia, origen, destino, cantidad) VALUES ($fe[val], 'Jugador $us[nombre]', 'Jugador $_GET[to]', '$_GET[cr]')")or die(mysql_error());
 				 		echo "Enviados $_GET[cr] Cr�ditos a $_GET[to]! (10% de Impuesto)";
				 }
}}}else{echo 'No tienes suficiente nivel para enviar dinero.';}









include_once 'footer.php';?>
