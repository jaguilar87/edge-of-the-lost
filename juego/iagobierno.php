<?php
$equi=0;
$hab=0;
   $c= "SELECT * FROM `sw_users` WHERE ciudad='$cic[nombre]'";
   $result = mysql_query($c)or die(mysql_error());
   while ($user= mysql_fetch_array($result)){$equi+=$user[lado]; $hab++;}

$equi=round($equi);	
echo "<big><b>Planeta:</b> $plc[nombre]<br></big> <small><b>Coordenadas Espaciales:</b> ($plc[x],$plc[y])<br><b>Mineral:</b> $plc[mineral] <b>u.</b>";
echo "<hr><big><b>Ciudad:</b> $cic[nombre]</big>";
echo "<br><b>Dirigida por: <a href=\"info.php?us=$u[nombre]\"><font color=\"$u[txtc]\">$u[titulo] $u[prefix] $cic[rey]</font></a><br>Ciudad de <a href=\"csede.php?clan=$cic[clan]\"><font color=\"#ffffff\">$cic[clan]</font></a><br></small><hr></b>";
echo "<b>Impuesto: $cic[impuesto]%</big></b><br>";
$apagar=($us[creditos]*$cic[impuesto])/100;
echo "<small>Precio estimado a pagar: $apagar Créditos</small><hr>";
echo "<br><br> Equilibrio de la fuerza en la ciudad: <b>$equi</b><br>Habitantes de la Ciudad: <b>$hab</b>";
if ($cic[rey]==$us[nombre]){echo '<br> <a href="igest.php">Gestionar la ciudad</a>';}
?>