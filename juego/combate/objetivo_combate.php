<?php
    include 'header.php';

    if ($us[nv_sable]==0) {
        echo "En tu rango aun no puedes atacar, debes ser Padawan/Aprendiz como m&iacute;nimo para poder atacar, pasate por la academia para subir de rango";
    } else {
        if (!$_GET[ob]) {
            ?>
		 		Elige a un oponente digno de t&iacute; en la ciudad:<br>
				<table width="100%">
						<tr bgcolor="#4f4f4f">
							<td><b>Nombre</b></td>
							<td align="center"><b>M&eacute;rito</b></td>
							<td align="center"><b>Cr&eacute;ditos</b></td>
							<td align="right"><b>Clan</b></td>
						</tr>
<?php
                        $i=1;
            $sqlr = mysql_query("SELECT * FROM `sw_users` WHERE planeta='$us[planeta]' AND reg='S' AND hp>'0'  AND ciudad='$ci[nombre]' AND nv_sable='$us[nv_sable]' AND nombre!='$us[nombre]' ORDER BY merito DESC") or die(mysq_error());
            while ($r = mysql_fetch_array($sqlr)) {
                $u = textcolor($r[nombre]);
                echo "<tr>";
                echo "<td><a href=\"combate/?id=objetivo_combate&ob=$r[nombre]\"><img border=0 src=\"images/atk.gif\"></a><b>$i.</b> <a href='lista/?id=info&us=$u[nombre]'>$u[nom]</a></td>";
                echo "<td align='center'>$u[merito]</td>";
                echo "<td align='center'>$u[creditos]</td>";
                echo "<td align='right'><a href='clan/?id=info&clan=$u[clan]'>$u[clan]</a></td>";
                echo "</tr>";
            } ?>
				</table>
<?php
        } else {
            $ob=textcolor($_GET[ob]);
            if ($ob[nombre]==$us[nombre]) {
                echo 'No puedes atacarte a ti mismo';
            } else {
                if ($ob[nombre]=="") {
                    echo 'Ese jugador no existe';
                } else {
                    if ($us[turnos]<5) {
                        echo 'Energ&iacute;a insuficiente....';
                    } else {
                        if ($ob[planeta]!=$us[planeta] || $ob[ciudad]!=$us[ciudad] || $us[nv_sable]!=$ob[nv_sable]) {
                            echo 'No puedes atacarle, no est&aacute; en tu ciudad o no es de tu nivel';
                        } else {
                            if ($ob[hp]<=0) {
                                echo "$ob[nombre] ya est&aacute; muerto, dejalo en paz";
                            } else {
                                if ($us[hp]<=0) {
                                    echo "&iquest;Sabes que no eres inmortal verdad? No puedes atacar estando KO";
                                } else {
                                    if ($ob[clan]==$us[clan] && $us[clan]!=null) {
                                        echo "No puedes atacar a personas de tu clan";
                                    } else {

                                        //Incluir el ejecutor de combate
                                        include 'combate/atkcorePVP.php';

                                        //incluir resultados
                                        include 'combate/resultados_combate.php';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    include 'footer.php';
?>
