<?
	$name = strtolower(Security::out("name"));
	$pass = Security::iout("pass");
	
	
	if ($pass && $name){
		
		$r = DB::select("usuarios", "nombre", $name);
		
		if ( sha1( md5( strtolower( $pass ) ) ) == $r[pass] ){
			if ($r[valid]==0){ 
				
				session_start();
				$_SESSION['swUser3'] = $name;
				$_SESSION['swIp3'] = Security::getRealIP();
				
				header("Location: ?a=aljuego");
				
			}elseif ($r[valid]==-1){
				Views::message("Has sido baneado<br>¿Pensabas que te ibas a escapar, tramposo?<br>");
			}else{
				Views::message("Tu cuenta no ha sido validada,<br> debes validar tu cuenta desde el mail que te hemos enviado.");			
			}
		}else{
			Views::message("Password incorrecto");
		}
	}else{
		Views::message("Debes rellenar todos los campos");
	}
?> 
