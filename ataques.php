<?php include 'header.php';
if ($_GET[at]==""){

echo "Mostrando los últimos 20 Ataques:<br>";

	  $c="SELECT * FROM `sw_att` WHERE atacante='$_SESSION[nombre]' OR defensor='$_SESSION[nombre]' ORDER BY id DESC limit 0,20"; 
	  $result=mysql_query($c)or die(mysql_error());
	  while ($a = mysql_fetch_array($result)){
	  echo "<b>$a[id]-</b> <a href=\"ataques.php?at=$a[id]\">$a[atacante] Vs $a[defensor] ocurrido el dia $a[dia]</a><br>";
      }


echo "<br><hr><br>Mostrando los últimos 20 Ataques a ciudades de tu clan:<br>";
	  $c="SELECT * FROM `sw_att` WHERE atacante='$cl[nombre]' OR defensor='$cl[nombre]' ORDER BY id DESC limit 0,20"; 
	  $result=mysql_query($c)or die(mysql_error());
	  while ($a = mysql_fetch_array($result)){
	  echo "<b>$a[id]-</b> <a href=\"ataques.php?at=$a[id]\">$a[atacante] Vs $a[defensor] ocurrido el dia $a[dia]</a><br>";
      }
	  
	  
}else{
	  
	  $c="SELECT * FROM `sw_att` WHERE id='$_GET[at]'"; 
	  $result=mysql_query($c)or die(mysql_error());
	  $a = mysql_fetch_array($result);
	  
	  if ($a[atacante]==$us[nombre] || $a[defensor]==$us[nombre] || $a[atacante]==$cl[nombre] || $a[defensor]==$cl[nombre]){

	  echo '<table width="100%"><tr><td>';
	  echo $a[combate];
	  echo "<br><center><big><big><font color=\"#f1f95b\"><br><br>Ganador: $a[ganador]!</font></big></big></center><br><br><b>Ganancias:</b> $a[ganancias]</td></tr></table>";



}else{echo 'Este combate no te concierne...';}










}
include 'footer.php';?>
