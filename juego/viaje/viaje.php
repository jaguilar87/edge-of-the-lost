<?php include_once 'header.php';

if ($_GET[pl]==""){$_GET[pl]=$pl[nombre];}

   echo "<center><b><big><u><big>$_GET[pl]</big></u></big></b></center>";
   echo '<table border=0 width="100%"><tr bgcolor="#737373"><td><b>Ciudad</b></td><td><b>Clan</b></td><td><b>Dirigente</b></td></tr>'; 

   $r = sel ("sw_plan","",$_GET[pl]);
   $result2=mysql_query("SELECT * FROM `sw_city` WHERE planeta='$r[nombre]' ORDER BY id DESC")or die(mysql_error());
   while ($s = mysql_fetch_array($result2)){
   		 $mi=textcolor($s[rey]); 
		 echo "<tr><td><a href=\"viaje/ok.php?pl=$r[nombre]&ci=$s[nombre]\"><img border=0 src=\"images/arr.gif\"></a> <a href=\"ciudad/?ciudad=$s[nombre]\">$s[nombre]</a></td><td><a href=\"clan/?clan=$s[clan]\"><font color=\"#ffffff\">$s[clan]</font></a></td><td><a href=\"lista/info.php?us=$mi[nombre]\"><font color=\"$mi[txtc]\">$mi[nombre]</font></a></td></tr>";
   }
?>

</table>
<br><br><em>Elegir otro planeta de destino:</em>
<?php mapear("viaje/"); ?>

Tarifas Normales: <br>1.500C Viaje Planetario<br>7.500 Viaje interplanetario

<?php include_once 'footer.php';?>
