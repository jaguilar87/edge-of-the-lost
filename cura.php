<?php include 'header.php';

if ($ci[cura]=="N"){echo 'Tu ciudad no dispone de salas de cura...';}else{
$curing =$us[maxhp] - $us[hp];

$costes = $ci[costec]*$curing;

$us[creditos] -= $costes;

if ($us[creditos]<0){echo 'Crédito insuficiente...';}else{
$difhp = $us[maxhp] -$us[hp];
$us[hp]=$us[maxhp];


$c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
$result = mysql_query($c)or die(mysql_error());
$clr = mysql_fetch_array($result);

$clr[fondos] += $costes;

$c = "UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]' WHERE nombre='$_SESSION[nombre]'";
$result = mysql_query($c);

$c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
$result = mysql_query($c);
echo '<a href="ciudad.php">Volver a la ciudad</a><hr>';

echo '<center><table><tr><td><img src="images/zr.gif"></td><td> <big><big><b><big><u>Hospital</big></u></big></b></big></big> </td><td><img src="images/zr.gif"></td></tr></table></center>';
echo "<br>Curación completada por <b>$costes crédito(s)</b><br><small>(Tu dinero fue a parar al clan $ci[clan])</small>";
echo '<hr><a href="ciudad.php">Volver a la ciudad</a>';
}}
include 'footer.php'; ?>