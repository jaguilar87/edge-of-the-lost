<?php include 'header.php';
switch ($_POST[pass]){
case $_SESSION[password]:

$sql = "DELETE FROM sw_users WHERE nombre='$_SESSION[nombre]' AND password='$_SESSION[password]'"; 
$result = mysql_query($sql);

echo '<script> location.href="muerto.php" </script>';

break;
case "": 
echo '�Seguro que deseas suicidarte? si lo haces tu ficha se perder� para siempre.<br><br><form action="suicidio.php" METHOD="POST">Escribe tu password para suicidarte: <input name="pass" type="password" value=""> <input type="submit" value="Suicidio"></form>';



break;

default: 
echo "Contrase�a incorrecta";

break;
}
include 'footer.php';?>