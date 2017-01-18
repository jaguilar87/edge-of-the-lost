<?php include_once 'header.php';
if ($cl[lider]==$us[nombre]){
	 	echo "$_GET[us] solicita el ingreso en el clan $us[clan], ¿Desea aceptarlo? <br> <a href=\"clan/?id=solok&us=$_GET[us]\">Aceptar Ingreso</a>";
	 }else{
	    echo "No eres el lider del clan.";
	 }

include_once 'footer.php'; ?>
