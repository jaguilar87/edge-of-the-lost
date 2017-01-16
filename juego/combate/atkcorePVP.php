<?php
	######################################
	## 	   STAR WARS - EDGES OF THE LOS WARRIORS 	 ##
	##	                 Attack system CORE in PvP 2.0 			 ##
	## 	              VERSTION UPDATED: 14/10/2005 		 ##
	## 	                                 JAGteam� 				 ##
	######################################
	
	//Randomize
	mt_srand ((double) microtime() * 1000000);
		
	//Asignar Arrays a los datos de los combatientes
	$at = textcolor ($us[nombre]);
	$de = textcolor ($ob[nombre]);
	$at[nomb] = "<font color=$at[txtc]>$at[nombre]</font>";
	$de[nomb] = "<font color=$de[txtc]>$de[nombre]</font>";
	
	//Calcular porcentajes vitales
	$at[por] = ( $at[hp] / $at[maxhp] ) * 100;
	$de[por] = ( $de[hp] / $de[maxhp] ) * 100;
						
	//mostrar avatares
?>
	<center>
		<table cellpadding=0 cellspacing=0>
			<tr valign='top' >

				<td width=150 align='right' >
					<img height=150 src='<?php=$at[avatar_path]?>'>
				</td>
				<td width=150>
					<img src='images/vs.jpg'>
				</td>
				<td  width=150>
					<img height=150 src='<?php=$de[avatar_path]?>'>
				</td>
			</tr>
			<tr>
				<td align=right>
					<b><?php=$at[nom]?></b>
				</td>
				<td align=center>
				</td>
				<td>
					<b><?php=$de[nom]?></b>
				</td>
			</tr>
		</table>
	</center>
						
	<p style='font-size: 10pt;'>
<?php		
	//Crear una array de almacenamiento
	$log = array ();

	//Crear un contador
	$i=0;
			
	//Incluir las funciones
	include 'combate/atkFUNC.php';
	
	//Antes del combate, medir si hay trance
	if ($at[nv_sable]>=3){
		$log[$i] = 'cFa.aTr.end';
		$i++;
	}
	
	//Iniciar codigo de combate
	while ($at[hp]>0 && $de[hp]>0){
		//Dentro del While se iran llamando las funciones de atkFUNC para
		//realizar el combate. Este durar� hasta que uno de los contrincantes quede a 0 de vida!
		
		//RONDA DE ARMAS:
		//El combatiente con mas destreza empieza siempre la rodna de armas
		if ($at[destreza]>$de[destreza]){
			mele($at,$de);
				if ($at[hp]<=0 || $de[hp]<=0) break;
			mele($de,$at);
				if ($at[hp]<=0 || $de[hp]<=0) break;
		}else{
			mele($de,$at);
				if ($at[hp]<=0 || $de[hp]<=0) break;
			mele($at,$de);
				if ($at[hp]<=0 || $de[hp]<=0) break;
		}
					
		//RONDAS DE ATAQUE DE LA FUERZA:
		//Aquel con mas inteligencia ataca primero
		if ($at[inteligencia]>$de[inteligencia]){
			golpef($at,$de);
				if ($at[hp]<=0 || $de[hp]<=0) break;
			golpef($de,$at);
				if ($at[hp]<=0 || $de[hp]<=0) break;
		}else{
			golpef($de,$at);
				if ($at[hp]<=0 || $de[hp]<=0) break;
			golpef($at,$de);
				if ($at[hp]<=0 || $de[hp]<=0) break;
		}
		
		//RONDAS DE RAYO Y CURA
		//Aquel con mas inteligencia ataca primero
		if ($at[inteligencia]>$de[inteligencia]){
			if ($at[lado]>0){
				curaj($at,$de);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}else{
				rayos($at,$de);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}
			if ($de[lado]>0){
				curaj($de,$at);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}else{
				rayos($de,$at);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}
		}else{
			if ($de[lado]>0){
				curaj($de,$at);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}else{
				rayos($de,$at);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}
			if ($at[lado]>0){
				curaj($at,$de);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}else{
				rayos($at,$de);
					if ($at[hp]<=0 || $de[hp]<=0) break;
			}
		}
		
			
	}
	
	//FINAL DEL CORE DE LOS COMBATES
?> 
