<body bgcolor="#000000" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">
<?php include 'var.php';

echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f"><caption align="TOP">Más puntuados</caption><tr><td><b>Nombre</b></td><td><b>Puntos</b></td></tr>';
$c="select nombre, puntos FROM `sw_users` ORDER BY puntos DESC LIMIT 0, 10";
$result=mysql_query($c)or die(mysql_error());
$i=1;
while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i. $r[nombre]</b></td><td><b>$r[puntos]</b></td></tr>"; $i++;}
echo '</table>'; ?>