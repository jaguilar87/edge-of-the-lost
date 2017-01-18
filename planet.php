<?php include 'header.php';
if ($_GET[pl]==""){$_GET[pl]=$pl[nombre];}

echo "<center><b><big><u><big>$_GET[pl]</big></u></big></b></center>";
echo '<table border=0 width="100%"><tr bgcolor="#737373"><td><b>Ciudad</b></td><td><b>Clan</b></td><td><b>Rey</b></td></tr>'; 

$c="select * FROM `sw_plan` WHERE nombre='$_GET[pl]'";
$result=mysql_query($c)or die(mysql_error());
$r = mysql_fetch_array($result);


$c2="SELECT * FROM `sw_city` WHERE esy='$r[posy]' AND esx='$r[posx]' ORDER BY id DESC";
$result2=mysql_query($c2)or die(mysql_error());
while ($s = mysql_fetch_array($result2)){$mi=textcolor($s[rey]); echo "<tr><td><a href=\"ciudad.php?ciudad=$s[nombre]\">$s[nombre]</a></td><td><a href=\"clan.php?clan=$s[clan]\"><font color=\"#ffffff\">$s[clan]</font></a></td><td><a href=\"info.php?us=$mi[nombre]\"><font color=\"$mi[txtc]\">$mi[nombre]</font></a></td></tr>";}


echo '</table>';






include 'footer.php';?>
