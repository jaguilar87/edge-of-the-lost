<?php include 'header.php';

$c="SELECT * FROM sw_plan WHERE nombre='$_GET[pl]'";
$result=mysql_query($c)or die(mysql_error());
$plc=mysql_fetch_array($result);

$c="SELECT * FROM sw_city WHERE nombre='$_GET[ci]' AND esx='$plc[posx]' AND esy='$plc[posy]'";
$result = mysql_query($c);
$un=mysql_fetch_array($result);

if ($ok){
if ($_GET[ci]!="" && $_GET[pl]!=""){
$us[turnos]-=1;

if ($_GET[modo]==""){$_GET[modo]="normal";}


switch($_GET[modo]){
case "normal": if ($_GET[pl]==$pl[nombre]){$coste=1500;}else{$coste=7500;} break;
default: 

	 		 $c="SELECT * FROM `sw_vehiculos` WHERE nombre='$_GET[modo]'";
			 $result=mysql_query($c)or die(mysql_error());
			 $vev=mysql_fetch_array($result);
			 
			 If ($vev[tprop]=="Jugador"){
			 	if ($vev[prop]==$us[nombre]){$coste=0;}else{echo 'El vehículo no es tuyo';}
			 }else{

 			 $c="SELECT * FROM sw_viaje WHERE vehiculo='$_GET[modo]' AND origen='$us[ciudad]' AND orgy='$pl[posy]' AND orgx='$pl[posx]' AND destino='$_GET[ci]' AND desy='$plc[posy]' AND desx='$plc[posx]'";
			 $result=mysql_query($c)or die(mysql_error());
			 $viv=mysql_fetch_array($result);
			 
 			 if($_GET[modo]!=$viv[vehiculo]){echo 'Ruta erronea... <script> location.href="viaje.php" </script>';}else{
			 $coste=$viv[precio];
			 }
			 
			 }

			 
			 

 			 break;
}






if ($un[nombre]==$_GET[ci]){
$us[creditos]-=$coste;


if($us[creditos]<0 || $us[turnos]<0){echo 'Creditos y/o energía insuficientes...';}else{


if ($_GET[clan] && $vev[tprop]=="Jugador" && $us[nombre]==$vev[prop] && $us[nombre]==$cl[lider]){
$c= "UPDATE sw_users SET ciudad='$_GET[ci]', plax='$plc[posx]', play='$plc[posy]' WHERE clan='$us[clan]' AND ciudad='$us[ciudad]'";
$res=mysql_query($c);
}else{
$c= "UPDATE sw_users SET ciudad='$un[nombre]', plax='$plc[posx]', play='$plc[posy]' WHERE nombre='$us[nombre]'";
$res=mysql_query($c);
}
$c= "UPDATE sw_users SET turnos='$us[turnos]', creditos='$us[creditos]' WHERE nombre='$us[nombre]'";
$res=mysql_query($c); 
echo "Viaje a $_GET[ci] completado, ha pagado $coste Créditos.";


}}else{echo'Esa ciudad no existe';}

}else{ echo "<script> location.href='viaje.php' </script>";}

}else{

if ($_GET[ci]!="" && $_GET[pl]!=""){
echo 'Selecciona el modo de viaje:';

if ($_GET[pl]==$pl[nombre]){$mo="Planetario";}else{$mo="Interplanetario";}


echo '<form action="viajok.php" method="GET">
<input name="modo" type="radio" value="normal"> Viaje Normal.';
if ($mo=="Planetario"){ $c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador'";}else{ $c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador' AND espacio='S'";}
$result=mysql_query($c)or die(mysql_error());
echo'<br><br><i>Vehículo Própio:</i>';
while($v=mysql_fetch_array($result)){echo "<br><input name=\"modo\" type=\"radio\" value=\"$v[nombre]\"> $v[nombre]";}

echo '<br><br><i>Ofertas de Clan:</i>';
$c="SELECT * FROM `sw_viaje` WHERE origen='$us[ciudad]' AND orgy='$pl[posy]' AND orgx='$pl[posx]' AND destino='$_GET[ci]' AND desy='$plc[posy]' AND desx='$plc[posx]'";
$result=mysql_query($c)or die(mysql_error());
while($c=mysql_fetch_array($result)){echo "<br><input name=\"modo\" type=\"radio\" value=\"$c[vehiculo]\"> $c[vehiculo] ($c[clan]) - $c[precio] C";}

echo "<input name=\"ci\" type=\"hidden\" value=\"$_GET[ci]\"><input name=\"pl\" type=\"hidden\" value=\"$_GET[pl]\">";
if ($us[nombre]==$cl[lider]){echo '<br><br><input type="checkbox" name="clan" value="Check me">Traerse a todo el Clan (Sólo con vehículo propio)';}
echo '<br><input type="submit" name="ok" value="Viajar"></form>';






}else{echo'Esa ciudad no existe';}


}
include 'footer.php';?>
