<?php include 'header.php';
if ($cl[lider]==$us[nombre]){

$c= "SELECT * FROM `sw_clan` WHERE nombre='$us[clan]'";
$result = mysql_query($c)or die(mysql_error());
$cli = mysql_fetch_array($result);

$u=textcolor($cli[lider]);
echo "<center><big><big><b><big>Gestión del Clan <b>$cli[nombre]</b></big> </b></big></big></center><hr><b>Líder:</b> <font color=\"$u[txtc]\">$u[titulo] $u[prefix] $u[nombre]</font></b><br><b>Hermandad:</b> $cli[hermandad]<br><b>Fondos:</b> $cli[fondos]<br><b>Puntos:</b> $cli[puntos]<br><b>Minerales:</b> $cli[mineral]<br><b>Poténcia:</b> $cli[potencia] W";

echo '<hr> <b>Miembros del Clan:</b><br><a name="miem"></a>';
$c="SELECT * FROM `sw_users` WHERE clan='$cli[nombre]' ORDER BY merito DESC";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table><tr><td><b>Nombre</b></td><td><div align="right">Mérito</div></td><td></td></tr>';
while ($r = mysql_fetch_array($result))
{
	  $u=textcolor($r[nombre]); 
	  echo "<tr><td>$i- <a href=\"info.php?us=$r[nombre]\"><font color=\"$u[txtc]\">$u[titulo] $u[prefix] $r[nombre]</font></a></td><td> <div align=\"right\">$u[merito]</div></td><td><a href=\"clanact.php?act=expul&us=$r[nombre]\"><img border=0 src=\"images/x.gif\"></a></td><td></td></tr>"; 
	  $i++;
}

echo '</table>';

echo '<hr> <a name="ciud"></a><b>Ciudades del Clan:</b><br>';
$c="SELECT * FROM `sw_city` WHERE clan='$cli[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Planeta</b></td><td><b>Dirigente</b></td><td><small>Mina</small></td><td></td></tr>';
while ($r = mysql_fetch_array($result)){$u=textcolor($r[rey]); echo "<tr><td>$i- <a href=\"idistritos.php?ciudad=$r[nombre]\">$r[nombre]</a></td><td><a href=\"planet.php?pl=$r[planeta]\">$r[planeta]</a></td><td><a href=\"info.php?us=$r[rey]\"><font color=\"$u[txtc]\">$r[rey]</font></a></td><td>$r[mina]</td><td><a onMouseover=\" ddrivetip('Expropiar ciudad', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"clanact.php?act=expro&ci=$r[nombre]\"><img border=0 src=\"images/flag.gif\"></a></td></tr>"; $i++;}
echo '</table>';

echo '<br><hr><b>Trabajos del clan:</b> <a name="trab"></a>';
echo "<form action=\"clanact.php\" method=\"GET\">Pago en generador <input name=\"pago\" type=\"text\" value=\"$cli[pago]\">Créditos. <input name=\"act\" type=\"hidden\" value=\"mina\"><input type=\"submit\" value=\"Modificar\"></form>";

echo '<hr><br><b>Vehículos del Clan:</b><a name="vehi"></a>';
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$cl[nombre]' AND tprop='Clan' ORDER BY nombre ASC";
$result=mysql_query($c)or die(mysql_error());
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posición</b></td><td><b>Daños</b></td></tr>';
while ($p = mysql_fetch_array($result)){
			echo "<tr><td><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td>$p[ciudad]"; 
			if ($cl[lider]==$us[nombre] && $p[tipo]!="Crucero"){
				 echo " <a onMouseover=\" ddrivetip('Poner a la venta', '#808080');\" onMouseout=\"hideddrivetip()\"  href=\"clanact.php?act=vender&vehiculo=$p[nombre]\"><img border=0 src=\"images/arr.gif\"><small>Vender</small></a>";
			} 
			$cost=$p[dam]*1000;
			echo "</td><td>$p[dam]% Daños	<a onMouseover=\" ddrivetip('Reparar por $cost mineral', '#808080');\" href=\"idistritos.php?def=ipreparar.php&veh=$p[id]\" onMouseout=\"hideddrivetip()\"><img border=0 src='images/e.jpg'></a></td></tr>";
} 
echo '</table>';
echo '<br><a href="idistritos.php?def=ipastilleros.php">Añadir un proyecto</a>';
echo '<br><a href="cviajes.php">Gestionar Rutas de Viaje</a>';

echo "<hr><u><center>Opciones:</center></u><center><a href=\"clanact.php?act=salir\"><span title=\"Disolver el Clan\"><img border=0 src=\"images/x.gif\">Eliminar Clan</span></a><br> <a href=\"clanact.php?act=fundar\"><span title=\"Fundar clan\"><img border=0 src=\"images/e.jpg\">Fundar Clan</span></a><br><a href=\"fundar.php?ac=ciudad\"><img border=0 src=\"images/e.jpg\">Fundar Ciudad</a>
<form action=\"clanact.php\" Method=\"GET\">Donar<input name=\"cre\" type=\"text\" value=\"0\"><input name=\"act\" type=\"hidden\" value=\"donar\">Créditos al clan. <input type=\"submit\" value=\"Donar\"></form>";

echo '<br><hr><a name="mess"></a><br><table width="100%" border=1><caption align="top">Tablón de anuncios</caption>';
$c="UPDATE `sw_users` SET cmess='N' WHERE nombre='$_SESSION[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$c="SELECT * FROM `sw_board_clan` WHERE clan='$cli[nombre]' ORDER BY id DESC LIMIT 0,10";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){$t=textcolor($r[poster]); echo "<tr><td><b>#</b>$r[id]<br><b>De</b> <font color=\"$t[txtc]\">$r[poster]</font>, <b>día</b> $r[dia]<br>$r[mess]<br><a href=\"clanact.php?act=messb&mess=$r[id]\"><img border=0 src=\"images/x.gif\">Borrar Mensaje</a></td></tr>";}
echo "<tr><td><center><marquee>Bienvenidos al clan $us[clan], se están mostrando los últimos 20 mensajes</marquee></center></td></tr></table><br>";

echo "Envía un mensaje al clan:<form method=\"post\" action=\"cboard_send.php\">
<b>Mensaje:</b><br><textarea style=\"width:450px\" name=\"me\"></textarea>
<input type=\"Submit\" name=\"enviar\" value=\"send\">
</form>";









}else{echo'No eres el lider del clan';}
include 'footer.php';?>
