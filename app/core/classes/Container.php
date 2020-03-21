<?php

class Container
{
	private $container;

	public function __construct()
	{
		$this->container = [];
	}

	public function get($name)
	{
		return (isset($this->container[$name]))
			? $this->container[$name]
			: null;
	}

	public function set($name, $service)
	{
		$this->container[$name] = $service;
	}
}
