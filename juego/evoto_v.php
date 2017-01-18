<?php include 'header.php';

if ($us[evoto]==NULL){

   mysql_query("UPDATE sw_users SET evoto='$_GET[tipo]' WHERE nombre='$us[nombre]'")or die(mysql_error());
   
   $c= "SELECT * FROM `sw_evoto` WHERE tipo='$_GET[tipo]' ORDER BY ref DESC limit 0,1";
   $result = mysql_query($c)or die(mysql_error());
   $acpoll = mysql_fetch_array($result);
   
   $acpoll[num]++;
   
   mysql_query("UPDATE sw_evoto SET num='$acpoll[num]' WHERE ref='$acpoll[ref]' AND tipo='$_GET[tipo]'")or die(mysql_error());
  
  echo "Votado! Redireccionando...<META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=evoto.php\">";

}else{

echo "Ya has votado anteriormente! No puedes volver a votar. <META HTTP-EQUIV=\"Refresh\" CONTENT=\"2;URL=evoto.php\">";



}










include 'footer.php';?>
