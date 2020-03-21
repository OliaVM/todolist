<?php

class Application
{
	protected $baseDir;
	protected $config;
	protected $container;
	protected $router;
	protected $view;

	public function __construct($baseDir)
	{
		$this->baseDir = $baseDir;
	}

	public function build($pathToConfig)
	{
		$this->config = new Config($pathToConfig);
		$this->router = $this->createRouter();
		$this->view = $this->createView();
		$this->container = $this->createContainer();

		return $this;
	}

	public function run(array $request)
	{
		// give request in router
		$controllerParameters = $this->router->match($request); 
		$controllerName = $controllerParameters['controller'];
		$action = $controllerParameters['action'];
		$parameters = !empty($controllerParameters['parameters']) ? $controllerParameters['parameters'] : [];
		$request = array_merge($request, $parameters); 
		//create contoller and give $application as param
		$controller = ControllerFactory::create($this, $controllerName, $action); 
		$controller->$action($request);
	}

	public function getConfig()
	{
		return $this->config;
	}

	public function getContainer()
	{
		return $this->container;
	}

	public function getView()
	{
		return $this->view;
	}

	public function createContainer()
	{
		$container = new Container();
		$container->set('config', $this->config);
		return $container;
	}

	protected function createRouter()
	{
		$routerMap = $this->config->get('router');
		return new Router($routerMap);
	}

	protected function createView()
	{
		$pathToViews = $this->baseDir . $this->config->get('path_to_views');
		return new View($pathToViews);	
	}
}
