<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\{Tabs, TableHeaders, Show};
use App\Services\AccountService;
use App\Services\CategoryService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AdminController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private CategoryService $categoryService,
        private AccountService $accountService
    ) {
    }

    public function home()
    {
        echo $this->view->render('/app/adminApp.php', [
            'subTitle' => 'Admin',
            'tabName' => 'Home',
            'tabs' => Tabs::ADMIN_TAB
        ]);
    }

    public function readCategories()
    {
        $numberRow = $this->categoryService->count();
        $pagination = calculPagination($numberRow, Show::CATEGORIES, Show::CATEGORIES[0]);
        extract($pagination);
        $contents = $this->categoryService->read($page, $limit, $offset);
        echo $this->view->render('/app/adminApp.php', [
            'subTitle' => 'Admin',
            'tabName' => 'Categories',
            'tabs' => Tabs::ADMIN_TAB,
            'contents' => $contents,
            'type' => 'category',
            'tableHeaders' => TableHeaders::CATEGORIES,
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit,
            'shows' => Show::CATEGORIES
        ]);
    }

    public function createCategories()
    {
    }

    public function updateCategories()
    {
    }

    public function deleteCategories()
    {
    }

    public function readUsers()
    {
        $numberRow = $this->accountService->count();
        $roles = $this->accountService->readAllRole();
        $pagination = calculPagination($numberRow, Show::USERS, Show::USERS[0]);
        extract($pagination);
        $contents = $this->accountService->read($page, $limit, $offset);

        echo $this->view->render('/app/adminApp.php', [
            'subTitle' => 'Admin',
            'tabName' => 'Users',
            'tabs' => Tabs::ADMIN_TAB,
            'contents' => $contents,
            'type' => 'account',
            'roles' => $roles,
            'tableHeaders' => TableHeaders::USERS,
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit,
            'shows' => Show::USERS
        ]);
    }

    public function deleteUsers($parameters)
    {
        $account_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $account = $this->accountService->getAccount($account_id);
        var_dump($account);
        $countAdmin = $this->accountService->hasAdmin();
        var_dump($countAdmin);
        //$this->accountService->delete($account_id);
        if (true) {
            $response = ['message' => "Delete Post", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function updateUsers($parameters)
    {
        $role_id = (int) filter_var($_POST['role'], FILTER_SANITIZE_NUMBER_INT);
        $account_id = (int) filter_var($parameters['id'], FILTER_SANITIZE_NUMBER_INT);
        $account = $this->accountService->getAccount($account_id);
        $numberRow = $this->accountService->hasAdmin();
        if (($account['role_id'] == 1 && $numberRow > 1) or $account['role_id'] != 1) {
            $this->accountService->updateUsers($account_id, $role_id);
            $response = ['message' => "Update User Role", 'success' => true];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        } else {
            $response = ['message' => "Update User Role", 'success' => false];
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }
}
