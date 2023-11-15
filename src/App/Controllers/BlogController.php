<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Tabs;
use App\Services\PostService;
use App\Services\ValidatorService;

class BlogController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private PostService $postService)
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
    public function lists()
    {
        $show = abs((int) filter_var($_GET['show'] ?? 3, FILTER_SANITIZE_NUMBER_INT));
        $limit = in_array($show, [3, 6, 9]) ? $show : 3;
        $page = abs((int) filter_var($_GET['page'] ?? 1, FILTER_SANITIZE_NUMBER_INT));
        $numberRow = $this->postService->count();
        $pageMax = (int) ceil($numberRow / $limit);
        $page = $page > $pageMax ? $pageMax : $page;
        $page = $page < 1 ? 1 : $page;
        $offset = ($page - 1) * $limit;
        $contents = $this->postService->readAll($page, $limit, $offset);
        echo $this->view->render('/App/listsApp.php', [
            'subTitle' => 'Blog',
            'tabName' => 'Lists',
            'sTabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'post',
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit
        ]);
    }
    public function update($parameters)
    {
        $post_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
    }
    public function create()
    {
        $this->validatorService->validatePost($_POST);
        $this->validatorService->validatorFile($_FILES['thumbnail']);
        if (true) {
            $response = ['message' => 'the message', 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }
}
