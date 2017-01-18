<?php include_once 'header.php';
if ($us[nombre]==$cl[lider]){
if ($_GET[ve]!="" && $_GET[ori]!="" && $_GET[des]!="" && $_GET[pre]!=""){ 



$ve=sel("sw_vehiculos", "", $_GET[ve]);
$or=sel("sw_city", "", $_GET[ori]);
$por=sel("sw_plan", "", $or[planeta]);
$de=sel("sw_city", "", $_GET[des]);
$pde=sel("sw_plan", "", $de[planeta]);
	  
	  if ($ve[tipo]=="VCA" && $pde[nombre]!=$por[nombre]){echo 'Ese tipo de vehículo no es válido para ese viaje.';}else{
	  
	  
	  if ($or[clan]==$cl[nombre] && $us[nombre]==$cl[lider] && $ve[prop]==$us[clan] && $ve[uso]!="S" && $_GET[pre]>=200){

	  	mysql_query("INSERT INTO `sw_viaje` (origen, destino, vehiculo, precio, clan) VALUES ('$or[nombre]', '$de[nombre]', '$_GET[ve]', '$_GET[pre]', '$us[clan]')");
			mysql_query("UPDATE sw_vehiculos SET uso='S' WHERE nombre='$_GET[ve]'")or die(mysql_error());
			echo 'Ruta creada';  
	  
	  
	  
	  }else{
					echo 'Imposible abrir ruta';
		}
	  }

}elseif($_GET[ac]=="borrar"){


$c="SELECT * FROM sw_viaje WHERE id='$_GET[id]'";
$result=mysql_query($c)or die(mysql_error());
$v=mysql_fetch_array($result);

if ($v[clan]==$us[clan]){ 
mysql_query("UPDATE sw_vehiculos SET uso='N' WHERE nombre='$v[vehiculo]'"); 
mysql_query("DELETE FROM sw_viaje WHERE id='$_GET[id]'"); 
echo 'Viaje borrado... <a href="clan/?id=viajes">Volver</a>.';
}






}else{


echo '<big><center><big><b>Crear una Ruta de Viaje</b></big></big></center>';

echo '<form action="clan/viajes.php" METHOD="GET"><br><br>Ciudad Origen: <select name="ori">';

$c="SELECT * FROM sw_city WHERE clan='$us[clan]'";
$result=mysql_query($c)or die(mysql_error());
while ($civ=mysql_fetch_array($result)){

	  $c2="SELECT * FROM sw_plan WHERE nombre='$civ[planeta]'";
	  $result2=mysql_query($c2)or die(mysql_error());
	  $plv=mysql_fetch_array($result2);

	  echo "<option value=\"$civ[nombre]\"> $civ[nombre] ($plv[nombre])";

}


echo '</select><br><br>Ciudad Destino:<select name="des">';

$c="SELECT * FROM sw_city";
$result=mysql_query($c)or die(mysql_error());
while ($civ2=mysql_fetch_array($result)){

	  $c2="SELECT * FROM sw_plan WHERE nombre='$civ2[planeta]'";
	  $result2=mysql_query($c2)or die(mysql_error());
	  $plv=mysql_fetch_array($result2);

	  echo "<option value=\"$civ2[nombre]\"> $civ2[nombre] ($plv[nombre]) - $civ2[clan]";


}

echo '</select><br><br>Vehículo: <select name="ve">';


$c="SELECT * FROM sw_vehiculos WHERE tprop='Clan' and prop='$us[clan]' AND tipo!='Crucero' AND arma='' AND uso='N'";
$result=mysql_query($c)or die(mysql_error());
while ($civ2=mysql_fetch_array($result)){
echo "<option value=\"$civ2[nombre]\"> $civ2[nombre]";
}

echo '</select><br><br>Precio: <input name="pre" type="text" value="200"> Créditos<br><br><input type="submit" value="Crear Ruta"></form>';

echo "<br><br><big><big><center>Gestión de Rutas ya existentes</center></big></big>";

$c="SELECT * FROM sw_viaje WHERE clan='$us[clan]' ORDER BY vehiculo ASC";
$result=mysql_query($c)or die(mysql_error());
while ($v=mysql_fetch_array($result)){
echo "<br><small><b>$v[vehiculo]</b> - de $v[origen] a $v[destino] - $v[precio] C</small> <a href=\"clan/?id=viajes&ac=borrar&id=$v[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a>";
}




}}else{echo 'No eres el Lider del Clan';}

include_once 'footer.php';?>
