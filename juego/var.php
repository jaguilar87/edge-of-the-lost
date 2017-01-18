<?php
include 'db.php';

#<!-- FUNCIONES GENERALES -->
function sel($table, $campo, $name){	
		 if ($campo==""){$campo="nombre";}
		 $result = mysql_query("SELECT * FROM $table WHERE $campo='$name'")or die(mysql_error()); 
		 $row = mysql_fetch_array($result);
		 return $row;
}

function textcolor($user){
		 
	$u=sel("sw_users", "", $user);
		 		 
	if ($u[color_sable]=="rojo"){$txtc="#ff0000";}
	elseif($u[color_sable]=="amarillo"){$txtc="#ffff80";}
	elseif($u[color_sable]=="naranja"){$txtc="#fe9f41";}
	elseif($u[color_sable]=="azul"){$txtc="#a6ebff";}
	elseif($u[color_sable]=="morado"){$txtc="#c402c4";}
	elseif($u[color_sable]=="verde"){$txtc="#00ff00";}
	else {$txtc="#ffffff";}
	$u[txtc]=$txtc;
	return $u;
}

#<!-- Variables Generales -->
$us = textcolor($_SESSION[nombre]);
$fe = sel("sw_info", "id", "dia");
$pl = sel("sw_plan", "nombre", $us[planeta]);
$ci = sel("sw_city", "nombre", $us[ciudad]);
$cl = sel("sw_clan", "nombre", $us[clan]);
$hoy=sel("sw_board_noticias", "tipo", "ULTIMA NOTICIA");


#<!-- RECALCULAR ENERGIA EXTRA -->
switch ($us[nv_sable]){
case "0":
	 $to=200;
break;

case "1":
	 $to=300;
break;

case "2":
	 $to=400;
break;

case "3":
	 $to=500;
break;

case "4":
	 $to=600;
break;
}

$to += $us[extrae];


#<!-- RECALCULAR CLAN -->
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

#<!--RECALCULAR NIVEL:-->

