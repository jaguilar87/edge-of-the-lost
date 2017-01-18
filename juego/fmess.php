<?php include 'header.php';
$c="UPDATE `sw_users` SET mmess='N' WHERE nombre='$_SESSION[nombre]'";
$result=mysql_query($c)or die(mysql_error());

if ($_GET[id]==""){
echo '<table border=1 width="100%"><tr><td><center>Mostrando los últimos mensajes...</center></td></tr>';

$c="SELECT * FROM `sw_mess` WHERE emisor='$us[nombre]' OR receptor='$us[nombre]' ORDER BY id DESC LIMIT 0,10";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){$rec=textcolor($r[receptor]); $emi=textcolor($r[emisor]); echo "<tr><td><b><a href=\"fmess.php?id=$r[id]\"><font color=\"#ffff00\">N#</b>$r[id]</font></a><br><b>Emisor:</b> <a href=\"fmess_send.php?to=$r[emisor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[emisor]\"><font color=\"$emi[txtc]\">$r[emisor]</font></a><br><b>Receptor:</b> <a href=\"fmess_send.php?to=$r[receptor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[receptor]\"><font color=\"$rec[txtc]\">$r[receptor]</font></a><br><b>Día:</b> $r[fecha]<br><b>Mensaje:</b> <i>$r[mess]</i><br></td></tr>";}
echo '</table><br><a href="fmess_send.php"><img border=0 src="images/msg.gif"><small>Enviar Mensaje a otro jugador</small></a>';
echo '<br><a href="fmess.php?id=mass"><small>Ver todos los mensajes</small></a>';

}elseif($_GET[id]=="mass"){

echo '<table border=1 width="100%"><tr><td><center>Historial de Mensajes</center></td></tr>';

$c="SELECT * FROM `sw_mess` WHERE emisor='$us[nombre]' OR receptor='$us[nombre]'";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){$rec=textcolor($r[receptor]); $emi=textcolor($r[emisor]); echo "<tr><td><b><a href=\"fmess.php?id=$r[id]\"><font color=\"#ffff00\">N#</b>$r[id]</font></a><br><b>Emisor:</b> <a href=\"fmess_send.php?to=$r[emisor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[emisor]\"><font color=\"$emi[txtc]\">$r[emisor]</font></a><br><b>Receptor:</b> <a href=\"fmess_send.php?to=$r[receptor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[receptor]\"><font color=\"$rec[txtc]\">$r[receptor]</font></a><br><b>Día:</b> $r[fecha]<br><b>Mensaje:</b> <i>$r[mess]</i><br></td></tr>";}
echo '</table><br><a href="fmess_send.php"><img border=0 src="images/msg.gif"><small>Enivar Mensaje a otro jugador</small></a>';
echo '<br><a href="fmess.php"><small>Ver últimos 10 Mensajes</small></a>';

}else{

echo "<table width=\"100%\" border=1><tr><td><center>Mostrando mensaje N# $_GET[id]</center></td></tr>";
$c="SELECT * FROM `sw_mess` WHERE id='$_GET[id]'";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){

if ($r[emisor]=="$us[nombre]" || $r[receptor]=="$us[nombre]"){ $rec=textcolor($r[receptor]); $emi=textcolor($r[emisor]); echo "<tr><td><b><font color=\"#ffff00\">N#</b>$r[id]</font><br><b>Emisor:</b> <a href=\"fmess_send.php?to=$r[emisor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[emisor]\"> <font color=\"$emi[txtc]\">$r[emisor]</font></a> <br><b>Receptor:</b> <a href=\"fmess_send.php?to=$r[receptor]\"><img border=0 src=\"images/msg.gif\"></a> <a href=\"info.php?us=$r[receptor]\"><font color=\"$rec[txtc]\"> $r[receptor]</font></a><br><b>Día:</b> $r[fecha]<br><b>Mensaje:</b> <i>$r[mess]</i><br></td></tr>";}else{echo "<tr><td>Accesso Denegado al mensaje</td></tr>";}

}
echo '</table><br><a href="fmess_send.php"><img border=0 src="images/msg.gif"><small>Enivar Mensaje a otro jugador</small></a>';


}
include 'footer.php';
?>