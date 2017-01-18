<?
	$blandir = Security::out("blandir");
	
	if ($blandir!=""){
		if ($ch->blandir($blandir)){
			$ch->update();
		}
	}
?>