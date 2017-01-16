<?php
if ($dReal>$dFicha){
	 
	 $dif=$dReal-$dFicha;

	 $en=6+$us[nv_sable];

	 $difx=$dif*$en;

	 $us[turnos]+=$difx;

   if ($us[turnos] > $to) {$us[turnos] = $to;}
   
  
   $c = "UPDATE sw_users SET  puntos='$us[puntos]', hora='$ach', dia='$fe[val]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
   $result=mysql_query($c)or die(mysql_error());

   
   echo "<small><small>Te sientes lleno de energ�a!</small></small>";
}
?>
