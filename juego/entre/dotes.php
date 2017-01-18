<?php
if ($us[nv_sable]==0) {
    echo "<center><a onMouseover=\" ddrivetip('<center><big>&iquest;CIUDADO!</font></big><br>Si asciendes de nivel, los otros jugadores podr&aacute;n atacarte.</center>', '#808080');\" onMouseout=\"hideddrivetip()\" href=\"ascender.php\">Entrar en una Academia</a> Coste: 10.000 Cr&eacute;ditos</center>";
} else {
    echo '<br><i><b>Dotes de la Fuerza:</b></i><br><br>';
    echo "<center><b>Golpe de la Fuerza</b></center>";
    echo "<table width='100%' cellpadding=3 cellspacing=3><tr><td align='right' width='50%'>";

    if ($us[nv_sable]>=2) {
        echo ($us[lado]<0) ? $sith : $des;
        echo "Rayo";

        echo "</td><td width='50%'>";

        echo ($us[lado]>0) ? $jedi : $des;
        echo "Cura";

        if ($us[nv_sable]>=3) {
            echo "</td></tr><tr><td align='right' width='50%'>";

            echo ($us[lado]<0) ? $sith : $des;
            echo "Drenaje";

            echo "</td><td width='50%'>";

            echo ($us[lado]>0) ? $jedi : $des;
            echo "Acometida";

            echo "</td></tr></table>";

            echo "<center><b>Trance combativo</b></center>";
            echo "<table width='100%' cellpadding=3 cellspacing=3><tr><td align='right' width='50%'>";

            if ($us[nv_sable]>=4) {
                echo ($us[lado]<0) ? $sith : $des;
                echo "Ira";

                echo "</td><td width='50%'>";

                echo ($us[lado]>0) ? $jedi : $des;
                echo "Aura";
            }
        }
    }
    echo "</td></tr></table>";
}
