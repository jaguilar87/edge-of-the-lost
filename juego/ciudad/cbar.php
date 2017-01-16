<?php 
if ($ci[cura]=="N"){echo 'Tu ciudad no dispone de bar...';}else{

if ($ok){
   $curing = $us[estres];

   $costes = $ci[copas]*$curing;

   $us[creditos] -= $costes;

   if ($us[creditos]<0){echo 'Cr�dito insuficiente...';}else{
   	  if ($us[hp]<=0){ echo 'No puedes ir al bar estando KO...';}else{

	  	 $us[estres]=0;


		 $c= "SELECT * FROM `sw_clan` WHERE nombre='$ci[clan]'";
		 $result = mysql_query($c)or die(mysql_error());
		 $clr = mysql_fetch_array($result);

		 $clr[fondos] += $costes;

		 $c = "UPDATE `sw_users` SET estres='$us[estres]', creditos='$us[creditos]' WHERE nombre='$_SESSION[nombre]'";
		 $result = mysql_query($c);

		 $c = "UPDATE `sw_clan` SET fondos='$clr[fondos]' WHERE nombre='$ci[clan]'";
		 $result = mysql_query($c);

		 echo "<br>Bebes y te relajas por valor de <b>$costes Cr�dito(s)</b> y tu Estr�s desaparece...<br><small>(Tu dinero fue a parar al clan $ci[clan])</small>";

	  }
   }
   
}else{

   $curing = $us[estres];

   $costes = $ci[copas]*$curing;
   
   echo "<center>La curaci�n de Estr�s te costar� <b>$costes Cr�ditos</b><br><br><a href='ciudad/?id=cbar&ok=true'>CURAR ESTRES</a></center>";



}
}
?>
