<?php
	//Definir funciones del rango de da�os
	function tDolor($dam){
		switch (true){
			case ($dam <=1):
				$valor='d1';
			break;
			case (1 < $dam AND $dam <= 10):
				$valor='d2';
			break;
			case (10 < $dam AND $dam <= 20):
				$valor='d3';
			break;
			case (20 < $dam AND $dam <= 30):
				$valor='d4';
			break;
			case (30 < $dam AND $dam <= 40):
				$valor='d5';
			break;
			case (40 < $dam AND $dam <= 50):
				$valor='d6';
			break;
			case (50 < $dam AND $dam <= 60):
				$valor='d7';
			break;
			case (60 < $dam AND $dam <= 70):
				$valor='d8';
			break;
			case (70 < $dam AND $dam <= 80):
				$valor='d9';
			break;
			case (80 < $dam AND $dam <= 90):
				$valor='d10';
			break;
			case (90 < $dam AND $dam <= 100):
				$valor='d11';
			break;
			case (100 < $dam AND $dam <= 130):
				$valor='d12';
			break;
			case (130 < $dam AND $dam <= 160):
				$valor='d13';
			break;
			case (160 < $dam AND $dam <= 190):
				$valor='d14';
			break;
			case ($dam > 190 ):
				$valor='d15';
			break;
		}
					
		return $valor;
	}
			
	//Colocar en funciones los tipos de ataque
	function mele ($a, $b){
		global $log, $i, $at, $de;

		//Primero de todo comprobar la tasa de cr�tico, a�adiendole el poder
		//de la fuerza en caso de tener trance combativo (NV=3)
		$tasa = mt_rand(1,100);
		if ($a[nv_sable]>=3){
			$trance = true;
			$tasa += round ( abs( $a[lado]/20 ) );
		}
					
		//Si el dado es mayor a 90 => Cr�tico
		if ($tasa >= 90){
			// Con cr�tico
			$danos = $a[vig] + mt_rand (-50, +75);
			$danos = max ( $danos, 1);
				 
			$b[hp] -= $danos;
			$b[por] -= round($danos/$b[maxhp] * 100);
			 
			//output
			$log[$i] = 'aCr._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.cCr.fCr.end';
			$i++;
						 
			//Calculos para la acometida
			if ($b[lado]>0 && $trance){
				//Acometida ok
				$danos /= 2;
				$a[hp] -= $danos;
				$a[por] -= round($danos/$a[maxhp] * 100);
					
				//output
				$log[$i] = 'aAc._.de._.'."'$b[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$a[nomb]'".'._.ab.'."'$a[por]'".'.cb.cJe.fAc.end';
				$i++;
			}
		}else{
			//Sin cr�tico
			//Calcular punter�a
			$punt = $a[des] + mt_rand (-100, 100);
			//Calcular Bloqueo
			$blo = $b[con] + mt_rand (-100, 100);
			 
			if ($blo>$punt){
				//El atacante falla
			}else{
				//El atacante acierta

				//El PJ ha seleccionado un sable?
				if ($a[nv_sable]>2){
					switch ($a[estilo_sable]){
						case "+": //Exterminio
							$danos = ( $a[vig] + mt_rand(-50, 50) ) * 1.5;
							$danos -= $b[con]/3;
						 	$danos = max ( $danos, 1);
						    
							$b[hp] -= $danos;
						 	$b[por] -= round($danos/$b[maxhp] * 100);
												 
							//output
							$log[$i] = 'aEx._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.cEx.fEx.end';
							$i++;
												 
						break;
						case "11": //Doble sablazo
							$danos = $a[vig] + mt_rand(-50, 25);
 							$danos -= $b[con]/3;
						 	$danos = max ( $danos, 1);
						 
						 	$b[hp] -= $danos;
						 	$b[por] -= round($danos/$b[maxhp] * 100);
									 
							//output
							$log[$i] = 'aDo._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.cDo.fDo.end';
							$i++;
							
							//segunda ronda
							$danos = $a[vig] + mt_rand(-50, 25);
							$danos -= $b[con]/3;												 
						 	$danos = max ( $danos, 1);
						 	
							$b[hp] -= $danos;
						 	$b[por] -= round($danos/$b[maxhp] * 100);
												 
							//output
							$log[$i] = 'aDo._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.cDo.fDo.end';
							$i++;												 
						break;
						case "2": //Vitalizaci�n
							$danos = $a[vig] + mt_rand(-50, 50);
							$danos -= $b[con]/3;
						 	$danos = max ( $danos, 1);
						 
						 	$b[hp] -= $danos;
						 	$b[por] -= round($danos/$b[maxhp] * 100);
										 
							//output
							$log[$i] = 'aSa._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.end';
							$i++;
												 
							//El atacante se cura
							$danos /= 3;
							$a[hp] += $danos;
							$a[por] += round($danos/$a[maxhp] * 100);

							$a[hp] = min($a[hp], $a[maxhp]);
							$a[por] = min ($a[por], 100);

							//output
							$log[$i] = 'aVi._.'."'$a[nomb]'".'._.dVi.ab.'."'$a[por]'".'.cb.cVi.fVi.end';
							$i++;
												 
						break;
					}
										
				}else{
					$danos = $a[vig] + mt_rand(-50, 50);
					$danos -= $b[con]/3;
					$danos = max ( $danos, 1);
						 
					$b[hp] -= $danos;
					$b[por] -= round($danos/$b[maxhp] * 100);
										 
					//output
					$log[$i] = 'aSa._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb.end';
					$i++;			
				}				
			}
		}
		
		//ACTUALIZAR VARIABLES
		if ($a[nombre] == $at[nombre]){
			$at = $a;
			$de = $b;
		}else{
			$at = $b;
			$de = $a;
		}
		
		
	}

	//Funcion del golpe de la fuerza
	function golpef ($a, $b){
		global $log, $i, $at, $de;
		
		//calcular acierto
		$punt = $a[inte] + mt_rand (-100, 100);
		$blo = $b[con] + mt_rand (-100,100);
		
		if ($punt > $blo){ //Si hay acierto
			$danos = $a[pod] + mt_rand (-50, 50);
			$danos -= $b[con]/4 + $b[inte]/5;
			$danos =  max($danos, 1);
			
			//Comprovar si hay IRA SITH
			if ($a[nv_sable]>=4 AND $a[lado]<0){
				$ira = true;
				$danos *= 2;
			}
			
			$b[hp] -= $danos;
			$b[por] -= round($danos/$b[maxhp] * 100);
			
			
				
			
			//output
			$log[$i] = 'aGo._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb';
			
			if ($ira){
				$log[$i].= '.cSi.fIr';
			}
			
			$log[$i].='.end';
			$i++;
		}
		//ACTUALIZAR VARIABLES
		if ($a[nombre] == $at[nombre]){
			$at = $a;
			$de = $b;
		}else{
			$at = $b;
			$de = $a;
		}
	}

	//Funcion de rayo sith
	function rayos ($a, $b){
		global $log, $i, $at, $de;
		
		//calcular acierto
		$punt = $a[inte] + mt_rand (-100, 100);
		$blo = $b[con] + mt_rand (-100,100);
		
		if ($punt > $blo && $at[nv_sable]>1){ //Si hay acierto
			$danos = $a[pod] + mt_rand (-50, 50);
			$danos += abs($a[lado]) /20;
			$danos -= $b[con]/4;
			$danos =  max($danos, 1);
			
			$b[hp] -= $danos;
			$b[por] -= round($danos/$b[maxhp] * 100);
			
			//output
			$log[$i] = 'aRa._.de._.'."'$a[nomb]'".'._.'.tDolor($danos).'._.a._.'."'$b[nomb]'".'._.ab.'."'$b[por]'".'.cb';
				
			if ($a[nv_sable] >=3){//Drenaje
				
				//El atacante drena
				$a[hp] += $danos;
				$a[por] += round($danos/$a[maxhp] * 100);
				
				$a[hp] = min($a[hp], $a[maxhp]);
				$a[por] = min ($a[por], 100);
				$log[$i].= '.cSi.fDr';
			}
			
			$log[$i].='.end';
			$i++;
		}
		//ACTUALIZAR VARIABLES
		if ($a[nombre] == $at[nombre]){
			$at = $a;
			$de = $b;
		}else{
			$at = $b;
			$de = $a;
		}
	}	
	
	//Funcion de la cura jedi
	function curaj ($a, $b){
		global $log, $i, $at, $de;
		
		//calcular acierto
		$punt = $a[inte] + mt_rand (-100, 100);
		$blo = $b[con] + mt_rand (-100,100);
		
		if ($punt > $blo && $at[nv_sable]>1){ //Si hay acierto
			$danos = $a[pod] + mt_rand (-25, 25);
			$danos += $a[lado] /20;
			$danos =  max($danos, 1);
			
			if ($a[nv_sable] >=4){//Aura jedi
				$aura = true;
				$danos *= 2;
			}
			
			$a[hp] += $danos;
			$a[por] += round($danos/$a[maxhp] * 100);
				
			$a[hp] = min($a[hp], $a[maxhp]);
			$a[por] = min ($a[por], 100);
						
			//output
			$log[$i] = "'$a[nomb]'".'._.aCu._.ab.'."'$a[por]'".'.cb';
			
			if ($aura){
				$log[$i] .= '.cJe.fAu';
			}
			
			$log[$i].='.end';
			$i++;
		}
		
		//ACTUALIZAR VARIABLES
		if ($a[nombre] == $at[nombre]){
			$at = $a;
			$de = $b;
		}else{
			$at = $b;
			$de = $a;
		}
	}
	
?>
