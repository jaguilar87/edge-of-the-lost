<?php

echo '<center><big><big>Parlamento</big></big></center><br><table width="100%" border=1>';
$c="SELECT * FROM `sw_board_parlamento` WHERE ciudad='$ci[nombre]' ORDER BY id DESC LIMIT 0,20";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){$t=textcolor($r[poster]); echo "<tr><td><b><font color=\"#ffff00\">#</b>$r[id]</font><br><b>De</b> <font color=\"$t[txtc]\">$r[poster]</font>, <b>d�a</b> $r[dia]<br>$r[post]<br></td></tr>";}
echo "<tr><td><center>�ltimos 20 mensajes</center></td></tr></table><br>";

echo "Mensaje al Parlamento:<form method=\"post\" action=\"ciudad/?id=aparlamento_send\">
<b>Mensaje:</b><br><textarea style=\"width:450px\" name=\"me\"></textarea>
<input type=\"Submit\" name=\"enviar\" value=\"Enviar\">
</form>";


?>
