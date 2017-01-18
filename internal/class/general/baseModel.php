<?
abstract class BaseModel {
	static protected $tableName = "";
	public $datos = array();
	public $metadatos = array();

	function __construct($where = false){
		if ($where == false){
			$sql = DB::query("SELECT * FROM `".$this->tableName."` LIMIT 0,1");
			$this->datos = DB::fetch($sql);
			$this->strip();
		}elseif (is_array($where)){
			$i = 1;
			foreach ($where as $key => $value){
				$sql .= "`$key` = '$value'";
				if ($i != count ($where)) $sql .= " AND ";
				$i++;
			}
			$this->datos = DB::fetch(DB::query("SELECT * FROM $this->tableName WHERE ".$sql));
		}else{
			$sql = DB::query("SELECT * FROM `".$this->tableName."` WHERE " . $where);
			$this->datos = DB::fetch($sql);
		}
	}

	function strip($with = null){
		if (is_array($this->datos) > 0){
			foreach($this->datos as $k => $v){
				$this->datos[$k] = $with;
			}
		}else{
			//user_error("Se ha intentado definir un modelo de una tabla inexistente o vacía", E_USER_WARNING);
		}
	}

	function delete(){
		DB::delete($this->tableName, "id", $this->datos[id]);
	}

	function update(){
		DB::update($this->tableName, "id", $this->datos[id], $this->datos);
		//var_dump($this->tableName, "id", $this->datos[id], $this->datos);
	}

	function insert(){
		$tmp = $this->datos[id];
		$this->datos[id] = "";
		DB::insert($this->tableName, $this->datos);
		$this->datos[id] = $tmp;
	}
	
	function insertInto($table){
		$tmp = $this->datos[id];
		$this->datos[id] = "";
		DB::insert($table, $this->datos);
		$this->datos[id] = $tmp;	
	}

	function hasOne($key, $object, $campo = "id"){
		if ($this->datos[$key] != 0){
			$this->metadatos[$key] = new $object( array($campo => $this->datos[$key]));
		}else{
			$this->metadatos[$key] = new $object(false);
		}
	}

	function hasMany($key, $object, $campo = "id", $separator = ","){
		$line = explode ($separator, $this->datos[$key]);
		foreach ($line as $id){
			$this->metadatos[$key][] = new $object( array($campo => $id));
		}
	}

	function tour($where = false, $select = "*"){
		$sql = "SELECT ".$select." FROM ".$this->tableName;
		if ($where) $sql .= " WHERE ".$where;
		return DB::query($sql);
	}
}
?>