<?php include 'header.php';

if ($_GET[ci]!=""){

$s="SELECT * FROM sw_diplomacia WHERE destino='$us[clan]' AND origen='$ci[clan]'";
$result2=mysql_query($s)or die(mysql_error());
$za=mysql_fetch_array($result2);
			if ($za[estado]=="Aliado"){echo "No puedes atacar la ciudad de un clan aliado!";}else{

   echo "<big><big>Planear Ataque contra ciudad:</big></big>";
   echo "<br><a href=\"acity.php?ciudad=$_GET[ciudad]\"><img border=0 src=\"images/tur.jpg\">Acto Terrorista en la ciudad.</a>";
   echo "<br><a href=\"aciudad.php?ciudad=$cic[nombre]\"><img border=0 src=\"images/atk.gif\">Lanzar un Golpe de Estado.</a>";

   $a=0;
					 	$s="SELECT nombre FROM sw_users WHERE clan='$cl[nombre]' AND ciudad='$ci[nombre]' AND hp>'0'";
						$q=mysql_query($s)or die(mysql_error());
						while ($l=mysql_fetch_array($q)){$a++;}
						
						    $cz="SELECT * FROM `sw_diplomacia` WHERE destino='$cl[nombre]' AND estado='Aliado'";
							$resultz=mysql_query($cz)or die(mysql_error());
   							while ($za = mysql_fetch_array($resultz)){
		  
		  						  $c="SELECT * FROM sw_users WHERE clan='$za[origen]' AND ciudad='$ci[nombre]' AND hp>'0'";
		  						  $result3=mysql_query($c)or die(mysql_error());
		  						  while ($at=mysql_fetch_array($result3)){$a++;}
							}
   
   echo "<br><br><b>Atacantes disponibles:</b> $a Jugador(es)";
}
}else{
	  echo "<script> location.href='idistritos.php' </script>";



}


include 'footer.php';?>