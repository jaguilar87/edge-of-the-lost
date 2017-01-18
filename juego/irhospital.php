<?php 

if ($ci[cura]=="N"){echo 'Tu ciudad no dispone de hospitales...';}else{
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

echo "<br>Curación completada por <b>$costes crédito(s)</b><br><small>(Tu dinero fue a parar al clan $ci[clan])</small>";

}}
?>