<?php
mt_srand ((double) microtime() * 1000000);



$log.="<big><big><center><font color=\"$us[txtc]\"> $us[titulo] $us[prefix] $us[nombre]</b></font> <br>Vs<br> <font color=\"$ob[txtc]\"> $ob[titulo] $ob[prefix] $ob[nombre]</b></font></center></big></big><br><br><small>";

$sor=0;
$m=0;


function mele($one,$two){
		 
		 #<!-- definir -->
		 $one=textcolor($one);
		 $two=textcolor($two);
		 $one[nom]="<small><font color=\"$one[txtc]\"><b>$one[nombre]</b></font></small>";
		 $two[nom]="<small><font color=\"$two[txtc]\"><b>$two[nombre]</b></font></small>";
		 
		 #<!-- modificadores -->
		 $punteria = mt_rand(-10,20)+$one[destreza];
		 $esquive =  mt_rand(-10,20)+$two[destreza];

		 #<!-- tasa crítica -->
		 $crit=mt_rand(0,100);
		 if ($one[nv_sable]>=3){
		    $modlado=($one[lado]*$one[lado])/800;
		    $hero=mt_rand(1,$modlado); 
		    $crit+=$hero;
		 }
		 
		 #<!-- comprobar crítico -->
		 if ($crit>90){
		    $dano=  (mt_rand(-10,20)+$one[vigor]);
		    if ($dano<=0){$dano=1;}
		   	   $punteria+=20;
   			   if ($punteria > $esquive){ 
			   	  $two[hp]-=$dano; 
			   	  $log.="<br><font color=\"#c0c0c0\">CRITICO:</font> $one[nom]</b> ataca a $two[nom]</b> y daña <var>$dano PV($two[hp])</var>! ";
   	  			  
				  if ($one[nv_sable]>=3){
	  	 		  	 if ($one[lado]>0){
					 	$log.=  "<font color=\"#a6ebff\">¡ACTO HEROICO!</font>";
					 }else{
					 	$log.=  "<font color=\"#ff0000\">¡FURIA SITH!</font>";
					 }
				  }
	  		   }
   		 }else{
   		    $dano=  (mt_rand(-10,20)+$one[vigor]) - (mt_rand(-10,25)+$two[constitucion]);
   			if ($dano<=0){$dano=1;}
   			if ($punteria > $esquive){ 
			   $two[hp]-=$dano;
			   $log.="<br>$one[nom]</b> ataca a $two[nom]</b> y daña <var>$dano PV($two[hp])</var>!";
			}
	     }
		 
			$c = "UPDATE `sw_users` SET hp='$one[hp]' WHERE nombre='$one[nombre]'";
			$result = mysql_query($c)or die(mysql_error());

			$c = "UPDATE `sw_users` SET hp='$two[hp]' WHERE nombre='$two[nombre]'";
			$result = mysql_query($c)or die(mysql_error());
			
			return $log;
}


function power($one, $two){
		 
		 #<!-- definir -->
		 $one=textcolor($one);
		 $two=textcolor($two);
		 $one[nom]="<small><font color=\"$one[txtc]\"><b>$one[nombre]</b></font></small>";
		 $two[nom]="<small><font color=\"$two[txtc]\"><b>$two[nombre]</b></font></small>";

		 #<!-- Modificadores -->
		 $punteria=mt_rand(-10,20) + $one[inteligencia];
		 $esquive=mt_rand(-10,20) + $two[inteligencia];
		 
		 
		 #<!-- Daños -->
		 $dano=( $one[poder] + mt_rand(-20,30) ) - ( $two[poder] + mt_rand(-20,30) );
		 if ($dano<=0){$dano=1;}
		 
		 #<!-- Comprobación AURA/PODER-->
	  	 $aura = mt_rand(0, $one[lado]) /2;
		 if ($aura>=50 && $one[nv_sable]>=3 && $one[lado]>0){
		 	$aurax=true;
	   	    $extra=mt_rand(0,$one[poder])/5;
		 	$dano+=$extra;
		 }
		 
		 if ($punteria>$esquive){
		 	$two[hp]-=$dano;
			$log.="<br>$one[nom]</b> realiza un <b>Ataque de la fuerza</b> y daña <var>$dano PV($two[hp])</var>!";
		 
		 	if ($aurax){
		 	   $log.= "<font color=\"#a6ebff\">¡AURA LUMINOSA!</font>";
		 	}
		 }
			
			$c = "UPDATE `sw_users` SET hp='$one[hp]' WHERE nombre='$one[nombre]'";
			$result = mysql_query($c)or die(mysql_error());

			$c = "UPDATE `sw_users` SET hp='$two[hp]' WHERE nombre='$two[nombre]'";
			$result = mysql_query($c)or die(mysql_error());
			
			return $log;
		
}


