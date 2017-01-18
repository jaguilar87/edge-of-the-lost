<?php
	$destinox = Security::out('posx');
	$destinoy = Security::out('posy');
	$ok = Security::out('ok');
	
	$planeta = new Planeta(array("x"=>Security::out("posx"), "y"=>Security::out("posy")));
	
	$origenx = $pl->datos[x];
	$origeny = $pl->datos[y];
	
	$modulo = sqrt ( pow($destinox - $origenx, 2) + pow($destinoy - $origeny, 2) ) * 100;
	
	if ($origenx == $destinox && $origeny == $destinoy){
		
		Views::message("El destino seleccionado es igual al orígen.");
		
	}else{
		
		if ($ok){
			Views::message("Ruta trazada. Repulsores en línea. A toda máquina. <br><br>Ya no hay vuelta atrás, deberás esperar al final del viaje.");
			/* TO-DO: Algoritmo de viaje
			
			$viaje = array (
				"posicion" => 2,
				"destinox" => $destinox,
				"destinoy" => $destinoy,
				"origenx" => $origenx,
				"origeny" => $origeny,
				"parsecs" => $distancia,
				"recorridos" => 0
			);
			$db->update("naves", "id", $us->n[id], $viaje );
			*/
			
		}
	}
?>