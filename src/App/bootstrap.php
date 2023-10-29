<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Framework\{App, Dotenv};
use App\Config\Paths;

use function App\Config\{registerRoutes, registerMiddlewares};

Dotenv::load(Paths::ROOT);


$app = new App(Paths::SOURCE . 'App/container.php');

registerRoutes($app);
registerMiddlewares($app);



return $app;
