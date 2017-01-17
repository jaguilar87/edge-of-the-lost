<?php
    if ($_GET[clan]=="") {
        $_GET[clan]=$us[clan];
    }
    $cli = sel("sw_clan", "", $_GET[clan]);

        echo "<center><big><big><big>";
        echo ($cli[hermandad]=='Jedi') ? $jedi : $sith;
        echo $cli[nombre];
        echo "</b></font></big></big></big><br>";
        if ($us[nombre] == $cl[lider]) {
            echo "<small><small><a href='clan/?id=gest'>Gestionar el Clan</a></small></small>";
        }
        echo "<hr></center>";
?>
	<center><small>
		[<a href='clan/?id=info&clan=<?php echo $_GET[clan]?>'>Informaci&oacute;n</a>]
		[<a href='clan/?id=mem&clan=<?php echo $_GET[clan]?>'>Miembros</a>]
		[<a href='clan/?id=ciudades&clan=<?php echo $_GET[clan]?>'>Ciudades</a>]
<?php
    if ($cli[nombre] == $us[clan]) {
        ?>
		[<a href='clan/?id=board'>Sala de Reuniones</a>]
		[<a href='clan/?id=diplo'>Diplomacia</a>]
		[<a href='clan/?id=vehiculos'>Vehiculos</a>]
		<br>
		[<a href="clan/?id=salir"><img border=0 src="images/x.gif"> Salir del Clan</a>]
		[<a href="clan/?id=fundar"><img border=0 src="images/e.jpg"> Fundar un Clan</a>]
		[<a href="fundar.php?ac=ciudad"><img border=0 src="images/e.jpg"> Fundar Ciudad</a>]
		[<a href="ataque/?id=duelo"><img border=0 src="images/atk.gif"> Retar en duelo</a>]

<?php

    } else {
        echo "<br>";
        if ($cli[hermandad]=="Sith" && $us[lado]<0) {
            echo "<a href=\"log.php?ver=solicitar&clan=$cli[nombre]\">Solicitar ingreso en el clan.</a>";
        } elseif ($cli[hermandad]=="Jedi" && $us[lado]>0) {
            echo "<a href=\"log.php?ver=solicitar&clan=$cli[nombre]\">Solicitar ingreso en el clan.</a>";
        } else {
            echo '<br>No puedes solicitar el ingreso en este clan por tu Alineaci&oacute;n con el Lado de la fuerza';
        }
    }
?>
	</small></center><hr>
