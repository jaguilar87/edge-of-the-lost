<?
	// conexion de base de datos
	class DB {
		
		public static $dbc = null;
		public static $lastQuery = null;
		private static $type = null;
		
		function connect(){
			//Esta funcion de conexion puede recibir un array con las keys "db_host", "db_user_name", "db_user_pwd", "db_name", "db_type"
			//O generarla al recibir multiples parámetros en ese orden.
			
			$names = array("db_host", "db_user_name", "db_user_pwd", "db_name", "db_type");
			if (func_num_args() < 2){
				if (!is_array(func_get_arg(0))){
					user_error("Se esperaba un array para DB::connection()", E_USER_ERROR);
				}else{
					$arr = func_get_arg(0);
					foreach ($names as $value){
						if (!array_key_exists($value, $arr)){
							$error = true;
						}
					}
					if ($error){
						user_error("Faltan uno o más parámetros en la array de conexion para DB::connection()", E_USER_ERROR);
					}
				}
			}elseif (func_num_args() == 0){
				
				$arr = array_combine($names, func_get_args());
				
			}else{
				user_error("Demasiados o falta de parámetros en DB::connection()", E_USER_ERROR);
			}
			
			if (isset($arr['db_type'])){
				self::$type = $arr['db_type'];
			}else{
				self::$type = "mysql"; //El tipo por defecto es 'mysql'
			}
			
			if (self::$type == "mysql"){	
				
				self::close(); //cerrar posible conexion anterior
				
				$dbi = mysql_connect($arr['db_host'], $arr['db_user_name'], $arr['db_user_pwd'], $arr['db_name']) 
					or user_error("Error conectando a la base de datos, vuelbe a intentarlo en unos minutos.\n<!--".mysql_error()."-->", E_USER_ERROR);
					
				mysql_select_db($arr['db_name'], $dbi);
				
				self::$dbc = $dbi;
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
			
		}
		
		function close(){
			if (self::$dbc != null){
				if (self::$type == "mysql"){				
					mysql_close(self::$dbc);
					self::$dbc = null;
				}else{
					user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
				}
			}
			
		}
		
		function errorSql($sql) {
			if (self::$type == "mysql"){
				$script = dirname($_SERVER['SCRIPT_FILENAME']).'/'.basename($_SERVER['SCRIPT_FILENAME']);
				$referer = $_SERVER['HTTP_REFERER'];
				
				user_error (
					"<br>
					<b>Error en la consulta SQL:</b> ".$sql."<br />
					<b>Descripci&oacute;n del error: ".mysql_error()."<br />
					<b>N&uacute;mero del error: ".mysql_errno()."</b><br />
					<b>Fecha</b> ".date("d/m/y H:i:s")."<br />
					<b>Script:</b> ".$script."<br />
					<b>Referer:</b> ".$referer."<br />"
					, E_USER_ERROR
				);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function query($sqla) {
			if (self::$type == "mysql"){
				// Metodo para lanzar querys
				$sqlb = mysql_query($sqla) or self::errorSql($sqla);
				
				self::$lastQuery = $sqlb;
				return $sqlb;
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
	
		function select($tabla, $campo, $valor) {
			if (self::$type == "mysql"){
				// Metodo de seleccion automatica de un valor por su campo
				$sqla = "SELECT * FROM `$tabla` WHERE `$campo`='$valor'";
				$sqlb = self::query($sqla) or self::errorSql($sqla);
				return self::fetch($sqlb);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function update($tabla, $campo, $valor, $array) {
			if (self::$type == "mysql"){
				$sql = "UPDATE `".$tabla."` SET ";
				$i = 1;
				$count = count($array);
				
				foreach($array as $key => $value) {
					$sql .= "`$key`='$value'";
					if ($i<$count) {
						$sql .= ", ";
					}
					$i++;			
				}
				
				$sql .= " WHERE `".$campo."` = '".$valor."'";
				
				self::query($sql);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function insert($tabla, $array) {
			if (self::$type == "mysql"){
				// Inserta una nueva entrada en una tabla ($tabla) cuyos campos 
				// corresponden con los keys de $array y los valores con los 
				// valores de $array en dichos campos
				$sql = "INSERT INTO `".$tabla."` (";
				$i = 1;
				$count = count ($array);
				
				foreach($array as $key => $value) {
					$sql .= "`".$key."`";
					if ($i<$count) {
						$sql .= ", ";
					}
					$i++;
				}
				
				$i = 1;
				$sql .= ") VALUES (";
			
				foreach($array as $key => $value) {
					$sql .= "'".$value."'";
					if ($i<$count) {
						$sql .= ", ";
					}
					$i++;
				}
				
				$sql .= ")";
				
				self::query($sql);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function delete($tabla, $campo, $valor) {
			if (self::$type == "mysql"){
				$sql = "DELETE FROM `".$tabla."` ";				
				$sql .= "WHERE `".$campo."`='".$valor."'";
				
				self::query($sql);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function fetch($result) {
			if (self::$type == "mysql"){
				return mysql_fetch_assoc($result);
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function rows($q = null){
			if (self::$type == "mysql"){
				if ($q == null) $q = self::$lastQuery;
				
				if (is_string($q)){
					return mysql_num_rows($q);
				}else{
					return mysql_affected_rows();
				}
			}else{
				user_error("El tipo de base de datos '".self::$type."' es incorrecto o no está soportado por RagnaJAG ".RAG_VER."", E_USER_ERROR);
			}
		}
		
		function setType ($type){
			if (strstr($type, "mysql") !== false){
				self::$type = "mysql";
			}else{
				user_error("No se ha reconocido el tipo de base de datos <b>".$type."</b>", E_USER_ERROR);
			}
		}
		
		function count ($table){
			self::query("SELECT * FROM ".$table);
			return self::rows();
		}
	}
	
	global $db_config;
	//Conexión por defecto, configurar en el internal/config.php
	DB::connect($db_config);
?>