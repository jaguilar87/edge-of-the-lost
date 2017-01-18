<?php 
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}

   $cic=sel("sw_city", "nombre", $_GET[ciudad]);
   $plc=sel("sw_plan", "nombre", $cic[planeta]);
   
   						$a=0;
					 	$s="SELECT nombre FROM sw_users WHERE clan='$cic[clan]' AND ciudad='$cic[nombre]' AND hp>'0'";
						$q=mysql_query($s)or die(mysql_error());
						while ($l=mysql_fetch_array($q)){$a++;}
						
						    $cz="SELECT * FROM `sw_diplomacia` WHERE destino='$cl[nombre]' AND estado='Aliado'";
							$resultz=mysql_query($cz)or die(mysql_error());
   							while ($za = mysql_fetch_array($resultz)){
		  
		  						  $c="SELECT * FROM sw_users WHERE clan='$za[origen]' AND ciudad='$ci[nombre]' AND hp>'0'";
		  						  $result3=mysql_query($c)or die(mysql_error());
		  						  while ($at=mysql_fetch_array($result3)){$a++;}
							}
   
   $u=textcolor($cic[rey]);
   echo "<center><big>Gestión de $cic[nombre]</big></center><hr>";

   function gest($nom, $nombre, $man){
   global $cic;
   			$ret= "<tr>
				  	   <td>
					   	   <div align='right'><b>$nom</b></div>
					   </td>
				  	   <td>
					   	   <center>$cic[$nombre]</center>
					   </td>
					   <td>
					     $man C 
					   </td>   
				  	   <td>
					   	   <spam Title=\"Clausurar\">
						   		 <a href=\"ciudad/?id=gest&ac=des&ob=$nombre&ciudad=$cic[nombre]\">
								 	<img border=0 src=\"images/x.gif\">
								 </a>
						   </spam>
						   <spam title=\"Construir\">
						   		 <a href=\"ciudad/?id=gest&ac=co&ob=$nombre&ciudad=$cic[nombre]\">
								 	<img  border=0 src=\"images/arr.gif\">
								 </a>
						   </spam>
					   </td>   
				  </tr>";	   			   

			return $ret;				   
   }
   
   if ($cic[rey]==$us[nombre]){  	
	
	  switch ($_GET[ac]){
 	  	case "des":
	  	 	 $result=mysql_query("UPDATE `sw_city` SET {$_GET[ob]}='N' WHERE nombre='$cic[nombre]'")or die(mysql_error()); 
		 	 echo 'Destruido...';
		break;
		
		case "co":
	  	   switch ($_GET[ob]){
	  		 	  case "cura": $_GET[c]=1000; break;
	  		 	  case "armeria": $_GET[c]=5000; break;
			 	  case "ayuda": $_GET[c]=500; break;
			 	  case "ley": $_GET[c]=10000; break;
			 	  case "mina": $_GET[c]=20000; break;
 			 	  case "fabrica": $_GET[c]=5000; break;
			 	  case "burdel": $_GET[c]=5000; break;
			 	  case "bar": $_GET[c]=7000; break;
		   }
		   
	       $w=$_GET[ob];
		   if ($cic[$w]=="S"){
		 	  echo 'Ya está construido...';
		   }else{
			  if ($cl[fondos]>=$_GET[c]){
			  	    $cl[fondos]-=$_GET[c];

					$result=mysql_query("UPDATE sw_city SET {$_GET[ob]}='s' WHERE nombre='$cic[nombre]'")or die(mysql_error()); 
					$result=mysql_query("UPDATE sw_clan SET fondos='$cl[fondos]' WHERE nombre='$us[clan]'")or die(mysql_error()); 

					echo 'Construido.';
			  }else{
			  		echo 'Fondos del clan insuficientes...';
			  }
	       }
   		break;	
		
		case "arr":
   				
				echo 'Ciudad arrasada... <script> location.href="ciudad/?id=" </script>';
				$result=mysql_query("DELETE FROM sw_city WHERE nombre='$cic[nombre]'")or die(mysql_error());
		break;
		
		case "aba":
   			    echo 'Ciudad Abandonada...';
				$result=mysql_query("UPDATE sw_city SET clan=NULL, rey=NULL WHERE nombre='$cic[nombre]'")or die(mysql_error()); 

		break;			 
		
		case "prec":
   			 	if ($_GET[costc]<=30 && $_GET[costc]>0){
				   $result=mysql_query("UPDATE sw_city SET {$_GET[costt]}='{$_GET[costc]}' WHERE nombre='$cic[nombre]'")or die(mysql_error());
				   $cic{$_GET[costt]}=$_GET[costc];
				   echo "Precio cambiado...";
				}else{
				   echo "Valor no válido, debe ir de 1 a 30";
				}
		break;

		case "mess":
      		 $result=mysql_query("UPDATE sw_city SET mess='$_GET[mess]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
			 echo "Mensaje de Bienvenida cambiado...";
   		break;
		
		case "cen":
		     if ($cic[central]<5){
			 	$pre= ($cic[central]*10000)+10000;
			 	$cl[fondos]-=$pre;
		
			 	if ($cl[fondos]<0){
			 	   echo "El clan no dispone de suficientes fondos";
			 	}else{
			 	   $cic[central]++;
				   mysql_query("UPDATE sw_city SET central='$cic[central]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
				   mysql_query("UPDATE sw_clan SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
			    }
			 }else{
			 	echo "No se puede mejorar mas la central";
			 }
		break;
		case "tor":
			 switch($_GET[tip]){
			 	case "sam": $cost=500000; break;
				case "blaster": $cost=550000; break;
				case "damascus": $cost=600000; break;
				case "generador": $cost=250000; break;
			 }
			 
			 $cl[fondos]-=$cost;
			 
			 if ($cl[fondos]<0){
			 	echo "El clan no dispone de suficientes fondos";
			 }else{
			 	$cic{$_GET[tip]}++;
				$tot=$cic{$_GET[tip]};
				mysql_query("UPDATE sw_city SET {$_GET[tip]}='$tot' WHERE nombre='$cic[nombre]'")or die(mysql_error());
				mysql_query("UPDATE sw_clan SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
			 }
		break;
		case "des":
	  	 mysql_query("UPDATE sw_users SET ciudad='$_GET[new]' WHERE ciudad='$cic[nombre]'")or die(mysql_error());
		 	 mysql_query("UPDATE `sw_city` SET nombre='$_GET[new]' WHERE nombre='$cic[nombre]'")or die(mysql_error()); 
		 	 echo "Ciudad renombrada a $_GET[new]";
		break;
	  } #Final del SWITCH
	  
 	 		 echo '<b></b><table width="100%"><tr><td VALIGN ="TOP"><big><b>Edificios</b></big><table width="100%" Cellspacing="2"><tr bgcolor="#737373"><td><b>Nombre</b></td><td><small><b><center>C</center></b></small></td><td><small><b>Manten.</b></small></td><td></td></tr>';
			 
			 	  echo gest("Hospital", "cura", "1.000");	  
				  echo gest("Mina", "mina", "20.000");
				  echo gest("Astilleros", "fabrica", "5.000");
  			 	  echo gest("Armeria", "armeria", "5.000");
				  echo gest("Trabajo", "ayuda", "500");
				  echo gest("Bar", "bar", "7.000");
				  echo gest("Burdel", "burdel", "10.000");
				  echo gest("Ley", "ley", "$cic[leypre]*500");
			 
			 echo '</table></td><td VALIGN ="TOP"><big><b>Central</b></big>';
			 
			 
			 switch ($cic[central]){
			  	case "1": $cen="Central Solar (100W/Dia)"; break;
					case "2": $cen="Central BioTermica (210W/Dia)"; break;
					case "3": $cen="Central Termonuclear (600W/Dia)"; break;
					case "4": $cen="Central MagnetoGravitatoria (800W/Dia)"; break;
					case "5": $cen="Central Fusión Nuclear (1000W/Dia)"; break;
			 }
			 
			 $ma= $cic[central]*10000;
			 $man= $ma+10000;
			 echo "<center><b>$cen</b><br>Mantenimiento: $ma Créditos";
			 if ($cic[central]<5){echo "<br><a href='ciudad/?id=gest&ac=cen'>MEJORAR CENTRAL $man C</a>";}
			 
			 echo "<hr></center>
			 <b><big></big></b><br>
			 <center>
			 
			 ";
			 
			 
			 echo "</center></td></tr></table><center><br><table bgcolor='#808080'><tr><td><form action=\"ciudad/\" METHOD=\"GET\"> <input type='hidden' name='id' value='gest' /><input name=\"ac\" type=\"hidden\" value=\"prec\">Modificar precios de <select name=\"costt\">
    		  	   <option value=\"costec\">Hospital
				   <option value=\"copas\">Bar
    			   <option value=\"impuesto\">Impuestos
    			   <option value=\"leypre\">Presupuesto Ley
			</select> en <input name=\"ciudad\" type=\"hidden\" value=\"$cic[nombre]\"> <input name=\"costc\" style=\"width:50px\"type=\"text\" value=\"1\"> <input Value=\"Cambiar\" type=\"submit\"></form>";
			echo "<br><small>Hospital: $cic[costec] C/PV | Bar: $cic[copas]/Estrés | Impuestos: $cic[impuesto] % | Presupuesto Ley: $cic[leypre] Puntos</small></td></tr></table></center>";

		
				 echo "<br><hr><br><big><b>Defensas de la ciudad</b></big>";
			if ($cic[ley]=="S"){

				  echo "<br><i>Soldados:</i><br><small>
				  	   &nbsp;&nbsp;&nbsp;La ciudad dispone de <b>$a ciudadanos</b> defensores de la ciudad<br>";
				  echo "</small><i>Torres:</i><br><small>
				  	 &nbsp;&nbsp;&nbsp;<b>$cic[sam]</b> Torres SAM <a href=\"ciudad/?id=gest&ac=tor&tip=sam\" onMouseover=\" ddrivetip('Las Torres SAM dañan a los Vehiculos atacantes<br><b>Precio: 500.000C </b>', '#808080');\" onMouseout=\"hideddrivetip()\"><img  border=0 src=\"images/e.jpg\"></a><br>
					   &nbsp;&nbsp;&nbsp;<b>$cic[blaster]</b> Torres Blaster <a href=\"ciudad/?id=gest&ac=tor&tip=blaster\" onMouseover=\" ddrivetip('Las Torres Blaster disparan contra el escudo de los atacantes pero sobretodo contra los PJ atacantes<br><b>550.000 C</b>', '#808080');\" onMouseout=\"hideddrivetip()\"><img  border=0 src=\"images/e.jpg\"></a><br>
					   &nbsp;&nbsp;&nbsp;<b>$cic[damascus]</b> Torres Damascus <a href=\"ciudad/?id=gest&ac=tor&tip=damascus\" onMouseover=\" ddrivetip('Las Torres Damascus produce una vibración de onda corta que es capaz de dañar los escudos de los Atacantes<br><b> 600.000 C</b>', '#808080');\" onMouseout=\"hideddrivetip()\"><img  border=0 src=\"images/e.jpg\"></a><br>
					   &nbsp;&nbsp;&nbsp;<b>$cic[generador]</b> Generador de Escudo <a href=\"ciudad/?id=gest&ac=tor&tip=generador\" onMouseover=\" ddrivetip('Las Cada generador produce 500u de Escudo<br> <b>250.000 C</b>', '#808080');\" onMouseout=\"hideddrivetip()\"><img  border=0 src=\"images/e.jpg\"></a><br>
					   ";

				  $b=0;
				  $c=0;
				  $sql=mysql_query("SELECT * FROM sw_vehiculos WHERE tprop='clan' AND prop='$us[clan]' AND arma!='' AND tipo='VCA'")or die(mysql_error());
				  while ($r=mysql_fetch_array($sql)){$b++;}
				  $sql=mysql_query("SELECT * FROM sw_vehiculos WHERE tprop='clan' AND prop='$us[clan]' AND tipo='Crucero'")or die(mysql_error());
				  while ($r=mysql_fetch_array($sql)){$c++;}

 				  echo "</small><i>Vehículos:</i><br><small>
				  	 &nbsp;&nbsp;&nbsp;<b>$b</b> VCA(s) Armados(s)<br>
					   &nbsp;&nbsp;&nbsp;<b>$c</b> Crucero(s) <br>
				  ";



			}else{
				echo 'La ciudad no dispone de una sede para gestionar la defensa!';
			}
			
			
			
			
			
			
			
			echo "<br><hr><br><form action=\"clan/?id=darciudad&ciudad=$cic[nombre]\" Method=\"POST\">Dar control de la Ciudad a: <select name=\"nombre\">";

			$c="SELECT nombre FROM sw_users WHERE clan='$us[clan]'";
			$result = mysql_query($c);
			while ($r=mysql_fetch_array($result)){ echo "<option value=\"$r[nombre]\">$r[nombre]</option>";}
			echo '</select> <input type="submit" value="Dar Ciudad"></form>';
			echo "<br><a href=\"ciudad/?id=gest&ac=aba&ciudad=$cic[nombre]\">Abandonar la Ciudad</a>";
			echo "<br><a href=\"ciudad/?id=gest&ac=arr&ciudad=$cic[nombre]\">Arrasar la Ciudad</a>";
			echo "<form action=\"ciudad/\" METHOD=\"GET\"><input type='hidden' name='id' value='gest' /><br><br><table border=1 width=\"100%\">
			<tr>
			       <td><center><b>Mensaje de Bienvenida</b></center></td>
			</tr>
			<tr>
			       <td><center><textarea name=\"mess\" style=\"width:500px; height:100px;\">$cic[mess]</textarea></center></td>
			</tr>
			<tr>
			       <td><center><input name=\"ac\" type=\"hidden\" value=\"mess\"><input type=\"submit\" value=\"Cambiar mensaje de Bienvenida\"></center></td>
			</tr>
			</table></form>";
			
			
			echo "<br><form method=\"GET\"><input type='text' name='new' value='$cic[nombre]' style='width:400px'> <input style='width:98px' type='submit' value='Cambiar Nombre'/> </form>
			
			
			
			
   }else{ echo 'No eres el regente de la ciudad, no puedes gestionarla...';}
?>
