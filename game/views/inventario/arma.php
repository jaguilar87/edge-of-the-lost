<table width="100%" cellpadding="5" cellspacing=1 bgcolor="white">
	<tr>
		<td align=center width="30%" bgcolor="Black" valign="top">
			<strong>Arma Activa</strong><br/><br/>
			<?
				loadModel("Weapon");
				if ($ch->datos[weapon] == 0):
			?>
				Sin Arma
			<?
				else:
					$wea = $ch->metadatos[weapon];
					$img = $wea->datos[tipo].$wea->datos[color];
			?>
				<img src="../images/sables/<?=$img?>.jpg" border=0><br/>
				Daño: <?=$wea->datos[danoMinimo]?> ~ <?=$wea->datos[danoMaximo]?> <br/>
				Media: <?=($wea->datos[danoMinimo]+$wea->datos[danoMaximo])/2?>

			<?					
				endif;
			?>
		</td>
		<td width="70%" bgcolor="Black" valign="top">
			<b>Armas en Inventario</b><br/><br/>
			<?
				$sql = DB::query("SELECT id FROM weapons WHERE owner='".$ch->datos[id]."'");
				while($r = DB::fetch($sql)):
					$w = new Weapon(array("id" => $r[id]));
					
					if ($ch->datos[weapon] == $r[id]):
			?>
					<a href="?a=<?=Security::out("a")?>&blandir=0" onmouseout="htm()" onmouseover="stm(['<?=$w->datos[nombre]?>','Daño: <?=$wea->datos[danoMinimo]?> ~ <?=$wea->datos[danoMaximo]?> <br/> Media: <?=($wea->datos[danoMinimo]+$wea->datos[danoMaximo])/2?>'], Style[0])">
						<img border="0" src="../images/icon/sable_on.gif"> <?=$w->nombre()?>
					</a>
			<?
					else:
			?>
					<a href="?a=<?=Security::out("a")?>&blandir=<?=$r[id]?>" onmouseout="htm()" onmouseover="stm(['<?=$w->datos[nombre]?>','Daño: <?=$wea->datos[danoMinimo]?> ~ <?=$wea->datos[danoMaximo]?> <br/> Media: <?=($wea->datos[danoMinimo]+$wea->datos[danoMaximo])/2?>'], Style[0])">
						<img border="0" src="../images/icon/sable_off.gif"> <?=$w->nombre()?>
					</a>
			<?
					endif;
				endwhile;
			?>
		</td>
	</tr>
</table>
<br/><br/>

<center><?=Views::printMessage()?></center>