<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\PageController;

function registerRoutes(App $app)
{
    $app->get('/', [PageController::class, 'home']);
    $app->get('/about', [PageController::class, 'about']);
    $app->get('/blog/posts/{id?}', [PageController::class, 'home']);
}
