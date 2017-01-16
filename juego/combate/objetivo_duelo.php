<?php 
	include_once 'header.php';

	if ($us[nivel]=="Usuario de la Fuerza"){
		echo 'A tu nivel aun no puedes hacer duelos...';
	}else{
	 	if ($us[clan]==""){
			echo "Debes pertenecer a un clan para retar a duelos";
		}else{

	  	if ($_GET[ob]==""){
			echo 'Para hacer un duelo debes elegir alguien de tu clan o clanes aliados<br>';

		 	echo '<table width="100%" cellpading="5" cellspacing="5" ><tr bgcolor="#4f4f4f"><td><b>'.$us[clan].'</b></td></tr>';
			
		    $c="SELECT * FROM `sw_users` WHERE clan='$us[clan]' AND nombre!='$us[nombre]' ORDER BY puntos DESC";
			$result=mysql_query($c)or die(mysql_error());
			$i=1;
			while ($r = mysql_fetch_array($result)){
				$u=textcolor($r[nombre]);
				echo "<tr><td><a href=\"combate/objetivo_duelo.php?ob=$r[nombre]\"><img border=0 src=\"images/atk.gif\"></a><b>$i.</b> <a href=\"lista/info.php?us=$r[nombre]\"> <font color=\"$u[txtc]\">$r[titulo] $r[nombre]</font></a></td></tr>"; 
				$i++;
			}
			  			   
			$c2="SELECT * FROM `sw_diplomacia` WHERE destino='$us[clan]' AND estado='Aliado'";
			$result2=mysql_query($c2)or die(mysql_error());
			while ($za = mysql_fetch_array($result2)){
					 
				echo "<tr bgcolor=\"#4f4f4f\"><td><b>Clan $za[origen]</b></td></tr>";
				$c="SELECT * FROM `sw_users` WHERE clan='$za[origen]' ORDER BY puntos DESC";
			   	$result=mysql_query($c)or die(mysql_error());
			   	while ($r = mysql_fetch_array($result)){
					$u=textcolor($r[nombre]); 
					echo "<tr><td><a href=\"combate/objetivo_duelo.php?ob=$r[nombre]\"><img border=0 src=\"images/atk.gif\"></a><b>$i.</b> <a href=\"lista/info.php?us=$r[nombre]\"> <font color=\"$u[txtc]\">$r[titulo] $r[nombre]</font></a></td></tr>"; 
					$i++;
				}
					 		   
			}
			   
			   
			echo '</table>';
			
	    }else{
			$ob=textcolor($_GET[ob]);
			   
			if ($ob[nombre]==$us[nombre]){
				Echo 'No puedes atacarte a ti mismo';
			}else{
				if ($ob[nombre]==""){
					echo 'Ese jugador no existe';
				}else{			   
			   	  	
					$c="SELECT * FROM `sw_diplomacia` WHERE origen='$us[clan]' AND destino='$ob[clan]'";
					$result=mysql_query($c)or die(mysql_error());
					$r = mysql_fetch_array($result);

					if ($r[estado]=="Aliado" || $ob[clan]==$us[clan]){
			   		
			   		   $realob=$ob[hp];
			   		   $realus=$us[hp];
			   		   $ob[hp]=$ob[maxhp];
			   		   $us[hp]=$us[maxhp];
   		 	   
			   		   $c = "UPDATE `sw_users` SET hp='$us[hp]' WHERE nombre='$us[nombre]'";
			   		   $result = mysql_query($c)or die(mysql_error());

			   		   $c = "UPDATE `sw_users` SET hp='$ob[hp]' WHERE nombre='$ob[nombre]'";
			   		   $result = mysql_query($c)or die(mysql_error());

			   		   include 'ataque/atkcorePVP.php';
			   		   include 'ataque/resultados_combate.php';
					}else{
					   echo "El objetivo no pertenece al clan o a un clan aliado, no lo puedes atacar...";   
					}
				  
			   }
			}
		 }
		}
      }
	include_once 'footer.php';
?>
