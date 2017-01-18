<?php

#Configurar Clan
if ($us[lado]<0 && $cl[hermandad]=="Jedi") {
    
	$d = "INSERT INTO sw_board_clan (poster, clan, dia, mess) VALUES ('INFORMACION', '$us[clan]', '$fe[val]', '$us[nombre] ha sido expulsado del clan por pasar al lado oscuro.')";  
	$result = mysql_query($d);

    $c="UPDATE `sw_users` SET Clan=Null WHERE nombre='$us[nombre]'";
	$result=mysql_query($c)or die(mysql_error());

	$d = "INSERT INTO sw_log (tipo, log, ref, dia) VALUES ('2', 'Expulsado del Clan por pasar al Lado Oscuro', '$us[nombre]', '$us[dia]')";  
	$result = mysql_query($d);



}

if ($us[lado]>0 && $cl[hermandad]=="Sith") {

	$d = "INSERT INTO sw_clanboard (poster, clan, dia, mess) VALUES ('INFO', '$us[clan]', '$fe[dia]', '$us[nombre] ha sido expulsado del clan por pasar al lado de la luz.')";  
	$result = mysql_query($d);

    $c="UPDATE `sw_users` SET clan=NULL WHERE nombre='$us[nombre]'";
	$result=mysql_query($c)or die(mysql_error());

	$d = "INSERT INTO sw_log (tipo, log, ref, dia) VALUES ('2', 'Expulsado del Clan por pasar al Lado de la Luz', '$us[nombre]', '$us[dia]')";  
	$result = mysql_query($d);


}



#Recalcular Puntaje de Clan:

if ($us[clan]!=""){
   $c= "SELECT * FROM `sw_users` WHERE clan='$us[clan]' AND nv_sable>'0'";
   $result = mysql_query($c)or die(mysql_error());
   $punt=0;
   $i=0;
   $meritot=0;
   while ($p = mysql_fetch_array($result)){
   		 $punt += $p[merito];
		 $i++;
   }
   
   if ($i==0){
   	  $meritot=0;
   }elseif($i<5){
      $i=5;
      $meritot=$punt/$i;
   }else{
      $meritot=$punt/$i;
   }


   $c= "SELECT * FROM `sw_vehiculos` WHERE tprop='Clan' AND prop='$us[clan]'";
   $result = mysql_query($c)or die(mysql_error());
   while ($p = mysql_fetch_array($result)){
   		 if ($p[tipo]=="VCA"){
		 	$meritot += 50;
		 }elseif($p[tipo]=="Lanzadera"){
		    $meritot += 100;
		 }else{
		    $meritot +=175;
		 }
   }

   $meritot+=$cl[fondos]/100000;

   $c= "SELECT * FROM `sw_city` WHERE clan='$us[clan]'";
   $result = mysql_query($c)or die(mysql_error());
   while ($p = mysql_fetch_array($result)){
   		 $meritot+=100;
   }

   $c="UPDATE `sw_clan` SET puntos='$meritot' WHERE nombre='$cl[nombre]'";	
   $result=mysql_query($c)or die(mysql_error());
}



# DESCLANADOS
if ($us[clan]==""){
   if ($us[cvoto]!=""){ 
   	  mysql_query("UPDATE sw_users SET cvoto='' WHERE nombre='$us[nombre]'")or die(mysql_error());
   } 
}


# PREFIX PARA LIDER

if ($cl[lider]==$us[nombre]){
   if ($us[sexo]=="H"){
   	  if ($cl[hermandad]=="Sith"){$prefix="Oscuro";}elseif($cl[hermandad]=="Jedi"){$prefix="Honorable";}else{$prefix="General";}
   }else{
   	  if ($cl[hermandad]=="Sith"){$prefix="Oscura";}elseif($cl[hermandad]=="Jedi"){$prefix="Honorable";}else{$prefix="General";}
   }
}else{ 
   $prefix="";
}

   $res=mysql_query("UPDATE sw_users SET prefix='$prefix' WHERE nombre='$us[nombre]'")or die(mysql_error());
?>