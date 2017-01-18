<?
	//Este archivo coordina todos los procesos internos de RagnaJAG
	
	//Empezamos sesiones
	session_start();
	
	//definimos directorio base
	chdir('..');
	
	//Empezamos con la definición de constantes
	require_once ('internal/constant_definition.php');
	
	//Cargamos el archivo de configuración
	require_once ('internal/config.php');
	
	//Incluimos la funcion de requerir carpetas
	require_once ('internal/functions/include_folder.php');

	//Cargar funciones generales
	requireFolder ('internal/functions/general/');
	
	//Cargar las clases generales
	requireFolder ('internal/class/general/');
	
	//Cargar clases opcionales
	
	//Generar una semilla aleatoria
	mt_srand( (double)microtime() * 1000000 );
	
	//Cargar core de usuario
	require_once 'models/model_core.php';
	require_once RAG_SECTION."/".RAG_SECTION."_core.php";
?>