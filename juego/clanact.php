<?php include 'header.php';

if ($_GET[act]=="salir"){
if ($us[clan]==""){ 
      echo "No estás en ningun clan";
}else{
	  echo "¿Estás seguro que deseas abandonar el clan $us[clan]? <br><br><a href=\"clanact.php?act=abok\">Abandonar Clan</a>";
}

}elseif($_GET[act]=="fundar"){
if ($cl[lider]!=$us[nombre]){echo 'Fundar un clan cuesta 10.000 Créditos. Si ya tienes un clan serás expulsado del anterior. <br><form action="fundar.php?ac=clan" method="POST">Nombre del Nuevo Clan: <input name="nom" type="text" value=""> <br>Hermandad: <input name="her" type="radio" value="Jedi">Jedi <input name="her" type="radio" value="Neutral">Neutral <input name="her" type="radio" value="Sith">Sith <br><input type="submit" name="fundar" value="Fundar"></form>';}else{echo 'Si eres el lider del clan, no puedes fundar otro';}

}elseif($_GET[act]=="abok"){
$us[merito]-=250;

   $c="UPDATE `sw_users` SET clan=NULL, merito='$us[merito]' WHERE nombre='$us[nombre]'";
   $result=mysql_query($c)or die(mysql_error());
echo 'Clan Abandonado';   


}elseif($_GET[act]=="solicitud"){
if ($cl[lider]==$us[nombre]){echo "$_GET[us] solicita el ingreso en el clan $us[clan], ¿Desea aceptarlo? <br> <a href=\"clanact.php?act=solok&us=$_GET[us]\">Aceptar Ingreso</a>";
}else{ echo "No eres el lider del clan.";}


}elseif($_GET[act]=="solok"){ 
if ($cl[lider]==$us[nombre]){ 
$c="UPDATE `sw_users` SET clan='$us[clan]' WHERE nombre='$_GET[us]'";
$result=mysql_query($c)or die(mysql_error());

   $sql = "DELETE FROM sw_log WHERE ref='$_GET[us]' AND tipo='2'";
   $result = mysql_query($sql);

echo 'Aceptado en el Clan!';
echo "<script> location.href=\"fficha.php\" </script>";

}else{ echo "No eres el lider del clan.";}


}elseif($_GET[act]=="donar"){
if ($_GET[cre]<=0){echo "Valor NO Válido";}else{
if ($us[creditos] < $_GET[cre]){Echo "Créditos insuficientes";}else{
echo "Donados $_GET[cre] Créditos al Clan!";
$cl[fondos] += $_GET[cre];
$us[creditos] -= $_GET[cre];
$c="UPDATE `sw_clan` SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$c="UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$sql = "INSERT INTO `sw_board_clan` (clan, poster, dia, mess) VALUES ('$cl[nombre]', 'INFORMACION', '$us[dia]', '$us[nombre] ha donado $_GET[cre] Créditos al Clan!')";
$result = mysql_query($sql)or die(mysql_error());


mysql_query("INSERT INTO sw_control_transferencias (dia, origen, destino, cantidad) VALUES ($fe[dia], 'Jugador $us[nombre]', 'Clan $cl[nombre]', '$_GET[cre]')")or die(mysql_error());

}}



}elseif($_GET[act]=="messb"){
if ($cl[lider]==$us[nombre]){ 
$c="SELECT * FROM `sw_board_clan` WHERE id='$_GET[mess]'";
$result=mysql_query($c)or die(mysql_error());
$ider=mysql_fetch_array($result);
if ($ider[clan]==$cl[nombre]){
   $sql = "DELETE FROM sw_board_clan WHERE id='$_GET[mess]'";
   $result = mysql_query($sql);
   echo "Mensaje Borrado";
echo "<script> location.href=\"cgest.php#mess\" </script>";
}else{echo "Ese mensaje no es de tu clan, no puede ser borrado";}
}else{echo "No eres el lider del clan.";}




}elseif($_GET[act]=="expul"){
if ($cl[lider]==$us[nombre]){ 
$c="SELECT * FROM `sw_users` WHERE nombre='$_GET[us]'";
$result=mysql_query($c) or die(mysql_error());
$ex=mysql_fetch_array($result);
if ($ex[clan]==$cl[nombre]){
echo "¿Seguro que deseas expulsar a $_GET[us] del Clan? <br><a href=\"clanact.php?act=expulok&us=$_GET[us]\">Expulsar</a>";

}else{echo "No es de tu clan, no puedes expulsarlo";} 
}else{echo "No eres el lider del clan.";}





}elseif($_GET[act]=="expulok"){
if ($cl[lider]==$us[nombre]){ 

	  $c="UPDATE `sw_users` SET clan=NULL WHERE nombre='$_GET[us]'";
	  $result=mysql_query($c)or die(mysql_error());
	  echo "$_GET[us] ha sido expulsado con éxito.";
	  $sql ="UPDATE sw_city set rey='(NADIE)', Clan='DESOCUPADA' WHERE rey='$_GET[us]'";
	  $result = mysql_query($sql);
	  echo "<script> location.href=\"cgest.php\" </script>";
}else{echo "No eres el lider del Clan.";}


}elseif($_GET[act]=="darciudad"){

   $c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
   $result=mysql_query($c)or die(mysql_error());
   $cic=mysql_fetch_array($result);
   
if ($cic[rey]==$us[nombre]){

	  $sql ="UPDATE sw_city set rey='$_POST[nombre]' WHERE nombre='$_GET[ciudad]'";
	  $result = mysql_query($sql);

	  $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$_POST[nombre]', '$us[nombre] te ha dado el control de la ciudad $cic[nombre].', '$fe[dia]', '4', '$cic[nombre]')";
	  $result = mysql_query($sql);
	  
	  echo 'Ciudad Transferida';

}else{echo "No eres el Rey de la ciudad.";}




}elseif($_GET[act]=="expro"){
if ($cl[lider]==$us[nombre]){ 

	  $c="UPDATE `sw_city` SET rey='$us[nombre]' WHERE nombre='$_GET[ci]'";
	  $result=mysql_query($c)or die(mysql_error());

echo 'Ciudad expropiada';
echo "<script> location.href=\"idistritos.php?ciudad=$_GET[ci]\" </script>";
}else{echo "No eres el lider del Clan.";}






}elseif($_GET[act]=="mina"){
if ($cl[lider]==$us[nombre]){ 
if ($_GET[pago]<0 ||$_GET[pago] > 1500){echo 'Valor NO valido o superior a 1000C';}else{
	  $c="UPDATE `sw_clan` SET pagomina='$_GET[pago]' WHERE nombre='$us[clan]'";
	  $result=mysql_query($c)or die(mysql_error());

echo 'Precio modificado';
echo "<script> location.href=\"cgest.php\" </script>";
}}else{echo "No eres el lider del Clan.";}


}elseif($_GET[act]=="vender"){
if ($_GET[vehiculo]==""){echo "<script> location.href=\"iphangar.php\" </script>";}

echo "Vender $_GET[vehiculo] por <form action=\"clanact.php\" method=\"GET\"><input name=\"precio\" type=\"text\" value=\"0\"><input name=\"vehiculo\" type=\"hidden\" value=\"$_GET[vehiculo]\"> <input name=\"act\" type=\"hidden\" value=\"vendok\">Créditos <input type=\"submit\" value=\"Ok\"></form>";

}elseif($_GET[act]=="vendok"){	 
if ($_GET[vehiculo]==""){echo "<script> location.href=\"iphangar.php\" </script>";}

$c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador' AND nombre='$_GET[vehiculo]'";
$result=mysql_query($c)or die(mysql_error());
$ul=mysql_fetch_array($result);


if($cl[lider]==$us[nombre] && $us[clan]!=""){
		$c="SELECT * FROM `sw_vehiculos` WHERE prop='$cl[nombre]' AND tprop='Clan' AND nombre='$_GET[vehiculo]'";
		$result=mysql_query($c)or die(mysql_error());
		$uc=mysql_fetch_array($result);
}
		if($uc[nombre]==$_GET[vehiculo] && $uc[tipo]!="Crucero de Batalla" || $ul[nombre]==$_GET[vehiculo] && $ul[tipo]!="Crucero de Batalla"){$v=true;}

if ($v){
	  $c="UPDATE `sw_vehiculos` SET venta='S', precio='$_GET[precio]' WHERE nombre='$_GET[vehiculo]'";
	  $result=mysql_query($c)or die(mysql_error());
	  
	  echo 'Puesto a la venta';
}else{Echo 'No tienes jurisdicción para poner a la venta el vehiculo o no existe';}





	  
	  
	  


}
echo "<br>Volver a la Sede de <a href=\"csede.php?clan=$us[clan]\">Clan</a>";

include 'footer.php'; ?>