<?php 
echo "<hr><small><i>Censo Público:</i></small><br>";
$c="SELECT * FROM sw_users WHERE ciudad='$cic[nombre]'";
$result3=mysql_query($c)or die(mysql_error());
while ($m=mysql_fetch_array($result3)){
$q=textcolor($m[nombre]);
echo "- <a href=\"lista/info.php?us=$m[nombre]\"><font color=\"$q[txtc]\">$m[titulo] $m[prefix] $m[nombre]</font>";
if($q[hp]<=0){echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';}
echo "</a> <small>$m[nivel] (<a href=\"clan/?clan=$m[clan]\">$m[clan]</a>)</small><br>";
}
?>