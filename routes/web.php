<?php

use App\Core\App;

$router = App::router();

$router->get('/', [\App\Controllers\WelcomeController::class, 'index']);