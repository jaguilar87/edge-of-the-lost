<body bgcolor="#000000" text="#FFFFFF" link="#FFFFCC" vlink="#FFFFCC" alink="#FFFF99">
<?php session_start();
include 'var.php';

if ($_POST[name]=="" || $_POST[pass]==""){echo 'Debe rellenar el nombre y la contraseña';}else{

	$result = mysql_query("SELECT * FROM `sw_users` WHERE nombre='$_POST[name]'"); 
	$row = mysql_fetch_array($result);


	if ($_POST[pass]!=$row[password]){ echo 'Password incorrecto...';}else{
	   
   			$_SESSION[nombre] = $_POST[name];
			$_SESSION[password] = $_POST[pass];		
		
		if ($row[reg]=="N"){echo 'La cuenta no ha sido confirmada...';}else{
		
		   if ($row[at]==1){echo 'Has sido Baneado del juego, ¿Creias que te podias escapar turbio?';}else{

		echo "Entrando en la web, si no se carga seguramente es por que tu Explorador no soporta las SESSIONS, prueba a configurarlo debidamente <a href=\"http://Mozilla.org\">(O bajate el Explorador Mozilla Firefox)</a> <script> location.href='ficha.php'</script>";




}}}}
;?>
