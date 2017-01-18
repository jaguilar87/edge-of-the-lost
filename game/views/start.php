<center><big><big><b>Noticias de SWedges - <?=Server::info("nombre")?></b></big></big></center>
<br>
<table border="0" cellpadding="10" cellspacing="1" summary="" bgcolor=silver width="100%">
<?
	$color1 = "black";
	$color2 = "#333333";
	$color = true;
	
	$sql = DB::query("SELECT * FROM noticias WHERE tipo='0' ORDER BY data DESC");
?>

<?	while ($r = mysql_fetch_array ($sql) ):?>
	<tr>
		<td align=justufy bgcolor="<?=($color) ? $color1 : $color2?>">
			<center><b><big><strong><?=$r[titulo]?></strong></big></b></center> 
      <br>
			<?=$r[noticia]?>	<br><br>
			<div align="right"><b>Por <i><?=$r[autor]?></i> el <i><?=$r[data]?></i></b></div>
		</td>
	</tr>
  <?$color = ($color) ? false : true;?>
<? endwhile;?>

</table>
