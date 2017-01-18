<?php include 'header.php';
if ($ci[entrenar] =="S"){
echo "Bienvenido $us[titulo] $us[prefix] $us[nombre] a la sala de entrenamiento, eres un $us[nivel], por ello te podemos ofrecer entrenar lo siguiente al siguiente precio: <br>";
if ($us[nv_sable]>=0){
echo "<br><table><tr bgcolor=\"#737373\"><td><b>Atributo</b></td><td><b>Total</b></td><td><b>Coste</b></td><td><center>+</center></td></tr>";
echo "
<tr><td><a href=\"ayuda.php#vigor\" onMouseover=\" ddrivetip('El Vigor Mide la fuerza de tus ataques físicos. Como más Vigor, más dañinos serán tus ataques de arma.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vigor</b></td><td><center>$us[vigor]</center></td><td>$us[vigor]00 Creditos, 5 P. De Energía</td><td><a href=\"entok.php?c=vigor\"><img border=0 src=\"images/e.jpg\"></a></td></tr>
<tr><td><a href=\"ayuda.php#constitucion\" onMouseover=\" ddrivetip('La Constitución representa la forma física del jugador, mide la resistencia a los golpes físicos; Como más constitución menos daños recibirás en combate.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Constitución</b></td><td><center>$us[constitucion]</center></td><td>$us[constitucion]00 Creditos, 5 P. De Energía</td><td><a href=\"entok.php?c=constitucion\"><img border=0 src=\"images/e.jpg\"></a></td></tr>
<tr><td><a href=\"ayuda.php#destreza\" onMouseover=\" ddrivetip('La Destreza mide tu habilidad manual. Como más destreza, más rápidos y precisos serán tus golpes.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Destreza</b></td><td><center>$us[destreza]</center></td><td>$us[destreza]00 Creditos, 5 P. De Energía</td><td><a href=\"entok.php?c=destreza\"><img border=0 src=\"images/e.jpg\"></a></td></tr>
<tr><td><a href=\"ayuda.php#inteligencia\" onMouseover=\" ddrivetip('La Inteligencia mide tu capacidad de Raciocinio. Como más Inteligencia, más frecuentemente usarás los poderes de la fuerza y más facil te resultará la Caza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Inteligencia</b></td><td><center>$us[inteligencia]</center></td><td>$us[inteligencia]00 Creditos, 5 P. De Energía</td><td><a href=\"entok.php?c=inteligencia\"><img border=0 src=\"images/e.jpg\"></a></td></tr>
<tr><td><a href=\"ayuda.php#poder\" onMouseover=\" ddrivetip('El Poder de la Fuerza indica la capacidad del usuario de controlar la Fuerza. Como más Poder de la Fuerza, más daño causarás en combate con ataques de fuerza.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Poder de la Fuerza</small></b></td><td><center>$us[poder]</center></td><td>$us[poder]00 Creditos, 5 P. De Energía</small></td><td><a href=\"entok.php?c=poder\"><img border=0 src=\"images/e.jpg\"></a></td></tr>";
}
if ($us[nv_sable]>=0){
echo "<tr bgcolor=\"#737373\"><td><b>Otros</b></td><td><b>Total</b></td><td><b>Coste</b></td><td><center>+</center></td></tr>";
echo "<tr><td><a href=\"ayuda.php#vida\" onMouseover=\" ddrivetip('La vida es tu vitalidad en combate. cuando tu vida llegue a 0 habrás quedado KO', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a><b>Vida max.</b></td><td><center>$us[maxhp]</center></td><td><small>5 por $us[maxhp]0 Creditos, 5 P. De Energía</small></td><td><a href=\"entok.php?c=maxhp\"><img border=0 src=\"images/e.jpg\"></a></td></tr>
<tr><td><b><a href=\"ayuda.php#energia\" onMouseover=\" ddrivetip('La energía es lo que gastas para realizar acciones, cuando tu energia llegue a 0 no podrás hacer más acciones. La energia se recarga automaticamente cada hora.', '#808080');\" onMouseout=\"hideddrivetip()\"><img border=0 src=\"images/h.gif\"></a>Energía max.</b></td><td><center>$to</center></td><td><small>5 por $us[extrae]00 Creditos, 5 P. De Energía</small></td><td><a href=\"entok.php?c=extrae\"><img border=0 src=\"images/e.jpg\"></a></td></tr></table>";
}
echo '<small>Mantenga el ratón encima de el nombre para ver una explicación de su uso</small><br>';


if ($us[nv_sable]==0){echo "<br><br><a onMouseover=\" ddrivetip('<center><big>¡CIUDADO!</font></big><br>Si asciendes de nivel, los otros jugadores podrán atacarte.</center>', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ascender.php\">Entrar en una Academia</a> Coste: 10.000 Créditos";}else{
echo '<br><i><b>Dotes de la Fuerza:</b></i>
<br>- Ataque de la fuerza.';
if ($us[nv_sable]>1){
   if ($us[lado]>0){echo '<br>- <font color="#a6ebff">Cura Jedi</font>';}else{echo '<br>- <font color="#ff0000">Rayo Sith</font>';}
}
if ($us[nv_sable]==3){
   if ($us[lado]>0){echo '<br>- <font color="#a6ebff">Acto Heroico Jedi<br></font>- <font color="#a6ebff">Aura Luminosa Jedi</font>';}else{echo '<br>- <font color="#ff0000">Drenaje Sith</font><br>- <font color="#ff0000">Furia Sith</font>';}
}


}
}else{echo 'La ciudad en la que te hayas no dispone de salas de entrenamiento...';}

include 'footer.php'; ?>