<?php include 'header.php';

if ($_GET[pl]==""){$_GET[pl]=$pl[nombre];}

echo "<center><b><big><u><big>$_GET[pl]</big></u></big></b></center>";
echo '<table border=0 width="100%"><tr bgcolor="#737373"><td><b>Ciudad</b></td><td><b>Clan</b></td><td><b>Dirigente</b></td></tr>'; 

$c="select * FROM `sw_plan` WHERE nombre='$_GET[pl]'";
$result=mysql_query($c)or die(mysql_error());
$r = mysql_fetch_array($result);


$c2="SELECT * FROM `sw_city` WHERE esy='$r[posy]' AND esx='$r[posx]' ORDER BY id DESC";
$result2=mysql_query($c2)or die(mysql_error());
while ($s = mysql_fetch_array($result2)){$mi=textcolor($s[rey]); echo "<tr><td><a href=\"viajok.php?pl=$r[nombre]&ci=$s[nombre]\"><img border=0 src=\"images/arr.gif\"></a> <a href=\"ciudad.php?ciudad=$s[nombre]\">$s[nombre]</a></td><td><a href=\"clan.php?clan=$s[clan]\"><font color=\"#ffffff\">$s[clan]</font></a></td><td><a href=\"info.php?us=$mi[nombre]\"><font color=\"$mi[txtc]\">$mi[nombre]</font></a></td></tr>";}
?>
</table>
<br><br><em>Elegir otro planeta de destino:</em>
<?php include 'mapa.php'; mapear("viaje.php"); ?>

Tarifas Normales: <br>1.500C Viaje Planetario<br>7.500 Viaje interplanetario

<?php include 'footer.php';?>
