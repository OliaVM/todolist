<?php

$config = [
	'db' => [
		'dsn' => 'mysql:host=localhost;dbname=todo',
		'username' => 'root',
		'password' => ''
	],
	'router' => [
		'/' => [
			'controller' => 'IndexController',
			'action' => 'indexAction'
		],

		'/authentication' => [
			'controller' => 'AuthenticationController',
			'action' => 'loginAction'
		],
		'/logout' => [
			'controller' => 'AuthenticationController',
			'action' => 'logoutAction'
		],
		'/show-tasks' => [
			'controller' => 'TaskController',
			'action' => 'showTasksAction'
		],
		'/show-task' => [
			'controller' => 'TaskController',
			'action' => 'showTaskAction'
		],
		'/edit-task' => [
			'controller' => 'TaskController',
			'action' => 'editTaskAction'
		],
		'/edit-task-status' => [
			'controller' => 'TaskController',
			'action' => 'editStatusOfTaskAction'
		],
		'/delete-task' => [
			'controller' => 'TaskController',
			'action' => 'deleteTaskAction'
		],
		'/create-task' => [
			'controller' => 'TaskController',
			'action' => 'createTaskAction'
		]
	],
	'path_to_views' => '/app/todoApp/view/'
];

return $config;