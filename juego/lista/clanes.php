<?php include_once 'header.php';

if ($_GET[by]=="") {
    $_GET[ord]="DESC";
}
if ($_GET[by]=="") {
    $_GET[by]="puntos";
}


echo '<table width="100%" cellpading="5" cellspacing="5" ><caption align="TOP">Clanes</caption><tr bgcolor="#4f4f4f"><td><b>';
echo "Nombre<a href=\"lista/clanes.php?by=nombre&ord=DESC\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"lista/clanes.php?by=nombre&ord=ASC\"><img  border=0 src=\"images/a_up.gif\"></a></b></td><td><b><center><small>Puntos<a href=\"lista/clanes.php?by=puntos&ord=DESC\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"lista/clanes.php?by=puntos&ord=ASC\"><img  border=0 src=\"images/a_up.gif\"></a></small></center></b></td><td><b><div align=\"right\"><small>Fondos<a href=\"lista/clanes.php?by=fondos&ord=DESC\"><img  border=0 src=\"images/a_down.gif\"></a><a href=\"lista/lista/clanes.php?by=fondos&ord=ASC\"><img  border=0 src=\"images/a_up.gif\"></a></small></div></b></td></tr>";
$c="select * FROM `sw_clan` ORDER BY $_GET[by] $_GET[ord]";
$result=mysql_query($c)or die(mysql_error());
$i=1;
while ($r = mysql_fetch_array($result)) {
    echo "<tr><td><b>$i.</b> <a href=\"clan/?clan=$r[nombre]\">$r[nombre]</a></td><td><b><center><small>$r[puntos]</small></center></b></td><td><div align=\"right\"><small>$r[fondos]</small></div></td></tr>";
    $i++;
}
echo '</table>';






include_once 'footer.php';
