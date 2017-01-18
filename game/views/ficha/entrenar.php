<center>
<table summary="" cellspacing=0 cellpadding=2 bgcolor=white>
    <tr>
     <td bgcolor="black">
        <b>ATR</b>
     </td>
     <th bgcolor="black" colspan=2 align=center>
        Cantidad
     </th>
     <td bgcolor=black align="center">
        <b>Coste</b>
     </td>
     <td bgcolor="black" width=50 align=center>
		 <b>+1</b>
     </td>
     <td bgcolor="black" width=50 align=center>
		<b>+5</b>
     </td>
     <td bgcolor="black" width=50 align=center>
     	<b>+10</b>
	 </td>
    </tr>
	<tr>
		<th colspan=7 height=10 bgcolor="black"></th>
	</tr>
		
  <?
  function generar_barra($nom, $color){
  	global $ch;
  	$precio = floor($ch->datos[$nom] * 15);
  ?>
    <tr>
     <td bgcolor="black">
        <small><?=strtoupper(substr($nom, 0,3))?></small>
     </td>
     <td bgcolor="black" width=100>
        <img src="../images/bars/<?=$color?>.gif" height=10 width=<?=$ch->datos[$nom] / $ch->atributoMax() * 100; ?> >
     </td>
      <td bgcolor="black">
      	 <var><?=$ch->datos[$nom]?></var>/<?=$ch->atributoMax($nom);?>
      </td>
     <td bgcolor=black width=75 align="center">
        <var style="color:<?=C_NARANJA?>;"> <?=$precio?><small>Cr</small> </var>
     </td>
     <td bgcolor="black" width=50 align=center>
     <? if ($ch->datos[creditos] >= $precio AND $ch->datos[$nom]+1 <= $ch->atributoMax($nom)): ?>
        <a href="?a=ficha/entrenar&entre=<?=$nom?>">+1<img src="../images/icon/upv.gif" alt="+1" border=0></a>
     <? endif; ?>
     </td>
     <td bgcolor="black" width=50 align=center>
     <? if ($ch->datos[creditos] >= ($precio * 5) AND $ch->datos[$nom]+5 <= $ch->atributoMax($nom)): ?>
        <a href="?a=ficha/entrenar&entre=<?=$nom?>&mul=5">+5<img src="../images/icon/upv.gif" alt="+1" border=0></a>
     <? endif; ?>
     </td>
     <td bgcolor="black" width=50 align=center>
     <? if ($ch->datos[creditos] >= ($precio * 10) AND $ch->datos[$nom]+10 <= $ch->atributoMax($nom)): ?>
        <a href="?a=ficha/entrenar&entre=<?=$nom?>&mul=10">+10<img src="../images/icon/upv.gif" alt="+1" border=0></a>
     <? endif; ?>
     </td>
    </tr> 
  <?     
  }
  generar_barra("vigor", 1);
  generar_barra("constitucion", 3);
  generar_barra("destreza", 5);
  generar_barra("agilidad", 2);
  generar_barra("inteligencia", 4);
  //generar_barra("vigor", 1);
  //135247
  ?>
</table>

<br/>
<? 
	loadModel("Clases");
	Clases::load($ch->datos[clases]);
?>
Tienes <var><?=$ch->datos[entrenamientos];?></var> punto(s) para repartir en Profesiones.<br/>
<table width="100%" cellpadding="5">
	<tr>
		<td width="50%" valign="top">
			<? 
				if ($ch->datos[entrenamientos] > 0 and Picaro::$nivel <= 10):
			?>
				<a href="?a=ficha/entrenar&job=Picaro">
					<img src="../images/icon/upr.gif" alt="+1" border=0>
				</a>
			<?			
				endif;
				echo Picaro::habilidades();
			?>
		</td>
		<td width="50%" valign="top">
			<? 
				if ($ch->datos[entrenamientos] > 0 and Soldado::$nivel <= 10):
			?>
				<a href="?a=ficha/entrenar&job=Soldado">
					<img src="../images/icon/upr.gif" alt="+1" border=0>
				</a>
			<?			
				endif;
				echo Soldado::habilidades();
			?>
		</td>
	</tr>
	<tr>
		<td width="50%" valign="top">
			<? 
				if ($ch->datos[entrenamientos] > 0 and Artesano::$nivel <= 10):
			?>
				<a href="?a=ficha/entrenar&job=Artesano">
					<img src="../images/icon/upr.gif" alt="+1" border=0>
				</a>
			<?			
				endif;
				echo Artesano::habilidades();
			?>
		</td>
		<td width="50%" valign="top">
			<? 
				if ($ch->datos[entrenamientos] > 0 and Piloto::$nivel <= 10):
			?>
				<a href="?a=ficha/entrenar&job=Piloto">
					<img src="../images/icon/upr.gif" alt="+1" border=0>
				</a>
			<?			
				endif;
				echo Piloto::habilidades();
			?>
		</td>
	</tr>
</table>

<br/><br/>

<?=Views::printMessage();?>
</center>