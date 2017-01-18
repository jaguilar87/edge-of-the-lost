<?php
if ($_GET[ok]) {
    if ($us[admin]>=$_GET[nv]) {
        mysql_query("INSERT INTO sw_board_noticias (id, poster, post, tipo) VALUES (now(), '$_SESSION[nombre]', '$_GET[post]', '$_GET[tipo]')") or die(mysql_error());
        echo "Noticia a&ntilde;adida <a href='admin.php?nv=$_GET[nv]&tip=noticia.php'>Incluir Otra</a>.";
    } else {
        echo "No tienes suficiente nivel";
    }
} else {
    echo '
	  <form action="admin.php" Method="GET">
	  <b><big>A&Ntilde;ADIR NOTICIA</big></b><br>
	  <input name="nv" type="hidden" value="'.$_GET[nv].'">
	  <input name="tip" type="hidden" value="noticia.php">
	  T&iacute;tulo: <input name="tipo" type="text" Style="width:600px" value="">

	  <br>Noticia: <textarea name="post" rows=10 cols=50 ></textarea>
	  <br><input type="submit" value="Enviar" name="ok">
	  </form>
	  ';
}
