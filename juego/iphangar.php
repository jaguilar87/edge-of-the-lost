<?php include 'header.php';
echo "<i>Vehículos del Clan <b>$us[clan]</b>:</i> ";
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$cl[nombre]' AND tprop='Clan' ORDER BY id ASC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posición</b></td>';
while ($p = mysql_fetch_array($result)){echo "<tr><td><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td>($p[x],$p[y]) $p[ciudad]"; if ($cl[lider]==$us[nombre]){echo " <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clanact.php?act=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\"><small>Vender</small></a>";} echo "</td></tr>";} 
echo '</table>';

echo '<br><br><i>Tus Vehículos:</i>';
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador' ORDER BY id ASC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posición</b></td>';
while ($p = mysql_fetch_array($result)){echo "<tr><td><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td>($p[x],$p[y]) $p[ciudad] <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clanact.php?act=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\"><small>Vender</small></a></td></tr>";} 
echo '</table>';


echo "<br><br><i>Vehículos en la ciudad <b>$us[ciudad]</b>:</i>";
$c="SELECT * FROM `sw_vehiculos` WHERE ciudad='$ci[nombre]' ORDER BY id ASC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Propietario</b></td>';
while ($p = mysql_fetch_array($result)){echo "<tr><td><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td><small>$p[tprop] $p[prop]</small></td></tr>";} 
echo '</table>';


echo ' <br><hr><br><b>VEHICULOS A LA VENTA</b>';
$c="SELECT * FROM `sw_vehiculos` WHERE venta='S' ORDER BY id ASC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Propietario</b></td><td><b>precio</b></td>';
while ($p = mysql_fetch_array($result)){
	  echo "<tr><td><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td><small>$p[tprop] $p[prop]</small></td><td>$p[precio] <a onMouseover=\" ddrivetip('Comprar', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ipcomprar.php?veh=$p[nombre]\"><img border=0 src=\"images/arr.gif\"></a>";
	  if ($us[nombre]==$cl[lider]){echo " <a onMouseover=\" ddrivetip('Comprar para el clan', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ipcomprar.php?veh=$p[nombre]&ac=clan\"><img border=0 src=\"images/new.gif\"></a>";}
	  echo "</td></tr>";
} 
echo '</table>';



include 'footer.php';?>
