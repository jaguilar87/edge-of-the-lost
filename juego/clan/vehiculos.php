<?php
	include 'header.php';
	echo '<b>Veh�culos del Clan:</b>';
	


	$c="SELECT * FROM `sw_vehiculos` WHERE prop='$cl[nombre]' AND tprop='Clan' ORDER BY nombre ASC";
	$result=mysql_query($c)or die(mysql_error());
	echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posici�n</b></td><td><b>Da�os</b></td></tr>';
	while ($p = mysql_fetch_array($result)){
			echo "<tr><td><a href=\"lista/proyecto.php?ac=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td>$p[ciudad]"; 
			if ($cl[lider]==$us[nombre] && $p[tipo]!="Crucero"){
				 echo " <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clan/?id=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\"><small>Vender</small></a>";
			} 
			$cost=$p[dam]*20;
			echo "</td><td>$p[dam]% Da�os";
			if ($cl[lider]==$us[nombre]){
				echo "<a onMouseover=\" ddrivetip('Reparar por $cost mineral', '#808080');\" href=\"ciudad/?id=preparar&veh=$p[id]\" onMouseout=\"hideddrivetip()\"><img border=0 src='images/e.jpg'></a>";
			}
			echo "</td></tr>";
	} 
	echo "</table>";

	include 'footer.php';
?>
