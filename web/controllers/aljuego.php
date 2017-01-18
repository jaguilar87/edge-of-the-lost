<?php
	if ($_SESSION['swUser3'] != ""){
		header ("location: ../game/");
	}else{
		Views::message ("Ha habido un error al validar el login.<br> Por favor vuelvase a loguear.", "Error de Login");
		///$us->logout();
	}
?>