<?php include_once 'header.php';
if ($_GET[vehiculo]==""){
	 	echo "<script> location.href=\"iphangar.php\" </script>";
	 }

	 
	 $ul=sel("sw_vehiculos", "", $_GET[vehiculo]);
  if($ul[tipo]!="Crucero" && $ul[uso]=="N"){

	 if($ul[tprop]=="Jugador"){
			$v=true;
	 }elseif($ul[tprop]=="Clan" && $us[nombre]==$cl[lider] && $us[clan]!=""){
			$v=true;
 	 }else{
	 		echo "Imposible de vender";
	 }
	}	 

	 if ($v){

	  	 $result=mysql_query("UPDATE `sw_vehiculos` SET venta='S', precio='$_GET[precio]' WHERE nombre='$_GET[vehiculo]'")or die(mysql_error());
	  
	  	 echo 'Puesto a la venta';
	}else{
		  Echo 'No tienes jurisdicción para poner a la venta el vehiculo o no existe';
	}




include_once 'footer.php'; ?>
