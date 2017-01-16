<?php 
$dbhost = "localhost";
$dbuname = "NOMBRE_USER_BD";
$dbpass = "PASSWORD_BD";
$dbname = "NOMBRE_BD";
$dbi = mysql_connect($dbhost, $dbuname, $dbpass, $dbname);
mysql_select_db($dbname, $dbi);
?>
