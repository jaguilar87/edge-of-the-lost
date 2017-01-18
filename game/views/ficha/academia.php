<? if ($ch->datos[rango] == 1): ?>
¿Hola? ¿Que haces tu por aquí? Este es un sitio peligroso. Un lugar de meditación y entrenamiento.<br/>
Aunque si has venido a ingresar, estás en el lugar indicado. No obstante de algo tendremos que vivir, 
así que para empezar a instruirte deberás pagar <strong>50.000</strong><small>Cr</small>.<br/><br/>

Pero antes un aviso, vigila tus pasos, ya que tus acciones pueden llevarte hacia el bien más absoluto
o hacia la maldad mas profunda y oscura. Será tu misión elegir bien el camino...<br/><br/>

<center><a href="?a=ficha/academia&entrar=ok"><img src="../images/icon/up.gif" border=0> Pagar los 50.000<small>Cr</small> para entrar.</a></center>

<? else:?>

	<?if($ch->ListoParaRango2()):?>


	<?endif;?>
<center>
	<table width="90%" cellpadding="5">
	
<?
		loadModel("Habilidad");
		loadModel("Ref_habilidad");		
		
		for ($i=2; $i <= $ch->datos[rango]; $i++):
			$j = 0;
		
			$rango = new Rango(array("id"=>$i));
			$rnombre = $rango->datos[nombre_jedi];
			if ($ch->lado() < 0) $rnombre = $rango->datos[nombre_sith];
?>
			<tr><th colspan="2"><strong><center><?=$rnombre?></center></strong></th></tr>
<?		
			$sql = DB::query("SELECT id FROM ref_habilidades WHERE (lado='".$ch->lado()."' OR lado='0') AND (clase='".$ch->datos[clase]."' OR clase='0') AND rango='$i' ORDER BY tipo ASC");
			while ($r = DB::fetch($sql)):
				$h = new Habilidad(array("hab"=>$r[id], "char"=> $ch->datos[id]));
				$w = new Ref_habilidad($r);
				if($h->datos[nv]=="")$h->datos[nv]=0;
				if ($j==0) echo "<tr>";
				
				if($w->datos[tipo] == 1) $tipo = "Pasiva";
				if($w->datos[tipo] == 2) $tipo = "Activa";
				if($w->datos[tipo] == 3) $tipo = "Combativa";
				
				$text = "<strong>Descripción:</strong> ".str_replace("\r\n","", $w->datos[descripcion]).BR;
				$text .= "<strong>Tipo:</strong> ".$tipo.BR;
				$text .= "<strong>Nv Max:</strong> ".$w->datos[maxlvl].BR;
				$text .= "<strong>Clase:</strong> Común".BR;
?>
				<td align="left" width="50%">
					<a 
						href="?a=<?=Security::out('a')?>&train=<?=$w->datos[id]?>"
						onmouseout="htm()"
						onmouseover="stm(['<?=$w->datos[nombre]?>', '<?=$text?>'], Style[0])"
					>
						<img border="0" src="../images/icon/hab-<?=$w->datos[tipo]?>.gif">
						<?=$w->datos[nombre]?>
					</a>  
					Nv<?=$h->datos[nv]?>
				</td>
<?
				$j++;
				if ($j==2){
					echo "</tr>";
					$j = 0;
				}
			endwhile;
		endfor;
?>
	</table>
</center>
<? endif;?>

<br/><br/>
<center><?=Views::printMessage()?></center>