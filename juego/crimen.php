<?php include 'header.php';
if ($ci[nombre]==""){echo "La ciudad ha sido arrasada";}else{
if ($ci[ley] =="S"){echo 'Cuidado, la ciudad dispone de leyes, pueden atraparte...';} 
?>
Recuerda que al cometer un crimen tus puntos de lado disminuyen hacia el lado oscuro.<br>
<form method="GET" action="crimok.php">
<table width="100%" cellspacing="7"><caption ALIGN="TOP"><center><font color="#f3aba5"><b>Crimen</font></center></caption>
<tr bgcolor="#3f3f3f"><td width=*><b>Crimen</b></td><td><b>Info</b></td></tr>
<?php if ($us[nv_sable]>=0){?>
<tr><td><input name="tr" type="radio" value="desguace"> Robar en Desguace</td><td><i>Venta de trastos del desguace</i></td></tr>
<tr><td><input name="tr" type="radio" value="pedir"> Pedir</td><td><i>Pedir dinero (Inteligencia)</i></td></tr>
<tr><td><input name="tr" type="radio" value="maquina"> Romper máquina</td><td><i>Sacar dinero de máquinas expendedoras (Vigor)</i></td></tr>
<tr><td><input name="tr" type="radio" value="bolsillo"> Vaciar Bolsillos</td><td><i>Vaciar bolsillos de transeuntes (Destreza)</i></td></tr>
<tr><td><input name="tr" type="radio" value="amenazar"> Amenazar</td><td><i>Amenazar transeuntes (Constitución)</i></td></tr>
<?php } 




?>
</table>
<input type="submit" value="Ok">

</form>




<?php 

if ($ci[burdel]=="S"){echo '<br>- La ciudad dispone de un <a href="idistritos.php?def=irburdel.php">Burdel</a>';}
}

include 'footer.php'?>