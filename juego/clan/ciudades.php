<?php
	include 'header.php';


echo "<hr> <b>Ciudades del Clan:</b><br>";
$c="SELECT * FROM `sw_city` WHERE clan='$cli[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Planeta</b></td><td><b>Dirigente</b></td><td align="center"><small>Mina</small></td></tr>';
while ($r = mysql_fetch_array($result)){
	$u=textcolor($r[rey]); 
	echo "<tr><td>$i- <a href=\"ciudad/?ciudad=$r[nombre]\">$r[nombre]</a></td><td><a href=\"lista/planet.php?pl=$r[planeta]\">$r[planeta]</a></td><td><a href=\"lista/info.php?us=$r[rey]\">$u[nom]</a></td><td align='center'>$r[mina]</td>";
	if ($us[nombre]==$cl[lider]) echo "<td><a onMouseover=\" ddrivetip('Expropiar ciudad', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"clan/?id=expro&ci=$r[nombre]\"><img border=0 src=\"images/flag.gif\"></a>";
	echo "</tr>"; 
	$i++;
}
echo '</table>';


	include 'footer.php';
?>
