<?php include 'header.php';
echo '<big><big><b>Ranking y Estadística del Juego</b></big></big>';

$equi=0;
$hab=0;
$mony=0;
$pun=0;
$meri=0;

$ver = sel("sw_info", "id", "ver");
$par = sel("sw_info", "id", "par");
$fin = sel("sw_info", "id", "fin");

   
   $c= "SELECT * FROM `sw_users`";
   $result = mysql_query($c)or die(mysql_error());
   while ($user= mysql_fetch_array($result)){
   		 $meri+=$user[merito];
		 $pun+=$user[puntos];
		 $equi+=$user[lado]; 
		 $mony+=$user[creditos]; 
		 $hab++;
   }
   
$mequi=$equi/$hab;
$mmony=$mony/$hab;
$mmeri=$meri/$hab;
$mpun=$pun/$hab;

$equi=round($equi);
$hab=round($hab);
$mony=round($mony);
$pun=round($pun);
$meri=round($meri);


$mmony=round($mmony);
$mequi=round($mequi);
$mmeri=round($mmeri);
$mpun=round($mpun);

echo "<br><br><table width=\"100%\" cellpading=\"5\" cellspacing=\"5\">
<tr>
       <td>Versión del juego: <b>$ver[val]</b><br>Partida: <b>$par[val]</b><br>Días de juego: <b>$fe[val]</b><br>Fecha de inicio: <b>01/04/2005</b><br>Fecha final estimada: <b>$fin[val]</b></td>
       <td>Jugadores: <b>$hab</b><br>Equilibrio en la fuerza: <b>$equi</b><br>Media del Equilibrio: <b>$mequi</b><br>Creditos en circulación: <b>$mony</b><br>Media de creditos: <b>$mmony</b><br>Puntos Totales: <b>$pun</b><br>Media Puntos: <b>$mpun</b><br>Mérito Total: <b>$meri</b><br>Media Mérito: <b>$mmeri</b></td>
</tr>
<tr>
	   <td>"; 
	   
	   
	   echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP"><b>Los más ricos</b></caption><tr><td><b>Nombre</b></td><td><b>Créditos</b></td></tr>';
	   $c="select nombre, creditos FROM `sw_users` ORDER BY creditos DESC LIMIT 0, 10";
	   $result=mysql_query($c)or die(mysql_error());
	   $i=1;
	   while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i.</b> $r[nombre]</td><td><div align=\"right\">$r[creditos]</div></b></td></tr>"; $i++;}
	    echo '</table>';
	      
	   echo "</td><td>";
	   
	   echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f"><caption align="TOP"><b>Los Mejores jugadores</b></caption><tr><td><b>Nombre</b></td><td><b>Exp</b></td></tr>';
	   $c="select nombre, puntos FROM `sw_users` ORDER BY puntos DESC LIMIT 0, 10";
	   $result=mysql_query($c)or die(mysql_error());
	   $i=1;
	   while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i.</b> $r[nombre]</td><td>$r[puntos]</td></tr>"; $i++;}
	   echo '</table>';
	     
	   
	   echo "</td>



</tr>
<tr>
	   <td>"; 
	   
	   
	   echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP"><b>Los Mejores Luchadores</b></caption><tr><td><b>Nombre</b></td><td><b>Mérito</b></td></tr>';
	   $c="select nombre, merito FROM `sw_users` ORDER BY merito DESC LIMIT 0, 10";
	   $result=mysql_query($c)or die(mysql_error());
	   $i=1;
	   while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i.</b> $r[nombre]</td><td><div align=\"right\">$r[merito]</div></b></td></tr>"; $i++;}
	   echo '</table>';
	      
	   echo "</td><td>";
	   
	   echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f"><caption align="TOP"><b>Más Victorias</b></caption><tr><td><b>Nombre</b></td><td><b>PK G</b></td><td><b>PK P</b></td></tr>';
	   $c="select nombre, pk, lpk FROM `sw_users` ORDER BY pk DESC LIMIT 0, 10";
	   $result=mysql_query($c)or die(mysql_error());
	   $i=1;
	   while ($r = mysql_fetch_array($result)){echo "<tr><td><b>$i.</b> $r[nombre]</td><td>$r[pk]</b></td><td>$r[lpk]</b></td></tr>"; $i++;}
	   echo '</table>';
	     
	   
	   echo "</td>








</table>";








include 'footer.php';?>
