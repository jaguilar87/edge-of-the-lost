<?php include 'header.php';
if ($_GET[ci]==""){$_GET[ci]=$ci[nombre];}
$cic=sel("sw_city", "", $_GET[ci]);
if ($ok){

   if ($cic[nombre]!=$ci[nombre] || $cl[lider]!=$us[nombre] || $cic[clan]==$us[clan] || $cic[atacada]!="N" || $us[clan]==""){
   	  echo "No se puede efectuar el ataque a esta ciudad";
   }else{
   		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE origen='$cl[nombre]' AND destino='$cic[clan]'")or die(mysql_error());
		 if ($za[estado]=="Aliado"){
		 	echo "No puedes atacar la ciudad de un clan aliado!";
		 }else{
  		 	include 'atc.php';
				include 'aciudad_res.php'; 
   		 }
   }

}else{
	  echo "<big><big><b>Planeando ataque contra la ciudad $cic[nombre]</b></big></big><br><br>
	  Si tu clan ataca la ciudad de <b>$cic[nombre]</b> gastará potencia, como más dure la defensa de la ciudad, más potencia se gastará.<br>Si tu clan se queda sin potencia a medio combate hay muchas probabilidades de perder el combate.<br><a href='?ok=true'>Atacar!</a>"; 
}

include 'footer.php';?>
