<?php 
$dbhost = ""; //ESCRIBE AQUI LA IP DEL HOST (NORMALMENTE LOCALHOST)
$dbuname = ""; //ESCRIBA EL NOMBRE DEL USUARIO
$dbpass = ""; //ESCRIBA EL PASSWORD DEL USUARIO
$dbname = ""; //ESCRIBA EL NOMBRE DE LA TABLA 
$dbi = mysql_connect($dbhost, $dbuname, $dbpass, $dbname);
mysql_select_db($dbname, $dbi);
?>
