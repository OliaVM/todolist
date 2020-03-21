<?php

class ControllerFactory
{
	public static function create($application, $controllerName, $actionName = 'indexAction')
	{
		try {
			if (!class_exists($controllerName)) {
				throw new Exception("Controller $controllerName not found");
			}

			$controller = new $controllerName($application);

			if (!method_exists($controller, $actionName)) {
				throw new Exception("Method $actionName of controller $controllerName not found");	
			}
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

		return $controller;
	}
}
