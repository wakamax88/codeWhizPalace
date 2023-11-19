<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Paths;
use Framework\TemplateEngine;
use App\Config\{Tabs, Show};
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\ValidatorService;

class BlogController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private PostService $postService, private CategoryService $categoryService)
    {
    }

    public function home()
    {
        $contents = $this->postService->home();
        echo $this->view->render('/App/newsApp.php', [
            'subTitle' => 'Blog',
            'tabName' => 'News',
            'tabs' => Tabs::SECOND_TAB,
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
        $numberRow = $this->postService->count();
        $pagination = calculPagination($numberRow, Show::POSTS, Show::POSTS[0]);
        extract($pagination);
        $contents = $this->postService->readAll($page, $limit, $offset);
        echo $this->view->render('/App/listsApp.php', [
            'subTitle' => 'Blog',
            'tabName' => 'Lists',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'post',
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit,
            'shows' => Show::POSTS
        ]);
    }

    public function update($parameters)
    {
        //$this->validatorService->validatePost($_POST);

        $post_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $this->postService->update($_POST, $post_id);
        if (true) {
            $response = ['message' => "Update Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function create()
    {
        $this->validatorService->validatePost($_POST);
        $imageNameNew = '';
        if (isset($_FILES['thumbnail'])) {
            $this->validatorService->validatorFile($_FILES['thumbnail']);
            $image = $_FILES['thumbnail'];
            $imageName = $image['name'];
            $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            $imageTmpName = $image['tmp_name'];
            $categoryName = $this->categoryService->readOne((int) $_POST['categoryId'])['name'];
            $categoryName = capitalizeFirstLetter($categoryName);
            $imageId = uniqid('', true);
            $imageNameNew = "post_{$categoryName}_{$imageId}.{$imageExt}";
            $uploadDirectory = Paths::IMAGE . 'post/' . $categoryName . '/';
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
            $imageDestination = $uploadDirectory . $imageNameNew;
            move_uploaded_file($imageTmpName, $imageDestination);
        }


        $this->postService->create($_POST, $imageNameNew);
        if (true) {
            $response = ['message' => "Create Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function delete($parameters)
    {
        $post_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $id = $this->postService->delete($post_id);
        if (true) {
            $response = ['message' => "Delete Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function updateLike($parameters)
    {
        $post_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $profile_id = $_SESSION['profile']['id'];
        $post = $this->postService->read($post_id);
        if ($post['profile_id'] != $profile_id) {
            $vote = $this->postService->countVote($profile_id, $post_id);
            if ($vote) {
                $this->postService->deleteVote($profile_id, $post_id);
            } else {
                $this->postService->createVote($profile_id, $post_id);
            }
        }
        $response = ['message' => "Update Post Like", 'success' => true];
        header("Content-Type: application/json");
        echo json_encode($response);
        exit;
    }
}
