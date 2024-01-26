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
	'/roadtrips/ajouter' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'add',
		'name' => 'roadtrip_add'
	],
	'/roadtrips/{id}' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'show',
		'name' => 'roadtrip_show'
	],
	'/roadtrips/{id}/editer' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'edit',
		'name' => 'roadtrip_edit'
	],
	'/roadtrips/{id}/delete_checkpoint/{id}' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'deleteCheckpoint',
		'name' => 'delete_checkpoint'
	],
	'/roadtrips/{id}/supprimer' => [
		'controller' => App\Controller\RoadTripController::class,
		'method' => 'delete',
		'name' => 'roadtrip_delete'
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
	'/profil' => [
		'controller' => App\Controller\AuthController::class,
		'method' => 'profile',
		'name' => 'app_profile'
	],
];
