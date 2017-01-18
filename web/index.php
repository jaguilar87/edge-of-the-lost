<?
	//Index Standard: (Header y Footer)
	
	//Define la zona en la que te encuentras
	define("RAG_SECTION", "web");
	
	//para empezar cargamos el archivo de configuración de RagnaJAG, este archivo se encargará de cargar todas las librerías básicas
	require_once '../internal/core.php';
	
	//Primero de todo lanzar funciones relacionadas con los controladores
	require_once Controllers::load( Security::out('a') );
	
	//Despues mostramos los Views asociados por pantalla
	if (RAG_MODE == MVC_STANDARD) require_once RAG_SECTION."/views/template/header.php";
	require_once Views::load(Security::out('a'));
	if (RAG_MODE == MVC_STANDARD) require_once RAG_SECTION."/views/template/footer.php";
?>