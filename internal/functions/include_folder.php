<?php
function includeFolder($folder){
	if (is_dir($folder)){
		#Incluir todas las funciones de '$folder'
		$handle= opendir($folder);
		while (false != ($file = readdir($handle))){
			if (strstr($file, ".") == $file ){
				include_once "$folder/$file";
			}
		}
		closedir($handle);
	}else{
		user_error("La carpeta <b>$folder</b> no existe para includeFolder()", E_USER_WARNING);
	}
}

function requireFolder($folder){
	if (is_dir($folder)){
		#Incluir todas las funciones de '$folder'
		$handle= opendir($folder);
		while (false != ($file = readdir($handle))){
			if (strstr($file, ".") != $file){
				require_once "$folder/$file";
			}
		}
		closedir($handle);
	}else{
		user_error("La carpeta <b>$folder</b> no existe para requireFolder()", E_USER_WARNING);
	}
}
?>
