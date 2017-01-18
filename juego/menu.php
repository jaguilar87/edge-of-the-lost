		   <?php echo "<small><center><b><u>Avisos</u><b><br>";
           if ($us[cmess]=="S" && $us[clan]!="") {
               echo "<a href=\"clan/?id=board\"><span title=\"Mensaje nueno en el Tabl&oacute;n del Clan!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a> ";
           }
           if ($us[mmess]=="S") {
               echo "<a href=\"mess/\"><span title=\"Mensaje Nuevo!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a> ";
           }
           if ($us[attmess]=="S") {
               echo "<a href=\"combate/lista.php\"><span title=\"Has sido atacado recientemente!\"><blink><img border=0 src=\"images/atk.gif\"></blink></span></a> ";
           }
           ?>
<table border="0" width="100" cellspacing="1" cellpadding="1" VALIGN="TOP">
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="index.php" Class="navlink">Noticias</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="voto/" Class="navlink">Votaciones</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Ficha</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ficha/?id=ficha" Class="navlink">Ficha</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ficha/?id=equipo" Class="navlink">Inventario</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="entre/" Class="navlink">Academia</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ficha/?id=config" Class="navlink">Configurar</a></center>
		   </td>
	   </tr>

<?php if ($us[clan]!="") {
               ?>
   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Clan</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="clan/" Class="navlink">Sede Clan</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="clan/?id=diplo" Class="navlink">Diplomacia</a></center>
		   </td>
	   </tr>
   	 <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="clan/?id=board" Class="navlink">S. Reuniones</a></center>
		   </td>
	   </tr>
<?php
           }?>
   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Ciudad</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ciudad/" Class="navlink">Ciudad</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="viaje/viaje.php" Class="navlink">Viajar</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ciudad/?id=acaza" Class="navlink">Caza</a></center>
		   </td>
	   </tr>


   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Combates</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="combate/objetivo_combate.php" Class="navlink">Atacar</a></center>
		   </td>
	   </tr>
<?php if ($us[clan]!="") {
               ?>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="combate/objetivo_duelo.php" Class="navlink">Duelo</a></center>
		   </td>
	   </tr>
<?php
           } ?>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="combate/lista.php" Class="navlink">Lista</a></center>
		   </td>
	   </tr>


   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Listas</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="lista/players.php" Class="navlink">Jugadores</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="lista/clanes.php" Class="navlink">Clanes</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="lista/planetas.php" Class="navlink">Mapa</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="lista/hangar.php" Class="navlink">Hangar</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="estadisticas/" Class="navlink">Estad&iacute;sticas</a></center>
		   </td>
	   </tr>

   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Comunicaci&oacute;n</b></center>
		   </td>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="mess/" Class="navlink">Privados</a></center>
		   </td>
	   </tr>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="http://sw-eotlw.foro.st" target="_blank" Class="navlink">Holored(Foro)</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ciudad/?id=aparlamento" Class="navlink">Parlamento</a></center>
		   </td>
	   </tr>

   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Juego</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ayuda.php" target="_blank" Class="navlink">Ayuda</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="historia.php" target="_blank" Class="navlink">Historia</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="../staff.php" target="_blank" Class="navlink">Staff</a></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="normas.php" target="_blank" Class="navlink">Normas</a></center>
		   </td>
	   </tr>

	   <tr>
	   	   <td>
		   <?php
           echo "<small><center><br><b><u>Informaci&oacute;n</u><br>Hp:</b> $us[hp]/$us[maxhp]<br><b>Lado:</b> $us[lado]<br><b>Energ&iacute;a:</b> $us[turnos] <br><small><b>Cr&eacute;ditos:</b> $us[creditos]</small><br><br><b>Clan:</b> <br>$us[clan]<br><b>Ciudad:</b> <br>$us[ciudad]<br><br><b>D&iacute;a:</b> $fe[val]<br><b>Hora:</b> $ach<blink>:</blink>$acm</center></small>";

		   echo "</center></small>";
		   ?>
			 <br /><br />
			 <small><a href="salir.php">[Cerrar sesi&oacute;n]</a></small>
		   </td>
	   </tr>

</table>
