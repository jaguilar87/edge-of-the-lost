<?php
include 'db.php';


$c= "SELECT * FROM `sw_users` WHERE nombre='$_SESSION[nombre]' AND password='$_SESSION[password]'";
$result = mysql_query($c)or die(mysql_error());
$us = mysql_fetch_array($result);

	if ($us[color_sable]=="rojo"){$us[txtc]="#ff0000";}
	elseif($us[color_sable]=="amarillo"){$us[txtc]="#ffff80";}
	elseif($us[color_sable]=="naranja"){$us[txtc]="#fe9f41";}
	elseif($us[color_sable]=="azul"){$us[txtc]="#a6ebff";}
	elseif($us[color_sable]=="morado"){$us[txtc]="#c402c4";}
	elseif($us[color_sable]=="verde"){$us[txtc]="#00ff00";}
	else {$txtc="#ffffff";}
	

$c="select * FROM `sw_fecha` WHERE id='1'";
$result=mysql_query($c)or die(mysql_error());
$fe=mysql_fetch_array($result);


$c="SELECT * FROM sw_plan WHERE posx='$us[plax]' AND posy='$us[play]'";
$result=mysql_query($c)or die(mysql_error());
$pl=mysql_fetch_array($result);

$c="SELECT * FROM sw_city WHERE nombre='$us[ciudad]' AND esx='$us[plax]' AND esy='$us[play]' ";
$result=mysql_query($c)or die(mysql_error());
$ci=mysql_fetch_array($result);


$c= "SELECT * FROM `sw_clan` WHERE nombre='$us[clan]'";
$result = mysql_query($c)or die(mysql_error());
$cl = mysql_fetch_array($result);


