<?php 
$dbhost = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "swedges";
$dbi = mysql_connect($dbhost, $dbuname, $dbpass, $dbname);
mysql_select_db($dbname, $dbi);
?>
