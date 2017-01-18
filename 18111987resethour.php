<?php
include 'db.php';

$c="UPDATE `sw_users` SET dia='1', hora='00'";
$result=mysql_query($c)or die(mysql_error());

?>
