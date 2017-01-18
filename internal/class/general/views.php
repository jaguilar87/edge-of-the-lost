<?
class Views {
	public static $notFound = false;
	public static $forcedView = null;
	public static $msg = array(false, "", "");

	public function load($requested_view = "start"){
		if ($requested_view == "" OR $requested_view == null) $requested_view = "start"; //comprobar valor inicial
		if (self::$forcedView != null) $requested_view = self::$forcedView;

		$path = RAG_SECTION."/views/".$requested_view.".php";

		return self::fileExists($path);
	}

	protected function fileExists($path){
		if (self::$msg[0]){
			
			if (self::$msg[2] != "") {
				echo "<big><big><b>".self::$msg[2]."</big></big></b><br/><br/>";
			}
			echo self::$msg[1];

			return RAG_SECTION."/index.php";
		
		}else if (!is_file($path) OR self::$notFound){

			return RAG_SECTION."/views/error/404.php";
			
		}else{
			
			return $path;
			
		}
	}

	//Gestión de mensajes
	function message($txt, $title = ""){
		self::$msg[0] = true;
		self::$msg[1] .= $txt;
		self::$msg[2] = $title;
	}

	function addToMessage($txt, $subs = false){
		if ($subs){
			self::$msg[1] = $txt;
		}else{
			self::$msg[1] .= $txt;
		}
	}

	function printMessage(){
		return self::$msg[1];
	}

}
?>