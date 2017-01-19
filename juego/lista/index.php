<?php
if ($_GET[id]) {
    include_once $_GET[id].".php";
} else { #default
     include_once "jugadores.php";
}
