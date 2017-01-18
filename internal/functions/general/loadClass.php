<?
	function loadClass ($name){
		include_once 'internal/class/'.strtolower($name).'.php';
	}
	
	function loadModel ($name){
		include_once 'models/'.strtolower($name).'.php';
	}
?>