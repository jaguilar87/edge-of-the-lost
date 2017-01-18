<?
	loadModel ("Usuario");
	loadModel ("Char");
	loadModel ("Ciudad");
	loadModel ("Raza");
	loadModel ("Rango");
	loadModel ("Mensaje");
	loadModel ("Planeta");
	loadModel ("TipoPlaneta");
	loadModel ("Clan");
	loadModel ("Notify");
	
	if (!empty($_SESSION['swUser3'])){
		$us = new Usuario( array("nombre" => $_SESSION['swUser3']) );
	}else{
		header("location: ../web/?a=nologin");
	}
	
	if ($us->datos[mainchar] != 0){
		$ch = $us->metadatos[mainchar];
		$pl = $ch->metadatos[planeta];
		$ci = $ch->metadatos[ciudad];
		
		//Subir de nivel
		if ($ch->subeNivel()){
			define("LVL_UP", true );
		}else{
			define("LVL_UP", false);
		}
	}
?>