<?php

class Connection
{
	public function __construct($dbParameters)
	{
		$this->dbParameters = $dbParameters;
	}

	public function createDbConnection()
	{
		try {
			$dsn = $this->dbParameters['dsn'];
			$username = $this->dbParameters['username'];
			$password = $this->dbParameters['password'];

			$dbConnection = new PDO($dsn, $username, $password);
		} catch (PDOException $exception) {
			return null;
		}
		return $dbConnection;
	}


}
