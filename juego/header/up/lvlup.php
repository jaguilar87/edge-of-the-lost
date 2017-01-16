<?php
if ($us[puntos]>$us[next]){
    $us[nv]++;
   
	 $us[maxhp] += 50;
	 $us[extrae] += 15;
	 
   $us[next]=$us[next]+($us[nv]*50);

   mysql_query("UPDATE sw_users SET next='$us[next]', nv='$us[nv]', extrae='$us[extrae]', maxhp='$us[maxhp]' WHERE nombre='$us[nombre]'")or die(mysql_error());
   echo "<center>Has subido de nivel! Tu Vida m�xima y Energ�a m�xima han aumentado!</center>";
}
?>
