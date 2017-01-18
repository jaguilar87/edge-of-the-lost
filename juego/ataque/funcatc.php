<? function recuento($tipo){

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
?>