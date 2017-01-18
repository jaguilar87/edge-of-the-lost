<?php
	// MagnaJAG
	//
	// Configuracion CHAR
	// Modulo creado por Ka2 17/06/06 20:21
	// Revisado y modificado por Urbin
	
	// Valores del usuario ID, NOMBRE, PASS y MAIL
	$id = $us->datos[id];
	$nombre = $us->datos[nombre];
	$pass = $us->datos[pass];
	$email = $us->datos[mail];
	
	// Botones
	$ok_nombre = Security::out("ok_nombre");
	$ok_pass = Security::out("ok_pass");
	$ok_mail = Security::out("ok_mail");
	$ok_borrar = Security::out("ok_borrar");
	
	// Campos del formulario
	$nombre_nuevo = Security::out("nombre_nuevo");
	$pass_viejo = strtolower (Security::out("viejo"));
	$pass_nuevo = strtolower (Security::out("nuevo"));
	$email_nuevo = strtolower (Security::out("email_nuevo"));
	$borrar = strtolower (Security::out("borrar"));
	
	// Cargar template
	switch($accion) {
		case "nombre":
			if ($ok_nombre == "OK") {
				// cambiar nombre		
				if (!empty($nombre_nuevo) && isset($nombre_nuevo)) {
					$usa = new Usuario("nombre = '".$nombre_nuevo."'");
					if ($usa->datos[id] == ""){
						$us->datos[nombre] = $nombre_nuevo;
						$us->update();
						$us->logout();
					}else{
						Views::message("Ya hay alguien con ese login", "Error");
					}
				} else {
					Views::message("Error al cambiar de nombre, prueba otra vez.", "Error");
				}
			}
		break;
		case "pass":
			if ($ok_pass == "OK") {
				// cambiar password
				if (sha1(md5($pass_viejo)) == $pass) {
					$us->datos["pass"] = sha1(md5($pass_nuevo));	
					$us->update();
					$us->logout();
				} else {
					Views::message("Las contraseñas no coinciden.", "Error");
				}
			}
		break;
		case "mail":
			if ($ok_mail == "OK") {
				// cambiar email
				if (!empty($email_nuevo) && isset($email_nuevo)) {
					$us->datos["mail"] = $email_nuevo;	
					$us->update();
					$us->logout();
				} else {
					Views::message("Error al cambiar de eMail, prueba otra vez.", "Error");
				}				
			}
		break;
		case "borrar":
			if ($ok_borrar == "OK") {
				// borrar cuenta
				if (sha1(md5($borrar)) == $pass) {
					$us->delete();
					$us->logout();
				} else {
					Views::message("La contraseña no coincide.", "Error");
				}
			}
		break;
	}
?>