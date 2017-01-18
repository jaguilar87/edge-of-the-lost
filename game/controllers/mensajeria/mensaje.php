<?php
	$id = Security::out("mid");
	
	if (is_numeric($id)){
			
			$msg = new Mensaje(array("id"=> $id));
			
			if ($msg->datos[emisor] == $ch->datos[id] || $msg->datos[receptor] == $ch->datos[id]){
				
				Views::$forcedView = "mensajeria/leermensaje";
				
				if ($msg->datos[nuevo]){
					$msg->datos[nuevo] = 0;
					$msg->update();
				}
				
			}else{
				Views::message("Ese mensaje no te concierne");
			}
			
	}else{
		Views::$forcedView = "mensajeria/listamensajes";
	}
	
	if ($ch->datos[newmsg]){
		$ch->datos[newmsg] = 0;
		$ch->update();
	}
?>

