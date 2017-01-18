<?
class Server{
	static protected $info = array();
	
	function load() {
		$sql = DB::query ("SELECT * FROM info");
		while($r = DB::fetch($sql)) {
			self::$info[$r{id}] = $r[val];
		}
	}
	
	function info($key) {
		return self::$info[$key];
	}
		
	function estado() {
		switch($this->info[estado]) {
			case "1": //normal
				return "<p style='color: green;'>Abierto</p>";
			break;
			case "0": //cerrado
				return "<p style='color: red;'>Cerrado</p>";
			break;
			case "2": //pruebas (alias: Wizlock)
				return "<p style='color: yellow;'>En pruebas</p>";
			break;
		}
	}
}
?>