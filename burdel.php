<?php include 'header.php';
if ($ci[burdel]=="N"){echo 'Tu ciudad no dispone de burdeles';}else{
$curing =$us[maxhp] - $us[hp];

$tur=$curing/$us[poder];

$us[creditos] -= $curing;
$us[turnos] -= $tur;
$us[lado]-=$tur;

if ($us[creditos]<0 && $us[turnos] <0){echo 'Créditos/Energía insuficientes...';}else{
$us[hp]=$us[maxhp];

$c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
$result = mysql_query($c)or die(mysql_error());
$clr = mysql_fetch_array($result);

$clr[fondos] += $curing;

$c = "UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]', turnos='$us[turnos]', lado='$us[lado]' WHERE nombre='$_SESSION[nombre]'";
$result = mysql_query($c);

$c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
$result = mysql_query($c);

echo "Curación completada por <b>$curing crédito(s) y $tur Turno(s)</b><br><small>(Tu dinero fue a parar al clan $ci[clan])<br><font color=\"#ff8080\">Has caminado $tur puntos al lado Oscuro.</font></small>";

}}
include 'footer.php';?>
