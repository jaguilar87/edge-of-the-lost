<?
	Views::message (
		"No se han podido confirmar los datos del Login, porfavor, vuelvase a logear.",
		"ERROR: Login no Válido"
	);
		
	session_unset();
	$_COOKIE['swMail3']="";
	$_COOKIE['swPass3']="";
?>