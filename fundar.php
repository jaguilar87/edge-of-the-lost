<?php include 'header.php';

if ($_GET[ac]=="ciudad"){
echo 'Fundar ciudad...(Precio: 500.000C) <form action="fundc.php" Method="GET">';

$c="SELECT * FROM sw_clan WHERE nombre='$_POST[nom]'";
$result=mysql_query($c)or die(mysql_error());
$un=mysql_fetch_array($result);


echo 'Localización Espacial(Planeta): (X=<input name="esx" type="text" value="0"  style="width:70px;">, Y=<input name="esy" type="text" value="0"  style="width:70px;">)<br>';
echo 'Nombre: <input name="nombre" type="text" value=""><input type="submit" Value="Fundar" Name="x"></form>';

echo '<br>Elegir planeta de destino: (Coloca el cursor sobre el planeta para ver coordenadas)</em>';
include 'mapa.php'; mapear("viaje.php");

}else{

echo 'Fundando el Clan....';
if ($us[creditos]>=10000){echo '<br>Realizando el Pagamento....'; 
if ($us[nv_sable]>1){echo '<br>Tramitando papeleo...'; 

$c="SELECT * FROM sw_clan WHERE nombre='$_POST[nom]'";
$result = mysql_query($c);
$un=mysql_fetch_array($result);

if ($un[nombre]==$_POST[nom]){echo "Ese clan ya existe";}else{



if ($us[nombre]==$cl[lider] && $cl[nombre]!=""){echo 'Eres el lider de un clan, primero debes disolver el clan.';}else{

$c= "INSERT INTO sw_clan (nombre, lider, hermandad) VALUES ('$_POST[nom]', '$us[nombre]', '$_POST[her]')"; 
$result= mysql_query($c); 
echo '<br>Tramites finalizados.';

if ($us[sexo]=="H"){
if ($_POST[her]=="Sith"){$prefix="Oscuro";}elseif($_POST[her]=="Jedi"){$prefix="Honorable";}else{$prefix="General";}
}else{
if ($_POST[her]=="Sith"){$prefix="Oscura";}elseif($_POST[her]=="Jedi"){$prefix="Honorable";}else{$prefix="General";}
}

$c= "UPDATE sw_users SET clan='$_POST[nom]', prefix ='$prefix' WHERE nombre='$us[nombre]'";
$res=mysql_query($c);


}}
}else{echo '<br><font color="#ee1200">No tienes suficiente nivel</font>';}
}else{ echo '<br><font color="#ee1200">Fondos insuficientes...</font>';}
}

include 'footer.php';?>
