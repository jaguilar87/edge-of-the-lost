<?
	class Controllers {
		
		function load($requested_module = "start", $strict = false){
			if ($requested_module == "" OR $requested_module == null) $requested_module = "start"; //comprobar valor inicial
			$path = RAG_SECTION."/controllers/".$requested_module.".php";
			
			if (!is_file($path)){
				if ($strict)Views::$notFound = true;
				return RAG_SECTION."/index.php";
			}else{
				return $path;
			}	
		}
	}
?>