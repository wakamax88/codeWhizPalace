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

    public function home($parameters)
    {
        $page = $_GET['p'] ?? 1;
        $blog = $this->postService->home();
        echo $this->view->render('/App/blogApp.php', ['subTitle' => 'Blog', 'blog' => $blog]);
    }

    public function read($parameters)
    {
        $post_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $post = $this->postService->read($post_id);
        if ($post) {
            header("Content-Type: application/json");
            echo json_encode($post);
            exit;
        }
    }
}
