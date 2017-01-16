<?php 
if ($ci[ley]=="S"){

echo "Estas son las leyes de $ci[nombre]:";

echo '<br><br><table width="100%" border=1>'; 

echo "<tr><td>No hay leyes de momento...</td>";

echo "</tr>";





ECHO "</TABLE>";


echo "<br><br>El presupuesto de la Ley de $ci[nombre] es de $ci[leypre] Puntos";

}else{ echo "La ciudad no dispone de leyes.";}

if ($ci[rey]==$us[nombre]){echo "<br><br><a href=\"ciudad/?id=gest&ac=verley\">Ministerio de Defensa</a>";}


?>
