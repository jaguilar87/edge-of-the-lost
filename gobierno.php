<?php include 'header.php';

if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}

$c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
$result2=mysql_query($c)or die(mysql_error());
$cic=mysql_fetch_array($result2);

$c="SELECT * FROM sw_plan WHERE posx='$cic[esx]' AND posy='$cic[esy]'";
$result=mysql_query($c)or die(mysql_error());
$plc=mysql_fetch_array($result);

if ($cic[nombre]==Null){echo 'La ciudad donde te encontrabas ha sido arrasada...';}else{
$u=textcolor($cic[rey]);
echo '<a href="ciudad.php">Volver a la ciudad</a><hr>';

echo '<center><table><tr><td><img src="images/zg.gif"></td><td> <big><big><b><big><u>Ayuntamiento</big></u></big></b></big></big> </td><td><img src="images/zg.gif"></td></tr></table></center>';
echo '<br>';

echo "<center><b>Ciudad:</b> $cic[nombre]</big>";
echo "<br><b>Dirigida por:</b> <a href=\"info.php?us=$u[nombre]\"><font color=\"$u[txtc]\">$u[titulo] $u[prefix] $cic[rey]</font></a><br>";
echo "<b>Miembro  de:</b><a href=\"clan.php?clan=$cic[clan]\"><font color=\"#ffffff\"> $cic[clan]</font></a><br><br></b></center>";


echo "<center><b><big>Impuesto: $cic[impuesto]%</big></b><br></center>";

$apagar=($us[creditos]*$cic[impuesto])/100;
echo "<center><small>Precio estimado a pagar: $apagar Créditos</small></center>";

if ($us[nombre]==$cic[rey]){echo '<br><a href="gestciudad.php"><small>Despacho del Rey</small></a><br>';}

echo "<br>";
echo '<hr><a href="ciudad.php">Volver a la ciudad</a>';
}
include 'footer.php';?>
