<?php include 'header.php';

   echo "Bienvenido $us[titulo] $us[prefix] $us[nombre] a la Academia, eres un $us[nivel], por ello te podemos ofrecer entrenar lo siguiente:<br>";


   	  echo "<br><table width='100%'><tr bgcolor=\"#737373\"><td><b>Atributo</b></td><td><b>Total</b></td><td><center>+1</center></td><td><center>+5</center></td><td><center>+25</center></td></tr>";
   	  echo "
      	   <tr><td><a href=\"ayuda.php#vigor\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques físicos. Como más Vigor, más dañinos serán tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vigor</b></td><td><center>$us[vigor]</center></td><td><a href=\"entok.php?c=vigor&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=vigor&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=vigor&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#constitucion\" onMouseover=\" ddrivetip('La Constitución representa la forma física del jugador, mide la resistencia a los golpes físicos; Como más constitución menos daños recibirás en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Constitución</b></td><td><center>$us[constitucion]</center></td><td><a href=\"entok.php?c=constitucion&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=constitucion&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=constitucion&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#destreza\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como más destreza, más rápidos y precisos serán tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Destreza</b></td><td><center>$us[destreza]</center></td><td><a href=\"entok.php?c=destreza&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=destreza&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=destreza&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#inteligencia\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como más Inteligencia, más frecuentemente usarás los poderes de la fuerza y más facil te resultará la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Inteligencia</b></td><td><center>$us[inteligencia]</center></td><td><a href=\"entok.php?c=inteligencia&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=inteligencia&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=inteligencia&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
		   <tr><td><a href=\"ayuda.php#poder\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como más Poder de la Fuerza, más daño causarás en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Poder de la Fuerza</small></b></td><td><center>$us[poder]</center></td><td><a href=\"entok.php?c=poder&m=1\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=poder&m=5\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=poder&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
	  ";


	  echo "<tr bgcolor=\"#737373\"><td><b>Otros</b></td><td><b>Total</b></td><td><center>+5</center></td><td><center>+10</center></td><td><center>+25</center></td></tr>";
	  echo "
	  	   <tr><td><a href=\"ayuda.php#vida\" onMouseover=\" ddrivetip('La vida es tu vitalidad en combate. cuando tu vida llegue a 0 habrás quedado KO', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vida max.</b></td><td><center>$us[maxhp]</center></td><td><a href=\"entok.php?c=maxhp&m=5\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=maxhp&m=10\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=maxhp&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
	  	   <tr><td><b><a href=\"ayuda.php#energia\" onMouseover=\" ddrivetip('La energía es lo que gastas para realizar acciones, cuando tu energia llegue a 0 no podrás hacer más acciones. La energia se recarga automaticamente cada hora.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Energía max.</b></td><td><center>$to</center></td><td><a href=\"entok.php?c=extrae&m=5\"><img border=0 width=10 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=extrae&m=10\"><img border=0 width=17 src=\"images/e.jpg\"></a></td><td><a href=\"entok.php?c=extrae&m=25\"><img border=0 width=25 src=\"images/e.jpg\"></a></td></tr>
	  	   </table>
	  ";
	  echo '<small>Mantenga el ratón encima de el nombre para ver una explicación de su uso</small><br>';


