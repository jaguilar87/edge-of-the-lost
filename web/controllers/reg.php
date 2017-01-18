<?
	if ($_POST[ok]){
		$arr = array (
			"valid" => mt_rand(1000, 9999),
			"nombre" => Security::out("name"),
			"pass" => sha1( md5( strtolower( Security::iout("pass") ) ) ),
			"mail" => strtolower ( Security::out("mail") )
		);
		
		if ($arr[nombre] != "" AND $arr[mail] != "" AND Security::out("pass")!= ""){
			if (!Security::isMail("mail")){
				Views::message( "El mail entrado no es válido.", "Error");
			}else{
				$r = DB::select("usuarios", "mail", $arr[mail]);
				if ($r[mail] == $arr[mail]){
					Views::message( "Ya existe un usuario registrado con ese mail.", "ERROR");
				}else{
					
					DB::insert ("usuarios", $arr);
					if ( DB::rows() > 0 ){
					
						loadClass ("extra/smtp");
						$smtp = new Smtp();
						
						$from = "urbin@jag-team.com";
						$mail = Security::out("mail");
						$asunto = "Validar cuenta de Star Wars - Edges of The Lost Warriors";
						$mensaje = 	
"
¡Saludos!\n
Alguien te ha validado en el juego Star Wars - Edges of The Lost Warriors con los siguientes datos:\n
	Nombre: ".$arr[nombre]."\n
	Pass: ".$arr[pass]."\n
\n
Para poder empezar a jugar primero debes validar tu cuenta con el siguiente link:\n
( ".URL."web/?a=validar&mail=".$arr[mail]."&code=".$arr[valid]." )\n
\n
¡Gracias por jugar!\n
Administradores de SWedges 3
";
						if ($smtp->SendMessage(
							$from,
							array($mail),
							array(
								"From: $from",
								"To: $to",
								"Subject: $asunto",
								"Date: ".strftime("%a, %d %b %Y %H:%M:%S %Z")
							),
							$mensaje
							)
						){
					
							Views::message("Cuenta registrada con éxito!<br>Mail con password y validación enviado a <b>$mail</b>...");
						}else{
							Views::message ("Ha ocurrido un error al envial un mail a <b>$mail</b>...<br><br>".$smtp->error."\n", "Error");
						}
					}else{
						Views::message("Esa cuenta ya ha sido registrada");
					}
				}
				
			}
		}else{
			Views::message ("Rellena todos los campos.");
		}
	}
?> 