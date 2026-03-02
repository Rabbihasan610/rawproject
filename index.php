<?php
declare(strict_types=1);

use App\Core\App;

require_once __DIR__ . '/vendor/autoload.php';

App::boot(__DIR__ . '/');

require __DIR__ . '/routes/web.php';

App::router()->dispatch(App::request(), App::response());















