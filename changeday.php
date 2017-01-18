<?php

$dif=$date-$datex;

$en=5+$us[nv_sable];


$difx=$dif*$en;

$us[turnos] +=$difx;

   if ($us[turnos] > $to) {$us[turnos] = $to;}
   



if ($us[hp]<=0){$us[puntos]-=$dif;}



   
   $c = "UPDATE sw_users SET  puntos='$us[puntos]', hora='$ach', dia='$fe[dia]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
   $result=mysql_query($c)or die(mysql_error());


   
   echo "<small><small>Te sientes lleno de energía!</small></small>";

?>
