<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);
if($_POST[tr]==""){echo '<script> location.href="crimen.php"</script>';}else{
$us[turnos] -=5;
if ($us[lado]<-200){$us[lado]=-200;}
if ($us[turnos]<0){echo 'Energía insuficiente...';}else{
if ($us[nv_sable]>=0){
   if($_POST[tr]=="desguace"){$gan = mt_rand(100,1000); $us[creditos] += $gan; echo "Tus trastos se vendieron como nunca, has sacado $gan Créditos."; $us[puntos]+=1;}
   if($_POST[tr]=="pedir"){$random = ($us[inteligencia]*100)+500; $us[lado] -=7; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Todo el día pidiendo en la calle dio sus frutos, ganaste $gan Créditos."; $pilla=10; $us[puntos]+=2;}
   if($_POST[tr]=="maquina"){$random = ($us[vigor]*100)+500; $us[lado] -=7; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Las máquinas contenían $gan Créditos."; $pilla=10; $us[puntos]+=2;}
   if($_POST[tr]=="bolsillo"){$random = ($us[destreza]*100)+500; $us[lado] -=7; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Al final del día hiciste recuento y contaste $gan Créditos."; $pilla=10; $us[puntos]+=2;}
   if($_POST[tr]=="amenazar"){$random = ($us[constitucion]*100)+500; $us[lado] -=7; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Los cagados te soltaron $gan Créditos."; $pilla=10; $us[puntos]+=2;}
   }
   	  				 
					 $c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
					 $result = mysql_query($c)or die(mysql_error());
					 $clr = mysql_fetch_array($result);
					    
   $randompow= (100-$us[poder])*100;
   $per=mt_rand(100,$randompow);
   $luk=mt_rand(0,100);
   if ($ci[ley]=="S" && $luk < $pilla) {echo " Pero te pilló la ley y te obligó a pagar una multa de - $per al clan $clr[nombre]"; $us[creditos]-=$per;}
   echo "<br><small><font color=\"#ff8080\">Has caminado 7 puntos al lado Oscuro.</font></small>";

					 $clr[fondos] += $per;
					 $c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
					 $result = mysql_query($c);

					  
		  	  $c = "UPDATE `sw_users` SET lado='$us[lado]', creditos='$us[creditos]', turnos='$us[turnos]', puntos='$us[puntos]' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
}
}

include 'footer.php'?>
