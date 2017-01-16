<?php

#Hacer include de todos los archivos en 'up/'
$handle = opendir('header/up/');
   while (false !== ($file = readdir($handle))) {
       if ($file != "." && $file != "..") {
       		include_once "up/$file";
       }
   }
closedir($handle); 




?>
