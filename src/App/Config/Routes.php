<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\AuthController;
use App\Middleware\{AuthnMiddleware, AuthzMiddleware};
use Framework\App;
use App\Controllers\{AdminController, PageController, ProfileController, HomeController, BlogController, ForumController};

function registerRoutes(App $app)
{
    $app->get('/', [PageController::class, 'home']);
    $app->get('/about', [PageController::class, 'about']);
    $app->get('/signup', [AuthController::class, 'signupView']);
    $app->post('/signup', [AuthController::class, 'signup']);
    $app->get('/signin', [AuthController::class, 'signinView']);
    $app->post('/signin', [AuthController::class, 'signin']);
    $app->get('/app/signout', [AuthController::class, 'signout']);
    // PROFILE
    $app->get('/app/profile', [ProfileController::class, 'read'], [AuthnMiddleware::class], [AuthzMiddleware::class]);
    $app->post('/app/profile', [ProfileController::class, 'create'], [AuthnMiddleware::class]);
    $app->get('/app', [HomeController::class, 'home']);
    $app->get('/app/home', [HomeController::class, 'home']);
    // BLOG
    $app->get('/app/blog/posts/{id}', [BlogController::class, 'read']);
    $app->patch('/app/blog/posts/update/{id}', [BlogController::class, 'update']);
    $app->delete('/app/blog/posts/delete/{id}', [BlogController::class, 'delete']);
    $app->post('/app/blog/posts', [BlogController::class, 'create']);
    $app->get('/app/blog', [BlogController::class, 'home']);
    $app->get('/app/blog/news', [BlogController::class, 'home']);
    $app->get('/app/blog/lists/{?}', [BlogController::class, 'lists']);
    // FORUM
    $app->get('/app/forum', [ForumController::class, 'home']);
    $app->get('/app/forum/news', [ForumController::class, 'home']);
    $app->get('/app/forum/lists', [ForumController::class, 'lists']);
    // ADMIN
    $app->get('/app/admin/categories', [AdminController::class, 'readAll']);
}
