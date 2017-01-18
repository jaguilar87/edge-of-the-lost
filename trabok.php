<?php include 'header.php';
mt_srand ((double) microtime() * 1000000);
if($_POST[tr]==""){echo '<script> location.href="trabajo.php"</script>';}else{
$us[turnos] -=5;
if ($us[lado]>200){$us[lado]=200;}
if ($us[turnos]<0){echo 'Energía insuficiente...';}else{
if ($us[nv_sable]>=0){
   if($_POST[tr]=="ambulante"){$gan = mt_rand(100,1000); $us[creditos] += $gan; echo "Tus trastos se vendieron como nunca, has sacado $gan Créditos."; $us[puntos]+=1;}
   if($_POST[tr]=="tendero"){$random = ($us[inteligencia]*100)-200; $us[lado] +=5; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Toda la tarde vendiendo ha dado como fruto $gan Créditos."; $us[puntos]+=2;}
   if($_POST[tr]=="reponedor"){$random = ($us[vigor]*100)-200; $us[lado] +=5; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Colocando cajas de comida has ganado $gan Créditos."; $us[puntos]+=2;}
   if($_POST[tr]=="artesano"){$random = ($us[destreza]*100)-200; $us[lado] +=5; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Tu cerámica se vendió bien y ganaste $gan."; $us[puntos]+=2;}
   if($_POST[tr]=="portero"){$random = ($us[constitucion]*100)-200; $us[lado] +=5; $gan = mt_rand(100,$random); $us[creditos] += $gan; echo "Vigilando una discoteca ganaste $gan Créditos."; $us[puntos]+=2;}
   }
   	  echo "<br><small><font color=\"#caffff\">Has caminado 5 puntos al lado de la Luz.</font></small>";
		  	  $c = "UPDATE `sw_users` SET lado='$us[lado]', creditos='$us[creditos]', turnos='$us[turnos]', puntos='$us[puntos]' WHERE nombre='$_SESSION[nombre]'";
	  	      $result = mysql_query($c);
}
}

include 'footer.php'?>
