<?php

#<!--GANADOR / VENCEDOR / GANANCIAS-->
$log.= '</small>';

if($ob[hp]<=0){
			  $ganador=$us[nombre]; 
}else{
	  		  $ganador=$ob[nombre]; 
}

$ganancias= "En un duelo no se gana ni se pierde nada";

 $sql = "INSERT INTO `sw_att` (dia, atacante, defensor, combate, ganador, ganancias) VALUES ('$fe[dia]', '$us[nombre]', '$ob[nombre]', '$log', '$ganador', '$ganancias')";
 $result = mysql_query($sql);   
   
 $sql = "SELECT id FROM `sw_att` ORDER BY id DESC limit 0,1";
 $result = mysql_query($sql);
 $ider = mysql_fetch_array($result);
   
$c = "UPDATE `sw_users` SET hp='$realus' WHERE nombre='$us[nombre]'";
$result = mysql_query($c);

$c = "UPDATE `sw_users` SET hp='$realob' WHERE nombre='$ob[nombre]'";
$result = mysql_query($c);

 $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$ob[nombre]', '$us[nombre] te ha retado en duelo!.', '$fe[dia]', '5', '$ider[id]')";
 $result = mysql_query($sql);
 



 	  echo '<table width="100%"><tr><td>';
	  echo $log;
	  echo "<br><center><big><big><font color=\"#f1f95b\"><br><br>Ganador: $ganador!</font></big></big></center><br><br><b>Ganancias:</b> $ganancias</td></tr></table>";

   
   

?>