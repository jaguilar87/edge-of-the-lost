<?php 

#Hacer include de todos los archivos en 'style/'
$handle = opendir('header/style/');
   while (false !== ($file = readdir($handle))) {
       if ($file != "." && $file != "..") {
           include_once "style/$file";
       }
   }
closedir($handle);
