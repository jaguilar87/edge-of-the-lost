<?php
#<!--                                                                                    
#                               PREPARATIVOS ANTES DEL COMBATE!                          
#                                                                                     -->
mt_srand ((double) microtime() * 1000000);
$cle=sel("sw_clan", "", $cic[clan]);

$tBla=0; #Vida de las torres
$tDam=0;
$tSam=0;

$atk_d=0; #definir Variables
$atk_v=0;
$def_d=0;
$def_v=0;
$desc=0;
$aesc=0;
$a=0;
$b=0;
$c=0;
$d=0;
$e=0;
$f=0;

$chA=100;
$chB=100;
$log .="<center><big><big><font color=\"#ff0000\">La ciudad <b>$cic[nombre]</b> del clan <b>$cle[nombre]</b> está siendo atacada por el clan <b>$us[clan]</b>!</font></big></big></center>";



#<!--                                                                                    
#                          DEFINICION DE FUNCIONES DE COMBATE                            
#                                                                                     -->

function recuento($tipo){

$atk=array();
$def=array();
$aveh=array();
$dveh=array();
$dcr=array();
$acr=array();
$aesc=array();
$desc=array();
$cle=array();
$cl=array();
$cic=array(); 

global $a, $b, $c, $d, $e, $f, $atk, $def, $atk_d, $atk_v, $def_v, $def_d, $aveh, $dveh, $dcr, $acr, $aesc, $desc, $cle, $cl, $cic; 

switch ($tipo){

case "mil":
		 
# <!--      RECUENTO DE COMBATIENTES ---->
			$atk=array();
			$def=array();
			$a=0;
			$b=0;
		 #Atacantes
		 $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
		 while ($u=mysql_fetch_array($sqla)){
	  	 		 $a++;
		 	  	 $atk[$a]=$u[nombre];
					 $atk_d+=$u[destreza];
					 $atk_v+=$u[vigor];
		 }

		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
		 while ($zc=mysql_fetch_array($za)){
		 	  $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$zc[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
				while ($u=mysql_fetch_array($sqla)){
		    			$a++;
			  			$atk[$a]=$u[nombre];
					 		$atk_d+=$u[destreza];
					 		$atk_v+=$u[vigor];							
        }
		}

		
		#defensores
		$sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$cle[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error()); 
		while ($u=mysql_fetch_array($sqla)){
	  	 $b++;
	  	 $def[$b]=$u[nombre];
			 $def_d+=$u[destreza];
			 $def_v+=$u[vigor];			 
		}

		$za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cle[nombre]' AND estado='Aliado'")or die(mysql_error());
		while ($zc=mysql_fetch_array($za)){
			  $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$zc[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
	  		while ($u=mysql_fetch_array($sqla)){
		  	 	 $b++;
					 $def[$b]=$u[nombre];
			 		 $def_d+=$u[destreza];
			 		 $def_v+=$u[vigor];						 
        }
		}
break;

case "veh":
#<!--SELECCION DE VEHICULOS-->
	 
	 $aveh=array();
	 $dveh=array();
	 $c=0;
	 $d=0;
	 
	 #Atacantes
	 $av=mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$cl[nombre]' AND dam<'75'")or die(mysql_error());
	 while ($va=mysql_fetch_array($av)){
	  	 $c++;
	  	 $aveh[$c]=$va[nombre];
	 }
	 
	 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
	 while ($zc=mysql_fetch_array($za)){
	 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$zc[nombre]' AND dam<'75'")or die(mysql_error());
	  	while ($u=mysql_fetch_array($sqla)){
		  	     $c++;
	      	   $dveh[$c]=$u[nombre];
      }
	 }

	 #defensores
	 
	 $dv=mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$cle[nombre]' AND dam<'75'")or die(mysql_error());
	 while ($vd=mysql_fetch_array($dv)){
	  		 $d++;
				 $dveh[$d]=$vd[nombre];
	 }
	 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cle[nombre]' AND estado='Aliado'")or die(mysql_error());
	 while ($zc=mysql_fetch_array($za)){
	 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$zc[nombre]' AND dam<'75'")or die(mysql_error());
	  	while ($u=mysql_fetch_array($sqla)){
				 $d++;
		     $dveh[$d]=$u[nombre];
      }
	}
break;

case "cru":

	$dcr=array();
	$acr=array();
	$f=0;
	$e=0;
	

#<!--SELECCION DE CRUCEROS-->

	 #Atacantes
	 $av=mysql_query("SELECT * FROM sw_vehiculos WHERE tipo='Crucero' AND prop='$cl[nombre]' AND dam<'75'")or die(mysql_error());
	 while ($va=mysql_fetch_array($av)){
	  	  $e++;
	  	  $acr[$e]=$va[nombre];
	 }		  
	 
	 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
	 while ($zc=mysql_fetch_array($za)){
	 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE tipo='Crucero' AND prop='$zc[nombre]' AND dam<'75'")or die(mysql_error());
	  	while ($u=mysql_fetch_array($sqla)){
		  	   	 $e++;
	      	   $acr[$e]=$u[nombre];
      }
	 }

	 #defensores
	 $dv=mysql_query("SELECT * FROM sw_vehiculos WHERE tipo='Crucero' AND prop='$cle[nombre]' AND dam<'75'")or die(mysql_error());
	 while ($vd=mysql_fetch_array($dv)){
	  	  $f++;
	  	  $dcr[$f]=$vd[nombre];
   }

	 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cle[nombre]' AND estado='Aliado'")or die(mysql_error());
	 while ($zc=mysql_fetch_array($za)){
	 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE tipo='Crucero' AND prop='$zc[nombre]' AND dam<'75'")or die(mysql_error());
	  	while ($u=mysql_fetch_array($sqla)){
		  		 $f++;
			     $dcr[$f]=$u[nombre];
      }
	 }
break;

case "esc":
		 #<!--SELECCION DE ESCUDOS-->

 
		 #JUGADORES 

		 #Atacantes
		 $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$cl[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
		 while ($u=mysql_fetch_array($sqla)){
		 	  $aesc+=$u[constitucion];
		 }

		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
		 while ($zc=mysql_fetch_array($za)){
		 	  $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$zc[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
				while ($u=mysql_fetch_array($sqla)){
	  					$aesc+=$u[constitucion];
        }
		 }

		 #defensores
		 $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$cle[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error()); 
		 while ($u=mysql_fetch_array($sqla)){
		 	  $desc+=$u[constitucion];
		 }

		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cle[nombre]' AND estado='Aliado'")or die(mysql_error());
		 while ($zc=mysql_fetch_array($za)){
		 	  $sqla = mysql_query("SELECT * FROM sw_users WHERE clan='$zc[nombre]' AND nv_sable>'0' AND ciudad='$cic[nombre]' AND hp>'0'")or die(mysql_error());
				while ($u=mysql_fetch_array($sqla)){
	  					$desc+=$u[constitucion];
        }
		 }


		 #VEHICULOS

		 #Atacantes
		 $av=mysql_query("SELECT * FROM sw_vehiculos WHERE arma='generador' AND tipo='VCA' AND prop='$cl[nombre]' AND dam<'75'")or die(mysql_error());
		 while ($va=mysql_fetch_array($av)){
		 	  $aesc+=500-$va[dam];
		 }

		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cl[nombre]' AND estado='Aliado'")or die(mysql_error());
		 while ($zc=mysql_fetch_array($za)){
		 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE arma='generador' AND tipo='VCA' AND prop='$zc[nombre]'")or die(mysql_error());
				while ($u=mysql_fetch_array($sqla)){
	  					$aesc+=500-$u[dam];
        }
		 }

		 #defensores
		 $dv=mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$cle[nombre]'")or die(mysql_error());
		 while ($vd=mysql_fetch_array($dv)){
		 	  	$desc+=500-$vd[dam];
		 }
		 
		 $za=mysql_query("SELECT * FROM sw_diplomacia WHERE destino='$cle[nombre]' AND estado='Aliado'")or die(mysql_error());
		 while ($zc=mysql_fetch_array($za)){
		 	  $sqla = mysql_query("SELECT * FROM sw_vehiculos WHERE arma!='' AND arma!='generador' AND tipo='VCA' AND prop='$zc[nombre]'")or die(mysql_error());
				while ($u=mysql_fetch_array($sqla)){
	  					$desc+=500-$u[dam];
        }
		 }
		 
		 #Ciudad
		 
		 $desc+=500*$cic[generador];
break;
}
}

recuento("esc");

$ae=$aesc;
$de=$desc;


#<!--                                                                                    
#                                 EMPIEZA EL COMBATE                                     
#                                      ESPACIAL                                       -->

recuento("cru");

$log.="<br><br><b><big>Combate Espacial:</big></b><br>";
$te=0;
$crtot=$e+$f;

if ($e!="0" && $f!="0"){
	$log.="Los Cruceros se ponen en posición, <b>$cl[nombre]</b> ha reunido <b>$e</b> Crucero(s) frente a <b>$f</b> que ha reunido <b>$cle[nombre]</b>. Los cruceros toman posiciones...<br>";


	$tem=mt_rand(0,$crtot*10);

	while ($te<$tem){
	  
	    
	  #ATACANTES DISPARAN
	  $mod=mt_rand(1,$e);
	  $a1=$acr[$mod];
	  $a2=sel("sw_vehiculos","", $a1); 
	  
	  $mod=mt_rand(1,$f);
  	$d1=$dcr[$mod];
	  $d2=sel("sw_vehiculos","", $d1); 

	  if ($a2[dam]>74){
	  	 $log.="<br><b>$a2[nombre]</b> intenta disparar contra <b>$d2[nombre]</b> pero está demasiado dañado.";
	  }else{
	  	 $dam=mt_rand(0,25);
		 $d2[dam]+=$dam;
		 $log.="<br><b>$a2[nombre]</b> dispara contra <b>$d2[nombre]</b> y daña <b>$dam % ($d2[dam] %)</b>"; 
		 if ($d2[dam]<100){
		 		mysql_query("UPDATE sw_vehiculos SET dam='$d2[dam]' WHERE nombre='$d2[nombre]'")or die(mysql_error());
		 }else{
		 		mysql_query("DELETE FROM sw_vehiculos WHERE id='$d2[id]'")or die(mysql_error());
				echo "<b>$d2[nombre]</b> derribado!";
				$chB+=500;
				$tem=-1;
		 }
	  }
	  
	  #DEFENSORES DISPARAN
	  
	  $a1=$acr[mt_rand(1,$e)];
	  $a2=sel("sw_vehiculos","", $a1); 

  	  $d1=$dcr[mt_rand(1,$f)];
	  $d2=sel("sw_vehiculos","", $d1); 

	  if ($d2[dam]>74){
	  	 $log.="<br><b>$d1</b> intenta disparar contra <b>$a1</b> pero está demasiado dañado.";
	  }else{
	  	 $dam=mt_rand(0,25);
		 $a2[dam]+=$dam;
		 $log.="<br><b>$d1</b> dispara contra <b>$a1</b> y daña <b>$dam % ($a2[dam] %)</b>"; 
		 if ($a2[dam]<100){ 
		 		mysql_query("UPDATE sw_vehiculos SET dam='$a2[dam]' WHERE nombre='$a2[nombre]'")or die(mysql_error());
		 }else{
		 		mysql_query("DELETE FROM sw_vehiculos WHERE id='$a2[id]'")or die(mysql_error());
				echo "<b>$a2[nombre]</b> derribado!";
				$chA+=500;
				$tem=-1;	
		 }				
	  }
	  
	  $te++;
  }
	
	#seleccionar los cruceros que hayan sobrevivido.

	recuento("cru");
	$log.="<br><br>Cruceros operativos de <b>$cl[nombre]</b>: ";
	foreach($acr as $val){
			$log.=" $val"; 
	}
	$log.="<br>Cruceros operativos de <b>$cle[nombre]</b>: ";
	foreach($dcr as $val){
			$log.=" $val"; 
	}
	
	
}else{
		$log.="No se ha reunido cruceros de ambos bandos!. Los clanes implicados no tienen o están demasiado dañados";
}
#<!--                                                                                    
#                                 EMPIEZA EL COMBATE                                     
#                                      TERRESTRE                                      -->

		recuento("veh");
		recuento("mil");
		
$log.="<br><br><big><b>Combate Terrestre:</b></big><br><font color=\"#00cc00\"><b>$cl[nombre]</b> ha generado <b>$ae Punto(s) de Escudo</b> y ha reunido <b>$a PJ(s)</b> y <b>$c Vehiculo(s)</b><br><b>$cle[nombre]</b> ha generado <b>$de Punto(s) de Escudo</b> y ha reunido <b>$b PJ(s)</b> y <b>$d Vehiculo(s)</b></font><br>";

while ($ae>0 || $de>0){


		recuento("veh");
		recuento("mil");

if ($cl[potencia]<=0 ||$c==0 ||$a==0){
	 $log.="<br><font color=\"#ff6600\">El clan $cl[nombre] no podrá atacar más por falta de vehiculos, potencia o Players disponibles. </font>";
 }else{
	#Atacante - Vehiculos

	  $mod=mt_rand(1,$a); #Personaje al Azar
	  $a1=$atk[$mod];
	  $a2=sel("sw_users","", $a1); 
	  
		$mod=mt_rand(1,$c); #vehiculo al Azar
	  $v1=$aveh[$mod];
	  $v2=sel("sw_vehiculos","", $v1); 

		$punteria=mt_rand(0,100);

	  
		 switch($v2[arma]){ #Acción segun vehiculo
		  case "blaster":
					 $mod=mt_rand(1,$b); #objetivo al azar
					 $b1=$def[$mod];
	   			 $b2=sel("sw_users","", $b1);
					
					 if ($punteria<$a2[inteligencia]){
					 		$dam=mt_rand(1,600);
					 		$b2[hp]-=$dam;
					 		
							$log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$b1</b> y daña <var>$dam PV($b2[hp])</var>";
							
							mysql_query("UPDATE sw_users SET hp='$b2[hp]' WHERE nombre='$b1'")or die(mysql_error());
 						    if ($b2[hp]<=0){$log.="<strong><small>KO</small></strong>";}
					 }else{
					 		$log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$b1</b> pero <var>falla</var>.";
			  	 }
			break;
			
			case "disruptor":
			
					$tar=mt_rand(0,2);
					if ($d==0){$tar=1;}
					if ($f==0){$tar=0;}
					if ($f==0 && $d==0){$tar=2;}
						 
				  switch($tar){ #Selecciona tipo de objetivo
					 case "0": #Contra vehiculos
						 $mod=mt_rand(1,$d); #vehiculo objetivo al Azar
						 $w1=$dveh[$mod];
	  				 $w2=sel("sw_vehiculos","", $w1);
						 
					   if ($punteria<$a2[inteligencia]){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> y daña <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }else{
					 		 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> pero <var>falla</var>.";
			  	   }						 
						 
					 break;
					 case "1": #contra cruceros
					 	 
					 	  $mod=mt_rand(1,$f);
  	  				$w1=$dcr[$mod];
	  					$w2=sel("sw_vehiculos","", $w1); 
					 
					    if ($punteria<$a2[inteligencia]){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> y daña <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }else{
					 		 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> pero <var>falla</var>.";
			  	   }	
					 break;

					 case "2": #contra torre					 

				     if ($punteria<$a2[inteligencia]){
						 		
								$tipoT=mt_rand(0,2);
								switch($tipoT){ #tipo de torre
					 			 case "0": #sam
								 			$tSam++;
					 		 				$log.="<br><b>$a1</b> dispara <b>$v1</b> contra una torre SAM!";
											if ($tSam>3){
												 $log.="<strong><small>DERRIBADA</small></strong>";
												 $cic[sam]-=1;
												 mysql_query("UPDATE sw_city SET sam='$cic[sam]' WHERE ciudad='$cic[nombre]'")or die(mysql_error());
											}
								 break;
					 			 case "1": #Blaster
								 			$tBla++;
					 		 				$log.="<br><b>$a1</b> dispara <b>$v1</b> contra una torre Bláster!";
											if ($tBla>3){
												 $log.="<strong><small>DERRIBADA</small></strong>";
												 $cic[blaster]-=1;
												 mysql_query("UPDATE sw_city SET blaster='$cic[blaster]' WHERE ciudad='$cic[nombre]'")or die(mysql_error());
											}								 
								 break;
					 			 case "2": #Damascus
								 			$tDam++;
					 		 				$log.="<br><b>$a1</b> dispara <b>$v1</b> contra una torre Dam!";
											if ($tSam>3){
												 $log.="<strong><small>DERRIBADA</small></strong>";
												 $cic[damascus]-=1;
												 mysql_query("UPDATE sw_city SET damascus='$cic[damascus]' WHERE ciudad='$cic[nombre]'")or die(mysql_error());												 
											}								 
								 break;								 								
								
								}
							
					   }else{
					 		 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra una torre pero <var>falla</var>.";
			  	   }						 
				 			
					 break;
					
			  }
			break;
			case "ariete":
					 if ($punteria<$a2[inteligencia]){
					 		$dam=mt_rand(0,200);
					 		$de-=$dam;
				 		  $log.="<br><b>$a1</b> dispara <b>$v1</b> contra el escudo y daña <var>$dam PE ($de)</var>.";
				   }else{
				 		  $log.="<br><b>$a1</b> dispara <b>$v1</b> contra el escudo pero <var>falla</var>.";
					 }
					 
			break;
		 }

		 
		 if($ae<=0 || $de<=0){break;}
		 $cl[potencia]-=100;
		 mysql_query("UPDATE sw_clan SET potencia='$cl[potencia]' WHERE nombre='$cl[nombre]'")or die(mysql_error());
}
		 
		recuento("veh");
		recuento("mil");
		$defer=$b;
				 
 if ($d==0 || $b==0){
	 $log.="<br><font color=\"#ff6600\">El clan $cle[nombre] no podra seguir atacando por falta de Vehiculos o PJs!</font>";
 }else{		 
		#Defensor - Vehiculos


	  $mod=mt_rand(1,$b); #Personaje al Azar
	  $a1=$def[$mod];
	  $a2=sel("sw_users","", $a1); 
	  
		
		$mod=mt_rand(1,$d); #vehiculo al Azar
	  $v1=$dveh[$mod];
	  $v2=sel("sw_vehiculos","", $v1); 

		$punteria=mt_rand(0,100);

	  
		 switch($v2[arma]){ #Acción segun vehiculo
		  case "blaster":
					 $mod=mt_rand(1,$a); #objetivo al azar
					 $b1=$atk[$mod];
	   			 $b2=sel("sw_users","", $b1);
					
					 if ($punteria<$a2[inteligencia]){

					 		if ($b==0){
								 $dam=mt_rand(1,10);
					 			 $de-=$dam;
								 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra el escudo y daña <var>$dam PE ($de)</var>";
							}else{
								 $dam=mt_rand(1,600);
					 			 $b2[hp]-=$dam;
								 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$b1</b> y daña <var>$dam PV($b2[hp])</var>";
							}
							mysql_query("UPDATE sw_users SET hp='$b2[hp]' WHERE nombre='$b1'")or die(mysql_error());
 						    if ($b2[hp]<=0){$log.="<strong><small>KO</small></strong>";}
					 }else{
					 		$log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$b1</b> pero <var>falla</var>.";
			  	 }
			break;
			
			case "disruptor":
			
					$tar=mt_rand(0,1);
					
					if ($c==0){$tar=1;}
					if ($e==0){$tar=0;}
					if ($e==0 && $c==0){
						 $cle[potencia]+=100;
						 $log.="<br><b>$a1</b> intenta disparar <b>$v1</b> pero no hay objetivos";
					}else{
					 switch($tar){ #Selecciona tipo de objetivo
					 case "0": #Contra vehiculos
						 $mod=mt_rand(1,$c); #vehiculo objetivo al Azar
						 $w1=$aveh[$mod];
	  				 $w2=sel("sw_vehiculos","", $w1);
						 
					   if ($punteria<$a2[inteligencia]){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> y daña <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }else{
					 		 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> pero <var>falla</var>.";
			  	   }
												 
						 
					 break;
					 case "1": #contra cruceros
					 	 
					 	  $mod=mt_rand(1,$e);
  	  				$w1=$acr[$mod];
	  					$w2=sel("sw_vehiculos","", $w1); 
					 
					    if ($punteria<$a2[inteligencia]){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> y daña <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }else{
					 		 $log.="<br><b>$a1</b> dispara <b>$v1</b> contra <b>$w1</b> pero <var>falla</var>.";
			  	   }	
					 break;
					 					
			   }
			  }
			break;
			case "ariete":
					 if ($punteria<$a2[inteligencia]){
					 		$dam=mt_rand(0,200);
					 		$ae-=$dam;
				 		  $log.="<br><b>$a1</b> dispara <b>$v1</b> contra el escudo y daña <var>$dam PE ($ae)</var>.";
				   }else{
				 		  $log.="<br><b>$a1</b> dispara <b>$v1</b> contra el escudo pero <var>falla</var>.";
					 }
					 
			break;
		 }
}		 
			 if($ae<=0 || $de<=0){break;}


		 #Cruceros disparan
		 recuento("cru");
		if ($e>0){
		 #atacantes
	   $mod=mt_rand(1,$e);
	   $a1=$acr[$mod];
	   $a2=sel("sw_vehiculos","", $a1); 
	  
	   if ($a2[dam]>74){
	  	 $log.="<br><b>$a2[nombre]</b> intenta disparar pero está demasiado dañado.";
	   }else{
	  	 $dam=mt_rand(0,300);
		   $de-=$dam;
		   $log.="<br><b>$a2[nombre]</b> dispara contra los escudos y daña <b>$dam PE($de)</b>"; 
	   }
	  }
	 if ($f>0){
	  #defensores
	  $mod=mt_rand(1,$e);
	  $a1=$dcr[$mod];
	  $a2=sel("sw_vehiculos","", $a1); 
	  
	  if ($a2[dam]>74){
	  	 $log.="<br><b>$a2[nombre]</b> intenta disparar pero está demasiado dañado.";
	  }else{
	  	 $dam=mt_rand(0,300);
		 $ae-=$dam;
		 $log.="<br><b>$a2[nombre]</b> dispara contra los escudos y daña <b>$dam PE($ae)</b>"; 
	  }
	 }
			 if($ae<=0 || $de<=0){break;}
			
		 $atk_d=0;
		 $def_d=0;
		 $atk_v=0;
		 $def_v=0;	 
		 recuento("mil");
		 #Carga Miliciana
		 $pAtk=mt_rand(1,$atk_d);
		 $pDef=mt_rand(1,$def_d);
		 
		 $log.="<br><font color=\"#ffff99\">Carga Infantería:</font> <b>$cl[nombre]</b> con <b>$pAtk P</b> contra <b>$cle[nombre]</b> con <b>$pDef P</b>";
		 
		 if ($pAtk>$pDef){
		 		$dam=mt_rand(10,$atk_v);
				$de-=$dam;
				$log.="<br><b>$cl[nombre]</b> daña con su carga <b>$dam PE ($de)</b>";
		 }else{
		 		$dam=mt_rand(10,$def_v);
				$ae-=$dam;
				$log.="<br><b>$cle[nombre]</b> daña con su carga <b>$dam PE ($ae)</b>";		 
		 }
		 
		 			 if($ae<=0 || $de<=0){break;}

		 #Disparan las torres de la ciudad.
		 		if($cic[blaster]>0){
					 $mod=mt_rand(1,$a); #objetivo al azar
					 $b1=$atk[$mod];
	   			 $b2=sel("sw_users","", $b1);

				 			$punteria=mt_rand(0,200);

					 if ($punteria>$b2[destreza]){
					 		$dam=mt_rand(1,600);
					 		$b2[hp]-=$dam*$cic[blaster];
					 		
							$log.="<br><b>La(s) torre(s) Bláster</b> dispara(n) contra <b>$b1</b> y daña(n) <var>$dam PV($b2[hp])</var>";
							
							mysql_query("UPDATE sw_users SET hp='$b2[hp]' WHERE nombre='$b1'")or die(mysql_error());
 						    if ($b2[hp]<=0){$log.="<strong><small>KO</small></strong>";}
					 }
				}
				
		 		if($cic[damascus]>0){
						 $punteria=mt_rand(0,100);
					if ($punteria>50){
					 		$dam=mt_rand(0,200);
					 		$ae-=$dam;
				 		  $log.="<br><b>La(s) Torre(s) Damascus</b> dispara(n) contra los escudos y daña(n) <var>$dam PE ($ae)</var>.";
				   }		
				}
				
		 		if($cic[sam]>0){
					
						$tar=mt_rand(0,1);
			
					switch($tar){ #Selecciona tipo de objetivo
					 case "0": #Contra vehiculos
						 $mod=mt_rand(1,$c); #vehiculo objetivo al Azar
						 $w1=$aveh[$mod];
	  				 $w2=sel("sw_vehiculos","", $w1);
						 
						 $punteria=mt_rand(0,100);

					   if ($punteria>50){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>La(s) Torre(s) SAM</b> dispara(n) contra <b>$w1</b> y daña(n) <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }
						break;
						
						case"1": #Caso Cruceros
						  $mod=mt_rand(1,$e);
  	  				$w1=$acr[$mod];
	  					$w2=sel("sw_vehiculos","", $w1); 

					 						 $punteria=mt_rand(0,100);

					    if ($punteria>50){
					 		 $dam=mt_rand(1,30);
					 		 $w2[dam]+=$dam;
					 		
							 $log.="<br><b>La(s) Torre(s) SAM</b> dispara(n) contra <b>$w1</b> y daña(n) <var>$dam %($w2[dam])</var>";
							 mysql_query("UPDATE sw_vehiculos SET dam='$w2[dam]' WHERE nombre='$w1'")or die(mysql_error());
							  if ($w2[dam]>74){$log.="<strong><small>DERRIBADO</small></strong>";}
					   }
						break;
					}	 
							
				}
								
 		 			 if($ae<=0 || $de<=0){break;}
					 if($a==0 && $b==0){break;}
}
?>