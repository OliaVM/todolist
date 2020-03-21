<?php

class Controller
{
	public $application;
	public $container;

	public function __construct($application)
	{
		$this->application = $application;
		$this->container = $application->getContainer();
	}

	public function render($viewPath, array $parameters = [])
	{
		return $this->application->getView()->render($viewPath, $parameters);
	}
}
