<?php
session_start();
$baseApplicationDir = $_SERVER['DOCUMENT_ROOT'] . '/..';
$application = require $baseApplicationDir . '/app/app.php';
$request = $_REQUEST;

$application->run($request);
