<?
	if ($ch->c[rango] > 2){
		
		$action = $seg->out("ac");
		if ($action == 1 OR $action == 2){
			
			
			$rnd = mt_rand(0, 50);
			$rnd += mt_rand(0, $ch->datos[crimen]/10);
			$rnd = min (150, $rnd);
			
			switch (true){
				case ($rnd < 10):
					$txt_j = "Transcurre una agradable mañana paseando por los barrios bajos de la ciudad. No encuentras nada sospechoso y vuelbes para cobrar tus honorarios.";
					$creditos = mt_rand(2500, 7500);
				break;
				case ($rnd >= 10 AND $rnd < 25):
					$txt_j = "Aprovechas el paseo para patearles el culo a un par de traficantes de pastillas letales...";
					$creditos = mt_rand(2500, 7500);
					$hplost = mt_rand(1, 10);
				break;
				case ($rnd >= 25 AND $rnd < 45):
					$txt_j = "Con un poco de 'persuasión' has conseguido que un yonki habitual te diga donde consigue sus pastillas. Así que te preparas para hacer una visita a sus proveedores...";
					$creditos = mt_rand(4000, 7500);
					$hplost = mt_rand(5, 75);
				break;
				case ($rnd >= 45 AND $rnd < 60):
					$txt_j = "Hoy les has intentado enseñar a unos matones como no cabrearte...";
					$creditos = mt_rand(3000, 7000);
					$hplost = mt_rand(1, 15);
					$dif = 3;				
				break;
				case ($rnd >= 60 AND $rnd < 80):
					$txt_j = "Te has presentado de improvisto en el local de un mafioso local. Después de unas negociaciones agresivas intentas convencerle de que se replantee su vida...";
					$creditos = mt_rand(3000, 8000);
					$hplost = mt_rand(7, 50);
				break;
				case ($rnd >= 80 AND $rnd < 100):
					$txt_j = "Nada mejor para empezar el dia que un buen combate con algún sicario anónimo que ha venido a matarte...";
					$creditos = mt_rand(3000, 5000);
					$hplost = mt_rand(15, 50);
				break;
				case ($rnd >= 100 AND $rnd < 120):
					$txt_j = "Te has enterado de la llegada de un comboy de armas a la ciudad. Te presentas en el puerto estelar y te pones a repartir sablazos...";
					$creditos = mt_rand(5000, 10000);
					$hplost = mt_rand(25, 70);
				break;
				case ($rnd >= 120):
					$txt_j = "Te han dado un soplo muy importante, pero al llegar al sitio no hay nadie. De repente las luces se encienden y te ves esquivando disparos de bláster...";
					$creditos = mt_rand(7500, 10000);
					$hplost = mt_rand(50, 90);
				break;			
			}
			
			//Algoritmo
			$creditos += mt_rand(0,1000) * $ch->datos[rango];
			
			if ($ch->vivo()){
				if ($ch->energia(-5)){
					
					if ($action == 1){
						Views::addToMessage( $txt_j.BR.BR );
					}else{
						Views::addToMessage( $txt_s.BR.BR );
					}
					
					$ch->pv(-$hplost);
					$ch->align(+1);
					$ch->px(+5);
					
					if (!$ch->vivo()){
						Views::addToMessage(
							Notify::fallo().BR.BR.
							Notify::noRecompensa()
						);
					}else{
						Views::addToMessage( Notify::victoria().BR.BR );
						$ch->creditos(+$creditos);
					}
					
					$ch->update();
					
					//Crimen
					$ci->crimen(-1);
					$ci->update();
				}
			}		
		}
	}
?>