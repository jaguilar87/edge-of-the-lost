<?php
if ($_GET[id]=="") {
    echo '<script language="JavaScript" type="text/javascript"> location.href="fequipo.php"</script>';
} else {
    $pi=sel("sw_inventario", "id", $_GET[oid]);
    if ($pi[jugador]==$us[nombre] && $pi[tipo]=="pieza") {
        switch ($pi[objeto]) {
                          case "Cad&aacute;ver nerf":
                                     $rec=1000;
                            break;
                          case "Cad&aacute;ver bantha":
                                     $rec=2500;
                            break;
                          case "Cad&aacute;ver orray":
                                     $rec=4000;
                            break;
                          case "Cad&aacute;ver dewback":
                                     $rec=5500;
                            break;
                          case "Cad&aacute;ver reek":
                                     $rec=7000;
                            break;
                          case "Cad&aacute;ver nexu":
                                     $rec=9000;
                            break;
                          case "Cad&aacute;ver gundark":
                                     $rec=11000;
                            break;
                          case "Cad&aacute;ver wampa":
                                     $rec=15000;
                            break;
                          case "Cad&aacute;ver aklay":
                                     $rec=20000;
                            break;
                          case "Cad&aacute;ver rancor":
                                     $rec=50000;
                            break;
                     }
        $rec=$rec+($us[cl_trainer]*3);
        echo "Has vendido tu $pi[objeto] por <b>$rec Cr&eacute;ditos</b>";
        $us[creditos]+=$rec;
        mysql_query("UPDATE sw_users SET creditos='$us[creditos]' WHERE nombre='$us[nombre]'")or die(mysql_error());
        mysql_query("DELETE FROM sw_inventario WHERE id='$pi[id]'")or die(mysql_error());
    } else {
        echo "No puedes vender este objeto como pieza: o no es una pieza o no es tuya!.";
    }
}
