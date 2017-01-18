<?
	$entrar = Security::out("entrar");
	
	if ($entrar == "ok" and $ch->datos[rango] == 1){
		if ($ch->creditos(-50000)){
			if ($ch->datos[alineamiento] > 0){
				$ch->recibirArma(1);
				$ch->blandirUltima();
				$ch->subeRango();
				$ch->update();
			}elseif ($ch->datos[alineamiento] < 0){
				$ch->recibirArma(2);
				$ch->blandirUltima();
				$ch->subeRango();
				$ch->update();
			}else{
				Views::addToMessage(Notify::noAlign(), true);
			}
		}
	}
?>