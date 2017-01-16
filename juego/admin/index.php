<?php session_start();
include 'db.php';
if($_POST[login]){
	$_SESSION[nombre]=$_POST[name];
	$_SESSION[password]=$_POST[pass];
}	

$c= "SELECT * FROM `sw_users` WHERE nombre='$_SESSION[nombre]' AND password='$_SESSION[password]'";
$result = mysql_query($c)or die(mysql_error());
$us = mysql_fetch_array($result);

echo "SISTEMA DE ADMINISTRACI�N DE SW-EOTLW<br><br>Bienvenido $_SESSION[nombre]. Tu nivel Actual de administrador es <b>$us[admin]</b>. Tus opciones como Admin son:<br>";

if ($us[admin]==""){
echo "NO TIENES NIVEL DE ADMINISTRADOR! FUERA!";?>
<form action="index.php" method="post"> <table>      <tr>        <td width="50%">           Nombre:        </td>        <td width="50%">           <input name="name" value type="text" size="19"> 			 </td>      </tr>      <tr>        <td width="50%">           Password: 			 </td>        <td width="50%">           <input name="pass" value type="password" size="19"> 			 </td>       </tr> </table> <input name="login" type="submit" value="Login"></form>
<?php}else{

$j=1;

while ($j<=$us[admin]){
	  include "$j/index.php";
	  $j++;
}






}
?>
