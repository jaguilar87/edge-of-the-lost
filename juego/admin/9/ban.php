<?php
if ($_GET[ok]) {
    if ($us[admin]>=$_GET[nv]) {
        mysql_query("UPDATE sw_users SET at='1' WHERE nombre='$_GET[juga]'")or die(mysql_error());
        echo "BANEADO $_GET[juga] <a href='admin.php?nv=$_GET[nv]&tip=ban.php'>VOLVER</a>";
    } else {
        echo "No tienes suficiente nivel";
    }
} else {
    echo '
	  <form action="admin.php" Method="GET">
	  <b><big>&iquest;BANEADOR!</big></b><br>
	  <input name="nv" type="hidden" value='.$_GET[nv].' >
	  <input name="tip" type="hidden" value="ban.php">
	  Jugador: <input name="juga" type="text" value="">
	  <br><input type="submit" value="BAN" name="ok">
	  </form>
	  ';
}