if ($us[nv_sable]==0){
   echo "<br><br><a onMouseover=\" ddrivetip('<center><big>¡CIUDADO!</font></big><br>Si asciendes de nivel, los otros jugadores podrán atacarte.</center>', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ascender.php\">Entrar en una Academia</a> Coste: 10.000 Créditos";
}else{
   echo '<br><i><b>Dotes de la Fuerza:</b></i><br>- Ataque de la fuerza.';
   if ($us[nv_sable]>1){
   	  if ($us[lado]>0){
	  	 echo '<br>- <font color="#a6ebff">Cura Jedi</font>';
	  }else{
	     echo '<br>- <font color="#ff0000">Rayo Sith</font>';
	  }
   }
   if ($us[nv_sable]>=3){
   	  if ($us[lado]>0){
	  	 echo '<br>- <font color="#a6ebff">Acto Heroico Jedi<br></font>- <font color="#a6ebff">Aura Luminosa Jedi</font>';
	  }else{
	     echo '<br>- <font color="#ff0000">Drenaje Sith</font><br>- <font color="#ff0000">Furia Sith</font>';
	  }
   }
}
echo "<br><hr><br>Nivel de Personaje: <b>$us[nv]</b> EXP: <b>$us[puntos]</b>PX Siguiente Nivel: <b>$us[next]</b>";
echo "<br>Dispones de <b>$us[pc]</b> Puntos de Clase (PC) para gastar.<br>";
	echo "<br><table width='100%'><tr><td> <b>Domador</b>: ";
	   switch($us[cl_trainer]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
   case "1":
	   		$ntra="Guardabosques";
	   		$nben="Ratio Caza +5%, Recompensa +3%";
	   break;	   
	   case "2":
	   		$ntra="Cazador";
	   		$nben="Ratio Caza +10%, Recompensa +6%, 1% de posibilidades de caza";
	   break;		   
	   case "3":
	   		$ntra="Furtivo";
	   		$nben="Ratio Caza +15%, Recompensa +9%, 6% de posibilidades de caza";
	   break;
   case "4":
   		$ntra="Domador";
	   		$nben="Ratio Caza +20%, Recompensa +12%, 12% de posibilidades de caza";
	   break;
   case "5":
	   		$ntra="Gran Domador";
	   		$nben="Ratio Caza +25%, Recompensa +15%, 18% de posibilidades de caza, Entrenamiento de animales";
	   break;
	   case "6":
   		$ntra="Señor de las Béstias";
	   		$nben="Ratio Caza +30%, Recompensa +18%, 24% de posibilidades de caza, Entrenamiento de animales";
	   break;		 	 
	   }
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_trainer]<6){ 
		 		echo '<a href="entreclase.php?clase=cl_trainer"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }
	echo "</td><td>";
	  
	echo"<b>Artesano:</b> ";
	   switch($us[cl_artesano]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
   case "1":
	   		$ntra="Peletero";
	   		$nben="Permite convertir cadáveres en elementos utilizables.";
	   break;	   
	   case "2":
	   		$ntra="Curtidor";
	   		$nben="Permite crear ropa y armaduras con piel y materiales.";
	   break;		   
	   case "3":
	   		$ntra="Artesano";
	   		$nben="Permite crear los primeros objetos manuales.";
	   break;
   case "4":
   		$ntra="Gran Artesano";
	   		$nben="Permite crear objetos manuales de dificultad media.";
	   break;
   case "5":
	   		$ntra="Orfebre";
	   		$nben="Permite crear cualquier tipo de objeto manual.";
	   break;
	   }	   
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_artesano]<5){ 
		 		echo '<a href="entreclase.php?clase=cl_artesano"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }
		 
		 
		 
	echo"</td><td>";
	
echo"<b>Doctor:</b> ";
	   switch($us[cl_doctor]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
     case "1":
	   		$ntra="Explorador";
	   		$nben="Permite buscar hierbas en las Afueras.";
	   break;	   
	   case "2":
	   		$ntra="Curandero";
	   		$nben="Permite convertir las hierbas en pociones de nivel bajo y venderlas.";
	   break;		   
     case "3":
   		$ntra="Doctor";
	   		$nben="Permite autocurarse con la fuerza utilizando energía.";
	   break;
		 case "4":
	   		$ntra="Químico";
	   		$nben="Permite hacer pociones de nivel medio.";
	   break;
		 case "5":
	   		$ntra="Gran Doctor";
	   		$nben="Cada Gran Doctor permite la opcion de curar a todos los miembros del clan, como más doctores haya en un clan, menos costará la curación.";
	   break;
		 case "6":
	   		$ntra="Medico Cientifico";
	   		$nben="Permite crear pociones de nivel Alto.";
	   break;
	   }	   
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_doctor]<6){ 
		 		echo '<a href="entreclase.php?clase=cl_doctor"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }	   
		 
echo "</td></tr><tr><td>";		 
echo"<b>Técnico:</b> ";
	   switch($us[cl_tecnico]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
     case "1":
	   		$ntra="Mecánico";
	   		$nben="Cada técnico a partir de este nivel cuenta para reparar las naves del clan, como más técnicos menos coste de mineral habra para reparar.";
	   break;	   
	   case "2":
	   		$ntra="Hacker";
	   		$nben="Permite lanzar ataques informaticos.";
	   break;		   
     case "3":
   		$ntra="Técnico";
	   		$nben="Permite fabricar máquinas de nivel bajo";
	   break;
		 case "4":
	   		$ntra="Técnico Medio";
	   		$nben="Permite fabricar máquinas de nivel medio";
	   break;
		 case "5":
	   		$ntra="Técnico Superior";
	   		$nben="Permite fabricar máquinas de nivel alto";
	   break;
		 case "6":
	   		$ntra="Ingeniero";
	   		$nben="Permite trabajar en el diseño de satélites. Como más ingenieros tenga un clan, más rápido y barato se crearán los mismos.";
	   break;
	   }	   
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_tecnico]<6){ 
		 		echo '<a href="entreclase.php?clase=cl_tecnico"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }		 

	echo"</td><td>";
	
echo"<b>Soldado:</b> ";
	   switch($us[cl_guerrero]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
     case "1":
	   		$ntra="Luchador";
	   		$nben="+1% posibilidades de Crítico";
	   break;	   
	   case "2":
	   		$ntra="Hombre de Armas";
	   		$nben="+2% posibilidades de Crítico";
	   break;		   
     case "3":
   		$ntra="Guerrero";
	   		$nben="+3% posibilidades de Crítico";
	   break;
		 case "4":
	   		$ntra="Asalto";
	   		$nben="+4% posibilidades de Crítico";
	   break;
		 case "5":
	   		$ntra="Comando";
	   		$nben="+5% posibilidades de Crítico";
	   break;
		 case "6":
	   		$ntra="Héroe";
	   		$nben="+6% posibilidades de Crítico. Permite tener acceso al GOLPE DESESPERADO.";
	   break;
	   }	   
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_guerrero]<6){ 
		 		echo '<a href="entreclase.php?clase=cl_guerrero"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }	
	echo"</td><td>";
	
echo"<b>Pícaro:</b> ";
	   switch($us[cl_picaro]){
   case "0":
	   		$ntra="Inexperto";
	   		$nben="Ninguno";
	   break;
     case "1":
	   		$ntra="Pillo";
	   		$nben="+5% de Créditos robados en ataque.";
	   break;	   
	   case "2":
	   		$ntra="Carterista";
	   		$nben="+10% de Créditos robados en ataque.";
	   break;		   
     case "3":
   		$ntra="Ladronzuelo";
	   		$nben="+15% de Créditos robados en ataque.";
	   break;
		 case "4":
	   		$ntra="Ladrón";
	   		$nben="+20% de Créditos robados en ataque.";
	   break;
		 case "5":
	   		$ntra="Timador";
	   		$nben="+25% de Créditos robados en ataque.";
	   break;
		 case "6":
	   		$ntra="Maestro del engaño";
	   		$nben="+30% de Créditos robados en ataque. Permite ver los atributos del enemigo.";
	   break;
	   }	   
		 echo "$ntra <a href='#' onMouseover=\" ddrivetip('$nben', '#808080');\" onMouseout=\"hideddrivetip()\"><img src='images/h.gif' border=0></a>";
	 if ($us[cl_picaro]<6){ 
		 		echo '<a href="entreclase.php?clase=cl_picaro"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }	
		 		 
	echo"</td></tr></table>";


include 'footer.php'; ?>