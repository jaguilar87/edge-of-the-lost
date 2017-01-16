<?php
	######################################
	## 	   STAR WARS - EDGES OF THE LOS WARRIORS 	 ##
	##	            Attack system CORE in Clan VS City 2.0 		##
	## 	              VERSTION UPDATED: 19/10/2005 		 ##
	## 	                                 JAGteam� 				 ##
	######################################
	
	//Randomize
	mt_srand ((double) microtime() * 1000000);
		

	//meter clan enemigo en array
	$ob = sel ("sw_clan", "", $cic[clan]);


	//mostrar avatares
?>
	<center>
		<table cellpadding=0 cellspacing=0>
			<tr valign='top' >

				<td width=150 align='right' >
					<img height=150 src='<?php=$cat[bandera]?>'>
				</td>
				<td width=150>
					<img src='images/vs.jpg'>
				</td>
				<td  width=150>
					<img height=150 src='<?php=$cde[bandera]?>'>
				</td>
			</tr>
			<tr>
				<td align=right>
					<b><?php=$cat[nombre]?></b>
				</td>
				<td align=center>
				</td>
				<td>
					<b><?php=$cde[nombre]?></b>
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
	include 'combate/atkFUNC_ciudad.php';
	
?>