function advance($one, $two){

		 #<!-- definir -->
		 $one=textcolor($one);
		 $two=textcolor($two);
		 $one[nom]="<small><font color=\"$one[txtc]\"><b>$one[nombre]</b></font></small>";
		 $two[nom]="<small><font color=\"$two[txtc]\"><b>$two[nombre]</b></font></small>";

		 #<!-- Comprobar nivel para poder -->
		 if ($one[nv_sable]>1){ 
		 	
			#<!--CURA Jedis -->
			if ($one[lado]>0){ 
		       $cura=mt_rand(0,$one[lado])/2;
			   if ($cura>=50){
   	  		   	  $hp=mt_rand(0,$one[poder])/5;
	  			  $one[hp]+=$hp;
	  			  $log.="<br>$one[nom] <font color=\"#a6ebff\"> utiliza su poder para curarse <var>$hp PV ($one[hp])</var>!</font>";
               }	  
			
			}else{
			
			#<!--RAYO sith -->
   			   $rayo=mt_rand($one[lado],0)/-2;
   			   if ($rayo>=50){
   	  		   	  $dano=mt_rand(0,$one[poder])/5;
	  			  $two[hp]-=$dano;
  	  			  $log.="<br>$one[nom] <font color=\"#ff0000\"> utiliza su poder para lanzar un rayo dañando <var>$dano PV ($two[hp])</var>!</font>";
	  			  
				  #<!-- Comprobación FURIA SITH -->
	  			  if ($one[nv_sable]>=3 && $one[lado]<=0){
	  	 		  	 $fur=mt_rand($one[lado],0)/-2;
	  	 		 	 if ($fur>=50){
		 			    $one[hp]+=$dano;
						$log.= "<font color=\"#ff0000\">¡DRENAJE!</font>";
		 		     }
	              }	  
    		   }  
			}
		 }
			
			$c = "UPDATE `sw_users` SET hp='$one[hp]' WHERE nombre='$one[nombre]'";
			$result = mysql_query($c)or die(mysql_error());

			$c = "UPDATE `sw_users` SET hp='$two[hp]' WHERE nombre='$two[nombre]'";
			$result = mysql_query($c)or die(mysql_error());
			
			return $log;
}




while ($us[hp]>0 || $ob[hp]>0){

	  #<!--ATAQUE SORPRESA-->
	  
	  	 $us=textcolor($us[nombre]);
		 $ob=textcolor($ob[nombre]);
		 $us[nom]="<small><font color=\"$us[txtc]\"><b>$us[nombre]</b></font></small>";
		 $ob[nom]="<small><font color=\"$ob[txtc]\"><b>$ob[nombre]</b></font></small>";
		 
	  if ($sor==0){
	     $modi1=mt_rand(-50,50);
		 $modi2=mt_rand(-50,50);
		 $modi3=mt_rand(-50,50);
		 $modi4=mt_rand(-50,50);

		 $astu=$us[inteligencia]+$modi1;
   		 $velo=$us[destreza]+$modi2;

   		 $tat=$astu+$velo;

   		 $esqu=$ob[destreza]+$modi3;
   		 $defe=$ob[constitucion]+$modi4;

   		 $tde=$esqu+$defe;

   		 if ($tat>$tde){
   	  	 	$dano=mt_rand(0,$us[vigor]);
   	  		$dano+=20;
   	  		$ob[hp]-=$dano;
   	  		$log.="<font color=\"#ffff9d\">ATAQUE SORPRESA:</font> $us[nom] se escabulle entre las sombras y lanza un ataque sorpresa! Daña <var>$dano PV ($ob[hp])!</var>";
   	     }else{
   	  	 	$dano=mt_rand(0,$ob[vigor]);
   	  		$dano+=20;
   	  		$us[hp]-=$dano;
   	  		$log.="<font color=\"#ffff9d\">ATAQUE SORPRESA:</font> $ob[nom] prepara una emboscada a $us[nom] y daña <var>$dano PV ($us[hp])!</var>";
         }
   		 	$c = "UPDATE `sw_users` SET hp='$us[hp]' WHERE nombre='$us[nombre]'";
			$result = mysql_query($c)or die(mysql_error());

			$c = "UPDATE `sw_users` SET hp='$ob[hp]' WHERE nombre='$ob[nombre]'";
			$result = mysql_query($c)or die(mysql_error());
		 $sor=1;
      }

#<!--COMBTATE-->

#mele
if ($us[destreza]>=$ob[destreza]){
   $log.= mele($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}	
   $log.= mele($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}else{
   $log.= mele($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
   $log.= mele($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}
   
#poder
if ($us[inteligencia]>=$ob[inteligencia]){
   $log.= power($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
   $log.= power($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}else{
   $log.= power($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
   $log.= power($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}

#avanzado
if ($us[poder]>=$ob[poder]){
   $log.= advance($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
   $log.= advance($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}else{
   $log.= advance($ob[nombre],$us[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
   $log.= advance($us[nombre],$ob[nombre]); $us=textcolor($us[nombre]); $ob=textcolor($ob[nombre]); if ($us[hp]<=0 || $ob[hp]<=0){break;}
}
  


}

?>