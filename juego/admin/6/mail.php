<?php
if ($_POST['ok']) {
    //Enviar
    if ($us[admin]>=$_GET[nv]) {
        $sqla = mysql_query("SELECT * FROM sw_users")or die(mysql_error());
        while ($r=mysql_fetch_array($sqla)) {
            mail($r['mail'], $_POST['asunto'], $_POST['mess'], "From: swedges@jag-team.com", "-fswedges@jag-team.com");
            echo "Enviado mail a $r[nombre] ($r[mail])<br>";
        }
    } else {
        echo "nivel insuficiente";
    }
} else {
    //Form
    echo "<form action='admin.php?nv=6&tip=mail.php' method='POST'>";
    echo '<table border="0" bordercolor="white" align="center" cellpadding="7" cellspacing="0" class="forTexts" width="100%" bgcolor="#FFFAEA"><tr><td>';
    echo '<b>Asunto</b>: <input type="text" style="width:100%" class="forForms" name="asunto"><br>';
    echo '<b>Mail:</b><br>';
    echo '<textarea rows="15" cols="50" style="width:100%" class="forForms" name="mess"></textarea>';
    echo '<center><input type="submit" name="ok" value="Enviar" class="forButton"/>';
    echo '</td></tr></table>';
    echo '</form>';
}
?> 
