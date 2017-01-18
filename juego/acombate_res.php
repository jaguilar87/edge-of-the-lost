<?php

#<!--GANADOR / VENCEDOR / GANANCIAS-->
$log.= '</small>';

$us[turnos]-=5;

if($ob[hp]<=0){
			  $ganador=$us[nombre]; 
			  $robado= rand($ob[creditos]/100,$ob[creditos]/2);
			  if ($robado<0){$robado=0;}
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
			  if ($robado<0){$robado=0;}
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

$ganancias= "$ganador roba $robado Créditos<br>$ganador obteniene $puntos Puntos!";
$ganancias.="<br>$ganador obteniene 15 Puntos de Merito!";



   $randompow= (250-$us[poder])*1000;
   $per=mt_rand(100,$randompow);
   $luk1=mt_rand(0,100)+$us[poder];
   $luk2=mt_rand(0,100)+$ci[leypre];
   if ($ci[pk]=="N" && $luk1 < $luk2){
   	  $ganancias.="<br><br>La ley de $ci[nombre] os coge luchando y obliga a $us[nombre] a pagar una multa de <b>$per Créditos</b>!";
   	  	  if ($us[creditos]<$per){$per=$us[creditos]; $us[creditos]=0;}else{$us[creditos]-=$per;}
		  

					 $c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
					 $result = mysql_query($c)or die(mysql_error());
					 $clr = mysql_fetch_array($result);	  
	  
	  				 $clr[fondos] += $per;
					 
					 $c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
					 $result = mysql_query($c);
   }
   
 $sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[dia]', '$us[nombre]', '$ob[nombre]', '$log', '$ganador', '$ganancias')";
 $result = mysql_query($sql);   
   
 $sql = "SELECT id FROM `sw_att` ORDER BY id DESC limit 0,1";
 $result = mysql_query($sql);
 $ider = mysql_fetch_array($result);
   
$c = "UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]', merito='$us[merito]', pk='$us[pk]', lpk='$us[lpk]', puntos='$us[puntos]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
$result = mysql_query($c);

$c = "UPDATE `sw_users` SET hp='$ob[hp]', creditos='$ob[creditos]', merito='$ob[merito]', pk='$ob[pk]', lpk='$ob[lpk]', attmess='S', puntos='$ob[puntos]' WHERE nombre='$ob[nombre]'";
$result = mysql_query($c);

 $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$ob[nombre]', '$us[nombre] te ha ATACADO!.', '$fe[dia]', '5', '$ider[id]')";
 $result = mysql_query($sql);
 



 	  echo '<table width="100%"><tr><td>';
	  echo $log;
	  echo "<br><center><big><big><font color=\"#f1f95b\"><br><br>Ganador: $ganador!</font></big></big></center><br><br><b>Ganancias:</b> $ganancias</td></tr></table>";

   
   

?>