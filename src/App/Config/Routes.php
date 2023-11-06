<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\AuthController;
use App\Middleware\{AuthnMiddleware, AuthzMiddleware};
use Framework\App;
use App\Controllers\{PageController, ProfileController, HomeController, BlogController};

function registerRoutes(App $app)
{
    $app->get('/', [PageController::class, 'home']);
    $app->get('/about', [PageController::class, 'about']);
    $app->get('/signup', [AuthController::class, 'signupView']);
    $app->post('/signup', [AuthController::class, 'signup']);
    $app->get('/signin', [AuthController::class, 'signinView']);
    $app->post('/signin', [AuthController::class, 'signin']);
    $app->get('/app/signout', [AuthController::class, 'signout']);
    $app->get('/app/profile', [ProfileController::class, 'read'], [AuthnMiddleware::class], [AuthzMiddleware::class]);
    $app->post('/app/profile', [ProfileController::class, 'create'], [AuthnMiddleware::class]);
    $app->get('/app', [HomeController::class, 'home']);
    $app->get('/app/blog/{p?}', [BlogController::class, 'home']);
}
