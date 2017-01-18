<center>
<big><b><?=$usa->metadatos[mainchar]->nombre()?> <img src="../images/icon/<?=$usa->metadatos[mainchar]->datos[sexo]?>.gif"></b></big>
		
<table cellpadding=20 cellspacing=0 width="100%" border="0">
	<tr>
		<td align="center" valign="top" width="50%">
		
			<? if ($propio): echo "<a href='?a=ficha/avatar'>" ?>
			<img src="<?=$usa->metadatos[mainchar]->datos[avatar]?>" alt="AVATAR NO DEFINIDO" border="0"><br>"<i><?=$usa->metadatos[mainchar]->datos[slogan]?></i>"
			<? endif; ?>
		
		</td>
		<td valign="top" align="center" width="50%">
     
		<? if ($propio):?>
			<small><b>Atributos</b></small><br>
			<table border="0" cellpadding="0" cellspacing="1" width=135 bgcolor=white>
				<tr height=10 bgcolor=black>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>VIG</small></b></td>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>CON</small></b></td>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>DES</small></b></td>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>AGI</small></b></td>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>INT</small></b></td>
					<td width="20" align="center" style="font: 8pt arial;"><b><small>POD</small></b></td>
				</tr>


				<tr height=100 bgcolor=black>
        <?
        	function barraAtributo($nombre, $color){
					global $usa;
        ?>
					<td width="20" align='center' valign="bottom">
						<img src="../images/bars/v<?=$color?>.gif" alt="" width="20" height=<?=($usa->metadatos[mainchar]->datos[$nombre]/$usa->metadatos[mainchar]->atributoMax())*100?> border="0">
					</td>
			  <?
					}

					barraAtributo("vigor", 1);
					barraAtributo("constitucion", 3);
					barraAtributo("destreza", 4);
					barraAtributo("agilidad", 5);
					barraAtributo("inteligencia", 2);
        ?>									
					
					<td width="20" align='center' valign="bottom"> 
						<img src="../images/bars/v7.gif" alt="" width="20" height=<?=$usa->metadatos[mainchar]->datos[poder]/10*100?> border="0">
					</td>
	      </tr>

	            <tr bgcolor=black>
	       		 
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[vigor]?></small>
					</td>
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[constitucion]?></small>
					</td>            
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[destreza]?></small>
					</td>
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[agilidad]?></small>
					</td>
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[inteligencia]?></small>
					</td>
					<td width="20" style='font: 9pt arial;' align='center' valign="bottom">
						<small><?=$usa->metadatos[mainchar]->datos[poder]?></small>
					</td>
				
				</tr>
			</table>
			<br>
         
			<table border="0" cellpadding="1" cellspacing="1" bgcolor="white" width=135>
				<tr bgcolor="black">
					<td>Estrés&nbsp;</td>
					<td width="50"><img src="../images/bars/6.gif" height=11 width=<?=$usa->metadatos[mainchar]->datos[estres]/19?>></td>
					<td>&nbsp;<var><?=$usa->metadatos[mainchar]->datos[estres]?></var>/<var>1000</var></td>
				</tr>
			</table>
			
			<br>
			<?
			if ($usa->metadatos[mainchar]->datos[alineamiento] > 0){
				$align = "left";
				$color = "8";
				$width = round($usa->metadatos[mainchar]->datos[alineamiento]/70);
			}else{
				$align = "right";
				$color = "1";
				$width = round($usa->metadatos[mainchar]->datos[alineamiento]/-70);
			}
			?>
         
			<table border="0" cellpadding="0" cellspacing="1" bgcolor="white" width=135>
				<tr bgcolor="black">
					<td align="center">Alineamiento</td>
				</tr>
				<tr bgcolor="black">    
					<td align=<?=$align?>><img src="../images/bars/<?=$color?>.gif" height=7 width=<?=$width?>></td>
				</tr>
			</table>
     
		<? else: ?>
				
			<a href="?a=mensajeria/enviar&to=<?=$usa->metadatos[mainchar]->datos[nombre]?>"><?=I_msg?> Escribir un mensaje</a>     
		
		<? endif; ?>
     
		</td>
	</tr>
	<tr>
		<td align="center" valign="top">
        
			<table border="0" cellpadding="3" cellspacing="0" width="200">
				<tr>
					<td><b>Raza:</b></td>
					<td align="right"><?=$usa->metadatos[mainchar]->metadatos[raza]->datos[nombre]?></td>           
				</tr>
				
				<?
					if ($usa->metadatos[mainchar]->datos[rango] > 1){
						if ($usa->metadatos[mainchar]->datos[alineamiento] > 0){
							$rango = $usa->metadatos[mainchar]->metadatos[rango]->datos[nombre_jedi];
						}else{
							$rango = $usa->metadatos[mainchar]->metadatos[rango]->datos[nombre_sith];
						}
					}else{
						$rango = "Usuario de la Fuerza";
					}
				?>
				<tr>
					<td><b>Rango:</b></td>
					<td align="right"><?=$rango?></td>
				</tr>

				<?
					if ($usa->metadatos[mainchar]->datos[clan] != 0){
						$rango = $usa->metadatos[mainchar]->metadatos[clan]->datos[nombre];
					}else{
						$clan = "Sin clan";
					}
				?>				   
				<tr>
					<td><b>Clan:</b></td>
					<td align="right"><?=$clan?></td>
				</tr>          
			</table>
		
		</td>
		<td valign="top" align="center">
     
			<table border="0" cellpadding="4" cellspacing="0" summary="">
				<tr>
					<td><b>Créditos:</b></td>
					<td align="right"><var><?=numero($usa->metadatos[mainchar]->datos[creditos])?></var>C</td>
				</tr>
				<tr>
					<td><b>P. de Gloria:</b></td>
					<td align="right"><var><?=numero($usa->metadatos[mainchar]->datos[gloria])?></var>P</td>
				</tr>
				<tr>
					<td><b>P. de Mérito:</b></td>
					<td align="right"><var><?=numero($usa->metadatos[mainchar]->datos[merito])?></var>P</td>
				</tr>
			</table>
		
		</td>
	</tr> 
</table>
</center>