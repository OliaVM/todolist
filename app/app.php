<?php
require_once __DIR__ . '/bootstrap.php';

$pathToConfig = __DIR__ . '/config/config.php';

$application = new Application($baseApplicationDir);
$application->build($pathToConfig);

$container = $application->getContainer();
$config = $container->get('config');

$connection = new Connection($config->get('db'));
$dbConnection = $connection->createDbConnection(); // object pdo

$container->set('dbConnection', $dbConnection);

$container->set('authentication', $authentication);

return $application;
