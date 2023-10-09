<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middleware\TemplateDataMiddleware;

function registerMiddlewares(App $app)
{
    $app->addMiddleware(TemplateDataMiddleware::class);
}
