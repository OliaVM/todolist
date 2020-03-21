<?php

class Config
{
	protected $parameters;

	public function __construct($pathToConfig)
	{
		$this->parameters = file_exists($pathToConfig)
			? require $pathToConfig
			: [];
	}

	public function get($name)
	{
		$nameChunks = explode('.', $name);
		$value = null;
		$tmpValue = $this->parameters;
		foreach ($nameChunks as $key) {
			if (!isset($tmpValue[$key])) {
				$value = null;
				break;
			}
			$value = $tmpValue[$key];
			$tmpValue = $value;
		}
		return $value;
	}
}
