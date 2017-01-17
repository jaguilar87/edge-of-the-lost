<?php 
session_start();
include 'db.php';

$c= "SELECT * FROM `sw_users` WHERE nombre='$_SESSION[nombre]' AND password='$_SESSION[password]'";
$result = mysql_query($c)or die(mysql_error());
$us = mysql_fetch_array($result);

if ($us[admin]<$_GET[nv]) {
    echo "$_SESSION[nombre] no tienes suficiente nivel para aceder a eso";
} else {
    include "$_GET[nv]/$_GET[tip]";
}




echo '<br><br><a href="index.php">Volver al Indice de Admin</a>';
