<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\AuthController;
use App\Middleware\{AuthnMiddleware, AuthzMiddleware};
use Framework\App;
use App\Controllers\{AdminController, PageController, ProfileController, HomeController, BlogController, CommonController, ForumController, ResourceController, SettingController, SettingsController};

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
    //SETTING
    $app->get('/app/setting', [SettingController::class, 'home']);
    $app->post('/app/setting', [SettingController::class, 'update']);
    // BLOG
    $app->get('/app/blog/posts/{id}', [BlogController::class, 'read']);
    $app->patch('/app/blog/posts/update/{id}', [BlogController::class, 'update']);
    $app->delete('/app/blog/posts/delete/{id}', [BlogController::class, 'delete']);
    $app->patch('/app/blog/posts/{id}/likes', [BlogController::class, 'updateLike']);
    $app->post('/app/blog/posts', [BlogController::class, 'create']);
    $app->get('/app/blog', [BlogController::class, 'home']);
    $app->get('/app/blog/news', [BlogController::class, 'home']);
    $app->get('/app/blog/lists/{?}', [BlogController::class, 'lists']);
    // FORUM
    $app->get('/app/forum', [ForumController::class, 'home']);
    $app->get('/app/forum/news', [ForumController::class, 'home']);
    $app->get('/app/forum/lists', [ForumController::class, 'lists']);
    // RESOURCE
    $app->get('/app/resource', [ResourceController::class, 'home']);
    $app->get('/app/resource/news', [ResourceController::class, 'home']);
    $app->get('/app/resource/lists', [ResourceController::class, 'lists']);
    // ADMIN
    $app->get('/app/admin', [AdminController::class, 'home']);
    $app->get('/app/admin/home', [AdminController::class, 'home']);
    $app->get('/app/admin/categories/{?}', [AdminController::class, 'readCategories']);
    $app->get('/app/admin/users/{?}', [AdminController::class, 'readUsers']);
    $app->delete('/app/admin/users/delete/{id}', [AdminController::class, 'deleteUsers']);
    $app->patch('/app/admin/users/{id}/update', [AdminController::class, 'updateUsers']);
    //COMMON
    $app->get('/app/common/categories', [CommonController::class, 'getAllCategories']);
}
