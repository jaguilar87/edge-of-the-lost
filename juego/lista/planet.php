<?php include_once 'header.php';
if ($_GET[pl]=="") {
    $_GET[pl]=$pl[nombre];
}

$r = sel("sw_plan", "", $_GET[pl]);

echo "<center><b><big><u><big>$_GET[pl]</big></u></big></b>";
echo "<small><br><b>Coordenadas Espaciales:</b> ($r[x],$r[y])<br><b>Mineral:</b> $r[mineral] <b>u.</b><br><br></small>";
echo '<center><table border=0 width="100%"><tr bgcolor="#737373"><td><b>Ciudad</b></td><td><b>Clan</b></td><td><b>Rey</b></td></tr>';


$result2=mysql_query("SELECT * FROM `sw_city` WHERE planeta='$r[nombre]' ORDER BY id DESC")or die(mysql_error());
while ($s = mysql_fetch_array($result2)) {
    $mi=textcolor($s[rey]);
    echo "<tr><td><a href=\"ciudad/?ciudad=$s[nombre]\">$s[nombre]</a></td><td><a href=\"csede.php?clan=$s[clan]\"><font color=\"#ffffff\">$s[clan]</font></a></td><td><a href=\"info.php?us=$mi[nombre]\"><font color=\"$mi[txtc]\">$mi[nombre]</font></a></td></tr>";
}


echo '</table>';






include_once 'footer.php';
