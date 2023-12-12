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
		'name' => 'roadtrip_list'
	],
	'/roadtrips/{id}' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'edit',
		'name' => 'roadtrip_edit'
	],
	'/roadtrips/ajouter' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'add',
		'name' => 'roadtrip_add'
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
	// TODO: add a button to disconnect
	'/deconnexion' => [
		'controller' => App\Controller\AuthController::class,
		'method' => 'logout',
		'name' => 'app_logout'
	],
	'/{id}' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'show',
		'name' => 'roadtrip_show'
	],
];
