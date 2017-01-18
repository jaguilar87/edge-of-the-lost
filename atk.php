<?php
mt_srand ((double) microtime() * 1000000);

$log.="<big><big><center><font color=\"$us[txtc]\"> $us[titulo] $us[prefix] $us[nombre]</b></font> <br>Vs<br> <font color=\"$ob[txtc]\"> $ob[titulo] $ob[prefix] $ob[nombre]</b></font></center></big></big><br><br><small>";


$m=0;

while ($us[hp]>0 || $ob[hp]>0){

$ob=textcolor($_GET[ob]);
$us=textcolor($_SESSION[nombre]);
$us[nom]="<small><font color=\"$us[txtc]\"><b>$us[nombre]</b></font></small>";
$ob[nom]="<small><font color=\"$ob[txtc]\"><b>$ob[nombre]</b></font></small>";

#<!--TURNO DEL USUARIO-->



$punteria = mt_rand(-10,20)+$us[destreza];
$esquive =  mt_rand(-10,20)+$ob[destreza];

$dano=  (mt_rand(-10,20)+$us[vigor]) - (mt_rand(-10,25)+$ob[constitucion]);
if ($dano<=0){$dano=1;}

if ($punteria > $esquive){ $ob[hp]-=$dano; $log.="<br>$us[nom]</b> ataca a $ob[nom]</b> y daña <var>$dano PV($ob[hp])</var>!";}

if ($us[hp]<=0 || $ob[hp]<=0){break;}

$luk=mt_rand(0,100);
$dano=($us[poder]+mt_rand(-20,30))-($ob[poder]+mt_rand(-20,30));
if ($dano<=0){$dano=1;}
if ($us[inteligencia]>=$luk){ $ob[hp]-=$dano;$log.="<br>$us[nom]</b> realiza un <b>Ataque de la fuerza</b> y daña <var>$dano PV($ob[hp])</var>!";}

if ($us[hp]<=0 || $ob[hp]<=0){break;}

#<!--TURNO DEL ENEMIGO-->


$punteria = mt_rand(-10,20)+$ob[destreza];
$esquive =  mt_rand(-10,20)+$us[destreza];

$dano=  (mt_rand(-10,20)+$ob[vigor]) - (mt_rand(-10,25)+$us[constitucion]);
if ($dano<=0){$dano=1;}

if ($punteria > $esquive){$us[hp]-=$dano; $log.="<br>$ob[nom]</b> ataca a $us[nom]</b> y daña <var>$dano PV($us[hp])</var>!"; }

if ($us[hp]<=0 || $ob[hp]<=0){break;}

$luk=mt_rand(0,100);
$dano=($ob[poder]+mt_rand(-20,30))-($us[poder]+mt_rand(-20,30));
if ($dano<=0){$dano=1;}
if ($ob[inteligencia]>=$luk){$us[hp]-=$dano;$log.="<br>$ob[nom]</b> realiza un <b>Ataque de la fuerza</b> y daña <var>$dano PV($us[hp])!</var>";}

if ($us[hp]<=0 || $ob[hp]<=0){break;}


#--------------------- <!--CALCULOS DE FIN DE RONDA-->------------------------#

$c = "UPDATE `sw_users` SET hp='$us[hp]' WHERE nombre='$us[nombre]'";
$result = mysql_query($c)or die(mysql_error());

$c = "UPDATE `sw_users` SET hp='$ob[hp]' WHERE nombre='$ob[nombre]'";
$result = mysql_query($c)or die(mysql_error());

}

#--------------------- <!--FIN DEL COMBATE-->------------------------#

#<!--GANADOR / VENCEDOR / GANANCIAS-->
$log.= '</small>';
if($ob[hp]<=0){
			  $ganador=$us[nombre]; 
			  $robado= rand($ob[creditos]/100,$ob[creditos]/2);
			  $ob[creditos]-=$robado;
			  $us[creditos]+=$robado;
			  $us[merito]+=15;
			  $ob[merito]-=5;
			  $us[pk]+=1;
			  $ob[lpk]+=1;
			  $puntos=($ob[puntos]-$us[puntos])/2;
			  if ($puntos>0) {$us[puntos]+=$puntos; $ob[puntos]-=5;}else{$puntos=0;}

}else{


	  		  $ganador=$ob[nombre]; 
			  $robado= rand($us[creditos]/100,$us[creditos]/2);
  			  $ob[creditos]+=$robado;
			  $us[creditos]-=$robado;
			  $ob[merito]+=15;
			  $us[merito]-=5;
		  	  $ob[pk]+=1;
			  $us[lpk]+=1;
			  $puntos=($us[puntos]-$ob[puntos] && $us[clan]!="" && $ob[clan]!="")/2;
			  if ($puntos>0) {$ob[puntos]+=$puntos; $us[puntos]-=5;}else{$puntos=0;}
			  $ob[hp]=$ob[maxhp];

}

$ganancias= "Robados $robado Créditos<br>Obtenidos $puntos Puntos!";
$ganancias.="<br>Obtenidos 15 Puntos de Merito!";

$us[turnos]-=5;
 
$c = "UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]', merito='$us[merito]', pk='$us[pk]', lpk='$us[lpk]', puntos='$us[puntos]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
$result = mysql_query($c);

$c = "UPDATE `sw_users` SET hp='$ob[hp]', creditos='$ob[creditos]', merito='$ob[merito]', pk='$ob[pk]', lpk='$ob[lpk]', puntos='$ob[puntos]' WHERE nombre='$ob[nombre]'";
$result = mysql_query($c);

$sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[dia]', '$us[nombre]', '$ob[nombre]', '$log', '$ganador', '$ganancias')";
$result = mysql_query($sql);

$sql = "SELECT id FROM sw_att ORDER BY id DESC limit 0,1";
$result = mysql_query($sql);
$ider = mysql_fetch_array($result);
   
$sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$ob[nombre]', '$us[nombre] te ha ATACADO!.', '$fe[dia]', '5', '$ider[id]')";
$result = mysql_query($sql);

echo "<script> location.href='ataques.php?at=$ider[id]' </script>";

?>