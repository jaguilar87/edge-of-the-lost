<?
	$entre = Security::out("entre");
	$mul = Security::out("mul");
	$job = Security::out("job");
	
	if ($entre != ""){
		$mul = max($mul, 1);
		
		$precio = floor($ch->datos[$entre] * $mul * 15);
		
		if ($ch->creditos(-$precio)){
			if ($ch->atributoSubir($entre, $mul)){
				$ch->update();
			}
		}
	}
	
	if ($job != ""){
		if ($ch->entrenamiento(-1)){
			if ($ch->subeClase($job)){
				$ch->update();
			}
		}
	}
?>