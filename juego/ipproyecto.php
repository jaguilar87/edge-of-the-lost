<?php include 'header.php';

Switch ($_GET[id]){
case "": echo "<script> location.href='idistritos.php?def=ipastilleros.php' </script>"; break;

case "nuevo":
	 if ($cl[lider]==$us[nombre]){
	 echo "<b>Elige un proyecto de la lista:</b><br><i>Construir:</i><br><table width=\"100%\"><tr bgcolor=\"#808080\"><td><b>Nombre</b></td><td><b>Tipo</b></td><td>Minerales</td><td>Turnos</td></tr>";
	 echo "<tr><td><a href=\"idistritos.php?def=ipastilleros.php&act=construir&veh=deslizador\"><img border=0 src=\"images/arr.gif\"></a>Deslizador</td><td>Vehículo Terrestre</td><td>500M</td><td>200T</td></tr>";
	 echo "<tr><td><a href=\"idistritos.php?def=ipastilleros.php&act=construir&veh=transporte\"><img border=0 src=\"images/arr.gif\"></a>Transporte Ligero</td><td>Nave Pequeña</td><td>3.000M</td><td>750T</td></tr>";
	 echo "<tr><td><a href=\"idistritos.php?def=ipastilleros.php&act=construir&veh=crucero\"><img border=0 src=\"images/arr.gif\"></a>Crucero de Batalla</td><td>Nave Grande</td><td>10.000M</td><td>2000T</td></tr>";
	 echo '</table>';
	 }else{echo "No eres el lider del clan";}
	 break;

case "vehiculo":
	 if ($_GET[div]==""){echo "<script> location.href='iphangar.php' </script>";}

 	 $c="SELECT * FROM `sw_vehiculos` WHERE nombre='$_GET[div]'";
	 $result=mysql_query($c)or die(mysql_error());
	 $l=mysql_fetch_array($result);
	 
 	 $c= "SELECT * FROM `sw_fabrica` WHERE nombre='$l[nombre]'";
	 $result = mysql_query($c)or die(mysql_error());
	 $n = mysql_fetch_array($result);
	 
	 echo "<big><center><font color=\"#f0f3bb\">$l[nombre]</font></center></big><br><br>Vehículo fabricado por el <b>clan $n[clan]</b><br> Propiedad del <b>$l[tprop] $l[prop]</b>.<br>Tipo: $l[tipo]<br>Posición: ";
	 
	 if ($l[ciudad]==NULL){echo 'En Órbita.';}else{echo "Aparcado en la ciudad $l[ciudad]";}
	 break; 
	  
	 
default:
	 
	 $c= "SELECT * FROM `sw_fabrica` WHERE id='$_GET[id]'";
	 $result = mysql_query($c)or die(mysql_error());
	 $n = mysql_fetch_array($result);
	 
 	 $c= "SELECT * FROM `sw_clan` WHERE nombre='$n[clan]'";
	 $result = mysql_query($c)or die(mysql_error());
	 $cn = mysql_fetch_array($result);
	 
	 $minacoste=$n[mineral]*$cn[pagomina];
	 $costea=$minacoste+($n[tgastados]*$cn[pagomina]);
	 $costet=$minacoste+($n[ttotales]*$cn[pagomina]);
	 echo "<center><big>Proyecto Nº <b>$n[id]</b> empezado el dia <b>$n[dia]</big></b></center><br><br><b>Nombre:</b> $n[nombre]<br><b>Tipo:</b> $n[tipo]<br><br>Mineral Invertido: $n[mineral]<br>Turnos Gastados/Totales: $n[tgastados] / $n[ttotales]<br>Dinero gastado estimado hasta ahora: $costea Créditos <br>Coste Total Estimado: $costet Créditos.<br> ";

	 $c="SELECT * FROM `sw_vehiculos` WHERE nombre='$n[nombre]'";
	 $result=mysql_query($c)or die(mysql_error());
	 $l=mysql_fetch_array($result);

	 if ($n[finalizado]=="S"){echo "<a href=\"idistritos.php?def=ipastilleros.php&id=vehiculo&div=$l[nombre]\"><font color=\"#0cff05\">Proyecto Finalizado</a></font>";}    
	 break;

}


include 'footer.php';?>
