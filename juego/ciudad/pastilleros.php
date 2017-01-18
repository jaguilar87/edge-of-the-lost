<?php
if ($ci[fabrica]=="S" && $us[nombre]==$ci[rey]){
   if ($_GET[ok]){
   	  			  $vl=sel("sw_vehiculos", "", $_GET[nom]);
				  if ($_GET[nom]==$vl[nombre] || $_GET[tip]==""){
				  	 echo "Ese nombre ya existe o no ha seleccionado el tipo de Vehículo. ";
				  }else{
				  	 
   	  				  	 switch ($_GET[tip]){
					 		case "VCA": $min=500; $tur=200; break; 
							case "Lanzadera": $min=3000; $tur=750; break; 
							case "Crucero": $min=10000; $tur=2000; break;

				  	     }	
      
   						 $cl[potencia]-=$tur;
						 	 $cl[mineral]-=$min;
   
   						 if ($cl[potencia]<0 || $cl[mineral]<0){
						 	echo "Poténcia o mineral insuficiente...";
						 }else{
						 
						 mysql_query("UPDATE `sw_clan` SET potencia='$cl[potencia]', mineral='$cl[mineral]' WHERE nombre='$cl[nombre]'")or die(mysql_error());

 				 	     if ($_GET[tip]=="Lanzadera" || $_GET[tip]=="Crucero"){$espacio="S";}else{$espacio="N";}
				 			 
							 $_POST[nom]=valNombre($_POST[nom]);
						 mysql_query("INSERT INTO `sw_vehiculos` (nombre, tipo, ciudad, prop, tprop, espacio, arma, mineral, potencia, fabricante, dia) VALUES ('$_GET[nom]', '$_GET[tip]', '$ci[nombre]', '$ci[clan]', 'Clan', '$espacio', '$arma', '$min', '$tur', '$cl[nombre]', '$us[dia]')")or die(mysql_error());
						 
						 
						  echo "<table background='images/bg3.jpg'  width='100%' height='100%'>
						  <tr>					  
						      <td><big><big><b>Astilleros de $ci[nombre]</b></big></big><br><br>Vehículo Construido</td></tr></table>";   
						 
						 
						 
						 
						 
						 
						 
						 }
				  }
   
   
   }else{
   
   		 echo "<table background='images/bg3.jpg'  width='100%' height='100%'>
<tr>
    <td><big><big><b>Astilleros de $ci[nombre]</b></big></big>";   
   		 echo "<br>Bienvenido a los astilleros <b>$us[nombre]</b>! En los astilleros convertiremos su potencia y mineral en poderosos vehiculos para su clan, esperamos sus instrucciones.<br><br>"; 


   		 echo '<br><center><table>
<tr>
    <td>    <form action="ciudad/" method="GET">

					   	   Nombre del Vehículo: <br>&nbsp;&nbsp;<input name="nom" type="text" value="">
					   	   <br><br>Tipo vehículo: <br>&nbsp;&nbsp;<input name="tip" type="radio" value="VCA">VCA <br>&nbsp;&nbsp;<input name="tip" type="radio" value="Lanzadera">Lanzadera <br>&nbsp;&nbsp;<input name="tip" type="radio" value="Crucero">Crucero
					   	   <br><br><input name="ok" type="submit" value="Construir">
                  <input name="id" type="hidden" value="pastilleros">
					</form>				
					</td>
</tr>
</table></center>
';
		 echo '<small><b><b>Vehículos:</b></b></small><br><small><table width="100%" ><tr bgcolor="#808080"><td><small><b>Nombre</b></small></td><td><small><b>Tipo</b></small></td><td><small>Minerales</small></td><td><small>Potencia</small></td></tr><tr><td><small>VCA</small></td><td><small>Vehículo Terrestre</small></td><td><small>500M</small></td><td><small>200W</small></td></tr><tr><td><small>Lanzadera</small></td><td><small>Transporte Ligero</small></td><td><small>3.000M</small></td><td><small>750W</small></td></tr><tr><td><small>Crucero</small></td><td><small>Gan nave de combate espacial</small></td><td><small>10.000M</small></td><td><small>2000W</small></td></tr></table></small></td>
</tr>
</table>';
		 
   }
}else{
	 echo 'La ciudad no dispone de Astilleros o no eres el Rey de la Ciudad';
}

?>
