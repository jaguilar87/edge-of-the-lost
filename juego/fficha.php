<?php include 'header.php';

if ($us[lado]==0) {
   $ctxt='Eres completamente neutral...';
}elseif ($us[lado] < 0) {
   $ctxt="Estás en el lado oscuro";
}elseif ($us[lado] > 0) {
   $ctxt="Estás en el Lado de la Luz.";
}else {
   $ctxt="Error calculando lado, contacte con el programador...";
}

echo "<small><table cellpading=\"10\" cellspacing=\"10\" width=425><tr><td><table><tr><td><table><tr><td><table border=1><tr><td><span title=\"Cambiar avatar\"><a href=\"avatar.php\"><img  border=0 height=75 src=\"$us[avatar_path]\"></a>
</span></td></tr></table></td><td><b>Nombre: <small><font color=\"$us[txtc]\"> $us[titulo] $us[prefix] $us[nombre]</b></font>";

echo "</small><br><b>Raza:</b> $us[raza]<br><b>Lugar Origen:</b> $us[origen]<br><b>Nivel:</b> $us[nivel] <a href=\"ayuda.php#nivel\" onMouseover=\" ddrivetip(' $nvdesc ', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>
<br><b>Clan: </b> $cl[nombre] <a href=\"clanact.php?act=salir&clan=$us[clan]\"><span title=\"Salir del Clan (Borrar si eres lider)\"><img border=0 src=\"images/x.gif\"></span></a> <a href=\"clanact.php?act=fundar\"><span title=\"Fundar clan\"><img border=0 src=\"images/e.jpg\"></span></a>";

if($us[cmess]=="S"){echo " <a href=\"cboard.php?clan=$us[clan]\"><span title=\"Mensaje nueno en el Tablón del Clan!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a>";}

echo "</td></tr></table>";
echo "<b>Ciudad:</b> $ci[nombre] ($pl[nombre])<br><br>";


#<!--Barra Vida-->
$bar1=($us[hp]/$us[maxhp])*150;
$bar2=($us[turnos]/$to)*150;
$bar3=($us[estres]/1000)*150;
echo "<table width=\"100%\"><tr><td width=*><div align=\"right\"> <b><a href=\"ayuda.php#vida\" onMouseover=\" ddrivetip('La vida es tu vitalidad en combate. cuando tu vida llegue a 0 habrás quedado KO', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>P. de Vida:</span></b>
<b>[$us[hp]/$us[maxhp]]</b></div></td><td width=150><img src=\"images/b1.gif\" width=\"$bar1\" height=11>";
if($us[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}
?></td><td><a href="idistritos.php?def=irhospital.php" onMouseover=" ddrivetip('Curarse en el Hospital', '#808080');" onMouseout="hideddrivetip()">H</a> <a href="idistritos.php?def=irburdel.php" onMouseover=" ddrivetip('Curarse en el Burdel', '#808080');" onMouseout="hideddrivetip()">B</a> <a href="entok.php?c=maxhp" onMouseover=" ddrivetip('Entrenar Vida Maxima', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></td></tr><?

#<!--Barra energia-->
echo "<tr><td><div align=\"right\"><b><a href=\"ayuda.php#energia\" onMouseover=\" ddrivetip('La energía es lo que gastas para realizar acciones, cuando tu energia llegue a 0 no podrás hacer más acciones. La energia se recarga automaticamente cada hora.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Energía:</b>
<b>[$us[turnos]/$to]</b></td><td><img src=\"images/b2.gif\" width=\"$bar2\" height=11></td><td>";
?><a href="entok.php?c=extrae" onMouseover=" ddrivetip('Entrenar Energía Máxima', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></td></tr><?

#<!--Barra Estres-->
echo "<tr><td><div align=\"right\"><b><b><a href=\"ayuda.php#estres\" onMouseover=\" ddrivetip('El estres es el daño mental de tu personaje, si pierde mucho, tiene poco dinero o no come bien el estress sube, si llega a 1000 el personaje morirá.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Estrés:</b>
<b>[$us[estres]/1000]</b></td><td><img src=\"images/b3.gif\" width=\"$bar3\" height=11></td><td><a href=\"idistritos.php?def=icbar.php\" onMouseover=\" ddrivetip('Sanar estrés en el Bar', '#808080');\" onMouseout=\"hideddrivetip()\">B</a></td></tr></table>";

echo "<br><a href=\"ayuda.php#lado\" onMouseover=\" ddrivetip('El lado simboliza tu equilibrio en la fuerza, puntos positivos indican Lado de la Luz y puntos negativos indican Lado Oscuro.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Alineación:</span></b> $ctxt ($us[lado])<br>";

#<!--Barra atributos-->
echo "<br><b>Atributos:</b><table>";
echo "<tr><td><div align=\"right\"><a href=\"ayuda.php#vigor\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques físicos. Como más Vigor, más dañinos serán tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vigor</b></td><td><img src=\"images/b1.gif\" width=$us[vigor] height=11> <b>$us[vigor]";?> <a href="entok.php?c=vigor" onMouseover=" ddrivetip('Entrenar Vigor', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td></tr><?
echo "<tr><td><div align=\"right\"><a href=\"ayuda.php#constitucion\" onMouseover=\" ddrivetip('La Constitución representa la forma física del jugador, mide la resistencia a los golpes físicos; Como más constitución menos daños recibirás en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Constitución</b></td><td><img src=\"images/b4.gif\" width=$us[constitucion] height=11> <b>$us[constitucion]";?> <a href="entok.php?c=constitucion" onMouseover=" ddrivetip('Entrenar Constitucion', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td></tr><?
echo "<tr><td><div align=\"right\"><a href=\"ayuda.php#destreza\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como más destreza, más rápidos y precisos serán tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Destreza</b></td><td><img src=\"images/b5.gif\" width=$us[destreza] height=11> <b>$us[destreza]";?> <a href="entok.php?c=destreza" onMouseover=" ddrivetip('Entrenar Destreza', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td></tr><?
echo "<tr><td><div align=\"right\"><a href=\"ayuda.php#inteligencia\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como más Inteligencia, más frecuentemente usarás los poderes de la fuerza y más facil te resultará la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Inteligencia</b></td><td><img src=\"images/b6.gif\" width=$us[inteligencia] height=11><b> $us[inteligencia]";?> <a href="entok.php?c=inteligencia" onMouseover=" ddrivetip('Entrenar Inteligencia', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td></tr><?
echo "<tr><td><div align=\"right\"><a href=\"ayuda.php#poder\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como más Poder de la Fuerza, más daño causarás en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Poder de la Fuerza</b></td><td><img src=\"images/b3.gif\" width=$us[poder] height=11> <b>$us[poder]";?> <a href="entok.php?c=poder" onMouseover=" ddrivetip('Entrenar Poder de la Fuerza', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td></tr><?
echo "</table></center>";


$t = $us[pk] + $us[lpk];
if ($t==0) {$per=0;}else{$per = round(($us[pk]*100)/$t);}


echo "<br><b>Puntos:</b> $us[puntos]<br><b>Mérito:</b> $us[merito]";
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