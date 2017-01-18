<?php include 'header.php';
if ($_GET[veh]==""){echo "<script> location.href='hangar.php' </script>";}

$c="SELECT * FROM `sw_vehiculos` WHERE venta='S' AND nombre='$_GET[veh]' ORDER BY id ASC";
$result=mysql_query($c)or die(mysql_error());
$uc=mysql_fetch_array($result);

$us[creditos]-=$uc[precio];

if ($us[creditos]>=0){

   	if ($uc[tprop]=="Clan"){
	   		 $c="SELECT * FROM `sw_clan` WHERE nombre='$uc[prop]'";
	   		 $result=mysql_query($c)or die(mysql_error());
	   		 $pc=mysql_fetch_array($result);
			 	   
				   $pc[fondos]+=$uc[precio];
				   
 		 	  $c="UPDATE `sw_clan` SET fondos='$pc[fondos]' WHERE nombre='$pc[nombre]'";
 			  $result=mysql_query($c)or die(mysql_error());
	   

	   }else{
   	   		 $c="SELECT * FROM `sw_users` WHERE nombre='$uc[prop]'";
			 $result=mysql_query($c)or die(mysql_error());
	   		 $pc=mysql_fetch_array($result);
	   
	   		 $pc[creditos]+=$uc[precio];
			 
		 	  $c="UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$pc[nombre]'";
 			  $result=mysql_query($c)or die(mysql_error());
	   }
   	  
	  $c="UPDATE `sw_vehiculos` SET prop='$us[nombre]', tprop='Jugador', x='$us[plax]', y='$us[play]', ciudad='$ci[nombre]', venta='N' WHERE nombre='$uc[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
	  
	  $c="UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$ul[nombre]'";
	  $result=mysql_query($c)or die(mysql_error());
	  echo 'Compra efectuada...';


}else{ echo'Credito insuficiente...';}
include 'footer.php';?>
