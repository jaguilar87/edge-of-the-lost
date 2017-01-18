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
echo "<big><b>Planeta:</b> $plc[nombre]<br></big> <small><b>Coordenadas Espaciales:</b> ($plc[posx],$plc[posy])";
echo "<hr><big><b>Ciudad:</b> $cic[nombre]</big>";
echo "<br><b>Dirigida por: <a href=\"info.php?us=$u[nombre]\"><font color=\"$u[txtc]\">$u[titulo] $u[prefix] $cic[rey]</font></a><br>Ciudad de <a href=\"clan.php?clan=$cic[clan]\"><font color=\"#ffffff\">$cic[clan]</font></a><br></small><hr></b>";
echo "<small>Seleccione una zona:</small>";

echo '<br><center><table><tr><td>';
echo "<center><a href=\"distrito.php?zona=gobierno&ciudad=$cic[nombre]\"><img src=\"images/zg.gif\" border=0><br><b>Gobierno</b></a><br></center>
<br>
<a href=\"distrito.php?zona=residencial&ciudad=$cic[nombre]\"><img src=\"images/zr.gif\" border=0> Distrito Residencial</a><br>
<a href=\"distrito.php?zona=comercial&ciudad=$cic[nombre]\"><img src=\"images/zc.gif\" border=0> Distrito Comercial</a><br>
<a href=\"distrito.php?zona=industrial&ciudad=$cic[nombre]\"><img src=\"images/zi.gif\" border=0> Distrito Industrial</a><br>
<a href=\"distrito.php?zona=puerto&ciudad=$cic[nombre]\"><img src=\"images/za.gif\" border=0> Puerto Espacial</a><br>";

echo '</td></tr></table></center><br><hr><br>';


if ($cic[nombre]!=$ci[nombre]){echo "<br><a href=\"viajok.php?ci=$cic[nombre]&pl=$plc[nombre]\">Viajar a la ciudad</a>";}
if ($cic[nombre]==$ci[nombre] && $cl[lider]==$us[nombre] && $cic[clan]!=$us[clan] && $cic[atacada]=="N"){echo "<br><a href=\"ataquec.php?to=$cic[nombre]\"><img border=0 src=\"images/atk.gif\"> Atacar la ciudad con todo el clan!</a>";}
if ($cic[atacada]=="S"){echo '<br><font color="#29fd49">La ciudad Dispone de protección.</font>';}

$c="SELECT * FROM sw_users WHERE ciudad='$cic[nombre]'";
$result3=mysql_query($c)or die(mysql_error());
while ($m=mysql_fetch_array($result3)){
$q=textcolor($m[nombre]);
echo "- <a href=\"info.php?us=$m[nombre]\"><font color=\"$q[txtc]\">$m[titulo] $m[prefix] $m[nombre]</font>";
if($q[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}
echo "</a> $m[nivel] (<a href=\"clan.php?clan=$m[clan]\">$m[clan]</a>)<br>";
}



}
include 'footer.php';?>
