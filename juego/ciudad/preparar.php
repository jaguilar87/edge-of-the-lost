<?php
if ($ci[fabrica]=="S" && $us[nombre]==$ci[rey]){

	 $rep=sel("sw_vehiculos", "id", $_GET[veh]);
	 if ($rep[prop]==$us[clan]){
	 		$min=$rep[dam]*1000;
			$cl[mineral]-=$min;
	 		if ($cl[mineral]>0){
				 		
						mysql_query("UPDATE sw_vehiculos SET dam='0' WHERE id='$rep[id]'")or die(mysql_error());
						echo "<b>$rep[nombre]</b> Reparado";						
						
						
			}else{
						echo "Mineral insuficiente...";
			}
	 
	 }else{
	 			 echo "Ese vehículo no existe o no es de tu clan";
	 }

}else{
	 echo 'La ciudad no dispone de Astilleros o no eres el Rey de la Ciudad';
}
?>
