<?
	$heal = Security::out('heal');
	
	switch ($heal){
		case -1:
			$ci->heal(Server::info('precioHospital'), 0);
			break;
		case 0:
			break;
		default:
			loadModel("Sede");
			$sede = new Sede(array("id"=>$heal));
			if ($sede->datos[clan] == $ch->datos[clan]) $sede->datos[precioBacta] /= 2;
			$ci->heal($sede->datos[precioBacta], $heal);
			break;
	}
?>