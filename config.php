<?php include 'header.php';
switch ($_GET[ac]){
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
echo '<form action="config.php" METHOD="GET">
Cambiar Contraseña: <input name="co" type="password" value=""><br>Repetir Contraseña: <input name="cor" type="password" value=""><input name="ac" type="hidden" value="contra">
<br><input type="submit" Value ="Cambiar Contraseña">
<br>
<br>
</form>
<a href="suicidio.php">Suicidarse (Borrar Ficha)</a>


';



break;

}
include 'footer.php';?>