function textcolor($user){
		 
	$c= "SELECT * FROM `sw_users` WHERE nombre='$user'";
	$result=mysql_query($c)or die(mysql_error());
    $u=mysql_fetch_array($result);
		 
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


function fplanetar($planeta){
$c="SELECT * FROM sw_plan WHERE nombre='$planeta'";
$result=mysql_query($c)or die(mysql_error());
$plp=mysql_fetch_array($result);
   return $plp;
}

#<!-- RECALCULAR ENERGIA EXTRA -->
if ($us[nv_sable] ==0){$to=200;}elseif($us[nv_sable]==1){$to=350;}elseif($us[nv_sable]==2){$to=500;}elseif($us[nv_sable]==3){$to=750;}
$to += $us[extrae];

#<!-- RECALCULAR CLAN -->
if ($us[lado]<0 && $cl[hermandad]=="Jedi") {
    
	$d = "INSERT INTO sw_clanboard (poster, clan, dia, mess) VALUES ('INFORMACION', '$us[clan]', '$fe[dia]', '$us[nombre] ha sido expulsado del clan por pasar al lado oscuro.')";  
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

	$d = "INSERT INTO sw_log (tipo, log, ref, dia) VALUES ('2', 'Expulsado del Clan por pasar al Lado Oscuro', '$us[nombre]', '$us[dia]')";  
	$result = mysql_query($d);


}

#<!--RECALCULAR NIVEL:-->

if ($us[nv_sable]==1 && $us[pk]>=10){$c="UPDATE `sw_users` SET nv_sable='2' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error());}
if ($us[nv_sable]==2 && $us[merito]>=1000){$us[vigor]+10; $c="UPDATE `sw_users` SET nv_sable='3', vigor='$us[vigor]' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error());}


if ($us[nv_sable]==0){$c="UPDATE `sw_users` SET nivel='Usuario de la Fuerza', titulo='' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="USUARIO DE LA FUERZA: Estás en el nivel más básico, apenas sabes dominar la fuerza que fluye dentro de tí. Pero no te preocupes, pronto podrás ingresar de una academia, en la cual podrás aprender a controlar tu poder y convertirte en un poderoso guerrero. (Mientras seas Usuario no podrás atacar ni ser atacado por otros jugadores.";}

   if ($us[nv_sable]==1 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Padawan Jedi', titulo='Padawan' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="PADAWAN JEDI: Tu camino en la fuerza ha comenzado, estás en el lado de la luz, pero nada es irreversible, puedes cambiar de bando en cualquier momento, así que cuida tus actos. Ascenderás de nivel cuando derrotes a 10 enemigos. (Deberás empezar a buscar un clan.)";}
   if ($us[nv_sable]==1 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Aprendiz Sith', titulo='Aprendiz' WHERE nombre='$us[nombre]'"; $result=mysql_query($c)or die(mysql_error()); $nvdesc="APRENDIZ SITH: Tu camino en la fuerza ha comenzado, estás en el lado Oscuro, pero nada es irreversible, puedes cambiar de bando en cualquier momento, así que cuida tus actos. Ascenderás de nivel cuando derrotes a 10 enemigos. (Deberás empezar a buscar un clan.)";}

if ($us[sexo]=="H"){
   if ($us[nv_sable]==2 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Caballero Jedi', titulo='Caballero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="CABALLERO JEDI: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
   if ($us[nv_sable]==2 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Guerrero Sith', titulo='Guerrero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GUERRERO SITH: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
}else{
	  if ($us[nv_sable]==2 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Caballero Jedi', titulo='Caballero' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="CABALLERO JEDI: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
	  if ($us[nv_sable]==2 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Guerrera Sith', titulo='Guerrera' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="GUERRERA SITH: Tu tiempo a llegado, has dejado atrás la Academia para enfrentarte al mundo, sal ahí fuera y demuestrales de que estás echo!";}
}

if ($us[sexo]=="H"){
	  if ($us[nv_sable]==3 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Maestro Jedi', titulo='Maestro' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="MAESTRO JEDI: has alcanzado el auge del camino de la luz, tu deber ahora es enseñarles a todos tu poder.";}
	  if ($us[nv_sable]==3 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Lord Sith', titulo='Lord' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="LORD SITH: has alcanzado el auge del Lado Oscuro, tu deber ahora es enseñarles a todos tu poder.";}
}else{
	  if ($us[nv_sable]==3 && $us[lado]>=0){$c="UPDATE `sw_users` SET nivel='Maestra Jedi', titulo='Maestra' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="MAESTRA JEDI: has alcanzado el auge del camino de la luz, tu deber ahora es enseñarles a todos tu poder.";}
	  if ($us[nv_sable]==3 && $us[lado]<0){$c="UPDATE `sw_users` SET nivel='Lady Sith', titulo='Lady' WHERE nombre='$us[nombre]'";	$result=mysql_query($c)or die(mysql_error()); $nvdesc="LADY SITH: has alcanzado el auge del Lado Oscuro, tu deber ahora es enseñarles a todos tu poder.";}
}

#<!--Recalcular Puntaje de Clan: -->

if ($us[clan]!=""){
$c= "SELECT * FROM `sw_users` WHERE clan='$us[clan]' AND nv_sable>'0'";
$result = mysql_query($c)or die(mysql_error());
$punt=0;
$i=0;
while ($p = mysql_fetch_array($result)){
$punt += $p[merito];
$i++;
}
if ($i==0){$meritot=0;}else{$meritot=$punt/$i;}

$c= "SELECT * FROM `sw_vehiculos` WHERE tprop='Clan' AND prop='$us[clan]'";
$result = mysql_query($c)or die(mysql_error());
while ($p = mysql_fetch_array($result)){
if ($p[tipo]=="Deslizador"){$meritot += 25;}elseif($p[tipo]=="Transporte Ligero"){$meritot += 75;}else{$meritot +=150;}
}

$c="UPDATE `sw_clan` SET puntos='$meritot' WHERE nombre='$cl[nombre]'";	
$result=mysql_query($c)or die(mysql_error());
}


#<!--Recalcular Valores erroneos -->
if ($us[hp]>$us[maxhp]){$us[hp]=$us[maxhp];}
if ($us[hp]<0){$us[hp]=0;}
if ($us[creditos]<0){$us[creditos]=0;}


#<!-- NOTICIA DEL DIA -->
$c="SELECT * FROM sw_noticias WHERE id='1'";
$result=mysql_query($c)or die(mysql_error());
$hoy=mysql_fetch_array($result);

#<!-- RECALCULAR LADO -->
if ($us[lado]>200){$us[lado]=200;}elseif($us[lado]<-200){$us[lado]=-200;}

#<!-- TRAER VEHICULOS -->
$c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador'";
$result=mysql_query($c)or die(mysql_error());
while($v=mysql_fetch_array($result)){
$c= "UPDATE sw_vehiculo SET ciudad='$ci[nombre]', x='$pl[posx]', y='$pl[posy]' WHERE prop='$us[nombre]'";
$res=mysql_query($c);
}


?>
