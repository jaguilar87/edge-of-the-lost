<?
	loadClass("Arma");
	loadClass("Armadura");	
	
	$aid = $seg->out('aid');
	$wid = $seg->out('wid');
	
	$html->cargar("tCont", "inventario/ver.htm");
	
	if ($aid){
		$r = $db->qsel("objarmaduras", "id", $aid);
		$a = new Armadura($r);
		if ($r[owner] == $us->c[id]){
			$text = "<big>Identificación de <b>".$a->nombre()."</b></big><br><br>";
			
			$text .= "Tipo de armadura: <b>".getWord($a->tipoPeso, "tipoPesoArmaduras")."</b><br>";
			$text .= "Parte del cuerpo: <b>".$a->tipoParteCuerpo."</b><br><br>";
			
			$text .= "Defensa contra armas de Filo: <b>".$a->CAFilo."</b><br>";
			$text .= "Defensa contra armas Contundentes: <b>".$a->CAContundente."</b><br>";
			$text .= "Defensa contra armas Perforantes: <b>".$a->CAPerforante."</b><br><br>";
			
			$text .= "Penalizador a la Destreza: <b style='color:red;'>".min($a->penalizadorDeztreza * -1, 0)."</b><br>";
			$text .= "Penalizador a la Agilidad: <b style='color:red;'>".min($a->penalizadorAgilidad * -1, 0)."</b><br>";
			
			$html->asignar("TEXT", $text);
		}else{
			$html->asignar("TEXT", "¡No puedes identificar una armadura que no te pertenece!");
		}
	}

	if ($wid){
		$r = $db->qsel("objarmas", "id", $wid);
		$a = new Arma($r);
		if ($r[owner] == $us->c[id]){
			$text = "<big>Identificación de <b>".$a->nombre()."</b></big><br><br>";
			
			$text .= "Tipo de arma: <b>".getWord($a->tipoDano, "tipoDanoArmas")."</b><br>";
			$text .= "Tamaño del arma: <b>".getWord($a->tamano, "tamanoArmas")."</b><br><br>";

			$text .= "Bonificador de puntería: <b style='color:green;'>+".$a->bonificador."</b><br>";
			$text .= "Daño del Arma: <b>de".$a->danoMinimo." a ".$a->danoMaximo. " (media: ".round(($a->danoMinimo+$a->danoMaximo)/2).")</b><br>";
			$text .= "Probabilidad de impacto Crítico: <b>".$a->critico."%</b><br>";
			
			$html->asignar("TEXT", $text);
		}else{
			$html->asignar("TEXT", "¡No puedes identificar una arma que no te pertenece!");
		}
	}	
	
	$html->expandir("CONTENIDO", "tCont");
?>