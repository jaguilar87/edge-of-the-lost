<?php 
if ($ci[nombre]==""){echo "La ciudad ha sido arrasada";}else{
if ($ci[ayuda] =="S"){
?>
Recuerda que al trabajar tus puntos de lado aumentan hacia el lado de la luz.<br>
<form method="GET" action="ciudad/">
<input type="hidden" name="id" value="trabok" />
<table width="100%" cellspacing="7"><caption ALIGN="TOP"><center><font color="#bbf3f3"><b>Trabajo</b></font></center></caption>
<tr bgcolor="#3f3f3f"><td><b>Trabajo</b></td><td><b>Info</b></td></tr>

<tr><td><input name="tr" type="radio" value="ambulante"> Mercader</td><td><i>Venta de trastos</i></td></tr>
<tr><td><input name="tr" type="radio" value="tendero"> Tendero</td><td><i>Venta productos (Inteligencia)</i></td></tr>
<tr><td><input name="tr" type="radio" value="reponedor"> Reponedor</td><td><i>Reponedor de productos (Vigor)</i></td></tr>
<tr><td><input name="tr" type="radio" value="artesano"> Artesano</td><td><i>Venta de ceramica (Destreza)</i></td></tr>
<tr><td><input name="tr" type="radio" value="portero"> Portero</td><td><i>Vigilancia (Constituci�n)</i></td></tr>

</table>
<input type="submit" value="Trabajar">

</form>



<?php
}else{echo 'La ciudad en la que te hayas no dispone de puestos de trabajo...';}

?>
<br>- La ciudad dispone de un <a href="ciudad/?id=igenerador">Generador</a>

<br><br>No hay m�s trabajos disponibles...

<?php 
}


?>
