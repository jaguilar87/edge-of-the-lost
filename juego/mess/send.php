<?php include_once 'header.php';
if ($enviar) {
    // process form
   $sql = "SELECT nombre FROM sw_users WHERE nombre='$_POST[re]'";
    $result = mysql_query($sql);
    $r = mysql_fetch_array($result);
    if ($r[nombre]==$_POST[re]) {
        $sql = "INSERT INTO `sw_mess` (emisor, receptor, fecha, mess) VALUES ('$us[nombre]', '$_POST[re]', '$us[dia]', '$_POST[me]')";
        $result = mysql_query($sql);
        $sql = "SELECT id FROM sw_mess ORDER BY id DESC LIMIT 0,1";
        $result = mysql_query($sql);
        $ider = mysql_fetch_array($result);
        $sql = "INSERT INTO `sw_log` (user, log, dia, tipo, ref) VALUES ('$_POST[re]', '$us[nombre] te ha enviado un <i><b>mensaje</b></i>.', '$fe[val]', '1', '$ider[id]')";
        $result = mysql_query($sql);
        $sql = "UPDATE `sw_users` SET mmess='S' WHERE nombre='$_POST[re]'";
        $result = mysql_query($sql);

        echo "mensaje enviado...";
        echo '<script>location.href="ficha/"</script>';
    } else {
        echo 'El destinatario no existe....';
    }
} else {
    ?>
Env&iacute;a un mensaje a otro jugador.
<form method="post" action="mess/send.php">
<b>Emisor:</b><br> <?php echo $nombre; ?>
<br><b>Receptor:</b><br><input type="Text" name="re" Value=<?php echo "\"$_GET[to]\""; ?>">
<br><b>Mensaje:</b><br><textarea style="width:450px; height: 100px;" name="me"></textarea>
   <br><input type="Submit" name="enviar" value="Enviar">
</form>
<br><small><a href="mess/">Volver al gestor de mensajes.</a></small>
<?php
} //end if
include_once 'footer.php'; ?>
