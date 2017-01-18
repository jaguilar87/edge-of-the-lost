<center>
	<b><big>Navegar hasta <strong><?=$planeta->datos[nombre]?> (<?=$destinox?>,<?=$destinoy?>)</strong></big></b>
</center>
<br/><br/><br/>


Las Rutas que te permitirán viajar hasta tu destino son:<br/><br/>

<table width="100%" cellpadding="3" cellspacing="1">
	<tr>
		<td>
			<b>Empresa</b>
		</td>
		<td>
			<b>Jugador</b>
		</td>
		<td>
			<b>Precio</b>
		</td>
		<td align="right">
		</td>
	</tr>

	<tr>
		<td>
			Pedir sitio en un Carguero
		</td>
		<td>
			Independiente
		</td>
		<td>
			<span  style="Color: <?=($ch->datos[creditos] >= 20000) ? C_VERDE:C_ROJO;?>;">
				<i>20.000</i><small>Cr</small>
			</span>
		</td>
		<td align="right">
			<a href="?a=<?=Security::out('a');?>&posx=<?=$destinox?>&posy=<?=$destinoy?>&empresa=-1">
				<img src="../images/icon/arr.gif" border="0" alt="Viajar">
			</a>
		</td>
	</tr>
	
</table><br/><br/>
</form>