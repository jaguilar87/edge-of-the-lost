<?php include 'header.php';
switch ($_GET[ac]){
case "nombre":

$com=sel("sw_users", "", "$_GET[nombre]");

if ($com[nombre]==$_GET[nombre]){
   echo "Ese nombre ya existe, elija otro";
}else{
   
$c="UPDATE `sw_users` SET nombre='$_GET[nombre]' WHERE nombre='$us[nombre]'";
$result=mysql_query($c)or die(mysql_error());

session_unset();
session_destroy();

echo 'Rebautizado!<br>Debes volver a loguearte... <a href="http://swedges.tk">Reloguear</a> <META HTTP-EQUIV="Refresh" CONTENT="1;URL=http://swedges.tk">';
}




break;
case "contra":
if ($_GET[co]==$_GET[cor]){

$c="UPDATE `sw_users` SET password='$_GET[co]' WHERE nombre='$_SESSION[nombre]'";
$result=mysql_query($c)or die(mysql_error());

$_SESSION[password]==$_GET[co];

echo 'Contraseña Cambiada, si el juego da error trata de reloguear: <a href="http://swedges.tk">htt://swedges.tk</a>';


}else{Echo "Las contraseñas no coinciden";}
break;

default:

echo "Si deseas relizar algunos cambios en tu ficha, este es el momento:<br><br>";
echo '<form action="fconfig.php"><center><b>Rebautizar:</b> <input name="ac" type="hidden" value="nombre"><input name="nombre" type="text" value=""> <input type="submit" value="Rebautizar"></center></form>
<center>
<form action="fconfig.php" METHOD="GET">
<table>
<tr>
       <td><div align="right"><b>Cambiar Contraseña:</b></div></td>
       <td><input name="co" type="password" value=""></td>
</tr>
<tr>
       <td><div align="right"><b>Repetir Contraseña:</b></td>
       <td><input name="cor" type="password" value=""></td>
</tr>
</table>
<input name="ac" type="hidden" value="contra">
<br><input type="submit" Value ="Cambiar Contraseña"></center>
<br>
<br>
</form>
<a href="fsuicidio.php">Suicidarse (Borrar Ficha)</a>


';



break;

}
include 'footer.php';?>
