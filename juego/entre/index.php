<?php
if ($_GET[id]) {
    include_once $_GET[id].".php";
} else {
    include_once "entre.php";
}
