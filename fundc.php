<?php include 'header.php';
if ($_GET[nombre]!=""){
echo "Fundando la Ciudad ($_GET[nombre])....";
if ($us[clan]==""){echo "Necesitas estar o ingresar en un clan para fundar una ciudad";}else{
if ($us[creditos]>=500000){echo '<br>Realizando el Pagamento....'; $i++;}else{ echo '<br><font color="#ee1200">Fondos insuficientes...</font>';}
if ($us[nv_sable]>1){echo '<br>Tramitando papeleo...'; }else{echo '<br><font color="#ee1200">No tienes suficiente nivel</font>';}

$c="SELECT * FROM sw_city WHERE nombre='$_GET[nombre]' AND esx='$_GET[esx]' AND esy='$_GET[esy]'";
$result = mysql_query($c);
$un=mysql_fetch_array($result);



if ($un[nombre]==$_GET[nombre]){echo "<br>Esta ciudad ya existe";}else{$i++;}

$c="SELECT * FROM sw_plan WHERE posx='$_GET[esx]' AND posy='$_GET[esy]'";
$result = mysql_query($c);
$pla=mysql_fetch_array($result);

if ($pla[nombre]==""){echo "<br>El planeta no existe";}else{$i++;}

if ($i>=4){

$us[creditos]-=500000;

$c= "INSERT INTO sw_city (nombre, esy, esx, clan, rey) VALUES ('$_GET[nombre]', '$_GET[esy]', '$_GET[esx]', '$us[clan]', '$us[nombre]')"; 
$result= mysql_query($c)or die(mysql_error()); 
echo '<br>Tramites finalizados.';

$us[merito]+=10;

$c= "UPDATE sw_users SET merito='$us[merito]', creditos=$us[creditos] WHERE nombre='$us[nombre]'";
$res=mysql_query($c);




}}}else{echo '<script> location.href="fundar.php?ac=ciudad" </script>';}
include 'footer.php'; ?>
