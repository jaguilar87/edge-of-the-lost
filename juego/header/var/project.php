<?php

$proy=0;
$sql=mysql_query("SELECT * FROM sw_board_proyectos")or die(mysql_error());
while ($row=mysql_fetch_array($sql)){$proy++;}



?>