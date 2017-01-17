<?php
if ($id) {
    include_once "$id".".php";
} else { #default
     include_once "info.php";
}
