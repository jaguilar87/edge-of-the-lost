<?php include_once 'header.php';

if ($us[lado]==0) {
    $ctxt='Eres completamente neutral...';
} elseif ($us[lado] < 0) {
    $ctxt="Est&aacute;s en el lado oscuro";
} elseif ($us[lado] > 0) {
    $ctxt="Est&aacute;s en el Lado de la Luz.";
} else {
    $ctxt="Error calculando lado, contacte con el programador...";
}

$lade=$us[lado]+200;
$t = $us[pk] + $us[lpk];
if ($t==0) {
    $per=0;
} else {
    $per = round(($us[pk]*100)/$t);
}

echo "<center><big><big><font color=\"$us[txtc]\"><b>$us[titulo] $us[prefix] $us[nombre]</b></font></big></big>
<table>
	   <tr>
	   	   <td>
		   	   <table>
			   		  <tr>
					  	  <td>
						  	  <table border=1>
							  		 <tr>
									 	 <td>
										 	   <span title=\"Cambiar avatar\">
											   	   		 <a href=\"ficha/avatar.php\"><img  border=0 height=100 src=\"$us[avatar_path]\"></a>
	   										   </span>
										 </td>
								     </tr>
							  </table>
						  </td>
						  <td>
						  	  <table cellspacing=\"3\" width=\"100%\">
							  		 <tr>
       								 	    <td><div align='right'><b>Raza:</b></div></td>
										    <td>$us[raza]</td>
									        <td><div align='right'><b>Clan:</b></div></td>
       										<td>$cl[nombre] <a href=\"clan/?id=salir&clan=$us[clan]\"><span title=\"Salir del Clan (Borrar si eres lider)\"><img border=0 src=\"images/x.gif\"></span></a> <a href=\"clan/?id=fundar\"><span title=\"Fundar clan\"><img border=0 src=\"images/e.jpg\"></span></a>";

                                            if ($us[cmess]=="S") {
                                                echo " <a href=\"clan/?id=board&clan=$us[clan]\"><span title=\"Mensaje nueno en el Tabl&oacute;n del Clan!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a>";
                                            }

                                      echo "</td>
									 </tr>
									 <tr>
									        <td><div align='right'><b>Nivel:</b></div></td>
       										<td><b>$us[nv]</b> ($us[puntos] / $us[next])PX</td>
									        <td><div align='right'><b>Rango:</b></div></td>
       										<td>$us[nivel] <a href=\"ayuda.php#nivel\" onMouseover=\" ddrivetip(' $nvdesc ', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a></td>
									 </tr>
									 <tr>
									        <td><div align='right'><b>M&eacute;rito:</b></div></td>
       										<td>$us[merito]</td>
									        <td><div align='right'><b>Cr&eacute;ditos:</b></div></td>
       										<td>$us[creditos]</td>
									 </tr>
									 <tr>
									        <td><div align='right'><b>Origen:</b></div></td>
       										<td>$us[origen]</td>
									        <td><div align='right'><b>Ciudad:</b></div></td>
       										<td>$ci[nombre] ($pl[nombre])</td>
									 </tr>
								</table>
					      </td>
					  </tr>
			   </table>
		   </td>
       </tr>
	   <tr>
	       <td>
			   <!--Lado--><br><a href=\"ayuda.php#lado\" onMouseover=\" ddrivetip('El lado simboliza tu equilibrio en la fuerza, puntos positivos indican Lado de la Luz y puntos negativos indican Lado Oscuro.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Alineaci&oacute;n:</span></b> $ctxt ($us[lado])
			   <br><b>PK Ganadas:</b> $us[pk]  <b>PK Perdidas:</b> $us[lpk] <b>Victorias:</b> $per %
		   </td>
	   </tr>
</table></center>
";















echo "<hr>";





#<!--Barra Vida-->
$bar1=($us[hp]/$us[maxhp])*250;
$bar2=($us[turnos]/$to)*250;
$bar3=($us[estres]/1000)*250;

echo "<center>
<table width=\"100%\">
	   <tr>
	   	   <td width=*><div align=\"right\"> <b><a href=\"ayuda.php#vida\" onMouseover=\" ddrivetip('La vida es tu vitalidad en combate. cuando tu vida llegue a 0 habr&aacute;s quedado KO', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> P. de Vida</span></b></div></td>
		   <td><img src=\"images/b1.gif\" width=\"$bar1\" height=11> <b>[$us[hp]/$us[maxhp]]</b>";
                    if ($us[hp]<=0) {
                        echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';
                    }?></td>
		   <td><a href="ciudad/?id=rhospital" onMouseover=" ddrivetip('Curarse en el Hospital', '#808080');" onMouseout="hideddrivetip()">H</a> <a href="ciudad/?id=rburdel" onMouseover=" ddrivetip('Curarse en el Burdel', '#808080');" onMouseout="hideddrivetip()">B</a></td>
	   </tr><?php

