<?php
	//Definir arrays para cruceros
	$decru = array();
	$atcru = array();
	$atdest = array();
	$dedest = array();
	
	$atariete = array();
	$atdisruptor = array();
		
	//Definir variables
	$crude=0;
	$cruat=0;
	$atderri=0;
	$dederri=0;
	$attotaldam=0;
	$detotaldam=0;
	$j=0;
	
	$deescudo=0;
	$desam=0;
		
	function fase1($at, $de){
		global $log, $i, $atcru, $decru;
		
		//Empieza la fase 1
		$log[$i] = 'cVe.cf1.end';
		$i++;
		
		
		//Meter cruceros en arrays
		$res = mysql_fetch_array ("SELECT * FROM sw_vehiculos WHERE prop='$at[nombre]' AND tipo='Crucero' AND dam<'90'")or die (mysql_error());
		while ($r=mysql_fetch_array($res)){
			$atcru[$j] = $r[nombre];
			$j++
		}
		$cruat = mysql_rows_num($res);
		
		//Resetear j
		$j=0;
		
		$res = mysql_fetch_array ("SELECT * FROM sw_vehiculos WHERE prop='$de[nombre]' AND tipo='Crucero' AND dam<'90'")or die (mysql_error());
		while ($r=mysql_fetch_array($res)){
			$decru[$j] = $r[nombre];
			$j++
		}
		$crude = mysql_rows_num($res);
		
		$log[$i] = 'cAz.Cl._.'."'$at[nombre]'".'._.Re._.'."'$cruat'".y.'Cl._.'."'$de[nombre]'".'._.Re._.'."'$crude'".'.end';
		$i++;
		
		if ($cruat<0 OR $crude<0){
			$fase1 = false;
			$log[$i] = 'f1No.end';
			$i++;
		}else{
			$fase1 = true;
			$log[$i] = 'f1!.end';
			$i++;
			
			$turnosdisparos = $cruat + $crude + mt_rand(0,10);
			$k=0;
			$l=0;
			while ($turnosdisparos >= 0 OR $cruat >= 0 OR $crude >=0){
				
				//ATACANTES
				$dama = mt_rand(0,100);
				$k = mt_rand (0, count($decru);
				
				$acCRU = sel ("sw_vehiculos", "", $decru[$k]);
				
				$acCRU[dam] += $dama;
				$attotaldam += $dama;
				
				if($acCRU[dam]>=100){
					mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
					$dedest[$l] = $acCRU[nombre];
					$decru[$k] = "";
					$crude--;
					$atderri++;
				}elseif($acCRU[dam]>=75){
					mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					$decru[$k] = "";
					$crude--;
					$atderri++;
				}else{
					mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
				}
				
				//DEFENSORES
				$dama = mt_rand(0,100);
				$k = mt_rand (0, count($atcru);
				
				$acCRU = sel ("sw_vehiculos", "", $atcru[$k]);
				
				$acCRU[dam] += $dama;
				$detotaldam += $dama;
				
				if($acCRU[dam]>=100){
					mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
					$acdest[$l] = $deCRU[nombre];
					$accru[$k] = "";
					$cruat--;
					$dederri++;
				}elseif($acCRU[dam]>=75){
					mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					$atcru[$k] = "";
					$cruat--;
					$dederri++;
				}else{
					mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
				}
			}
			
			
			//RESULTADOS
			$log[$i] = 'cRo.Cl._.'."'$at[nombre]'".'._.f1Da._.'."'$attotdam'".'._.f1Pu.y.f1De._.'."'$atderri'".'.f1Cr.end';
			$i++;
			$log[$i] = 'cRo.Cl._.'."'$de[nombre]'".'._.f1Da._.'."'$detotdam'".'._.f1Pu.y.f1De._.'."'$dederri'".'.f1Cr.end';
			$i++;
			
			if ($acdest[0]){
				$log[$i] = 'cFa.f1Pe._.';
				foreach ($acdest as $value){
					$log[$i] .= "'$value'".'._.';
				}
				$log[$i] .= '$f1DC._.'."'$at[nombre]'".'.end';
				$i++;
			}
			
			if ($dedest[0]){
				$log[$i] = 'cFa.f1Pe._.';
				foreach ($dedest as $value){
					$log[$i] .= "'$value'".'._.';
				}
				$log[$i] .= '$f1DC._.'."'$de[nombre]'".'.end';
				$i++;
			}
			
			$log[$i] = 'cVe.f1Fi.end';
		}
	



	}
	
	function fase2($at, $de){
		global $log, $i, $atariete, $atdisruptor, $deescudo, $desam, $decru, $atcru;
		
		//Empieza la fase 2
		$log[$i] = "'<br>'".'.cVe.cf2.end';
		$i++;
		
		//Definir arrays y variables
		$j=0;
		$res = mysql_fetch_array ("SELECT * FROM sw_vehiculos WHERE prop='$at[nombre]' AND tipo='VCA' AND arma='disruptor' AND dam<'90'")or die (mysql_error());
		while ($r=mysql_fetch_array($res)){
			$atdisruptor[$j] = $r[nombre];
			$j++
		}
		$j=0;
		$res = mysql_fetch_array ("SELECT * FROM sw_vehiculos WHERE prop='$at[nombre]' AND tipo='VCA' AND arma='ariete' AND dam<'90'")or die (mysql_error());
		while ($r=mysql_fetch_array($res)){
			$atariete[$j] = $r[nombre];
			$j++
		}
		
		$desam = $cic[sam];
		$deescudo = $cic[generador] * 100;
		
		$tot = count ($atdisruptor) + count ($atariete);
				
		$log[$i] = 'cAz.Cl._.'."'$at[nombre]'".'._.Re._.'."'$tot'".'f2Vc.end';
		$i++;
		$log[$i] = 'cAz.Cl._.'."'$de[nombre]'".'._.Re._.'."'$desam'".'f2To.'."'$deescudo'".'f2Es.end';
		$i++;
		$log[$i] = 'f2!.end';
		$i++;
		while ($deescudo > 0 AND $at[potencia] > 0 AND !(!count($atariete) AND !count($atdisruptor) AND !count($atcru)) AND !(!$desam AND !count($decru)) ){
			
			if(count ($atdisruptor) AND $at[potencia] > 0){
				
				$log[$i] = 'Cl._.'."'$at[nombre]'".'._.f2fD._.';
				$rand = round (mt_rand (0,1));
				
				if (count ($decru) AND !$rand){
					
					$dama = mt_rand(0,20) * count($atdisruptor);
					
					$k = mt_rand(0, count($decru));
					$acCRU = sel ("sw_vehiculos", "", $decru[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$decru[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$decru[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oC._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dE.';
					}
					
				}elseif($desam){
					
					$log[$i] .= 'f2oT._.';
					$dama = mt_rand(0,20) * count($atdisruptor);
					$derri = round( $dama/50);
					
					$cic[sam] -= $derri;
					if ($derri){
						$log[$i].= 'f2dD._.'."'$derri'".'.f2To.';
					}else{
						$log[$i].= 'f2Fa.';
					}
					
				}else{
					
					$dama = count ($atdisruptor) * 2;
					$log[$i] .= 'f2oE._.f2Da._.'."'$dama </b>PE'".'.';
					
				}
				
				$wat = 50 * count ($atdisruptor);
				
				$log[$i] .= 'ab.'."'$wat'".'.cbw.end';
				$i++;
				
				$at[potencia] -= $wat;
			}
			
			if($desam AND $de[potencia] > 0){
				
				$log[$i] = 'Cl._.'."'$de[nombre]'".'._.f2fT._.';
				$rand = round (mt_rand (0,1));
				
				if (count ($atcru) AND !$rand){
					
					$dama = mt_rand(0,15) * $desam;
					
					$k = mt_rand(0, count($atcru));
					$acCRU = sel ("sw_vehiculos", "", $atcru[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atcru[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atcru[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oC._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dE.';
					}
					
				}elseif(count ($atariete)){
					
					$dama = mt_rand(0,15) * $desam;
					
					$k = mt_rand(0, count($atariete));
					$acCRU = sel ("sw_vehiculos", "", $atariete[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atariete[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atariete[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oV._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dV.';
					}
				}elseif(count ($atdisruptor)){
					
					$dama = mt_rand(0,15) * $desam;
					
					$k = mt_rand(0, count($atdisruptor));
					$acCRU = sel ("sw_vehiculos", "", $atdisruptor[$k]);
				
					$acCRU[dam] += $dama;
						
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atdisruptor[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atdisruptor[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oV._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dV.';
					}
						
				}else{
					$nada=true;
					$log[$i]="";
				}
				
				if (!$nada){
					$wat = 35 * $desam;
					$log[$i] .= 'ab.'."'$wat'".'.cbw.end';
					$i++;
					$de[potencia] -= $wat;
				}
			}
			
			if (count($atariete) AND $at[potencia] > 0) ){
				$dama = mt_rand(0,20) * count($atariete);
				$deescudo -= $dama;

				$wat = 20 * count ($atariete);
				$at[potencia] -= $wat;
				
				$log[$i] = 'Cl._.'."'$at[nombre]'".'._.f2fA._.f2oE._.f2dA._.'."'$dama </b>PE'".'._.ab.'."'$wat'".'.cbw.end';
				$i++;
			}
			
			if(count($decru) AND $de[potencia] > 0){
				
				$log[$i] = 'Cl._.'."'$de[nombre]'".'._.f2fC._.';
				$rand = round (mt_rand (0,1));
				
				if (count ($atcru) AND !$rand){
					
					$dama = mt_rand(0,20) * count($decru);
					
					$k = mt_rand(0, count($atcru));
					$acCRU = sel ("sw_vehiculos", "", $atcru[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atcru[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atcru[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oC._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dE.';
					}
					
				}elseif(count ($atariete)){
					
					$dama = mt_rand(0,20) * count($decru)
					
					$k = mt_rand(0, count($atariete));
					$acCRU = sel ("sw_vehiculos", "", $atariete[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atariete[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atariete[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oV._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dV.';
					}
				}elseif(count ($atdisruptor)){
					
					$dama = mt_rand(0,20) * count($decru);
					
					$k = mt_rand(0, count($atdisruptor));
					$acCRU = sel ("sw_vehiculos", "", $atdisruptor[$k]);
				
					$acCRU[dam] += $dama;
						
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$atdisruptor[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$atdisruptor[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oV._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dV.';
					}
						
				}else{
					$nada=true;
					$log[$i]="";
				}
				
				if (!$nada){
					$wat = 30 * count($decru)
					$log[$i] .= 'ab.'."'$wat'".'.cbw.end';
					$i++;
					$de[potencia] -= $wat;
				}
			}
			
			if(count($atcru) AND $at[potencia] > 0){
				
				$log[$i] = 'Cl._.'."'$at[nombre]'".'._.f2fC._.';
				$rand = round (mt_rand (0,1));
				
				if (count ($decru) AND !$rand){
					
					$dama = mt_rand(0,20) * count($atcru);
					
					$k = mt_rand(0, count($decru));
					$acCRU = sel ("sw_vehiculos", "", $decru[$k]);
				
					$acCRU[dam] += $dama;
					$der=false;
					if($acCRU[dam]>=100){
						mysql_query("DELETE FROM sw_vehiculos WHERE id='$acCRU[id]'")or die(mysql_error());
						$decru[$k] = "";
						$der=true;
					}elseif($acCRU[dam]>=75){
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
						$decru[$k] = "";
						$der=true;
					}else{
						mysql_query("UPDATE sw_vehiculos dam='$acCRU[dam]' WHERE id='$acCRU[id]'")or die(mysql_error());
					}
					
					$log[$i] .= 'f2oC._.';
					if (!$dama OR !$acCRU[id]){
						$log[$i] .='f2Fa';
					}else{
						$log[$i] .='f2dA._.'."'$dama'".'.f1Pu.';
						if ($der) $log[$i] .= 'cEx.f2dE.';
					}
					
				}elseif($desam){
					
					$log[$i] .= 'f2oT._.';
					$dama = mt_rand(0,20) * count($atcru);
					$derri = round( $dama/50);
					
					$cic[sam] -= $derri;
					if ($derri){
						$log[$i].= 'f2dD._.'."'$derri'".'.f2To.';
					}else{
						$log[$i].= 'f2Fa.';
					}
					
				}else{
					
					$dama = mt_rand(0,20) * count($atcru);
					$log[$i] .= 'f2oE._.f2Da._.'."'$dama </b>PE'".'.';
					
				}
				
				$wat = 30 * count($atcru);
				
				$log[$i] .= 'ab.'."'$wat'".'.cbw.end';
				$i++;
				
				$at[potencia] -= $wat;
			}
				
			
			if ($deescudo <= 0){
				$log[$i] = 'cFa.f2nE.end';
				$i++;
				break;
			}elseif($deescudo < ($cic[generador]*50) AND !$esc50){
				$log[$i] = 'cAm.e50.end';
				$i++;
				$esc50=true;
			}elseif($deescudo < ($cic[generador]*25) AND !$esc75){
				$log[$i] = 'cRo.e75.end';
				$i++;
				$esc75=true;			
			}elseif($deescudo < ($cic[generador]*10) AND !$esc90){
				$log[$i] = 'cRo.e90.end';
				$i++;
				$esc90=true;			
			}
			if ($at[potencia] <= 0){
				$log[$i] = 'cFa.f2nW.end';
				$i++;
				break;
			}
			if ($de[potencia] <= 0){
				$log[$i] = 'cFa.f2nD.end';
				$i++;
				break;
			}
		}
		
		$log[$i] = 'cVe.f2Fi.end';
		$i++;
	}
?>
