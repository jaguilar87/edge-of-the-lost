<?php 
$dbhost = "localhost"; //ESCRIBE AQUI LA IP DEL HOST (NORMALMENTE LOCALHOST)
$dbuname = "warjagv_user"; //ESCRIBA EL NOMBRE DEL USUARIO
$dbpass = "nova00"; //ESCRIBA EL PASSWORD DEL USUARIO
$dbname = "warjagv_sweotlw"; //ESCRIBA EL NOMBRE DE LA TABLA 
$dbi = mysql_connect($dbhost, $dbuname, $dbpass, $dbname);
mysql_select_db($dbname, $dbi);
?>