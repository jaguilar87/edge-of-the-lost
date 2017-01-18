		   <?php echo "<small><center><b><u>Avisos</u><b><br>";
		   if ($us[cmess]=="S" && $us[clan]!=""){echo "<a href=\"clan/?id=board\"><span title=\"Mensaje nueno en el Tablón del Clan!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a> ";}
		   if ($us[mmess]=="S"){ echo "<a href=\"mess/\"><span title=\"Mensaje Nuevo!\"><blink><img border=0 src=\"images/msg.gif\"></blink></span></a> ";}
		   if ($us[attmess]=="S"){echo "<a href=\"ataque/lista.php\"><span title=\"Has sido atacado recientemente!\"><blink><img border=0 src=\"images/atk.gif\"></blink></span></a> ";}
		   #if ($us[pc]>0){echo "<a href=\"entre/?id=class\"><span title=\"Tienes PCs sin repartir!\"><blink><img border=0 src=\"images/e.jpg\"></blink></span></a> ";} 
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
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="compa/" Class="navlink">Mascota/Droide</a></center>
		   </td>
	   </tr>	   
<?php if($us[clan]!=""){ ?>	   
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
		   	   <center><A HREF="clan/?id=voto" Class="navlink">Votaciones</a></center>
		   </td>
	   </tr>		   
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="clan/?id=board" Class="navlink">S. Reuniones</a></center>
		   </td>
	   </tr>		   
<?php }?>	   
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
		   	   <center>Ataque</b></center>
		   </td>
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ataque/combate.php" Class="navlink">Combate</a></center>
		   </td>
	   </tr>
<?php if($us[clan]!=""){ ?>	  
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ataque/duelo.php" Class="navlink">Duelo</a></center>
		   </td>
	   </tr>
<?php } ?>		 
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="ataque/lista.php" Class="navlink">Lista</a></center>
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
		   	   <center><A HREF="estadisticas/" Class="navlink">Estadísticas</a></center>
		   </td>
	   </tr>	

   	   <tr>
	   	   <td background="images/bg2.gif">
		   	   <center>Comunicación</b></center>
		   </td>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="mess/" Class="navlink">Privados</a></center>
		   </td>
	   </tr>			 
	   </tr>
	   <tr>
	   	   <td width="100%" onMouseover="LmOver(this, '#c0c0c0')" onMouseout="LmOut(this, '#FFFFFF')" onMouseDown="LmDown(this, '#c0c0c0')" bgcolor="#FFFFFF">
		   	   <center><A HREF="http://jagcompany.civitis.com/sw-eotlw/holored/" target="_blank" Class="navlink">Holored(Foro)</a></center>
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
		   	   <center><A HREF="http://jagcompany.civitis.com/sw-eotlw/staff.php" target="_blank" Class="navlink">Staff</a></center>
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
		   echo "<small><center><br><b><u>Información</u><br>Hp:</b> $us[hp]/$us[maxhp]<br><b>Lado:</b> $us[lado]<br><b>Energía:</b> $us[turnos] <br><small><b>Créditos:</b> $us[creditos]</small><br><br><b>Clan:</b> <br>$us[clan]<br><b>Ciudad:</b> <br>$us[ciudad]<br><br><b>Día:</b> $fe[val]<br><b>Hora:</b> $ach<blink>:</blink>$acm</center></small>";

		   echo "</center></small>";
		   ?>
		   </td>
	   </tr>









</table>