<?php include_once 'header.php';
switch ($_GET[ac]) {

       case "ciudad":

            if ($_GET[nombre]!="") {
                echo "Fundando la Ciudad ($_GET[nombre])....";
                if ($us[clan]=="") {
                    echo "Necesitas estar o ingresar en un clan para fundar una ciudad";
                } else {
                    $us[creditos]-=500000;
                    if ($us[creditos]<0) {
                        echo "No tienes creditos suficientes...";
                    } else {
                        if ($us[nv_sable]>2) {
                            echo 'Debes ser Maestro o Lord para fundar una ciudad';
                        } else {
                            $c="SELECT * FROM sw_city WHERE nombre='$_GET[nombre]' AND planeta='$_GET[pla]'";
                            $result = mysql_query($c);
                            $un=mysql_fetch_array($result);


                            if ($un[nombre]==$_GET[nombre]) {
                                echo "<br>Esta ciudad ya existe";
                            } else {
                                $c="SELECT * FROM sw_plan WHERE nombre='$_GET[pla]'";
                                $result = mysql_query($c);
                                $pla=mysql_fetch_array($result);

                                if ($pla[nombre]=="") {
                                    echo "<br>El planeta no existe";
                                } else {
                                    $_GET[nombre]=valNombre($_GET[nombre]);
                                    $c= "INSERT INTO sw_city (nombre, planeta, clan, rey) VALUES ('$_GET[nombre]', '$_GET[pla]', '$us[clan]', '$us[nombre]')";
                                    $result= mysql_query($c)or die(mysql_error());
                                    echo "<br>Tramites finalizados. $_GET[nombre] construida en $_GET[pla]!";

                                    $us[merito]+=50;

                                    $c= "UPDATE sw_users SET merito='$us[merito]', creditos='$us[creditos]' WHERE nombre='$us[nombre]'";
                                    $res=mysql_query($c);
                                }
                            }
                        }
                    }
                }
            } else {
                echo 'Fundar ciudad...(Precio: 500.000C) <form action="fundar.php" Method="GET">';



                $c="SELECT * FROM sw_clan WHERE nombre='$_POST[nom]'";
                $result=mysql_query($c)or die(mysql_error());
                $un=mysql_fetch_array($result);


                echo "Localizaci&oacute;n Espacial(Planeta): <input name=\"pla\" type=\"text\" value=\"$_GET[pla]\">";
                echo '<br>Nombre de la Nueva Ciudad: <input name="nombre" type="text" value=""><input type="submit" Value="Fundar" Name="x"><input name="ac" type="hidden" value="ciudad"></form>';

                echo '<br>Lista de planetas:';
                mapear("fundar.php");
            }
       break;

       case "clan":

            if ($_POST[nom]!="") {
                echo 'Fundando el Clan....';
                if ($us[creditos]>=10000) {
                    echo '<br>Realizando el Pagamento....';
                    if ($us[nv_sable]>2) {
                        echo '<br>Tramitando papeleo...';

                        $c="SELECT * FROM sw_clan WHERE nombre='$_POST[nom]'";
                        $result = mysql_query($c);
                        $un=mysql_fetch_array($result);

                        if ($un[nombre]==$_POST[nom]) {
                            echo "Ese clan ya existe";
                        } else {
                            if ($us[nombre]==$cl[lider] && $cl[nombre]!="") {
                                echo 'Eres el lider de un clan, primero debes disolver el clan.';
                            } else {
                                $_POST[nom]=valNombre($_POST[nom]);
                                $c= "INSERT INTO sw_clan (nombre, lider, hermandad) VALUES ('$_POST[nom]', '$us[nombre]', '$_POST[her]')";
                                $result= mysql_query($c);
                                echo '<br>Tramites finalizados.';

                                $us[creditos]-=10000;

                                $c= "UPDATE sw_users SET clan='$_POST[nom]', prefix='$prefix', creditos='$us[creditos]', cvoto='$us[nombre]' WHERE nombre='$us[nombre]'";
                                $res=mysql_query($c);
                            }
                        }
                    } else {
                        echo '<br><font color="#ee1200">Debes ser Maestro o Lord para fundar un clan</font>';
                    }
                } else {
                    echo '<br><font color="#ee1200">Fondos insuficientes...</font>';
                }
            } else {
                echo "<script>location.href='clanact.php?act=fundar'</script>";
            }

       break;
}
include_once 'footer.php';
