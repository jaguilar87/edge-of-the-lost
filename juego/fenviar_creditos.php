<?php include 'header.php';
if ($us[nv_sable]>0){
if ($_GET[cr]<=0){echo "Valor NO Válido";}else{
if ($us[creditos] < $_GET[cr]){Echo "Créditos insuficientes";}else{
$us[creditos] -= $_GET[cr];
$cre=($_GET[cr]/10);
$_GET[cr]-=$cre;
echo "Enviados $_GET[cr] Créditos a $_GET[to]! (10% de Impuesto)";
$usto=textcolor($_GET[to]);
$usto[creditos] += $_GET[cr];
$c="UPDATE `sw_users` SET creditos='$usto[creditos]' WHERE nombre='$_GET[to]'";
$result=mysql_query($c)or die(mysql_error());
$c="UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'";
$result=mysql_query($c)or die(mysql_error());
$sql = "INSERT INTO `sw_log` (user, log, dia, ref, tipo) VALUES ('$usto[nombre]', '$us[nombre] te ha enviado $_GET[cr] Créditos.', '$us[dia]', '$us[nombre]', '3')";
$result = mysql_query($sql);

mysql_query("INSERT INTO sw_control_transferencias (dia, origen, destino, cantidad) VALUES ($fe[dia], 'Jugador $us[nombre]', 'Jugador $_GET[to]', '$_GET[cr]')")or die(mysql_error());


}}}else{echo 'No tienes suficiente nivel para enviar dinero.';}









include 'footer.php';?>
