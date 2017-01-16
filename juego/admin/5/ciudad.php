<?php
if ($ok){

	   $c= "INSERT INTO sw_city (nombre, planeta, clan, rey) VALUES ('$_GET[nombre]', '$_GET[pla]', '', '')"; 
	   $result= mysql_query($c)or die(mysql_error()); 
	   echo "<br>Tramites finalizados. $_GET[nombre] construida en $_GET[pla]!";

   		


}else{
?>
<form action="admin.php">
<b>Construir Ciudad:</b>
<br>Nombre: <input name="nombre" type="text" value="">
<br>Planeta: <input name="pla" type="text" value="">
<input name="nv" type="hidden" value="<?php=$_GET[nv]?>">
<input name="tip" type="hidden" value="ciudad.php">
<input type="submit" value="Fundar" name="ok">
</form>
<?php}

?>
