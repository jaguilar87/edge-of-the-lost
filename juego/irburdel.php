<?php
if ($ci[burdel]=="N"){echo 'Tu ciudad no dispone de burdeles';}else{

if ($ok){
   $curing =$us[maxhp] - $us[hp];

   $tur=$curing/$us[poder];

   $us[creditos] -= $curing;
   $us[turnos] -= $tur;
   $us[lado]-=$tur;

   if ($us[creditos]<0 || $us[turnos] <0){
   	  echo 'Créditos/Energía insuficientes...';
   }else{
   	  $us[hp]=$us[maxhp];

	  $clr = sel("sw_clan","",$ci[clan]);
	  $clr[fondos] += $curing;
	  
	  mysql_query("UPDATE `sw_users` SET hp='$us[hp]', creditos='$us[creditos]', turnos='$us[turnos]', lado='$us[lado]' WHERE nombre='$_SESSION[nombre]'")or die(mysql_error());
	  mysql_query("UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'")or die(mysql_error());

	  echo "Curación completada por <b>$curing crédito(s) y $tur Turno(s)</b><br><small>(Tu dinero fue a parar al clan $ci[clan])<br><font color=\"#ff8080\">Has caminado $tur puntos al lado Oscuro.</font></small>";

   }
   
}else{

   $curing =$us[maxhp] - $us[hp];

   $tur=$curing/$us[poder];
   
    echo "<center>La estada en el Burdel te costará <b>$tur Turnos</b> y algunos créditos<br><br><a href='idistritos.php?def=irburdel.php&ok=true'>CURAR</a></center>";



}
}
?>
