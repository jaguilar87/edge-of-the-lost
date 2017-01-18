<?php include 'header.php';
if ($us[lado]==0) {$ctxt='Eres completamente neutral...';}
elseif ($us[lado] < 0) {$ctxt="Estás en el lado oscuro";}
elseif ($us[lado] > 0) {$ctxt="Estás en el Lado de la Luz.";}
else {$ctxt="Error calculando lado, contacte con el programador...";}
echo "<small><table cellpading=\"10\" cellspacing=\"10\" width=425><tr><td><table><tr><td><table><tr><td><table border=1><tr><td><span title=\"Cambiar avatar\"><a href=\"avatar.php\"><img  border=0 height=75 src=\"$us[avatar_path]\"></a></span></td></tr></table></td><td><b>Nombre: <small><font color=\"$us[txtc]\"> $us[titulo] $us[prefix] $us[nombre]</b></font>";
if($us[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}
echo "</small><br><b>Raza:</b> $us[raza]<br><b>Lugar Origen:</b> $us[origen]<br><b>Nivel:</b> $us[nivel] <a href=\"ayuda.php#nivel\" onMouseover=\" ddrivetip(' $nvdesc ', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><br><b>Clan: </b> $cl[nombre] <a href=\"clanact.php?act=salir&clan=$us[clan]\"><span title=\"Salir del Clan (Borrar si eres lider)\"><img border=0 src=\"images/x.gif\"></span></a> <a href=\"clanact.php?act=fundar\"><span title=\"Fundar clan\"><img border=0 src=\"images/e.jpg\"></span></a>";
if($us[cmess]=="S"){echo " <a href=\"clan.php?clan=$us[clan]\"><span title=\"Mensaje nueno en el Tablón del Clan!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a>";}
echo "</td></tr></table>";
echo "<b>Ciudad:</b> $ci[nombre] ($pl[nombre])<br><b><a href=\"ayuda.php#vida\" onMouseover=\" ddrivetip('La vida es tu vitalidad en combate. cuando tu vida llegue a 0 habrás quedado KO', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Puntos de Vida:</span></b>$us[hp]/$us[maxhp]<br><b><a href=\"ayuda.php#energia\" onMouseover=\" ddrivetip('La energía es lo que gastas para realizar acciones, cuando tu energia llegue a 0 no podrás hacer más acciones. La energia se recarga automaticamente cada hora.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Energía:</b> $us[turnos]/$to<br><a href=\"ayuda.php#lado\" onMouseover=\" ddrivetip('El lado simboliza tu equilibrio en la fuerza, puntos positivos indican Lado de la Luz y puntos negativos indican Lado Oscuro.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Alineación:</span></b> $ctxt ($us[lado])<br><table><tr><td VALIGN=\"TOP\"><table><tr><td><b>Atributo</b></td><td><b>Total</b></td></tr>";
echo "<tr><td><b><a href=\"ayuda.php#vigor\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques físicos. Como más Vigor, más dañinos serán tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Vigor</b></td><td><center>$us[vigor]</center></td></tr><tr><td><a href=\"ayuda.php#constitucion\" onMouseover=\" ddrivetip('La Constitución representa la forma física del jugador, mide la resistencia a los golpes físicos; Como más constitución menos daños recibirás en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Constitución</b></td><td><center>$us[constitucion]</center></td></tr><tr><td><a href=\"ayuda.php#destreza\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como más destreza, más rápidos y precisos serán tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Destreza</b></td><td><center>$us[destreza]</center></td></tr><tr><td><a href=\"ayuda.php#inteligencia\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como más Inteligencia, más frecuentemente usarás los poderes de la fuerza y más facil te resultará la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Inteligencia</b></td><td><center>$us[inteligencia]</center></td></tr><tr><td><a href=\"ayuda.php#poder\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como más Poder de la Fuerza, más daño causarás en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Poder de la Fuerza</b></td><td><center>$us[poder]</center></td></tr></table></td><td Valign=\"TOP\">";
$t = $us[pk] + $us[lpk];
if ($t==0) {$per=0;}else{$per = ($us[pk]*100)/$t;}
echo "</td></tr></table><br><b>Puntos:</b> $us[puntos]<br><b>Mérito:</b> $us[merito]";
echo "<br><b>Creditos:</b> $us[creditos] <br><br><b>PK Ganadas:</b> $us[pk]  <b>PK Perdidas:</b> $us[lpk] <b>Victorias:</b> $per %";
echo "</td></tr></table><hr>";
echo "<i><i>Log:</i></i> <a href=\"log.php?ver=vaciar\"><span title=\"Vaciar Log\"><img border=0 src=\"images/x.gif\"></a><br>";

$c= "SELECT * FROM sw_log WHERE user='$us[nombre]' ORDER BY id DESC";
$result=mysql_query($c)or die(mysql_error());
while ($log = mysql_fetch_array($result)){
	  echo "<a href=\"log.php?ver=ver&tipo=$log[tipo]&ref=$log[ref]\"><img border=0 src=\"images/arr.gif\"></a><b> Día $log[dia]:</b> $log[log]  <a href=\"log.php?ver=borrar&id=$log[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a><br>";
}

echo "</td></tr></table>";


include 'footer.php'; ?>