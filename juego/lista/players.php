<?php include_once 'header.php';
if ($_GET[ord]=="") {
    $_GET[ord]="DESC";
}
if ($_GET[by]=="") {
    $_GET[by]="merito";
}
if ($_GET[nv]=="") {
    $_GET[nv]=$us[nv_sable];
}
if ($_GET[ko]=="") {
    $_GET[ko]="s";
}

echo "
<center>
 <small>
 		<a href=\"lista/players.php?nv=0&ko=$_GET[ko]&by=$_GET[by]&ord=$_GET[ord]\">Usuarios de la Fuerza</a>
		 /
		<a href=\"lista/players.php?nv=1&ko=$_GET[ko]&by=$_GET[by]&ord=$_GET[ord]\">Aprendices y Padawans</a>
		 /
		<a href=\"lista/players.php?nv=2&ko=$_GET[ko]&by=$_GET[by]&ord=$_GET[ord]\">Caballeros y Guerreros</a>

		<br><a href=\"lista/players.php?nv=3&ko=$_GET[ko]&by=$_GET[by]&ord=$_GET[ord]\">Lord y Maestros</a>
		 /
		<a href=\"lista/players.php?nv=4&ko=$_GET[ko]&by=$_GET[by]&ord=$_GET[ord]\">Grandes Lord y Grandes Maestros</a>
";
if ($_GET[ko]=="s") {
    echo "<br><a href=\"lista/players.php?nv=$_GET[nv]&by=$_GET[by]&ord=$_GET[ord]&ko=n\">Ver solo Jugadores no KO</a>";
} else {
    echo "<br><a href=\"lista/players.php?nv=$_GET[nv]&by=$_GET[by]&ord=$_GET[ord]&ko=s\">Ver Jugadores KO</a>";
}
echo '</small></center>
<table width="100%" cellpading="5" cellspacing="5" ><caption align="TOP">Jugadores</caption><tr bgcolor="#4f4f4f"><td><b>';
echo "Nombre<a href=\"lista/players.php?by=nombre&ord=DESC&nv=$_GET[nv]&ko=$_GET[ko]\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"lista/players.php?by=nombre&ord=ASC&nv=$_GET[nv]&ko=$_GET[ko]\"><img  border=0 src=\"images/a_up.gif\"></a></b></td><td><b><center><small>M&eacute;rito<a href=\"lista/players.php?by=merito&ord=DESC&nv=$_GET[nv]&ko=$_GET[ko]\"><img border=0 src=\"images/a_down.gif\"></a><a href=\"lista/players.php?by=merito&ord=ASC&nv=$_GET[nv]&ko=$_GET[ko]\"><img  border=0 src=\"images/a_up.gif\"></a></small></center></b></td><td><b><div align=\"right\"><small>Cr&eacute;ditos<a href=\"lista/players.php?by=creditos&ord=DESC&nv=$_GET[nv]&ko=$_GET[ko]\"><img  border=0 src=\"images/a_down.gif\"></a><a href=\"lista/players.php?by=creditos&ord=ASC&nv=$_GET[nv]&ko=$_GET[ko]\"><img  border=0 src=\"images/a_up.gif\"></a></small></div></b></td></tr>";

$c="select * FROM `sw_users` WHERE nv_sable='$_GET[nv]' AND reg='S' ";
if ($_GET[ko]=="n") {
    $c.="AND hp>'0' ";
}
$c.= "ORDER BY $_GET[by] $_GET[ord]  ";
$result=mysql_query($c)or die(mysql_error());

$i=1;
while ($r = mysql_fetch_array($result)) {
    $u=textcolor($r[nombre]);
    echo "<tr><td><b>$i.</b> <a href=\"lista/info.php?us=$r[nombre]\"><font color=\"$u[txtc]\">$r[titulo] $r[prefix] $r[nombre]</font></a>";
    if ($r[hp]<=0) {
        echo ' <sup><b><small><font color="#ffff80">KO</font></small></b></sup>';
    }
    echo "</td><td><b><center><small>$r[merito]</small></center></b></td><td><div align=\"right\"><small>$r[creditos]</small></div> </td></tr>";
    $i++;
}
echo '</table>';








include_once 'footer.php';
