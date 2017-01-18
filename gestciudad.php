<?php include 'header.php';
if ($_GET[ciudad]==""){$_GET[ciudad]=$ci[nombre];}

   $c="SELECT * FROM sw_city WHERE nombre='$_GET[ciudad]'";
   $result=mysql_query($c)or die(mysql_error());
   $cic=mysql_fetch_array($result);
   
   $c="SELECT * FROM sw_plan WHERE posx='$cic[esx]' AND posy='$cic[esy]'";
   $result=mysql_query($c)or die(mysql_error());
   $plc=mysql_fetch_array($result);

   $u=textcolor($cic[rey]);
   echo "<center><big>Gestión de $cic[nombre]</big></center><hr>";

   if ($cic[rey]==$us[nombre]){ 
   	  if ($_GET[ac]=="des"){
	  	 $c="UPDATE sw_city SET {$_GET[ob]}='N' WHERE nombre='$cic[nombre]'";
		 $result=mysql_query($c); 
		 echo 'Destruido...';
	     echo "<br><br><a href=\"gestciudad.php?ciudad=$cic[nombre]\">Volver a Gestión de Ciudad</a>";

	  }elseif($_GET[ac]=="to"){		 
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
	  }elseif($_GET[ac]=="co"){
	  switch ($_GET[ob]){
	  		 case "cura": $_GET[c]=1000; break;
	  		 case "entrenar": $_GET[c]=2500; break;
			 case "ayuda": $_GET[c]=500; break;
			 case "ley": $_GET[c]=10000; break;
			 case "mina": $_GET[c]=20000; break;
 			 case "fabrica": $_GET[c]=5000; break;
			 case "burdel": $_GET[c]=5000; break;
			 case "bar":$_GET[c]=5000; break;
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
   echo "<br><br><a href=\"gestciudad.php?ciudad=$cic[nombre]\">Volver a Gestión de Ciudad</a>";
   }elseif($_GET[ac]=="arr"){
   echo 'Ciudad arrasada...';
			 	$c="DELETE FROM sw_city WHERE nombre='$cic[nombre]'";
				$result=mysql_query($c);
				
   }elseif($_GET[ac]=="aba"){
   echo 'Ciudad Abandonada...';
			 	$c="UPDATE sw_city SET clan=NULL, rey=NULL WHERE nombre='$cic[nombre]'";
				$result=mysql_query($c); 
				 
   }else{ 
echo '<small><form action="gestciudad.php" Method="GET">Construir <input name="torres" type="text" value="1" Style="Width:70px"> <input name="ac" type="hidden" value="to">Torres defensivas a 500.000 C cada una <input type="submit" Value="Ok" Style="height:20px"></form></small>';
echo "Ya tienes $cic[torres] en la ciudad";
echo '<table width="100%" Cellspacing="5"><caption ALIGN="top"><b>Servicios</caption></b><tr bgcolor="#737373"><td><b>Nombre</b></td><td><small><b>Activo</b></small></td><td><b><small>Precio</small></b></td><td><small>Manten.</small></td><td></td></tr>';

echo "<tr><td>Salas de cura</td><td><center>$cic[cura]</center></td><td><div align=\"right\">$cic[costec]/PV</div></td><td><div align=\"right\">1.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=cura&ciudad=$cic[nombre]\"><img  border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=cura&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Salas de Entrenamiento</td><td><center>$cic[entrenar]</center></td><td><div align=\"right\">Variable</div></td><td><div align=\"right\">2.500C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=entrenar&ciudad=$cic[nombre]\"><img border=0  src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=entrenar&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Puestos de Trabajo</td><td><center>$cic[ayuda]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">500C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=ayuda&ciudad=$cic[nombre]\"><img  border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=ayuda&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Mina</td><td><center>$cic[mina]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">20.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=mina&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=mina&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Fabrica</td><td><center>$cic[fabrica]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">5.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=fabrica&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=fabrica&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
#echo "<tr><td>Bar</td><td><center>$cic[bar]</center></td><td><div align=\"right\">250</div></td><td><div align=\"right\">5.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=bar&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=bar&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Burdel</td><td><center>$cic[burdel]</center></td><td><div align=\"right\">1C/PV</div></td><td><div align=\"right\">10.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=burdel&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=burdel&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "<tr><td>Ley</td><td><center>$cic[ley]</center></td><td><div align=\"right\">Gratuito</div></td><td><div align=\"right\">10.000C</div></td><td><spam Title=\"Clausurar\"><a href=\"gestciudad.php?ac=des&ob=ley&ciudad=$cic[nombre]\"><img border=0 src=\"images/x.gif\"></a></spam> <spam title=\"Construir/modificar\"><a href=\"gestciudad.php?ac=co&ob=ley&ciudad=$cic[nombre]\"><img  border=0 src=\"images/arr.gif\"></a></spam></td></tr>";
echo "</table>";




echo "<form action=\"clanact.php?act=darciudad&ciudad=$cic[nombre]\" Method=\"POST\"><br><br>Dar control de la Ciudad a: <select name=\"nombre\">";

$c="SELECT nombre FROM sw_users WHERE clan='$us[clan]'";
$result = mysql_query($c);
while ($r=mysql_fetch_array($result)){ echo "<option value=\"$r[nombre]\">$r[nombre]</option>";}
echo '</select> <input type="submit" value="Dar Ciudad">';
echo "<br><a href=\"gestciudad.php?ac=aba&ciudad=$cic[nombre]\">Abandonar la Ciudad</a>";
echo "<br><a href=\"gestciudad.php?ac=arr&ciudad=$cic[nombre]\">Arrasar la Ciudad</a>";

}}else{ echo 'No eres el regente de la ciudad, no puedes gestionarla...';}
include 'footer.php';?>
