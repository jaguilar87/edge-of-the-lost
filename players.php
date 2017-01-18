<?php include 'header.php';
if ($_GET[ord]=="") {$_GET[ord]="DESC";}
if ($_GET[by]=="") {$_GET[by]="puntos";}
if ($_GET[nv]=="") {$_GET[nv]=$us[nv_sable];}

echo '<div align="right">(<small><a href="players.php?nv=0">Usuarios de la Fuerza</a> / <a href="players.php?nv=1">Aprendices y Padawans</a> / <a href="players.php?nv=2">Caballeros y Guerreros</a>)<br><small>(<a href="players.php?nv=3">Lord y Maestros</a>)</small></div>';
echo '<table width="100%" cellpading="5" cellspacing="5" ><caption align="TOP">Jugadores</caption><tr bgcolor="#4f4f4f"><td><b>';
echo "Nombre<a href=\"players.php?by=nombre&ord=DESC&nv=$_GET[nv]\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"players.php?by=nombre&ord=ASC&nv=$_GET[nv]\"><img  border=0 src=\"images/a_up.gif\"></a></b></td><td><b><center><small>Puntos<a href=\"players.php?by=puntos&ord=DESC&nv=$_GET[nv]\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"players.php?by=puntos&ord=ASC&nv=$_GET[nv]\"><img  border=0 src=\"images/a_up.gif\"></a></small></center></b></td><td><b><div align=\"right\"><small>Créditos<a href=\"players.php?by=creditos&ord=DESC&nv=$_GET[nv]\"><img  border=0 src=\"images/a_down.gif\"></a><a href=\"players.php?by=creditos&ord=ASC&nv=$_GET[nv]\"><img  border=0 src=\"images/a_up.gif\"></a></small></div></b></td></tr>";

$c="select * FROM `sw_users` WHERE nv_sable='$_GET[nv]' AND reg='S' ORDER BY $_GET[by] $_GET[ord]  ";
$result=mysql_query($c)or die(mysql_error());

$i=1;
while ($r = mysql_fetch_array($result)){$u=textcolor($r[nombre]); echo "<tr><td><b>$i.</b> <a href=\"info.php?us=$r[nombre]\"><font color=\"$u[txtc]\">$r[titulo] $r[prefix] $r[nombre]</font></a>"; if($r[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}  echo "</td><td><b><center><small>$r[puntos]</small></center></b></td><td><div align=\"right\"><small>$r[creditos]</small></div> </td></tr>"; $i++;}
echo '</table>';








include 'footer.php';?>