#<!--Barra energia-->
echo "  <tr>
           <td><div align=\"right\"><b><a href=\"ayuda.php#energia\" onMouseover=\" ddrivetip('La energ&iacute;a es lo que gastas para realizar acciones, cuando tu energia llegue a 0 no podr&aacute;s hacer m&aacute;s acciones. La energia se recarga automaticamente cada hora.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> Energ&iacute;a</b></td>
		   <td><img src=\"images/b2.gif\" width=\"$bar2\" height=11> <b>[$us[turnos]/$to]</b></td>
		   <td></td></tr>";


#<!--Barra Estres-->
echo "  <tr>
 	 	   <td><div align=\"right\"><b><b><a href=\"ayuda.php#estres\" onMouseover=\" ddrivetip('El estres es el da&ntilde;o mental de tu personaje, si pierde mucho, tiene poco dinero o no come bien el estress sube, si llega a 1000 el personaje morir&aacute;.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> Estr&eacute;s</b></td>
		   <td><img src=\"images/b3.gif\" width=\"$bar3\" height=11> <b>[$us[estres]/1000]</b></td>
		   <td><a href=\"ciudad/?id=cbar\" onMouseover=\" ddrivetip('Sanar estres en el Bar', '#808080');\" onMouseout=\"hideddrivetip()\">B</a></td>
		</tr>
		<tr>
		   <td><!-- Salto --></td>
		</tr>";


#<!--Barra atributos-->
echo "  <tr>
	 		<td><div align=\"right\"><a href=\"ayuda.php#vigor\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques f&iacute;sicos. Como m&aacute;s Vigor, m&aacute;s da&ntilde;inos ser&aacute;n tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b> Vigor</b></td>
			<td><img src=\"images/b1.gif\" width=$us[vigor] height=11> <b>$us[vigor]";?> </td>
			<td> <a href="entre/entreok.php?c=vig" onMouseover=" ddrivetip('Entrenar Vigor', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td>
		</tr><?php
echo "  <tr>
	 		<td><div align=\"right\"><a href=\"ayuda.php#constitucion\" onMouseover=\" ddrivetip('La Constituci&oacute;n representa la forma f&iacute;sica del jugador, mide la resistencia a los golpes f&iacute;sicos; Como m&aacute;s constituci&oacute;n menos da&ntilde;os recibir&aacute;s en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Constituci&oacute;n</b></td>
			<td><img src=\"images/b4.gif\" width=$us[constitucion] height=11> <b>$us[constitucion]";?>  </td>
			<td> <a href="entre/entreok.php?c=con" onMouseover=" ddrivetip('Entrenar Constitucion', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td>
		</tr><?php
echo "  <tr>
	 		<td><div align=\"right\"><a href=\"ayuda.php#destreza\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como m&aacute;s destreza, m&aacute;s r&aacute;pidos y precisos ser&aacute;n tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b> Destreza</b></td>
			<td><img src=\"images/b5.gif\" width=$us[destreza] height=11> <b>$us[destreza]";?> </td>
			<td> <a href="entre/entreok.php?c=des" onMouseover=" ddrivetip('Entrenar Destreza', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td>
		</tr><?php
echo "  <tr>
	 		<td><div align=\"right\"><a href=\"ayuda.php#inteligencia\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como m&aacute;s Inteligencia, m&aacute;s frecuentemente usar&aacute;s los poderes de la fuerza y m&aacute;s facil te resultar&aacute; la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Inteligencia</b></td>
			<td><img src=\"images/b6.gif\" width=$us[inteligencia] height=11><b> $us[inteligencia]";?>  </td>
			<td> <a href="entre/entreok.php?c=inte" onMouseover=" ddrivetip('Entrenar Inteligencia', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td>
		</tr><?php
echo "  <tr>
	 		<td><div align=\"right\"><a href=\"ayuda.php#poder\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como m&aacute;s Poder de la Fuerza, m&aacute;s da&ntilde;o causar&aacute;s en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a> <b>Poder de la Fuerza</b></td>
			<td><img src=\"images/b3.gif\" width=$us[poder] height=11> <b>$us[poder]";?>  </td>
			<td> <a href="entre/entreok.php?c=pod" onMouseover=" ddrivetip('Entrenar Poder de la Fuerza', '#808080');" onMouseout="hideddrivetip()"><img border=0 src="images/e.jpg"></a></b></td>
		</tr><?php
echo "
</table>
</center><hr>";

echo "<i>Log:</i> <a href=\"log.php?ver=vaciar\"><span title=\"Vaciar Log\"><img border=0 src=\"images/x.gif\"></a><br>";

$c= "SELECT * FROM sw_log WHERE user='$us[nombre]' ORDER BY id DESC";
$result=mysql_query($c)or die(mysql_error());
while ($log = mysql_fetch_array($result)) {
    echo "<a href=\"log.php?ver=ver&tipo=$log[tipo]&ref=$log[ref]\"><img border=0 src=\"images/arr.gif\"></a><b> D&iacute;a $log[dia]:</b> $log[log]  <a href=\"log.php?ver=borrar&id=$log[id]\"><span title=\"borrar\"><img border=0 src=\"images/x.gif\"></a><br>";
}

echo "</center>";


include_once 'footer.php'; ?>
