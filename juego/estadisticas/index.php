<?php include 'header.php';
echo '<big><big><b>Ranking y Estad&iacute;stica del Juego</b></big></big>';

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
   while ($user= mysql_fetch_array($result)) {
       $meri+=$user[merito];
       $pun+=$user[puntos];
       $equi+=$user[lado];
       $mony+=$user[creditos];
       $hab++;
   }

   $res = mysql_query("SELECT * FROM sw_plan")or die(mysql_error());
   $planetas = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_city")or die(mysql_error());
   $ciudades = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_clan")or die(mysql_error());
   $clanes = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_att")or die(mysql_error());
   $ataques = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_log")or die(mysql_error());
   $logs = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_mess")or die(mysql_error());
   $mens = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_board_clan")or die(mysql_error());
   $cboard = mysql_num_rows($res);

   $res = mysql_query("SELECT * FROM sw_board_parlamento")or die(mysql_error());
   $pboard = mysql_num_rows($res);

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
		<td>
			Versi&oacute;m del juego: <b>$ver[val]</b><br>
			Partida: <b>$par[val]</b><br>
			D&iacute;as de juego: <b>$fe[val]</b><br><br>
			Jugadores: <b>$hab</b><br>
			Planetas: <b>$planetas</b><br>
			Ciudades: <b>$ciudades</b><br>
			Clanes: <b>$clanes</b><br>
			Ataques: <b>$ataques</b><br>
			Entradas de LOG: <b>$logs</b><br>
			Mensajes privados: <b>$mens</b><br>
			Mensajes en sala de reuniones: <b>$cboard</b><br>
			Mensajes en parlamento: <b>$pboard</b><br>
		</td>
		<td>
			Equilibrio en la fuerza: <b>$equi</b><br>
			Media del Equilibrio: <b>$mequi</b><br><br>
			Creditos en circulaci&oacute;n: <b>$mony</b><br>
			Media de creditos: <b>$mmony</b><br><br>
			Puntos Totales: <b>$pun</b><br>
			Media Puntos: <b>$mpun</b><br><br>
			M&eacute;rito Total: <b>$meri</b><br>
			Media M&eacute;rito: <b>$mmeri</b>
		</td>
</tr>
<tr>
	   <td>";


       echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP"><b>Los m&aacute;s ricos</b></caption><tr><td><b>Nombre</b></td><td><b>Cr&eacute;ditos</b></td></tr>';
       $c="select nombre, creditos FROM `sw_users` ORDER BY creditos DESC LIMIT 0, 10";
       $result=mysql_query($c)or die(mysql_error());
       $i=1;
       while ($r = mysql_fetch_array($result)) {
           echo "<tr><td><b>$i.</b> $r[nombre]</td><td><div align=\"right\">$r[creditos]</div></b></td></tr>";
           $i++;
       }
        echo '</table>';

       echo "</td><td>";

       echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f"><caption align="TOP"><b>Los Mejores jugadores</b></caption><tr><td><b>Nombre</b></td><td><b>Exp</b></td></tr>';
       $c="select nombre, puntos FROM `sw_users` ORDER BY puntos DESC LIMIT 0, 10";
       $result=mysql_query($c)or die(mysql_error());
       $i=1;
       while ($r = mysql_fetch_array($result)) {
           echo "<tr><td><b>$i.</b> $r[nombre]</td><td>XXX</td></tr>";
           $i++;
       }
       echo '</table>';


       echo "</td>



</tr>
<tr>
	   <td>";


       echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f" ><caption align="TOP"><b>Los Mejores Luchadores</b></caption><tr><td><b>Nombre</b></td><td><b>M&eacute;rito</b></td></tr>';
       $c="select nombre, merito FROM `sw_users` ORDER BY merito DESC LIMIT 0, 10";
       $result=mysql_query($c)or die(mysql_error());
       $i=1;
       while ($r = mysql_fetch_array($result)) {
           echo "<tr><td><b>$i.</b> $r[nombre]</td><td><div align=\"right\">$r[merito]</div></b></td></tr>";
           $i++;
       }
       echo '</table>';

       echo "</td><td>";

       echo '<table width="100%" cellpading="5" cellspacing="5" bgcolor="#4f4f4f"><caption align="TOP"><b>m&aacute;s Victorias</b></caption><tr><td><b>Nombre</b></td><td><b>PK G</b></td><td><b>PK P</b></td></tr>';
       $c="select nombre, pk, lpk FROM `sw_users` ORDER BY pk DESC LIMIT 0, 10";
       $result=mysql_query($c)or die(mysql_error());
       $i=1;
       while ($r = mysql_fetch_array($result)) {
           echo "<tr><td><b>$i.</b> $r[nombre]</td><td>$r[pk]</b></td><td>$r[lpk]</b></td></tr>";
           $i++;
       }
       echo '</table>';


       echo "</td>








</table>";








include 'footer.php';
