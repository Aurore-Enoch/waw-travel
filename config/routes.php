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
	

];
