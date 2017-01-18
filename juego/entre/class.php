<?php  include_once 'header.php';
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
		 		echo '<a href="entre/classok.php?clase=cl_trainer"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
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
		 		echo '<a href="entre/classok.php?clase=cl_artesano"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
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
		 		echo '<a href="entre/classok.php?clase=cl_doctor"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
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
		 		echo '<a href="entre/classok.php?clase=cl_tecnico"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
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
		 		echo '<a href="entre/classok.php?clase=cl_guerrero"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
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
		 		echo '<a href="entre/classok.php?clase=cl_picaro"><img src="images/e.jpg" border=0 alt="Aumentar un nivel la clase"></a>';
		 }	
		 		 
	echo "</td></tr></table>";
include_once 'footer.php';	?>