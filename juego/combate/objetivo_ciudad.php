<?php
    include_once 'header.php';
        if ($_GET[ci]=="") {
            $_GET[ci]=$ci[nombre];
        }
        $cic=sel("sw_city", "", $_GET[ci]);

        if ($ok) {
            if ($cic[nombre]!=$ci[nombre] || $cl[lider]!=$us[nombre] || $cic[clan]==$us[clan] || $cic[atacada]!="N" || $us[clan]=="") {
                echo "No se puede efectuar el ataque a esta ciudad";
            } else {
                $za=mysql_query("SELECT * FROM sw_diplomacia WHERE origen='$cl[nombre]' AND destino='$cic[clan]'")or die(mysql_error());
                if ($za[estado]=="Aliado") {
                    echo "No puedes atacar la ciudad de un clan aliado!";
                } else {
                    include 'ataque/atkcoreCIUDAD.php';
                    include 'ataque/resultados_ciudad.php';
                }
            }
        } else {
            ?>
		<center><big><big><b>Planeando ataque contra la ciudad <?php=$cic[nombre]?></b></big></big></center>
		<br><br>
		Si tu clan ataca la ciudad de <b><?php=$cic[nombre]?></b> gastar&aacute; potencia, como m&aacute;s dure la defensa de la ciudad, m&aacute;s potencia se gastar&aacute;.
		<br>
		Si tu clan se queda sin potencia a medio combate hay muchas probabilidades de perder el combate.
		<br><a href='ataque/?id=objetivo_ciudad&ok=true'>Atacar!</a>";
<?php
        }

    include_once 'footer.php';
?>
