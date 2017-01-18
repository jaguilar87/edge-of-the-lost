<?php include 'header.php';
switch ($_GET[act]){
case "construir":
	 			  if ($_GET[veh]==""){echo "<script> location.href='proyecto.php?id=nuevo' </script>";}
	 			  if ($cl[lider]==$us[nombre]){
				  	 switch ($_GET[veh]){
  			 		 case "deslizador": $min=500; $tur=200; $name="Deslizador"; break; 
					 case "transporte": $min=3000; $tur=750; $name="Transporte Ligero"; break; 
					 case "crucero": $min=10000; $tur=2000; $name="Crucero De Batalla"; break;
				  }
				  echo "De verdad deseas empezar a construir un $name gastando $min Minerales y $tur Turnos?";
				  echo "<form action=\"fabrica.php\" method=\"GET\"><input name=\"act\" type=\"hidden\" value=\"ok\">Bautizala como: <b>$name <input name=\"nombre\" type=\"text\" value=\"\"></b> <input name=\"veh\" type=\"hidden\" value=\"$_GET[veh]\"><input type=\"submit\" value=\"Construir\"></form>";
				  }else{ echo "No eres el lider del clan";}
				  break;

case "ok":
	 			  if ($_GET[veh]==""){echo "<script> location.href='proyecto.php?id=nuevo' </script>";}
	 			  if ($cl[lider]==$us[nombre]){
				  	 switch ($_GET[veh]){
					 		case "deslizador": $min=500; $tur=200; $name="Deslizador"; break; 
							case "transporte": $min=3000; $tur=750; $name="Transporte Ligero"; break; 
							case "crucero": $min=10000; $tur=2000; $name="Crucero De Batalla"; break; 
				  }	 	  		  
				     
					$c= "SELECT * FROM `sw_clan` WHERE nombre='$us[clan]'";
	 				$result = mysql_query($c)or die(mysql_error());
	 		   		$cn = mysql_fetch_array($result);
						$nombraco= "$name $_GET[nombre]";					 
					
					$cn[mineral]-=$min;
					
					if ($cn[mineral]<0){echo 'Mineral insuficiente';}else{ 

					$c="SELECT * FROM `sw_fabrica` WHERE nombre='$nombraco'";
					$result=mysql_query($c)or die(mysql_error());
					$ul=mysql_fetch_array($result);
					
					if ($ul[nombre]==$nombraco){echo 'Nombre ya existente. Elija Otro.';}else{
					
					$c="UPDATE `sw_clan` SET mineral='$cn[mineral]' WHERE nombre='$us[clan]'";
					$result=mysql_query($c)or die(mysql_error());
					 
					 $sql = "INSERT INTO `sw_fabrica` (nombre, tipo, mineral, tgastados, ttotales, dia, clan) VALUES ('$nombraco', '$name', '$min', '0', '$tur', '$us[dia]', '$us[clan]')";
					 $result = mysql_query($sql);
					 echo "<script> location.href='gestionar.php' </script>";
				  
				  }}
				  }else{ echo "No eres el lider del clan";}
				  break;

case "trab": echo "<form action=\"fabrica.php\" method=\"GET\">Gastar <input name=\"turnos\" type=\"input\" value=\"1\">Energía en el proyecto $_GET[pro]. <input name=\"act\" type=\"hidden\" value=\"trabok\"> <input name=\"pro\" type=\"hidden\" value=\"$_GET[pro]\"><input value=\"Trabajar\" type=\"submit\"></form>"; break;

case "trabok": 

   $c="SELECT * FROM sw_clan WHERE nombre='$ci[clan]'";
   $result=mysql_query($c)or die(mysql_error());
   $cli=mysql_fetch_array($result);
   
$coste = $cli[pagomina]*$_GET[turnos];

if ($coste>$cli[fondos]){echo 'El clan no puede pagarte esa cantidad';}else{
$us[turnos]-=$_GET[turnos];
if ($us[turnos]<0){echo 'Energía insuficiente';}else{

	$c="SELECT * FROM `sw_fabrica` WHERE nombre='$_GET[pro]' AND finalizado='N'";
	$result=mysql_query($c)or die(mysql_error());
	$ul=mysql_fetch_array($result);

	if ($ul[nombre]==$_GET[pro]){

$us[creditos]+=$coste;
$cli[fondos]-=$coste;
$cli[mineral]+=$_GET[turnos];
$lad=$_GET[turnos]/10;
$us[lado]+=$lad;
$us[puntos]+=$_GET[turnos]/10;
$mert=$_GET[turnos]/10;
if ($cli[nombre]==$cl[nombre]){$us[merito]+=$mert;}
$ul[tgastados]+=$_GET[turnos];


	  $c="UPDATE `sw_clan` SET fondos='$cli[fondos]', mineral='$cli[mineral]' WHERE nombre='$cli[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());

	  $c="UPDATE `sw_users` SET puntos='$us[puntos]', merito='$us[merito]', lado='$us[lado]', creditos='$us[creditos]', turnos='$us[turnos]' WHERE nombre='$us[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
	  
	  $c="UPDATE `sw_fabrica` SET tgastados='$ul[tgastados]' WHERE nombre='$ul[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
	  
	  if ($ul[tgastados]>=$ul[ttotales]){
	  
	  if ($ul[tipo]=="Transporte Ligero" || $ul[tipo]=="Crucero de Batalla"){$espacio="S";}else{$espacio="N";}
	  
	  $c="UPDATE `sw_fabrica` SET finalizado='S' WHERE nombre='$ul[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
		
	  $sql = "INSERT INTO `sw_vehiculos` (nombre, tipo, x, y, ciudad, prop, tprop, espacio) VALUES ('$ul[nombre]', '$ul[tipo]', '$ci[esx]', '$ci[esy]', '$ci[nombre]', '$ci[clan]', 'Clan', '$espacio')";
	  $result = mysql_query($sql);
		 
		}
	  
	  
	  echo 'Trabajo completo..';
	  	  echo "<br><small><font color=\"#caffff\">Has caminado $lad puntos al lado de la Luz.</font></small>";
}else{Echo 'El Proyecto no existe';}}}
	break;			  
				  
				  
default:

if ($ci[fabrica]=="S"){

   $c="SELECT * FROM sw_clan WHERE nombre='$ci[clan]'";
   $result=mysql_query($c)or die(mysql_error());
   $cli=mysql_fetch_array($result);


echo "<small>El clan $cli[nombre] te pagará $cli[pagomina] por cada punto de Energía que estés trabajando en uno de los siguientes proyectos:</small>";
echo "<small><br>Recuerda que trabajar en los Astilleros aumenta tus puntos hacia el lado de la Luz</small>";

echo "<table width=\"100%\"><tr bgcolor=\"#808080\"><td><b>Nombre</b></td><td><b><small>Mineral</small></b></td><td><b><small>E. Gastados/ E. Total</small></b></td><td></td></tr>";

$c="SELECT * FROM `sw_fabrica` WHERE clan='$cli[nombre]' AND finalizado='N' ORDER BY dia ASC";
$result=mysql_query($c)or die(mysql_error());
while ($p = mysql_fetch_array($result)){echo "<tr><td><a href=\"proyecto.php?id=$p[id]\">$p[nombre]</a></td><td>$p[mineral]</td><td>$p[tgastados] / $p[ttotales]</td><td><a href=\"fabrica.php?act=trab&pro=$p[nombre]\"><img border=0 src=\"images/e.jpg\"></a></td></tr>";}
echo '</table>';




}else{echo 'La ciudad no dispone de Astilleros';}

break;





}
include 'footer.php';?>
