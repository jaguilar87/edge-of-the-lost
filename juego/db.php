<?php
$dbhost = "localhost";
$dbuname = "root";
$dbpass = "";
$dbname = "swedge";
$dbi = mysql_connect($dbhost, $dbuname, $dbpass, $dbname);
mysql_select_db($dbname, $dbi);
