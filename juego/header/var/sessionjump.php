<?php
#Saltar en fallos de Sesion

if ($_SESSION[nombre]=="") {
    echo "<script> location.href='/' </script>";
}
