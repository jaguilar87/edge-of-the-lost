<?
	if ($ch->datos[rango] < 4){
	
		$ac = Security::out('ac');
		
		if ($ac == 1 or $ac == 2){
			
			$atr = mt_rand(0,4);
			
			switch ($atr){
				case 0:
					$atributo = "vigor";
					$txt_j = "Encuentras un trabajo en un cochambroso almacén del centro, el encargado te hace cargar arriba y abajo pesadas cajas y contendores.";
					$txt_s = "Nada como la violencia pura para ganarse el pan. Un par de ojos morados y ya tienes el bolsillo lleno.";
				break;
				case 1:
					$atributo = "constitucion";
					$txt_j = "Te han contratado para hacer guardia en la puerta de un barucho del centro. Te pasas el día echando borrachos y prohibiendo la entrada a mendigos harapientos.";
					$txt_s = "Los combates callejeros mueven muchos créditos, algunos de ellos se mueven directamente a tu bolsillo cuando te dejas ganar.";
				break;
				case 2:
					$atributo = "destreza";
					$txt_j = "Consigues un trabajo de bedel en un concurrido local: Desatascar baños, fregar babas de razas extrañas y limpiar vómitos.";
					$txt_s = "Una plaza concurrida, unas buenas luces artificiales y tu habilidad para vaciar unos cuantos bolsillos de pesados créditos.";
				break;
				case 3:
					$atributo = "agilidad";
					$txt_j = "Te han pagado por deslizarte por las cloacas y retirar los animales muertos que puedan obstruir las cañerías.";
					$txt_s = "Te has colado en varios apartamentos mientras la noche encubre tus pasos. Joyas, creditos o cuatro baratijas son más que suficiente.";
				break;
				case 4:
					$atributo = "inteligencia";
					$txt_j = "Has encontrado un trabajo como vendedor de holodatos a domicilio, tu tarea consiste en convencer a deslaliñadas amas de casa de que tu holoenciclopedia es la mejor.";
					$txt_s = "Un fructifero dia engañando a los estúpidos con el doble fondo de tu puesto de juego ilegal.";
				break;
			}
			
			//Algorismo
			if ($ch->vivo()){
				
				if ($ch->energia(-5)){
					
					if ($ac == 1){
						Views::addToMessage( $txt_j.BR.BR );
					}else{
						Views::addToMessage();message( $txt_s.BR.BR );
					}
					
					//Acierto
					$rnd = mt_rand(0, 30 * $us->datos[rango]);
					if ($ac == 2) $rnd -= mt_rand (0, 15);
					
					if ($ch->datos[$atributo] > $rnd){
						
						Views::addToMessage( Notify::exito().BR.BR );
						
						//Ganancia
						$creditos = mt_rand (1000, 3000) + mt_rand(1, 100) * $ch->datos[$atributo];
						if ($ac == 2) $credtios += mt_rand (0, 2500);
						
						$ch->creditos(+$creditos);
						
						
					}else{
						Views::addToMessage(
							Notify::fallo().BR.BR.
							Notify::noRecompensa().BR
						);
					}
					
					//solo sith
					if ($ac == 2){
						
						//Ratio de atrapado
						$policia = mt_rand(0, 1000) - $ci->datos[crimen];
						
						if ($policia >= 500){
							Views::addToMessage( BR.Notify::policia().BR );
							
							//daños
							$hplost = mt_rand(1, 25 * $ch->datos[rango]);
							$ch->pv(-$hplost);
							
							//si te matan te pillan
							if (!$ch->vivo(false)){
								$multa = mt_rand(0, 2000 * $ch->datos[rango]);
								$ch->multa($multa);
							}else{
								Views::addToMessage( Notify::policiaEscape().BR );
							}					
						}
						
						Views::addToMessage( BR );
						$ch->align(-1);
						
					}else{
						
						Views::addToMessage( BR );
						$ch->align(+1);
					}
					
					$ch->px(+5);
					
					$ch->update();
					
					//Crimen
					$ci->crimen(+1);
					$ci->update();
				}
				
			}
		}
	}
?>