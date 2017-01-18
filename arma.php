<?php include 'header.php';
if($camb){

$us[color_sable]=$_GET[color];
if ($us[nv_sable]>=3){
   if ($us[estilo_sable]=="+"){$us[vigor]-=10;}
   if ($us[estilo_sable]=="2"){$us[constitucion]-=10;}
   if ($us[estilo_sable]=="11"){$us[destreza]-=10;}
   if ($_GET[estilo]=="+"){$us[vigor]+=10;}
   if ($_GET[estilo]=="2"){$us[constitucion]+=10;}
   if ($_GET[estilo]=="11"){$us[destreza]+=10;}
}

$us[estilo_sable]=$_GET[estilo];


$c="UPDATE `sw_users` SET color_sable='$_GET[color]', estilo_sable='$_GET[estilo]', vigor='$us[vigor]', constitucion='$us[constitucion]', destreza='$us[destreza]' WHERE nombre='$us[nombre]'";	
$result=mysql_query($c)or die(mysql_error());
}
if ($us[nv_sable]==0){
echo '<table width="100%"><tr><td><center><img src="images/espada.jpg"><br>Nombre: Sable<br> Mientras seas usuario no puedes usar sables láser...</td></tr></table>';

}elseif($us[nv_sable]==1 || $us[nv_sable]==2){
echo '<table width="100%"><tr><td><center><img border=1 src="images/sables/1';
#<img>
echo $us[color_sable];
echo '.jpg"> <br>Nombre: Sable Láser<br><form action="arma.php"><input name="estilo" type="hidden" value="+">Color: <select name="color"><option value="azul">Azul<option value="rojo">Rojo<option value="amarillo">Amarillo<option value="naranja">Naranja<option value="verde">Verde<option value="morado">Morado</select><input type="submit" name="camb" Value="Cambiar"></form> </td></tr></table>';

}elseif($us[nv_sable]>=3){
echo '<table width="100%"><tr><td><center><img border=1 src="images/sables/';
#<img>
echo $us[estilo_sable]; 
echo $us[color_sable];
echo '
.jpg"> <br>  
Nombre: Sable Láser<br><form action="arma.php">
Color: <select name="color"><option value="azul">Azul<option value="rojo">Rojo<option value="amarillo">Amarillo<option value="naranja">Naranja<option value="verde">Verde<option value="morado">Morado</select><br>
Tipo: <select name="estilo"><option value="+">Largo (+Vigor)<option value="2">Doble (+Constitución) <option value="11">Dos Sables (+Destreza)</select>
<input type="submit" name="camb" Value="Cambiar"></form> </td></tr></table>
';

}
include 'footer.php'; ?>