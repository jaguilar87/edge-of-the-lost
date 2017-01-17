<?php
$i=0;
echo '<table width="100%"><tr><td><b>Nombre</b></td><td><b>Nivel</b></td></tr>';
$sql=mysql_query("SELECT * FROM sw_users WHERE admin>0 ORDER BY admin DESC")or die(mysql_error());
while ($row=mysql_fetch_array($sql)) {
    echo "<tr><td>$row[nombre]</td><td>$row[admin]</td></tr>";
}

echo '</table>';
