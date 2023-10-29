<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Services\PostService;

class BlogController
{
    public function __construct(private TemplateEngine $view, private PostService $postService)
    {
    }

    public function home()
    {
        dd($_GET);
        $page = $_GET['p'] ?? 1;
        $posts = $this->postService->read();
        echo $this->view->render('/App/blogApp.php', ['posts' => $posts]);
    }
}
