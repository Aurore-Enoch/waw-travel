<?php
session_start();

use WawTravel\Router\Router;

require dirname(__DIR__) . '/lib/autoload.php';
new Router();