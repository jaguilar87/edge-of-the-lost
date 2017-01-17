<?php
include 'juego/header/explicit.php';


echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP">Los mejores luchadores</caption><tr><td><b>Nombre</b></td><td align=right><b>M&eacute;rito</b></td></tr>';
$c="select nombre, puntos FROM `sw_users` ORDER BY merito DESC LIMIT 0, 4";
$result=mysql_query($c)or die(mysql_error());
$i=1;
while ($r = mysql_fetch_array($result)) {
    echo "<tr><td><b>$i. $r[nombre]</b></td><td><b><div align=\"right\">$r[merito]</div></b></td></tr>";
    $i++;
}
?>
</table>
