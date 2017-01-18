<?php include 'header.php';

if ($cl[nombre]==""){echo "No perteneces a ningun clan!";}else{
if ($_GET[us]!=""){

mysql_query("UPDATE sw_users SET cvoto='$_GET[us]' WHERE nombre='$us[nombre]'")or die(mysql_error());
echo '<script> location.href="voto.php"</script>';

}else{
if ($_GET[cl]==""){$_GET[cl]=$us[clan];}

$c="SELECT * FROM sw_clan WHERE nombre='$_GET[cl]'";
$result=mysql_query($c)or die(mysql_error());
$clv=mysql_fetch_array($result);



echo "<small><center>[<a href=\"clan.php?clan=$us[clan]\">Pantalla del Clan</a>]|[<a href=\"diplomacia.php\">Diplomacia</a>]</b>";

$i=0;
if ($clv[lider]==$us[nombre]){Echo '|[<a href="gestionar.php">Gestionar Clan</a>]</center></small><br>Siendo el lider no puedes ver las votaciones de los otros jugadores';}
echo "</center></small><center><big><big><b>Votaciones del Clan $clv[nombre]</b></big></big></center><br><br>";
echo '<table cellspacing=5 width="100%"><tr bgcolor="#9d9d9d"><td><b>Nombre</b></td><td><b><div align="right">Vota a</div></b></td><td></td></tr>';
$c="SELECT * FROM `sw_users` WHERE clan='$clv[nombre]' ORDER BY cvoto ASC";
$result=mysql_query($c)or die(mysql_error());
while ($r = mysql_fetch_array($result)){
	  $u=textcolor($r[nombre]);
	  echo "<tr><td><font color=\"$u[txtc]\">$r[nombre]</font></td><td>";
	  if ($clv[lider]!=$us[nombre]){echo"<div align=\"right\">$r[cvoto]</div>";}else{echo '<div align="right">Oculto</div>';} 
	  echo "</td>";
	  if ($us[nv_sable]>0 && $_GET[cl]==$us[clan]){echo "<td><center><a onMouseover=\" ddrivetip('Votar a $r[nombre] para lider del clan.', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"voto.php?us=$r[nombre]\"><img border=0 src=\"images/corona.gif\"></a></center></td>";}
	  echo "</tr>";	  	  
	  $voto=$r[cvoto];
	  $nv[$i]=$voto;
	  if ($voto!=""){$v[$voto]++;}
	  $i++;
}
echo '</table><br><hr><br><b>Recuento de Votos:</b><br>';
$j=0;

$vl=max($v);

while ($j < count($nv)){
	  $no=$nv[$j];
	  if ($no!=NULL){
	  	 echo "$nv[$j] : $v[$no] Voto(s)<br>";
		 if ($v[$no]==$vl){$lid=$nv[$j];}
	  }
	  $j++;
}

mysql_query("UPDATE sw_clan SET lider='$lid' WHERE nombre='$clv[nombre]'")or die(mysql_error());
echo "El Lider es $lid";











}}
include 'footer.php';?>
