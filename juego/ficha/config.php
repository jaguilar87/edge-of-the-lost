<?php include_once 'header.php';
switch ($_GET[ac]) {

case "nombre":

$com=sel("sw_users", "", "$_GET[nombre]");

if ($com[nombre]==$_GET[nombre]) {
    echo "Ese nombre ya existe, elija otro";
} else {
    $c="UPDATE `sw_users` SET nombre='$_GET[nombre]' WHERE nombre='$us[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    $c="UPDATE `sw_clan` SET lider='$_GET[nombre]' WHERE lider='$us[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    $c="UPDATE `sw_city` SET rey='$_GET[nombre]' WHERE rey='$us[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    $c="UPDATE `sw_vehiculos` SET prop='$_GET[nombre]' WHERE prop='$us[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    $c="UPDATE `sw_users` SET cvoto='$_GET[nombre]' WHERE cvoto='$us[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    session_unset();
    session_destroy();

    echo 'Rebautizado!<br>Debes volver a loguearte... <a href="/">Reloguear</a> <META HTTP-EQUIV="Refresh" CONTENT="1;URL=/">';
}

break;
case "contra":
if ($_GET[co]==$_GET[cor]) {
    $c="UPDATE `sw_users` SET password='$_GET[co]' WHERE nombre='$_SESSION[nombre]'";
    $result=mysql_query($c)or die(mysql_error());

    $_SESSION[password]==$_GET[co];

    echo 'Contrase&ntilde;a Cambiada, si el juego da error trata de <a href="/">reloguear</a>.';
} else {
    echo "Las contrase&ntilde;as no coinciden";
}
break;

default:

echo "Si deseas relizar algunos cambios en tu ficha, este es el momento:<br><br>";
echo '<form action="ficha/config.php"><center><b>Rebautizar:</b> <input name="ac" type="hidden" value="nombre"><input name="nombre" type="text" value=""> <input type="submit" value="Rebautizar"></center></form>
<center>
<form action="ficha/config.php" METHOD="GET">
<table>
<tr>
       <td><div align="right"><b>Cambiar Contrase&ntilde;a:</b></div></td>
       <td><input name="co" type="password" value=""></td>
</tr>
<tr>
       <td><div align="right"><b>Repetir Contrase&ntilde;a:</b></td>
       <td><input name="cor" type="password" value=""></td>
</tr>
</table>
<input name="ac" type="hidden" value="contra">
<br><input type="submit" Value ="Cambiar Contrase&ntilde;a"></center>
<br>
<br>
</form>
<a href="ficha/suicidio.php">Suicidarse (Borrar Ficha)</a>


';



break;

}
include_once 'footer.php';
