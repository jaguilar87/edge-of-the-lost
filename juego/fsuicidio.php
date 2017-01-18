<?php include 'header.php';
switch ($_POST[pass]){
case $_SESSION[password]:

mysql_query("INSERT INTO sw_control_muerte (dia, nombre, mail, password) VALUES ($fe[val], '$us[nombre]', '$us[mail]', '$us[password]')")or die(mysql_error());


$sql = "DELETE FROM sw_users WHERE nombre='$_SESSION[nombre]' AND password='$_SESSION[password]'"; 
$result = mysql_query($sql);

echo '<script> location.href="muerto.php" </script>';

break;
case "": 
echo '¿Seguro que deseas suicidarte? si lo haces tu ficha se perderá para siempre.<br><br><form action="fsuicidio.php" METHOD="POST">Escribe tu password para suicidarte: <input name="pass" type="password" value=""> <input type="submit" value="Suicidio"></form>';



break;

default: 
echo "Contraseña incorrecta";

break;
}
include 'footer.php';?>
