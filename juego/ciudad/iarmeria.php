<?php
if ($ci[armeria]=="S" && $us[nombre]==$ci[rey]) {
    if ($_GET[ok]) {
        $vl=sel("sw_vehiculos", "", $_GET[veh]);
        if ($vl[nombre]=="" || $vl[arma]!="" || $vl[uso]=="S" && $vl[prop]=="$us[clan]") {
            echo "Veh&iacute;culo destino inexistente, en uso o con un arma ya ensamblada";
        } else {
            switch ($_GET[tip]) {
                            case "blaster": $min=100; $tur=100; break;
                            case "disruptor": $min=150; $tur=50; break;
                            case "ariete": $min=50; $tur=150; break;
                        }

            $cl[potencia]-=$tur;
            $cl[mineral]-=$min;

            if ($cl[potencia]<0 || $cl[mineral]<0) {
                echo "Pot&eacute;ncia o mineral insuficiente...";
            } else {
                mysql_query("UPDATE `sw_clan` SET potencia='$cl[potencia]', mineral='$cl[mineral]' WHERE nombre='$cl[nombre]'")or die(mysql_error());

                mysql_query("UPDATE `sw_vehiculos` SET arma='$_GET[tip]' WHERE nombre='$_GET[veh]'")or die(mysql_error());


                echo "<table background='images/bg3.jpg'  width='100%' height='100%'>
						  <tr>
						      <td><big><big><b>Armeria de $ci[nombre]</b></big></big><br><br>Arma Ensamblada</td></tr></table>";
            }
        }
    } else {
        echo "
<table background='images/bg3.jpg'  width='100%' height='100%'>
<tr>
    <td><big><big><b>Armer&iacute;a de $ci[nombre]</b></big></big>";
        echo "<br>Bienvenido a la armer&iacute;a <b>$us[nombre]</b>! En las armerias convertiremos su potencia y mineral en poderosos poderosas armas para los vehiculos de su clan, esperamos sus instrucciones.<br><br>";


        echo '<br><center>
<table>
<tr>
    <td>   <form action="ciudad/" method="GET"><input type="hidden" name="id" value="iarmeria" />

					   	   Arma:
								 <br>&nbsp;&nbsp;<input name="tip" type="radio" value="blaster">Mortero Blaster
								 <br>&nbsp;&nbsp;<input name="tip" type="radio" value="disruptor">Disruptor
								 <br>&nbsp;&nbsp;<input name="tip" type="radio" value="ariete">Ariete T&eacute;rmico

						   <br><br>Ensamblar en: <br>&nbsp;&nbsp;<select name="veh">';

        $sql=mysql_query("SELECT * FROM sw_vehiculos WHERE tipo='VCA' AND uso!='S' AND arma='' AND tprop='Clan' AND prop='$cl[nombre]'")or die(mysql_error());
        while ($vh=mysql_fetch_array($sql)) {
            echo "<option value='$vh[nombre]'>$vh[nombre]";
        }

        echo'</select> <br><br><input name="ok" type="submit" value="Ensamblar">
					</form>
</td>
</tr>
</table></center>
';
        echo '<small><b><b>Armas:</b></b></small><br><small><table width="100%"><tr bgcolor="#808080"><td><small><b>Nombre</b></small></td><td><small><b>Tipo</b></small></td><td><small>Minerales</small></td><td><small>Potencia</small></td></tr><tr><td><small>Mortero Bl&aacute;ster</small></td><td><small>AntiPersona</small></td><td><small>100M</small></td><td><small>100W</small></td></tr><tr><td><small>Disruptor</small></td><td><small>AntiVehiculo AntiTorre</small></td><td><small>50M</small></td><td><small>150W</small></td></tr><tr><td><small>Ariete T&eacute;rmico</small></td><td><small>AntiEscudo</small></td><td><small>50M</small></td><td><small>150W</small></td></tr></table>
		 </small></td>
</tr>
</table>';
    }
} else {
    echo 'La ciudad no dispone de Armeria o no eres el Rey de la Ciudad';
}
