<?php include 'header.php';
if ($us[nivel]=="Usuario de la Fuerza"){echo 'A tu nivel aun no puedes atacar...';}else{
if ($_GET[ob]==""){echo 'Para atacar debes elegir un oponente de tu ciudad:<br>';
echo '<table width="100%" cellpading="5" cellspacing="5" ><tr bgcolor="#4f4f4f"><td><b>';
echo "Nombre</b></td><td><b><center><small>Puntos</small></center></b></td><td><b><div align=\"right\"><small>Créditos</small></div></b></td><td><small><b>Clan</b></small></td></tr>";
$c="SELECT * FROM `sw_users` WHERE play='$us[play]' AND hp>'0' AND plax='$us[plax]' AND ciudad='$ci[nombre]' AND nv_sable='$us[nv_sable]' ORDER BY puntos DESC";
$result=mysql_query($c)or die(mysql_error());
$i=1;
while ($r = mysql_fetch_array($result)){$u=textcolor($r[nombre]); echo "<tr><td><a href=\"ataque.php?ob=$r[nombre]\"><img border=0 src=\"images/atk.gif\"></a><b>$i.</b> <a href=\"info.php?us=$r[nombre]\"> <font color=\"$u[txtc]\"><small>$r[titulo] $r[nombre]</small></font></a></td><td><b><center><small>$r[puntos]</small></center></b></td><td><div align=\"right\"><small>$r[creditos]</small></div></td><td>$r[clan]</td></tr>"; $i++;}
echo '</table>';

}else{
$log="";

$ob=textcolor($_GET[ob]);
if ($ob[nombre]==$us[nombre]){Echo 'No puedes atacarte a ti mismo';}else{
if ($ob[nombre]==""){echo 'Ese jugador no existe';}else{
if ($us[turnos]<5){echo 'Energía insuficiente....';}else{
if ($ob[play]!=$us[play] || $ob[plax]!=$us[plax] || $ob[ciudad]!=$us[ciudad] || $us[nv_sable]!=$ob[nv_sable]){
echo 'No puedes atacarle, no está en tu ciudad o no es de tu nivel';}else{
if ($ob[hp]<=0){echo "$ob[nombre] ya está muerto, dejalo en paz";}else{
if ($ob[clan]==$us[clan] && $us[clan]!=NULL){echo "No puedes atacar a personas de tu clan";}else{

   $c="SELECT * FROM `sw_diplomacia` WHERE origen='$us[clan]' AND destino='$ob[clan]'";
   $result=mysql_query($c)or die(mysql_error());
   $r = mysql_fetch_array($result);
if ($r[estado]=="Aliado"){echo "El objetivo pertenece a un clan aliado, no lo puedes atacar...";}else{
   
include 'atk.php';


}}}}}}}}}
include 'footer.php'?>