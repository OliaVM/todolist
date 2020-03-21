<?php

class Router
{
	protected $map;

	public function __construct($map)
	{
		$this->map = $map;
	}

	public function match(array $request)
	{
		$matchedParameters = [];
		$requestURI = $this->parseRequest($request); 

		foreach ($this->map as $pattern => $parameters) {
			$routes = explode("/", $requestURI);
			$rout = explode("?", $routes[1]);

			if ((!empty($rout[0])) && ("/" . $rout[0] == $pattern)) {
				$matchedParameters = $parameters;
				return $matchedParameters;
			}		
		}

		if (empty($matchedParameters)) {
			$matchedParameters = [
				'controller' => 'IndexController',
				'action' => 'indexAction'
			];
		}

		return $matchedParameters;
	}

	protected function parseRequest(array $request)
	{
		$requestURI = $_SERVER['REQUEST_URI']; 
        return $requestURI;
	}
}


