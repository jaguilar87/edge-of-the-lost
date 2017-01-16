<?php 
if ($_GET[veh]==""){echo "<script> location.href='lista/hangar.php' </script>";}

$result=mysql_query("SELECT * FROM `sw_vehiculos` WHERE venta='S' AND nombre='$_GET[veh]' ORDER BY id ASC")or die(mysql_error());
$uc=mysql_fetch_array($result);

if ($_GET[ac]=="clan"){
  if ($us[clan]=="" || $us[nombre]!=$cl[lider]){
   	  echo '<script>location.href="lista/hangar.php"</script>';
  }else{
   
   $cl[fondos]-=$uc[precio];
   if ($cl[fondos]>=0){
   
   	  if ($uc[tprop]=="Clan"){
	
	   		 $pc=sel ("sw_clan","",$uc[prop]);
			 $pc[fondos]+=$uc[precio];
			 
			 mysql_query("UPDATE `sw_clan` SET fondos='$pc[fondos]' WHERE nombre='$pc[nombre]'")or die(mysql_error());
	   

	   }else{
	   		 $pc=sel ("sw_users","",$uc[prop]);
	    	 $pc[creditos]+=$uc[precio];
			 mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$pc[nombre]'")or die(mysql_error());
	   }
   	  
	   mysql_query("UPDATE `sw_vehiculos` SET prop='$cl[nombre]', tprop='Clan', planeta='$us[planeta]', venta='N' WHERE nombre='$uc[nombre]'")or die(mysql_error());
	   mysql_query("UPDATE `sw_clan` SET fondos='$cl[fondos]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
	  
	   echo 'Compra efectuada...';
   }else{
   	   echo'Credito insuficiente...';
   }
  }
}else{

	  $us[creditos]-=$uc[precio];

	  if ($us[creditos]>=0){

	     	if ($uc[tprop]=="Clan"){
	   		   $pc=sel ("sw_clan","",$uc[prop]);
			   $pc[fondos]+=$uc[precio];
			   mysql_query("UPDATE `sw_clan` SET fondos='$pc[fondos]' WHERE nombre='$pc[nombre]'")or die(mysql_error());
	   

	   		}else{
	   		   $pc=sel ("sw_users","",$uc[prop]);
	      	   $pc[creditos]+=$uc[precio];
			   mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$pc[nombre]'")or die(mysql_error());
	   		}
   	  
	   mysql_query("UPDATE `sw_vehiculos` SET prop='$us[nombre]', tprop='Jugador', planeta='$us[planeta]', ciudad='$ci[nombre]', venta='N' WHERE nombre='$uc[nombre]'")or die(mysql_error());
	   mysql_query("UPDATE `sw_users` SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
	   echo 'Compra efectuada...';


	   }else{
	   		echo'Credito insuficiente...';
	   }
}

?>
