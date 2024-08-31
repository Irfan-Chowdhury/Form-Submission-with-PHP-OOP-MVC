<?php

use App\Controllers\HomeController;
use App\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/create', HomeController::class, 'create');
$router->post('/store', HomeController::class, 'store');

$router->dispatch();