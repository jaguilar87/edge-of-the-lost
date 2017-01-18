<?php include_once 'header.php';

$cli = sel("sw_clan", "nombre", $us[clan]);

echo '<center><big><big>Sala de Reuniones</big></big></center><br><table width="100%" border=1><caption align="top">Tablón de anuncios</caption>';

mysql_query("UPDATE `sw_users` SET cmess='N' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());

if ($_GET[all]){
   $c="SELECT * FROM `sw_board_clan` WHERE clan='$cli[nombre]' ORDER BY id DESC";
}else{
   $c="SELECT * FROM `sw_board_clan` WHERE clan='$cli[nombre]' ORDER BY id DESC LIMIT 0,20";
}

$result=mysql_query($c)or die(mysql_error());
while (	$r = mysql_fetch_array($result))
{
	  $t=textcolor($r[poster]); 
	  echo "<tr><td><b><font color=\"#ffff00\">#</b>$r[id]</font><br><b>De</b> <font color=\"$t[txtc]\">$r[poster]</font>, <b>día</b> $r[dia]<br>$r[mess]<br></td></tr>";
}

echo "<tr><td><center>Últimos 20 mensajes</center></td></tr></table><br>";
echo "Envía un mensaje al clan:<form method=\"post\" action=\"clan/board_send.php\">
<b>Mensaje:</b><br><textarea style=\"width:450px\" name=\"me\"></textarea>
<input type=\"Submit\" name=\"enviar\" value=\"send\">
</form>";

echo '<br><br><a href="clan/?id=board&all=true">Ver Todos los mensajes antiguos</a>';









include_once 'footer.php';?>
