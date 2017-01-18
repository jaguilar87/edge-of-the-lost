<?php
if ($us[puntos]>$us[next]){
   $us[pc]++;
   $us[nv]++;
   
   $us[next]=$us[next]+($us[nv]*50);

   mysql_query("UPDATE sw_users SET next='$us[next]', pc='$us[pc]', nv='$us[nv]' WHERE nombre='$us[nombre]'")or die(mysql_error());
   echo "<center>Has subido de nivel! Tienes <b>$us[pc]</b> PCs <a href='entre.php'>GASTAR</a></center>";
}
?>