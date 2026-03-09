<?php

use App\Controllers\Frontend\WebController;
use App\Core\App;

$router = App::router();

$router->get('/', [WebController::class, 'index']);
$router->get('about', [WebController::class, 'about']);

// MVC