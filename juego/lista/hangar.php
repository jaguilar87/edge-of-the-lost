<?php include_once 'header.php';
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posición</b></td>';
echo "<tr bgcolor='#808080'><td><i>Vehículos del Clan:</i> </td><td></td></tr>";

	 $result = mysql_query("SELECT * FROM `sw_vehiculos` WHERE prop='$cl[nombre]' AND tprop='Clan' ORDER BY id ASC")or die(mysql_error());
	 while ($p = mysql_fetch_array($result)){
	 	   echo "<tr>
		   			 <td>
					 	 <a href=\"lista/proyecto.php?ac=vehiculo&div=$p[nombre]\">
						 	$p[nombre]
						 </a>
					 </td>
					 <td>
					 	 $p[ciudad]
				"; 

			if ($cl[lider]==$us[nombre]){
			   echo " <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clan/?id=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\"><small>Vender</small></a>";
			} 
			
			echo "</td></tr>";
	 } 


echo "<tr bgcolor='#808080'><td><i>Tus Vehículos:</i> </td><td></td></tr>";
	 $result = mysql_query("SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador' ORDER BY id ASC")or die(mysql_error());
	 while ($p = mysql_fetch_array($result)){
	 	   echo "<tr>
		   			 <td>
					 	 <a href=\"lista/proyecto.php?ac=vehiculo&div=$p[nombre]\">
						 	$p[nombre]
						 </a>
					 </td>
					 <td>
					 	 $p[ciudad] 
						 <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clan/?id=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\">
						 	<small>Vender</small>
						 </a>
					 </td>
				 </tr>";
	 } 


echo "<tr bgcolor='#808080'><td><i>Vehículos en la ciudad:</i></td><td><b>Propietario</b></td></tr>";
	 $result = mysql_query("SELECT * FROM `sw_vehiculos` WHERE ciudad='$ci[nombre]' ORDER BY id ASC")or die(mysql_error());
	 while ($p = mysql_fetch_array($result)){
	 	   echo "<tr><td><a href=\"lista/proyecto.php?ac=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td><small>$p[tprop] $p[prop]</small></td></tr>";
		} 
echo '</table>';


echo ' <br><hr><br><b>VEHICULOS A LA VENTA</b>';
$result = mysql_query("SELECT * FROM `sw_vehiculos` WHERE venta='S' ORDER BY id ASC")or die(mysql_error());

echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Propietario</b></td><td><b>precio</b></td>';
while ($p = mysql_fetch_array($result)){
	  echo "<tr><td><a href=\"lista/proyecto.php?ac=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td><small>$p[tprop] $p[prop]</small></td><td>$p[precio] <a onMouseover=\" ddrivetip('Comprar', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ciudad/?id=pcomprar&veh=$p[nombre]\"><img border=0 src=\"images/arr.gif\"></a>";
	  if ($us[nombre]==$cl[lider]){echo " <a onMouseover=\" ddrivetip('Comprar para el clan', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ciudad/?id=pcomprar&veh=$p[nombre]&ac=clan\"><img border=0 src=\"images/new.gif\"></a>";}
	  echo "</td></tr>";
} 
echo '</table>';



include_once 'footer.php';?>
