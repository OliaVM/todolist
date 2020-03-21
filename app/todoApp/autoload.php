<?php

spl_autoload_register(function ($name) {
	$controllerFile = __DIR__ . "/controller/" . $name . ".php";
	$modelFile = __DIR__ . "/model/" . $name . ".php";
	if (file_exists($controllerFile)) {
		require_once($controllerFile);
	} 
	if (file_exists($modelFile)) {
		require_once($modelFile);
	} 
});