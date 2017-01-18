<?php include 'header.php';
switch ($_GET[act]){
case "salir":
	 if ($us[clan]==""){ 
	       echo "No estás en ningun clan";
	 }else{
	       echo "¿Estás seguro que deseas abandonar el clan $us[clan]? <br><br><a href=\"clanact.php?act=abok\">Abandonar Clan</a>";
	 }
break; 
case "fundar":
	 if ($cl[lider]!=$us[nombre]){
	 	echo 'Fundar un clan cuesta 10.000 Créditos. Si ya tienes un clan serás expulsado del anterior. <br>
		<form action="fundar.php?ac=clan" method="POST">
			  Nombre del Nuevo Clan: <input name="nom" type="text" value=""> 
			  <br>Hermandad: <input name="her" type="radio" value="Jedi">Jedi <input name="her" type="radio" value="Sith">Sith 
			  <br><input type="submit" name="fundar" value="Fundar">
		</form>';
	 }else{
	 	echo 'Si eres el lider del clan, no puedes fundar otro';
	 }

break; 
case "abok":
	 $us[merito]-=250;

	 mysql_query("UPDATE `sw_users` SET clan=NULL, merito='$us[merito]' WHERE nombre='$us[nombre]'")or die(mysql_error());
	 echo 'Clan Abandonado';   


break; 
case "solicitud":

	 if ($cl[lider]==$us[nombre]){
	 	echo "$_GET[us] solicita el ingreso en el clan $us[clan], ¿Desea aceptarlo? <br> <a href=\"clanact.php?act=solok&us=$_GET[us]\">Aceptar Ingreso</a>";
	 }else{
	    echo "No eres el lider del clan.";
	 }


break; 
case "solok":
 
 	 if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("UPDATE `sw_users` SET clan='$us[clan]' WHERE nombre='$_GET[us]'")or die(mysql_error());
		mysql_query("DELETE FROM sw_log WHERE ref='$_GET[us]' AND tipo='2'");

		echo 'Aceptado en el Clan!';
		echo "<script> location.href='fficha.php' </script>";

	 }else{ 
	 	echo "No eres el lider del clan.";
	 }


break; 
case "donar":

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

break; 
case "messb":

	 if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("SELECT * FROM `sw_board_clan` WHERE id='$_GET[mess]'")or die(mysql_error());
		$ider=sel("sw_board_clan", "id", $_GET[mess]);

		if ($ider[clan]==$cl[nombre]){
		   mysql_query("DELETE FROM sw_board_clan WHERE id='$_GET[mess]'")or die(mysql_error());
   		   echo "Mensaje Borrado";
		   echo "<script> location.href=\"cgest.php#mess\" </script>";
		}else{
		   echo "Ese mensaje no es de tu clan, no puede ser borrado";
		}

	 }else{
	 	echo "No eres el lider del clan.";
	 }




break;
case "expul":

	 if ($cl[lider]==$us[nombre]){ 
	 	
		$ex=sel ("sw_users", "nombre", $_GET[us]);
		
		if ($ex[clan]==$cl[nombre]){
		   echo "¿Seguro que deseas expulsar a $_GET[us] del Clan? <br><a href=\"clanact.php?act=expulok&us=$_GET[us]\">Expulsar</a>";

		}else{
		   echo "No es de tu clan, no puedes expulsarlo";
		} 
     }else{
	    echo "No eres el lider del clan.";
	 }


break;
case "expulok":
	 if ($cl[lider]==$us[nombre]){ 
	  	mysql_query("UPDATE `sw_users` SET clan=NULL WHERE nombre='$_GET[us]'")or die(mysql_error());
	  	echo "$_GET[us] ha sido expulsado con éxito.";
	    mysql_query("UPDATE sw_city set rey='(NADIE)', Clan='DESOCUPADA' WHERE rey='$_GET[us]'")or die(mysql_error());
	  	echo "<script> location.href=\"cgest.php\" </script>";
	 }else{
	    echo "No eres el lider del Clan.";
	 }


break;
case "darciudad":

   $c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
   $result=mysql_query($c)or die(mysql_error());
   $cic=sel ("sw_city", "nombre", $_GET[ciudad]);
   
   if ($cic[rey]==$us[nombre]){
   	  mysql_query("UPDATE sw_city set rey='$_POST[nombre]' WHERE nombre='$_GET[ciudad]'")or die(mysql_error());
	  mysql_query("INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$_POST[nombre]', '$us[nombre] te ha dado el control de la ciudad $cic[nombre].', '$fe[val]', '4', '$cic[nombre]')")or die(mysql_error());
	  
	  echo 'Ciudad Transferida';

   }else{
   	  echo "No eres el Rey de la ciudad.";
   }


break;
case "expro":

	 if ($cl[lider]==$us[nombre]){ 
	 	mysql_query("UPDATE `sw_city` SET rey='$us[nombre]' WHERE nombre='$_GET[ci]'")or die(mysql_error());

		echo 'Ciudad expropiada';
		echo "<script> location.href=\"idistritos.php?ciudad=$_GET[ci]\" </script>";
     }else{
	    echo "No eres el lider del Clan.";
     }


break; 
case "mina":
	 if ($cl[lider]==$us[nombre]){ 
	 	if ($_GET[pago]<0 ||$_GET[pago] > 1500){
		   echo 'Valor NO valido o superior a 1000C';
		}else{
	  	   mysql_query("UPDATE `sw_clan` SET pago='$_GET[pago]' WHERE nombre='$us[clan]'")or die(mysql_error());

		   echo 'Precio modificado';
		   echo "<script> location.href='cgest.php' </script>";
		}
	 }else{
	    echo "No eres el lider del Clan.";
	 }


break;
case "vender":

	  if ($_GET[vehiculo]==""){
	  	 echo "<script> location.href=\"iphangar.php\" </script>";
	  }

	  echo "Vender $_GET[vehiculo] por <form action=\"clanact.php\" method=\"GET\"><input name=\"precio\" type=\"text\" value=\"0\"><input name=\"vehiculo\" type=\"hidden\" value=\"$_GET[vehiculo]\"> <input name=\"act\" type=\"hidden\" value=\"vendok\">Créditos <input type=\"submit\" value=\"Ok\"></form>";

break;
case "vendok":	 
	 
	 if ($_GET[vehiculo]==""){
	 	echo "<script> location.href=\"iphangar.php\" </script>";
	 }

	 
	 $ul=sel("sw_vehiculos", "", $_GET[vehiculo]);
  if($ul[tipo]!="Crucero" && $ul[uso]=="N"){

	 if($ul[tprop]=="Jugador"){
			$v=true;
	 }elseif($ul[tprop]=="Clan" && $us[nombre]==$cl[lider] && $us[clan]!=""){
			$v=true;
 	 }else{
	 		echo "Imposible de vender";
	 }
	}	 

	 if ($v){

	  	 $result=mysql_query("UPDATE `sw_vehiculos` SET venta='S', precio='$_GET[precio]' WHERE nombre='$_GET[vehiculo]'")or die(mysql_error());
	  
	  	 echo 'Puesto a la venta';
	}else{
		  Echo 'No tienes jurisdicción para poner a la venta el vehiculo o no existe';
	}

break;

}
echo "<br>Volver a la Sede de <a href=\"csede.php?clan=$us[clan]\">Clan</a>";

include 'footer.php'; ?>