if ($us[nv_sable]==1 && $us[pk]>=10){$us[nv_sable]=2;}
if ($us[nv_sable]==2 && $us[merito]>=1000){$us[vigor]+=10; $us[nv_sable]=3;}
if ($us[nv_sable]==3 && $us[vigor]>99 && $us[inteligencia]>99 && $us[constitucion]>99 && $us[destreza]>99 && $us[poder]>99 && $us[hp]>1999){$us[nv_sable]=4;}
$c="UPDATE `sw_users` SET nv_sable='$us[nv_sable]', vigor='$us[vigor]' WHERE nombre='$us[nombre]'"; $result=mysql_query($c)or die(mysql_error());



	  if ($us[nv_sable]==0){$c="UPDATE `sw_users` SET nivel='Usuario de la Fuerza', titulo='' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="USUARIO DE LA FUERZA: Estás en el nivel más básico, apenas sabes dominar la fuerza que fluye dentro de tí. Pero no te preocupes, pronto podrás ingresar de una academia, en la cual podrás aprender a controlar tu poder y convertirte en un poderoso guerrero. (Mientras seas Usuario no podrás atacar ni ser atacado por otros jugadores.";}

      if ($us[nv_sable]==1 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Padawan Jedi', titulo='Padawan' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="PADAWAN JEDI: Tu camino en la fuerza ha comenzado, estás en el lado de la luz, pero nada es irreversible, puedes cambiar de bando en cualquier momento, así que cuida tus actos. Ascenderás de nivel cuando derrotes a 10 enemigos. (Deberás empezar a buscar un clan.)";}
   	  if ($us[nv_sable]==1 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Aprendiz Sith', titulo='Aprendiz' WHERE nombre='$us[nombre]'"; $result=mysql_query($c)or die(mysql_error()); $nvdesc="APRENDIZ SITH: Tu camino en la fuerza ha comenzado, estás en el lado Oscuro, pero nada es irreversible, puedes cambiar de bando en cualquier momento, así que cuida tus actos. Ascenderás de nivel cuando derrotes a 10 enemigos. (Deberás empezar a buscar un clan.)";}

if ($us[sexo]=="H"){
   	  if ($us[nv_sable]==2 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Caballero Jedi', titulo='Caballero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="CABALLERO JEDI: Tu tiempo ha llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás hecho!";}
   	  if ($us[nv_sable]==2 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Guerrero Sith', titulo='Guerrero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GUERRERO SITH: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
}else{
	  if ($us[nv_sable]==2 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Caballero Jedi', titulo='Caballero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="CABALLERO JEDI: Tu tiempo ha llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás hecho!";}
	  if ($us[nv_sable]==2 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Guerrera Sith', titulo='Guerrera' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GUERRERA SITH: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
}

if ($us[sexo]=="H"){
	  if ($us[nv_sable]==3 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Maestro Jedi', titulo='Maestro' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="MAESTRO JEDI: has alcanzado el auge del camino de la luz, tu deber ahora es enseñarles a todos tu poder.";}
	  if ($us[nv_sable]==3 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Lord Sith', titulo='Lord' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="LORD SITH: has alcanzado el auge del Lado Oscuro, tu deber ahora es enseñarles a todos tu poder.";}
}else{
	  if ($us[nv_sable]==3 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Maestra Jedi', titulo='Maestra' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="MAESTRA JEDI: has alcanzado el auge del camino de la luz, tu deber ahora es enseñarles a todos tu poder.";}
	  if ($us[nv_sable]==3 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Lady Sith', titulo='Lady' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="LADY SITH: has alcanzado el auge del Lado Oscuro, tu deber ahora es enseñarles a todos tu poder.";}
}

if ($us[sexo]=="H"){
	  if ($us[nv_sable]==4 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Gran Maestro Jedi', titulo='Gran Maestro' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GRAN MAESTRO JEDI: La fuerza, la orden Jedi, los sables y el destino ya no tienen secretos para tí. Aunque la fuerza enseña que siempre queda algo por aprender, quien sabe...";}
	  if ($us[nv_sable]==4 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Gran Lord Sith', titulo='Gran Lord' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GRAN LORD SITH: La fuerza, las fuerzas sith, los sables y el destino ya no tienen secretos para tí. Aunque la fuerza enseña que siempre queda algo por aprender, quien sabe...";}
}else{
	  if ($us[nv_sable]==4 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Gran Maestra Jedi', titulo='Gran Maestra' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GRAN MAESTRA JEDI: La fuerza, la orden Jedi, los sables y el destino ya no tienen secretos para tí. Aunque la fuerza enseña que siempre queda algo por aprender, quien sabe...";}
	  if ($us[nv_sable]==4 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Gran Lady Sith', titulo='Gran Lady' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GRAN LADY SITH: La fuerza, la fuerzas sith, los sables y el destino ya no tienen secretos para tí. Aunque la fuerza enseña que siempre queda algo por aprender, quien sabe...";}
}


#<!--Recalcular Puntaje de Clan: -->

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


#<!--Recalcular Valores erroneos -->
if ($us[hp]>$us[maxhp]){$us[hp]=$us[maxhp];}
if ($us[hp]<0){$us[hp]=0;}
if ($us[creditos]<0){$us[creditos]=0;}
if ($us[merito]<0){$us[merito]=0;}
if ($us[lado]>200){$us[lado]=200;}
if ($us[lado]<-200){$us[lado]=-200;}


#<!--DESCLANADOS-->
if ($us[clan]==""){
   if ($us[cvoto]!=""){ 
   	  mysql_query("UPDATE sw_users SET cvoto='' WHERE nombre='$us[nombre]'")or die(mysql_error());
   } 
}


#<!-- TRAER VEHICULOS -->
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador'";
$result=mysql_query($c)or die(mysql_error());
while($v=mysql_fetch_array($result)){
	$c= "UPDATE sw_vehiculo SET ciudad='$ci[nombre]', planeta='$us[planeta]' WHERE prop='$us[nombre]'";
	$res=mysql_query($c);
}

#<!-- PREFIX PARA LIDER -->

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
