<?
	$char = Security::out("char");
	
	//User o info
	if ($char == $ch->datos[nombre] OR $char == $ch->datos[id] OR $char == ""){
		$usa = $us;
		$propio = true;
	}else{
		if (is_numeric($char)){
			$cha = DB::select("chars", "id", $char);
		}else{
			$cha = DB::select("chars", "nombre", $char);
		}
		$usa = new Usuario(array("id" => $cha[owner]));
		
		$propio = false;
	}
?>