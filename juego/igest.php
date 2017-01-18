<?php include 'header.php';
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}

   $c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
   $result=mysql_query($c)or die(mysql_error());
   $cic=mysql_fetch_array($result);
   
   $c="SELECT * FROM sw_plan WHERE nombre='$cic[planeta]'";
   $result=mysql_query($c)or die(mysql_error());
   $plc=mysql_fetch_array($result);

   $u=textcolor($cic[rey]);
   echo "<center><big>Gestión de $cic[nombre]</big></center><hr>";

   if ($cic[rey]==$us[nombre]){ 


   	  switch ($_GET[ac]){
	  
	  	case "des":
	  	 	 $c="UPDATE sw_city SET {$_GET[ob]}='N' WHERE nombre='$cic[nombre]'";
		 	 $result=mysql_query($c); 
		 	 echo 'Destruido...';
	     	 echo "<br><br><a href=\"igest.php?ciudad=$cic[nombre]\">Volver a Gestión de Ciudad</a>";
		break;
		
		
	   	case "to":		 
		 	$coste=$_GET[torres]*500000;
		 	$cl[fondos]-=$coste;
		 	
			if ($cl[fondos]<0){echo 'Tu clan no tiene suficientes fondos para pagar eso';}else{
		 	
			   $cic[torres]+=$_GET[torres]; 
		 	   echo "Construidas $_GET[torres] por $coste, la ciudad tiene $cic[torres] ahora."; 
		 
		 	   $c="UPDATE sw_city SET torres='$cic[torres]' WHERE nombre='$cic[nombre]'";
		 	   $result=mysql_query($c);
	  	 	   $c="UPDATE sw_clan SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'";
		 	   $result=mysql_query($c);		 
		 	}
		break;
	  	case "co":
	  	   switch ($_GET[ob]){
	  		 	  case "cura": $_GET[c]=1000; break;
	  		 	  case "entrenar": $_GET[c]=2500; break;
			 	  case "ayuda": $_GET[c]=500; break;
			 	  case "ley": $_GET[c]=10000; break;
			 	  case "mina": $_GET[c]=20000; break;
 			 	  case "fabrica": $_GET[c]=5000; break;
			 	  case "burdel": $_GET[c]=5000; break;
			 	  case "bar":$_GET[c]=7000; break;
		   }
	       $w=$_GET[ob];
		   if ($cic[$w]=="S"){
		 	  echo 'Ya está construido...';
		   }else{
			  if ($cl[fondos]>=$_GET[c]){
			  	    $cl[fondos]-=$_GET[c];

				 	$c="UPDATE sw_city SET {$_GET[ob]}='s' WHERE nombre='$cic[nombre]'";
					$result=mysql_query($c); 

					$c="UPDATE sw_clan SET fondos='$cl[fondos]' WHERE nombre='$us[clan]'";
					$result=mysql_query($c); 
					echo 'Construido.';
			  }else{
			  		echo 'Fondos del clan insuficientes...';
			  }
	       }
   		   echo "<br><br><a href=\"igest.php?ciudad=$cic[nombre]\">Volver a Gestión de Ciudad</a>";
   		break;
		   
        case "arr":
   				
				echo 'Ciudad arrasada...';
			 	$c="DELETE FROM sw_city WHERE nombre='$cic[nombre]'";
				$result=mysql_query($c);
		break;
		
		case "aba":
   			    echo 'Ciudad Abandonada...';
			 	$c="UPDATE sw_city SET clan=NULL, rey=NULL WHERE nombre='$cic[nombre]'";
				$result=mysql_query($c); 

		break;		

   		case "prec":
   			 	if ($_GET[costc]<=30 && $_GET[costc]>0){
				   $c="UPDATE sw_city SET {$_GET[costt]}='{$_GET[costc]}' WHERE nombre='$cic[nombre]'";
   				   $result=mysql_query($c)or die(mysql_error());
				   echo "<script> location.href='igest.php' </script>";
				}else{
				   echo "Valor no válido, debe ir de 1 a 30";
				}
		break;
		
   		case "leypk":
      		 if ($cic[pk]=='N'){ $cic[pk]='S'; }else{ $cic[pk]='N'; }
    		 $result=mysql_query("UPDATE sw_city SET pk='$cic[pk]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
			 echo "<script> location.href='igest.php?ac=verley#ley' </script>";
   		break;						 

   		case "mess":
      		 $result=mysql_query("UPDATE sw_city SET mess='$_GET[mess]' WHERE nombre='$cic[nombre]'")or die(mysql_error());
			 echo "<script> location.href='igest.php?ac=veracc' </script>";
   		break;
		
		
		case "verley":
			 if ($cic[ley]=="S"){
			 			echo "<br>&nbsp;&nbsp;<i>El presupuesto de la Ley en $cic[nombre] es de <b>$cic[leypre] Puntos</b></i>.<br><small><b>Info:</b> Cada punto equivale a 500C al dia y debe contenerse entre los valores 1 y 30.</small>";
			        	echo "<br><br><form action=\"igest.php\" METHOD=\"GET\"> <input name=\"ac\" type=\"hidden\" value=\"prec\">Modificar el presupuesto a <input name=\"costt\" type=\"hidden\" value=\"leypre\"><input name=\"ciudad\" type=\"hidden\" value=\"$cic[nombre]\"><input name=\"costc\" style=\"width:50px\"type=\"text\" value=\"$cic[leypre]\"> <input Value=\"Modificar Presupuesto\" type=\"submit\"></form>";
			
					 echo "<hr>";
							 
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
			 	
					 echo "<br>&nbsp;&nbsp;<i>Reporte de las defensas de la ciudad:</i>";
					 echo '<table width="100%"><tr><td "10%"></td><td width="90%">';
					 	  echo '<table width="100%" border=1><tr><td>';
					 	  	   echo "La ciudad dispone de <b>$cic[torres] torres</b> defensivas.<br>La ciudad dispone de <b>$a ciudadanos</b> defensores de la ciudad";
							   echo '<br><small><form action="igest.php" Method="GET">Construir <input name="torres" type="text" value="1" Style="Width:70px"> <input name="ac" type="hidden" value="to">Torres defensivas a 500.000 C cada una <input type="submit" Value="Ok" Style="height:20px"></small>';
			 				   echo "<input name=\"ciudad\" type=\"hidden\" value=\"$cic[nombre]\"></form>";
					 	  echo '</td></tr></table>';
					 echo '</td></tr></table>';
					 
					 echo "<a name=\"ley\"></a><hr><br>&nbsp;&nbsp;<i>Legislación de la Ciudad:</i>";
					 	  echo '<br><table width="100%" border=1>'; 
						  echo "<tr><td><a href=\"#\" onMouseover=\" ddrivetip('En caso afirmativo los jugadores se podran atacar dentro de la ciudad libremente sin peligro de ser buscados por la Ley.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Ciudad PK</td><td>$ci[pk]</td><td><a href=\"igest.php?ac=leypk\">Modificar</a></td>";
						  echo "</tr>";
						  echo "</TABLE>";
						  
			}else{
				echo 'La ciudad no dispone de una sede para gestar las Leyes! <br><a href="igest.php?ac=vercon">Ir al Ministerio de Urbanismo</a>';
			}
			echo '<br><a href="igest.php">Volver a la gestión de la ciudad.</a>';
	 	break;

	 	case "vercon":
	 		 echo '<table width="100%" Cellspacing="5"><caption ALIGN="top"><b>Servicios</caption></b><tr bgcolor="#737373"><td><b>Nombre</b></td><td><small><b>Activo</b></small></td><td><b><small>Precio</small></b></td><td><small>Manten.</small></td><td></td></tr>';
			 echo "<tr><td>Salas de cura</td><td><center>$cic[cura]</center></td><td><div align=\"right\">$cic[costec]/PV</div></td><td><div align=\"right\">1.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=cura&ciudad=$cic[nombre]\"><img  border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=cura&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Salas de Entrenamiento</td><td><center>$cic[entrenar]</center></td><td><div align=\"right\">Variable</div></td><td><div align=\"right\">2.500C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=entrenar&ciudad=$cic[nombre]\"><img border=0  src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=entrenar&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Puestos de Trabajo</td><td><center>$cic[ayuda]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">500C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=ayuda&ciudad=$cic[nombre]\"><img  border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=ayuda&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Mina</td><td><center>$cic[mina]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">20.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=mina&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=mina&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Fabrica</td><td><center>$cic[fabrica]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">5.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=fabrica&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=fabrica&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Bar</td><td><center>$cic[bar]</center></td><td><div align=\"right\">$cic[copa]/estrés</div></td><td><div align=\"right\">7.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=bar&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=bar&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Burdel</td><td><center>$cic[burdel]</center></td><td><div align=\"right\">1C/PV</div></td><td><div align=\"right\">10.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=burdel&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=burdel&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "<tr><td>Ley</td><td><center>$cic[ley]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">500C x $ci[leypre]</div></td><td><spam Title=\"Clausurar\"><a href=\"igest.php?ac=des&ob=ley&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"igest.php?ac=co&ob=ley&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
			 echo "</table>";
			 echo '<br><a href="igest.php">Volver a la gestión de la ciudad.</a>';
	 	break;

		case "vereco":
			  echo "<form action=\"igest.php\" METHOD=\"GET\"> <input name=\"ac\" type=\"hidden\" value=\"prec\">Modificar precios de <select name=\"costt\">
    		  	   <option value=\"costec\">Hospital
				   <option value=\"copas\">Bar
    			   <option value=\"impuesto\">Impuestos
    			   <option value=\"leypre\">Presupuesto Ley
			</select> en <input name=\"ciudad\" type=\"hidden\" value=\"$cic[nombre]\"> <input name=\"costc\" style=\"width:50px\"type=\"text\" value=\"1\"> <input Value=\"Cambiar\" type=\"submit\"></form>";
			echo "<br><small>Hospital: $cic[costec] C/PV | Bar: $cic[copas]/Estrés | Impuestos: $cic[impuesto] % | Presupuesto Ley: $cic[leypre] Puntos</small>";
			echo '<br><a href="igest.php">Volver a la gestión de la ciudad.</a>';
		break;
			
		case "veracc":	
			echo "<form action=\"clanact.php?act=darciudad&ciudad=$cic[nombre]\" Method=\"POST\">Dar control de la Ciudad a: <select name=\"nombre\">";

			$c="SELECT nombre FROM sw_users WHERE clan='$us[clan]'";
			$result = mysql_query($c);
			while ($r=mysql_fetch_array($result)){ echo "<option value=\"$r[nombre]\">$r[nombre]</option>";}
			echo '</select> <input type="submit" value="Dar Ciudad"></form>';
			echo "<br><a href=\"igest.php?ac=aba&ciudad=$cic[nombre]\">Abandonar la Ciudad</a>";
			echo "<br><a href=\"igest.php?ac=arr&ciudad=$cic[nombre]\">Arrasar la Ciudad</a>";
			echo "<form action=\"igest.php\" METHOD=\"GET\"><br><br><table border=1 width=\"100%\">
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
			echo '<br><br><a href="igest.php">Volver a la gestión de la ciudad.</a>';
		break;


	 	default:
			 Echo "Bienvenido a su despacho dirigente $us[nombre] ¿que temas desea tratar hoy?<br>";
	 
	 		 echo '- <a href="igest.php?ac=vercon">Ministerio de Urbanismo (Construcciones)</a><br>
	 	   	 	   - <a href="igest.php?ac=verley">Ministerio de Defensa (Defensas de la Ciudad)</a><br>
	 	   		   - <a href="igest.php?ac=vereco">Ministerio de Economia (Ajustar precios)</a><br>
				   - <a href="igest.php?ac=veracc">Convocar Junta (Cambios)</a>
		   		  ';
				  
	 	break;
	  } #FIN DEL SWITCH

}else{ echo 'No eres el regente de la ciudad, no puedes gestionarla...';}
include 'footer.php';?>
