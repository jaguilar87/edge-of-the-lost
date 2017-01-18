<?php include 'var.php';


echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP">Los más ricos</caption><tr><td><b>Nombre</b></td><td><b>Créditos</b></td></tr>';
$c="select nombre, creditos FROM `sw_users` ORDER BY creditos DESC LIMIT 0, 4";
$result=mysql_query($c)or die(mysql_error());
$i=1;
while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i. $r[nombre]</b></td><td><b><div align=\"right\">$r[creditos]</div></b></td></tr>"; $i++;}
echo '</table><a href="rankings.php">+ rankings...</a>';
?>