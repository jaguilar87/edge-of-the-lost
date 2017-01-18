<?php include 'header.php';

if ($_GET[ti]==""){
   echo "<script> location.href='holonoticias.php' </script>";
}else{
echo "<b><center>$_GET[ti]</center></b>
	  <table border=1 width=\"100%\">";
   $s="SELECT * FROM sw_board_holonews WHERE titulo='$_GET[ti]' ORDER BY id ASC";
   $q=mysql_query($s)or die(mysql_error());
   while ($l=mysql_fetch_array($q)){

   $m=textcolor($l[poster]);
echo "   

		<tr>
			<td>
				<a name=\"$l[id]\"></a><center>Publicado por <br><a href=\"info.php?us=$m[nombre]\"><font color=\"$m[txtc]\"><b>$m[titulo] $m[prefix] $l[poster]</b></font><br><img height=\"75\" border=0 src=\"$m[avatar_path]\"></a><br><br><a href=\"csede.php?clan=$m[clan]\">Clan $m[clan]</a></center>
			</td>
			<td>
				$l[mess]
			</td>
	    </tr>
";
}
echo "</table>";
if ($cl[lider]==$us[nombre]){echo "<br><br><a href=\"holonoticias.php?tit=$_GET[ti]#send\">Responer</a>";}
echo '<br><a href="holonoticias.php">Volver a Holonoticias</a>';



}



include 'footer.php';?>
