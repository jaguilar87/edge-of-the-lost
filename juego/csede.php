<?php include 'header.php';
if ($_GET[clan]==""){$_GET[clan]=$us[clan];}
$c= "SELECT * FROM `sw_clan` WHERE nombre='$_GET[clan]'";
$result = mysql_query($c)or die(mysql_error());
$cli = mysql_fetch_array($result);

if ($cl[lider]==$us[nombre] && $us[clan]==$_GET[clan]){ echo '<center>[<a href="cgest.php">Gestionar Clan</a>]</center>';}


$u=textcolor($cli[lider]);
echo "</small><br><big><big><b><big>Clan $cli[nombre]</big> </b></big></big></center><hr><b>Líder:</b> <font color=\"$u[txtc]\">$u[titulo] $u[prefix] $u[nombre]</font></b><br><b>Hermandad:</b> $cli[hermandad]<br><b>Fondos:</b> $cli[fondos]<br><b>Puntos:</b> $cli[puntos]<br><b>Minerales:</b> $cli[mineral]<hr>";

echo " <b>Miembros del Clan:</b><br>";
$c="SELECT * FROM `sw_users` WHERE clan='$cli[nombre]' ORDER BY merito DESC";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><div align="right">Mérito</div></td><td></td></tr>';
while ($r = mysql_fetch_array($result)){$u=textcolor($r[nombre]); echo "<tr><td>$i- <a href=\"info.php?us=$r[nombre]\"><font color=\"$u[txtc]\">$u[titulo] $u[prefix] $r[nombre]</font></a></td><td> <div align=\"right\">$u[merito]</div></td><td>"; if($r[nombre]==$cl[lider]){echo '<spam title="Lider del Clan"><img src="images/corona.gif"></spam>';} echo "</td></tr>"; $i++;}
echo '</table>';

echo "<hr> <b>Ciudades del Clan:</b><br>";
$c="SELECT * FROM `sw_city` WHERE clan='$cli[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Planeta</b></td><td><b>Dirigente</b></td><td><small>Mina</small></td></tr>';
while ($r = mysql_fetch_array($result)){$u=textcolor($r[rey]); echo "<tr><td>$i- <a href=\"idistritos.php?ciudad=$r[nombre]\">$r[nombre]</a></td><td><a href=\"planet.php?pl=$r[planeta]\">$r[planeta]</a></td><td><a href=\"info.php?us=$r[rey]\"><font color=\"$u[txtc]\">$r[rey]</font></a></td><td>$r[mina]</td></tr>"; $i++;}
echo '</table>';

echo '<hr><b>Vehículos del Clan:</b>';
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$cli[nombre]' AND tprop='Clan' ORDER BY nombre ASC";
$result=mysql_query($c)or die(mysql_error());
$i=1;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Posición</b></td>';
while ($p = mysql_fetch_array($result)){echo "<tr><td><b>$i- </b><a href=\"ipproyecto.php?id=vehiculo&div=$p[nombre]\">$p[nombre]</a></td><td>($p[x],$p[y]) $p[ciudad]</td></tr>"; $i++;} 
echo '</table>';

if ($us[clan]==$cli[nombre]){
echo "<hr><u><center>Opciones:</center></u><center><a href=\"clanact.php?act=salir\"><span title=\"Salir del Clan\"><img border=0 src=\"images/x.gif\"> Salir del Clan</span></a><br> <a href=\"clanact.php?act=fundar\"><span title=\"Fundar clan\"><img border=0 src=\"images/e.jpg\"> Fundar un Clan</span></a><br><a href=\"fundar.php?ac=ciudad\"><img border=0 src=\"images/e.jpg\"> Fundar Ciudad</a><br><a href=\"aduelo.php\"><span title=\"Retar en duelo\"><img border=0 src=\"images/atk.gif\"> Retar en duelo</span></a><br>
<form action=\"clanact.php\" Method=\"GET\">Donar<input name=\"cre\" type=\"text\" value=\"0\"><input name=\"act\" type=\"hidden\" value=\"donar\">Créditos al clan. <input type=\"submit\" value=\"Donar\"></form></center>";

}else{
if ($cli[hermandad]=="Sith" && $us[lado]<0) {echo "<a href=\"log.php?ver=solicitar&clan=$cli[nombre]\">Solicitar ingreso en el clan.</a>";}elseif($cli[hermandad]=="Jedi" && $us[lado]>0) {echo "<a href=\"log.php?ver=solicitar&clan=$cli[nombre]\">Solicitar ingreso en el clan.</a>";}elseif ($cli[hermandad]=="Neutral"){echo "<a href=\"log.php?ver=solicitar&clan=$cli[nombre]\">Solicitar ingreso en el clan.</a>";}else{echo '<br>No puedes solicitar el ingreso en este clan por tu Alineación con el Lado de la fuerza';}
}

include 'footer.php';?>
