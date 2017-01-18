<?
	//En este archivo se definen las constantes globales más recurrentes
	//Por convencion, en RagnaJAG, las constantes estarán siempre en mayúsculas
	
	define('RAG_VER', '1.0');
	define('POWERED_BY', 'Powered By: <a href="http://ragnajag.sourceforge.net" target="_BLANK">RagnaJAG ®</a>');
	
	//Las constantes de path, por defecto empezarán por URL_
	define('URL_IMG', "../images/");
	define('URL_MODEL', "../model/");
	
	define ("BR", "<br/>");
	
	//Los modos
	define('MVC_STANDARD', 'STANDARD');
	define('PV_TEMPLATES', 'PV_TEMPLATES'); //BETA
	define('MVC_AJAX', 'MVC_AJAX'); //BETA
	
	define('SECOND', 1);
	define('MINUTE', 60 * SECOND);
	define('HOUR', 60 * MINUTE);
	define('DAY', 24 * HOUR);
	define('WEEK', 7 * DAY);
	define('MONTH', 30 * DAY);
	define('YEAR', 365 * DAY);
	
	if (date("G") > 8 AND date("G") < 20){
		define ("DIA", true);
	}else{
		define ("DIA", false);
	}
	
	//DEFINIR IMAGENES EN CONSTANTES
	$dire = "images/icon/";
	$handle= opendir($dire);
	while (false != ($file = readdir($handle))){
		if ( $file!="." AND $file!=".." AND is_file($dire.$file) ){
			$image = explode (".", $file);
			define ("I_".$image[0], "<img border=0 src='../images/icon/".$file."' alt='".$image[0]."'>" );
		}
	}
	closedir($handle);
?>