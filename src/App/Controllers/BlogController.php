<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Config\Tabs;
use App\Services\PostService;

class BlogController
{
    public function __construct(private TemplateEngine $view, private PostService $postService)
    {
    }

    public function home($parameters)
    {
        $page = $_GET['p'] ?? 1;
        $contents = $this->postService->home();
        echo $this->view->render('/App/newsApp.php', [
            'subTitle' => 'Blog',
            'tabName' => 'News',
            'sTabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'post'
        ]);
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
    public function lists($parameters)
    {
        $contents = $this->postService->readAll();
        echo $this->view->render('/App/listsApp.php', [
            'subTitle' => 'Blog',
            'tabName' => 'Lists',
            'sTabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'post'
        ]);
    }
}
