<?php include_once 'header.php';

$plc=sel("sw_plan", "", $_GET[pl]);

$result = mysql_query("SELECT * FROM sw_city WHERE nombre='$_GET[ci]' AND planeta='$plc[nombre]'")or die(mysql_error());
$un=mysql_fetch_array($result);

if ($_GET[ok]) {
    if ($_GET[ci]!="" && $_GET[pl]!="") {
        if ($_GET[modo]=="") {
            $_GET[modo]="normal";
        }


        switch ($_GET[modo]) {
                          case "normal":
                               if ($_GET[pl]==$pl[nombre]) {
                                   $coste=1500;
                               } else {
                                   $coste=7500;
                               }
                          break;
                          default:


                               $vev=sel("sw_vehiculos", "", $_GET[modo]);

                               if ($vev[tprop]=="Jugador") {
                                   if ($vev[prop]==$us[nombre]) {
                                       $coste=0;
                                   } else {
                                       echo 'El veh&iacute;culo no es tuyo';
                                   }
                               } else {
                                   $result=mysql_query("SELECT * FROM sw_viaje WHERE vehiculo='$_GET[modo]' AND origen='$us[ciudad]' AND destino='$_GET[ci]'")or die(mysql_error());
                                   $viv=mysql_fetch_array($result);

                                   if ($_GET[modo]!=$viv[vehiculo]) {
                                       echo 'Ruta erronea... <script> location.href="viaje/" </script>';
                                   } else {
                                       $coste=$viv[precio];
                                   }
                               }




                          break;
      }






        if ($un[nombre]==$_GET[ci]) {
            $us[creditos]-=$coste;

            if ($us[creditos]<0 || $us[turnos]<0) {
                echo 'Creditos y/o energ&iacute;a insuficientes...';
            } else {
                if ($_GET[clan] && $vev[tprop]=="Jugador" && $us[nombre]==$vev[prop] && $us[nombre]==$cl[lider]) {
                    mysql_query("UPDATE sw_users SET ciudad='$_GET[ci]', planeta='$plc[nombre]' WHERE clan='$us[clan]' AND ciudad='$us[ciudad]'")or die(mysql_error());
                } else {
                    mysql_query("UPDATE sw_users SET ciudad='$un[nombre]', planeta='$plc[nombre]' WHERE nombre='$us[nombre]'")or die(mysql_error());

                    if ($vev[tprop]=="Clan") {
                        $clvi=sel("sw_clan", "", $viv[clan]);
                        $clvi[fondos]+=$coste;
                        mysql_query("UPDATE sw_clan SET fondos='$clvi[fondos]'WHERE nombre='$clvi[nombre]'")or die(mysql_error());
                    }

                    mysql_query("UPDATE sw_users SET turnos='$us[turnos]', creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
                    echo "Viaje a $_GET[ci] completado, ha pagado $coste Cr&eacute;ditos.<br><br><center> $un[mess] </center>";
                }
            }
        } else {
            echo "La ciudad no existe";
        }
    } else {
        echo "<script> location.href='viaje/' </script>";
    }
} else {
    if ($_GET[ci]!="" && $_GET[pl]!="") {
        echo 'Selecciona el modo de viaje:';

        if ($_GET[pl]==$pl[nombre]) {
            $mo="Planetario";
        } else {
            $mo="Interplanetario";
        }


        echo '<form action="viaje/ok.php" method="GET">
		 <input name="modo" type="radio" value="normal"> Viaje Normal.';
        if ($mo=="Planetario") {
            $c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador'";
        } else {
            $c="SELECT * FROM `sw_vehiculos` WHERE prop='$us[nombre]' AND tprop='Jugador' AND espacio='S'";
        }

        $result=mysql_query($c)or die(mysql_error());
        echo'<br><br><i>Veh&iacute;culo Pr&oacute;pio:</i>';
        while ($v=mysql_fetch_array($result)) {
            echo "<br><input name=\"modo\" type=\"radio\" value=\"$v[nombre]\"> $v[nombre]";
        }

        echo '<br><br><i>Ofertas de Clan:</i>';

        $result=mysql_query("SELECT * FROM `sw_viaje` WHERE origen='$us[ciudad]' AND destino='$_GET[ci]'")or die(mysql_error());
        while ($c=mysql_fetch_array($result)) {
            echo "<br><input name=\"modo\" type=\"radio\" value=\"$c[vehiculo]\"> $c[vehiculo] ($c[clan]) - $c[precio] C";
        }

        echo "<input name=\"ci\" type=\"hidden\" value=\"$_GET[ci]\"><input name=\"pl\" type=\"hidden\" value=\"$_GET[pl]\">";

        if ($us[nombre]==$cl[lider]) {
            echo '<br><br><input type="checkbox" name="clan" value="Check me">Traerse a todo el Clan (s&iacute;lo con veh&iacute;culo propio)';
        }

        echo '<br><input type="submit" name="ok" value="Viajar"></form>';
    } else {
        echo'Esa ciudad no existe';
    }
}
include_once 'footer.php';
