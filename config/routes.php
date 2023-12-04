<?php

const ROUTES = [
	'/' => [
		'controller' => App\Controller\MainController::class,
		'method' => 'home',
		'name' => 'app_index'
	],
	'/roadtrips' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'list',
		'name' => 'app_roadtrip'
	],
	'/connexion' => [
		'controller' => App\Controller\AuthController::class,
		'method' => 'login',
		'name' => 'app_login'
	],
	'/inscription' => [
		'controller' => App\Controller\AuthController::class,
		'method' => 'register',
		'name' => 'app_register'
	],
	'/deconnexion' => [
		'controller' => App\Controller\AuthController::class,
		'method' => 'logout',
		'name' => 'app_logout'
	],

];
