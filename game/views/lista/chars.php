<?
	$por = Security::out('por');
	if (empty($por)) {
		$por = "gloria";
	}
	
	$orden = Security::out('orden');
	if (empty($orden)){
		$orden = "ASC";
	}
	
	$start = Security::out('start');
	if (empty($start)){
		$start = "0";
	}
  
	$rango = Security::out('rango');
	if (empty($rango)){
		$rango = $ch->datos[rango];
	}  
	
	$hdef= "&start=".$start."&rango=".$rango;
  
	$color1 = "#444444";
	$color2 = "black";
	$color = false;
	
	$sql = DB::query("SELECT * FROM chars WHERE rango='$rango' ORDER BY $por $orden LIMIT $start,20");
?>

<b><big>Lista de Jugadores</big></b>
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor=black>
	<tr background="../images/template/bg2.gif">
		<td>
			<b>Nombre</b>
		</td>
		<td align="center">
			<b>Clan</b>      
		</td>
		<td align="center">
			<b>Creditos</b>      
		</td>
		<td align="center">
			<b>Gloria</b><br>     
		</td>
		<td align="center">
			<b>Mérito</b>    
		</td>
	</tr>
	<tr>
		<td>
			<a href="?a=lista/chars<?=$hdef?>&orden=ASC&por=nombre"><img border="0" src="../images/icon/arra.gif"></a>
			<a href="?a=lista/chars<?=$hdef?>&orden=DESC&por=nombre"><img border="0" src="../images/icon/arrb.gif"></a>
		</td>
		<td align="center">
			<a href="?a=lista/chars<?=$hdef?>&orden=ASC&por=clan"><img border="0" src="../images/icon/arra.gif"></a>
			<a href="?a=lista/chars<?=$hdef?>&orden=DESC&por=clan"><img border="0" src="../images/icon/arrb.gif"></a>      
		</td>
		<td align="center">
			<a href="?a=lista/chars<?=$hdef?>&orden=ASC&por=creditos"><img border="0" src="../images/icon/arra.gif"></a>
			<a href="?a=lista/chars<?=$hdef?>&orden=DESC&por=creditos"><img border="0" src="../images/icon/arrb.gif"></a>      
		</td>
		<td align="center">
			<a href="?a=lista/chars<?=$hdef?>&orden=ASC&por=gloria"><img border="0" src="../images/icon/arra.gif"></a>
			<a href="?a=lista/chars<?=$hdef?>&orden=DESC&por=gloria"><img border="0" src="../images/icon/arrb.gif"></a>      
		</td>
		<td align="center">
			<a href="?a=lista/chars<?=$hdef?>&orden=ASC&por=merito"><img border="0" src="../images/icon/arra.gif"></a>
			<a href="?a=lista/chars<?=$hdef?>&orden=DESC&por=merito"><img border="0" src="../images/icon/arrb.gif"></a>      
		</td>
	</tr>
  
<? while($r = DB::fetch($sql)): ?>
	<? $cha = new Char (array("id" => $r[id])); ?>
	<tr bgcolor="<?= ($color) ? $color1 : $color2 ?>">
		<td>
			<a href="?a=mensajeria/enviar&to=<?=$cha->datos[nombre]?>"><?=I_msg?></a>  
			<a href="?a=ficha/ficha&char=<?=$cha->datos[id];?>"><?=$cha->nombre();?></a> 
			<img border="0" src="../images/icon/<?=$cha->datos[sexo];?>.gif" border="0">
		</td>
		<td align="center"></td>
		<td align="center"><?=$cha->datos[creditos];?></td>
		<td align="center"><?=$cha->datos[gloria];?></td>
		<td align="center"><?=$cha->datos[merito];?></td>
	</tr>
	<? $color = ($color) ? false : true; ?>
<? endwhile; ?>

</table>
<br />

<table align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td>
			<form action="?a=lista/chars" method="post">
				Mostrar rango: <select name="rango">
	
				<? $lista = DB::query("SELECT * FROM rangos ORDER BY id"); ?>
				<? while($l = DB::fetch($lista)): ?>
					<?
					if ($ch->datos[alineamiento] > 0){
						$rango = $l[nombre_jedi];
					}else{
						$rango = $l[nombre_sith];
					}
					?>
		
					<option value="<?=$l[id]?>"><?=$rango?></option>
				
				<? endwhile; ?>
				
				</select>
				<input type="submit" value="Mostrar" />
			</form>
		</td>
	</tr>
</table>