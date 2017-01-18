<?php 
	$us = DB::select( "usuarios", "mail", Security::iout('mail') );
	
	if ( $us[valid] == Security::iout('code') ){
		DB::query("UPDATE usuarios SET valid='0' WHERE mail='".$us[mail]."'");
		Views::message("Ficha Validada! Ya puedes loguearte en la web.", "Ficha Validada"); 
	}else{
		Views::message ("No se ha podido validar la ficha ya que el codigo de validación es incorrecto o la ficha no existe. <br>A las 24h las fichas no validadas se borrarán, espera hasta entonces y vuelbete a crear la cuenta", "Error al validar");
	}

?> 