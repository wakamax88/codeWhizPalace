<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\AuthController;
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};
use Framework\App;
use App\Controllers\{PageController, ProfileController, HomeController, BlogController};

function registerRoutes(App $app)
{
    $app->get('/', [PageController::class, 'home'], [AuthRequiredMiddleware::class]);
    $app->get('/about', [PageController::class, 'about']);
    $app->get('/signup', [AuthController::class, 'signupView'], [GuestOnlyMiddleware::class]);
    $app->post('/signup', [AuthController::class, 'signup'], [GuestOnlyMiddleware::class]);
    $app->get('/signin', [AuthController::class, 'signinView'], [GuestOnlyMiddleware::class]);
    $app->post('/signin', [AuthController::class, 'signin'], [GuestOnlyMiddleware::class]);
    $app->get('/app/signout', [AuthController::class, 'signout'], [AuthRequiredMiddleware::class]);
    $app->get('/app/profile', [ProfileController::class, 'profileView'], [AuthRequiredMiddleware::class]);
    $app->post('/app/profile', [ProfileController::class, 'create'], [AuthRequiredMiddleware::class]);
    $app->get('/app', [HomeController::class, 'home']);
    $app->get('/app/blog/{p?}', [BlogController::class, 'home']);
}
