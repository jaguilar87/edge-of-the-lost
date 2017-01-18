<?php session_start();
include '../db.php';
include '../diccionario/admin.dic';
if($_POST[login]){
	$_SESSION[tlwMail]=$_POST[mail];
	$_SESSION[tlwPass]=$_POST[pass];
}	

$c= "SELECT * FROM `tlwUsers` WHERE mail='$_SESSION[tlwMail]' AND pass='$_SESSION[tlwPass]'";
$result = mysql_query($c)or die(mysql_error());
$us = mysql_fetch_array($result);

echo "SISTEMA DE ADMINISTRACIÓN DE THE LOST WARRIORS<br><br>Bienvenido $us[nombre]. Tu nivel Actual de administrador es <b>$dic{$us[cuenta]}</b>. Tus opciones como Admin son:<br>";

if ($us[cuenta]==0){
	 echo "NO TIENES NIVEL DE ADMINISTRADOR! FUERA!";?>
	 <form action="index.php" method="post"> <table>      <tr>        <td width="50%">           Nombre:        </td>        <td width="50%">           <input name="name" value type="text" size="19"> 			 </td>      </tr>      <tr>        <td width="50%">           Password: 			 </td>        <td width="50%">           <input name="pass" value type="password" size="19"> 			 </td>       </tr> </table> <input name="login" type="submit" value="Login"></form>
<?}else{

$j=1;

while ($j<=$us[admin]){
	  include "$j/index.php";
	  $j++;
}






}
?>