<?php

use App\Controllers\AuthController;
use App\Controllers\Backend\DashboardController;
use App\Controllers\Frontend\WebController;
use App\Core\App;

$router = App::router();

$router->get('/', [WebController::class, 'index']);
$router->get('about', [WebController::class, 'about']);


$router->get('/login', [AuthController::class, 'showLogin'], ['guest']);
$router->post('/login-store', [AuthController::class, 'login']);

$router->get('/dashboard', [DashboardController::class, 'index'], ['auth']);
$router->get('/logout', [AuthController::class, 'logout'], ['auth']);

// MVC