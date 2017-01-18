<?php include 'header.php';
if ($us[nv_sable]==0){
$us[creditos]-=10000;
if ($us[creditos]<0){echo 'Créditos insuficientes...';}else{


$c="UPDATE `sw_users` SET nv_sable='1', creditos='$us[creditos]' WHERE nombre='$us[nombre]'";	
$result=mysql_query($c)or die(mysql_error());

echo 'Felicidades! ya has ascendido de nivel, a partir de ahora entrarás en el juego de verdad! Suerte ;)';
}}else{echo '<script> location.href="ficha.php" </script>';}

include 'footer.php';?>
