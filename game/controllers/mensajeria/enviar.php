<?php 
	//definir variables POST
	$enviar = Security::out("enviar");
	$message = Security::out("me");
	$receptor = Security::out("re");
	$asunto = Security::out("as");
		
	if ($enviar) {
		
		if (!empty($message) AND !empty($asunto) AND !empty($receptor)){
			$destino = new Char(array("nombre" => $receptor));
				
			if ($destino->datos[nombre] == $receptor){
				$msg = new Mensaje(false);
					$msg->datos["emisor"] 	= $ch->datos[id];
					$msg->datos["receptor"] = $destino->datos[id];
					$msg->datos["fecha"] 	= date("Y-m-d");
					$msg->datos["mensaje"] 	= nl2br($message);
					$msg->datos["asunto"] 	= $asunto;
					$msg->datos["nuevo"]	= 1;
				$msg->insert();			
				
				$destino->datos[newmsg] = 1;
				$destino->update();
				
				Views::message ($message."<br><br><strong>¡Mensaje enviado!</strong>", $asunto);
			}else{
				Views::message ("Ese receptor no existe");
			}
		}else{
			Views::message ("Debes especificar mensaje, asunto y receptor.");
		}
		
	}
?>