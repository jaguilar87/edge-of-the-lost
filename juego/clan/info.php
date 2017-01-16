<?php 
	include_once 'header.php';
?>
	<table width='100%' cellpadding=4 cellspacing=4>
		<tr valign="TOP">
			<td width=200>
				<img width=200 src='<?php=$cli[bandera]?>'>
			</td>
			<td>
<?php
				$lid = textcolor($cli[lider]);
				echo "<b>L�der:</b> <a href='lista/info.php?us=$lid[nombre]'>$lid[nom]</a><br>";
				echo "<b>Hermandad: </b>";
					echo ($cli[hermandad]=='Jedi') ? $jedi : $sith;
					echo "</b>$cli[hermandad]</font><br>";
				echo "<b>Fondos:</b> $cli[fondos]<br>";
				echo "<b>Poder:</b> $cli[puntos]<br>";
				echo "<b>Mineral:</b> $cli[mineral]<br>";
				echo "<b>Pot�ncia:</b> $cli[potencia]W<br>";
				echo "<b>Sueldo generador:</b> $cli[pago]C/t<br>";
if ($us[clan]==$cli[nombre]){				
?>
				<br><br><small>
				<form action="clan/" Method="GET">
					Donar
					<input name="cre" align="right" style='width:50px' type="text" value="0">
					<input name="id" type="hidden" value="donar">
					Cr�ditos al clan. <input type="submit" value="Donar">
				</form></small>
<?php
}
?>				
			</td>
		</tr>
	</table><hr>
<?php
	echo $cli[dtxt];
	include_once 'footer.php';
?>
