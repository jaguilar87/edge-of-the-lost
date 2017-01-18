<?php include 'header.php';
$info=textcolor($_GET[us]);
echo "<small><table cellpading=\"10\" cellspacing=\"10\" width=425><tr><td><table><tr><td><table><tr><td><table border=1><tr><td><img  border=0 height=75 src=\"$info[avatar_path]\"></td></tr></table></td><td><b>Nombre: <font color=\"$info[txtc]\"> $info[titulo] $info[prefix] $info[nombre]</b></font>";
if($info[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}
echo "<br><b>Raza:</b> $info[raza]<br><b>Origen:</b> $info[origen]<br><b>Nivel:</b> $info[nivel]<br><b>Clan:</b> $info[clan]</td></tr></table>";
$t = $info[pk] + $info[lpk];
if ($t==0) {$per=0;}else{$per = ($us[info]*100)/$t;}

$c="SELECT * FROM sw_plan WHERE nombre='$info[planeta]'";
$result=mysql_query($c)or die(mysql_error());
$pli=mysql_fetch_array($result);

$c="SELECT * FROM sw_city WHERE nombre='$info[ciudad]' AND planeta='$info[planeta]' ";
$result=mysql_query($c)or die(mysql_error());
$cii=mysql_fetch_array($result);

$t = $info[pk] + $info[lpk];
if ($t==0) {$per=0;}else{$per = ($info[pk]*100)/$t;}

echo "<b>Puntos:</b> $info[puntos]<br><b>Mérito:</b> $info[merito]<br><b>PK Ganadas:</b> $info[pk]  <b>PK Perdidas:</b> $info[lpk] <b>Victorias:</b> $per %";
echo "</td></tr></table></td></tr></table><br>";

echo "<a href=\"fmess_send.php?to=$info[nombre]\"><img border=0 src=\"images/msg.gif\">Enviar mensaje a $info[nombre]</a><br>";
if ($info[nv_sable]==$us[nv_sable] && $us[nv_sable]>0) {echo "<a href=\"acombate.php?ob=$info[nombre]\"><img border=0 src=\"images/atk.gif\">Atacar</a><br>";}
if ($us[nv_sable]>0){echo "<br><form action=\"fenviar_creditos.php\" method=\"get\">Enviar<input name=\"cr\" type=\"text\" value=\"0\"><input name=\"to\" type=\"hidden\" value=\"$info[nombre]\">Créditos a $info[nombre] <input type=\"submit\" Value=\"Enviar\"></form><br>";}


include 'footer.php'; ?>