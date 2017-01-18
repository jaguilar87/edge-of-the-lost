<?php
	if (Security::out('nuevo')){
		
		$nombre = Security::out('nombre');
		$sexo = Security::out('sexo');
		$raza = Security::out('Raza');
		
		if ($nombre){
			
			$charx = DB::select("chars", "nombre", $nombre);
			
			if ($nombre == $charx[nombre]){	
				
				Views::message("Ya existe una personaje con ese nombre. Por favor, elije otro.");
				
			}else{
				
				$sql = DB::query("SELECT id FROM ciudades WHERE nacimiento='1'");
				while ($r = DB::fetch($sql)){
					$nacimiento[] = $r[id];
				}
				
				//atributos iniciales de las razas
				$ra = new Raza(array("id" => $raza));
				
				$atrb = array (
					"vigor" => 20 + $ra->datos[vigor],
					"constitucion" => 20 + $ra->datos[constitucion],
					"destreza" => 20 + $ra->datos[destreza],
					"agilidad" => 20 + $ra->datos[agilidad],
					"inteligencia" => 20 + $ra->datos[inteligencia]
				);
				
				$insert = array 
				(
					"nombre" => $nombre,
					"owner" => $us->datos[id],
					"sexo" => $sexo,
					"raza" => $raza,
					"ciudad" => $nacimiento[round(mt_rand(0, count($nacimiento) -1))],
				);
				
				DB::insert("chars", array_merge($insert, $atrb));
				
				$sql = DB::query("SELECT id FROM chars ORDER BY id DESC LIMIT 0,1");
				$row = mysql_fetch_array($sql);
				
				$us->datos[mainchar] = $row[id];
				$us->update();
				
				Views::message("¡Un nuevo personaje está listo para afrontar su destino! <meta http-equiv='refresh' content='2;URL=?a='/>");
			}
		}else{
			Views::message("Debes rellenar todos los campos.");		
		}
	}
?>