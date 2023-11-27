<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Show;
use App\Config\Tabs;
use Framework\TemplateEngine;
use App\Services\DiscussionService;
use App\Services\ValidatorService;

class ForumController
{
    public function __construct(
        private TemplateEngine $view,
        private DiscussionService $discussionService,
        private ValidatorService $validatorService
    ) {
    }

    public function home()
    {
        $contents = $this->discussionService->home();
        echo $this->view->render('/App/newsApp.php', [
            'subTitle' => 'Forum',
            'tabName' => 'News',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'discussion'
        ]);
    }

    public function lists()
    {
        $numberRow = $this->discussionService->count();
        $pagination = calculPagination($numberRow, Show::DISCCUSSIONS, Show::DISCCUSSIONS[0]);
        extract($pagination);
        $contents = $this->discussionService->readAll($limit, $offset);
        echo $this->view->render('/App/listsApp.php', [
            'subTitle' => 'Forum',
            'tabName' => 'Lists',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'discussion',
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit,
            'shows' => Show::DISCCUSSIONS
        ]);
    }

    public function read($parameters)
    {
        $discussion_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $discussion = $this->discussionService->read($discussion_id);
        if ($discussion) {
            header("Content-Type: application/json");
            echo json_encode($discussion);
            exit;
        }
    }

    public function update($parameters)
    {
        $formData = $_POST;
        $this->validatorService->validateDiscussion($formData);

        $discussion_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $profile_id = $_SESSION['profile']['id'];
        $role_id = $_SESSION['account']['roleId'];

        $discussion = $this->discussionService->read($discussion_id);
        if ($discussion != null && ($discussion['profile_id'] == $profile_id || $role_id == 2)) {
            $changeData = $this->discussionService->update($formData, $discussion_id);
            $response = ['message' => "Update Post {$changeData}", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        } else {
            $response = ['message' => "Not Authorized", 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function create()
    {
        $formData = $_POST;
        $this->validatorService->validateDiscussion($formData);

        $profile_id = $_SESSION['profile']['id'];
        $role_id = $_SESSION['account']['roleId'];

        if ($profile_id != null && $role_id <= 4) {
            $this->discussionService->create($formData);
            $response = ['message' => "Create Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        } else {
            $response = ['message' => "Not Authorized", 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }

    public function delete($parameters)
    {
        $discussion_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $profile_id = $_SESSION['profile']['id'];
        $discussion = $this->discussionService->read($discussion_id);

        if ($discussion != null && ($discussion['profile_id'] == $profile_id)) {
            $changeData = $this->discussionService->delete($discussion_id);
            $response = ['message' => "Delete Discussion {$changeData}", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        } {
            $response = ['message' => "Not Authorized", 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function getAllComments($parameters)
    {
        $discussion_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $comments = $this->discussionService->getAllComments($discussion_id);
        header("Content-Type: application/json");
        echo json_encode($comments);
        exit;
    }

    public function createComment($parameters)
    {
        $discussion_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $formData = $_POST;

        $profile_id = $_SESSION['profile']['id'];
        if ($profile_id != null) {
            $this->discussionService->createComment($formData, $discussion_id);
            $response = ['message' => "Create Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        } else {
            $response = ['message' => "Not Authorized", 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
        }
    }
}
