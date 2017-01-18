<?
class Security{
	
	static $def = array();
	static $ind = array();
	
	function out($key){
		if (count (self::$def) == 0){
			self::load();
		}
		if (array_key_exists($key, self::$def)){
			return self::$def[$key];
		}else{
			return null;
		}
	}
	
	function iout($key){
		if (count (self::$ind) == 0){
			self::load();
		}
		if (array_key_exists($key, self::$ind)){
			return self::$ind[$key];
		}else{
			return null;
		}
	}
	
	function defender($name, $var){
		
		self::$ind[$name] = $var;
		
		$var = addslashes( htmlentities( stripslashes( trim ($var) ) ) ); 
		$name = addslashes( htmlentities( stripslashes( trim ($name) ) ) ); 
		
		/*
		$var = trim($var); //Quita espacios al principio y al final
		$var = stripslashes($var); //quita los \ antes de < y >
		$var = htmlentities($var) //evita la inyeccion HTML
		$var = addslashes($var); //pone \ delante de < y >
		*/
		
		self::$def[$name] = $var;
		
	}
	
	function load(){
		foreach ($_GET as $key=>$value){
			self::defender($key, $value);
		}
		
		foreach ($_POST as $key=>$value){
			self::defender($key, $value);
		}
	}
	
	function isMail($key){
		//devuelve el resultado de la comprobacion de la expresion regular
		return ereg("^([A-Za-z0-9_]|\\-|\\.)+@+(([A-Za-z0-9_]|\\-)+\\.)+[A-Za-z]{2,4}$", self::$def[$key]);
	}
	
	function getRealIP()
	{
	   
	   if ( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
	   {
		  $client_ip =
			 ( !empty($_SERVER['REMOTE_ADDR']) ) ?
				$_SERVER['REMOTE_ADDR']
				:
				( ( !empty($_ENV['REMOTE_ADDR']) ) ?
				   $_ENV['REMOTE_ADDR']
				   :
				   "unknown" );
	   
		  // los proxys van añadiendo al final de esta cabecera
		  // las direcciones ip que van "ocultando". Para localizar la ip real
		  // del usuario se comienza a mirar por el principio hasta encontrar
		  // una dirección ip que no sea del rango privado. En caso de no
		  // encontrarse ninguna se toma como valor el REMOTE_ADDR
	   
		  $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
	   
		  reset($entries);
		  while (list(, $entry) = each($entries))
		  {
			 $entry = trim($entry);
			 if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
			 {
				// http://www.faqs.org/rfcs/rfc1918.html
				$private_ip = array(
					  '/^0\./',
					  '/^127\.0\.0\.1/',
					  '/^192\.168\..*/',
					  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
					  '/^10\..*/');
	   
				$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
	   
				if ($client_ip != $found_ip)
				{
				   $client_ip = $found_ip;
				   break;
				}
			 }
		  }
	   }
	   else
	   {
		  $client_ip =
			 ( !empty($_SERVER['REMOTE_ADDR']) ) ?
				$_SERVER['REMOTE_ADDR']
				:
				( ( !empty($_ENV['REMOTE_ADDR']) ) ?
				   $_ENV['REMOTE_ADDR']
				   :
				   "unknown" );
	   }
	   
	   return $client_ip;
	   
	}
}

?>