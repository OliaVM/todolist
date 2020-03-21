<?php

class View
{
	protected $pathToViews;

	public function __construct($pathToViews)
	{
		$this->pathToViews = $pathToViews;
	}

	public function render($viewName, array $parameters = [])
	{
		$subPathElements = explode(':', $viewName);
        $subPath = implode('/', $subPathElements) . '.php'; // get path to view 
        $viewPath = rtrim($this->pathToViews, '/') . '/' . $subPath;
        $parameters['pathToView'] = $viewPath;
        extract($parameters); 
        require $this->pathToViews . '/layout.php';
	}
}
