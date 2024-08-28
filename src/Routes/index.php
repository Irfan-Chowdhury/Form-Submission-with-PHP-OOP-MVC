<?php

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->post('/orders', HomeController::class, 'store');

$router->dispatch();