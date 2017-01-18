<?php 

if ($_GET[pass]=="swcombinesucks") {include 'db.php';

#<!--Calculo de Día-->
$c="select * FROM `sw_fecha` WHERE id='1'";
$result=mysql_query($c)or die(mysql_error());
$fe=mysql_fetch_array($result);

$fe[dia]++;

$c="UPDATE `sw_fecha` SET dia='$fe[dia]' WHERE id='1'";
$result=mysql_query($c)or die(mysql_error());


#<!-- CALCULO DE IMPUESTOS --> 
   $c="select * from sw_city";
   $result3=mysql_query($c)or die(mysql_error());
   while ($cy=mysql_fetch_array($result3)){
   		 
		    $d="select * from sw_users WHERE ciudad='$cy[nombre]'";
			$result4=mysql_query($d)or die(mysql_error());
   			$cn=mysql_fetch_array($result4);
			
			$impu=($cn[creditos]*$cy[impuesto])/100;
			
			$cn[creditos]-=$impu;
			
			   $z="select * from sw_clan WHERE nombre='$cy[clan]'";
   			   $result5=mysql_query($z)or die(mysql_error());
   			   $ccl=mysql_fetch_array($result5);
			
			$ccl[fondos]+=$impu;
			
			$s="UPDATE sw_users SET creditos='$cn[creditos]' WHERE nombre='$cn[nombre]'";
			$q=mysql_query($s)or die(mysql_error());

			$s="UPDATE sw_clan SET fondos='$ccl[fondos]' WHERE nombre='$cy[clan]'";
			$q=mysql_query($s)or die(mysql_error());
}



#<!-- RECALCULOS DE MANTENIMIENTO DEL CLAN -->
   $c="select * from sw_city";
   $result3=mysql_query($c)or die(mysql_error());
   while ($cy=mysql_fetch_array($result3)){
   
   $d="select * from sw_clan WHERE nombre='$cy[clan]'";
   $result4=mysql_query($d)or die(mysql_error());
   $cn=mysql_fetch_array($result4);
   
   if ($cy[cura]=='S'){$man+=1000;}
   if ($cy[entrenar]=='S'){$man+=2500;}
   if ($cy[ayuda]=='S'){$man+=500;}
   if ($cy[mina]=='S'){$man+=20000;}
   if ($cy[fabrica]=='S'){$man+=5000;}
   if ($cy[ley]=='S'){$man+=10000;}
   if ($cy[burdel]=='S'){$man+=10000;}
   
   $cn[fondos]-=$man;
   if ($cn[fondos]<0){
      $sql = "INSERT INTO `sw_mess` (emisor, receptor, fecha, mess) VALUES ('INFORMACION', '$cn[lider]', '$fe[dia]', 'EL CLAN HA SIDO SUSPENDIDO POR INSOLVENCIA')";
	  $result = mysql_query($sql);
	  
   	  $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$cn[Lider]', 'Tu clan ha sido eliminado por Insolvencia.', '$fe[dia]', '1', '')";
   	  $result = mysql_query($sql);
	  
	  $sql = "DELETE FROM sw_diplomacia WHERE origen='$cn[nombre]' OR destino='$cn[nombre]'";  
   	  $result = mysql_query($sql); 
	  
	  $sql = "DELETE FROM sw_clan WHERE nombre='$cn[nombre]'";  
   	  $result = mysql_query($sql); 
	  
      mysql_query("UPDATE sw_vehiculos SET rprop='Hipotecado', prop=NULL, venta='S', precio='100000' where tprop='Clan' AND prop='$cn[nombre]'");
	  
      mysql_query("UPDATE sw_users SET clan=NULL where clan='$cn[nombre]'");
	  
      mysql_query("UPDATE sw_city SET clan=NULL, rey=NULL where clan='$cn[nombre]'");
	  
   }else{
      mysql_query("UPDATE sw_clan SET fondos='$cn[fondos]' where nombre='$cy[clan]'");
   }
   
   
   }

   
   
  
  
   
   
   
   
#  <!--fin-->
   
}else{


echo '<script> location.href="http://jagcompany.civitis.com/" </script>';
}
?>