<?
	if (Security::out('ok')){
		$r = DB::select("usuarios", "mail", Security::out("mail"));
		if ($r[id]!=""){
		
			if ($r[vali]!=-1){
				loadClass ("extra/smtp");
				$smtp = new Smtp();
				
				$newpass = mt_rand (100000, 999999);
				$from = "urbin@jag-team.com";
				$mail = Security::out("mail");
				$asunto = "Regenerar pass de Star Wars - Edges of The Lost Warriors";
				$mensaje = 	
"
Saludos ".$r[nombre]."!\n
Siguiendo tu petición hemos procedido a modificar tu contraseña. 
Aquí tienes la nueva contraseña: $newpass
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
					
					Views::message ("Mail con password enviado a <b>$mail</b>...", "Error");
					
					$r[pass] = sha1( md5( $newpass ) );
					DB::update ("usuarios", "mail", Security::out("mail"), $r);
					
				}else{
					Views::message ("Ha ocurrido un error al envial un mail a <b>$mail</b>...<br>".$smtp->error."\n", "Error");
				}
			}else{
				Views::message ("Has sido baneado, así que no puedes validar tu cuenta", "Error");
			}
		}else{
			Views::message ("No existe ninguna cuenta con ese mail", "Error");
		}
	}	
?>
