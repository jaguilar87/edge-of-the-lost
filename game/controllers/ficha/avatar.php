<?php 
	$enviar = Security::out('enviar');
	
	if ($enviar) {
		$ch->datos[avatar] = Security::out('av');
		$ch->datos[slogan] = Security::out('sl');
		$ch->update();
		
		header("location: ?a=ficha/ficha");
	}
?> 