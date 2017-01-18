<?php include 'header.php';
if ($ci[mina]=="S"){

   $c="SELECT * FROM sw_clan WHERE nombre='$ci[clan]'";
   $result=mysql_query($c)or die(mysql_error());
   $cli=mysql_fetch_array($result);

if ($ok){

$coste = $cli[pagomina]*$_POST[turnos];

if ($coste>$cli[fondos]){echo 'El clan no puede pagarte esa cantidad';}else{
$us[turnos]-=$_POST[turnos];
if ($us[turnos]<0){echo 'Energía insuficiente';}else{

$us[creditos]+=$coste;
$cli[fondos]-=$coste;
$cli[mineral]+=$_POST[turnos];
$lad=$_POST[turnos]/10;
$us[lado]+=$lad;
$us[puntos]+=$_POST[turnos]/10;

	  $c="UPDATE `sw_clan` SET fondos='$cli[fondos]', mineral='$cli[mineral]' WHERE nombre='$cli[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());

	  $c="UPDATE `sw_users` SET puntos='$us[puntos]', lado='$us[lado]', creditos='$us[creditos]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
	  
	  echo 'Trabajo completo..';
	  echo "<br><small><font color=\"#caffff\">Has caminado $lad puntos al lado de la Luz.</font></small>";
}}
}else{

echo "<small>El clan $cli[nombre] te pagará $cli[pagomina] por cada punto de Energía que estés trabajando.<br>El clan ganará una unidad de mineral por cada turno que trabajes para ellos</small>";
echo "<small><br>Recuerda que trabajar en la mina aumenta tus puntos hacia el lado de la Luz</small>";
echo '<form action="mina.php" method="POST">Gastar <input name="turnos" type="input" value="1">Energía en la mina. <input name="ok" value="Trabajar" type="submit"></form>';





}}else{echo 'La ciudad no dispone de minas';}
include 'footer.php';?>
