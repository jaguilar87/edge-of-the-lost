<?php 
if ($ci[ley]=="S"){

echo "Estas son las leyes de $ci[nombre]:";

echo '<br><br><table width="100%" border=1>'; 

echo "<tr><td><a href=\"#\" onMouseover=\" ddrivetip('En caso afirmativo los jugadores se podran atacar dentro de la ciudad libremente sin peligro de ser buscados por la Ley.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Ciudad PK</td><td>$ci[pk]</td>";

echo "</tr>";





ECHO "</TABLE>";


echo "<br><br>El presupuesto de la Ley de $ci[nombre] es de $ci[leypre] Puntos";

}else{ echo "La ciudad no dispone de leyes.";}

if ($ci[rey]==$us[nombre]){echo "<br><br><a href=\"igest.php?ac=verley\">Ministerio de Defensa</a>";}


?>
