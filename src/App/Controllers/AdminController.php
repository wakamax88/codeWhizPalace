<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\TableHeaders;
use App\Config\Tabs;
use App\Services\CategoryService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AdminController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private CategoryService $categoryService)
    {
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
        $contents = $this->categoryService->readAll();
        echo $this->view->render('/app/adminApp.php', [
            'subTitle' => 'Admin',
            'tabName' => 'Categories',
            'tabs' => Tabs::ADMIN_TAB,
            'contents' => $contents,
            'type' => 'category',
            'tableHeaders' => TableHeaders::CATEGORIES,
            'pageActive' => 1,
            'pageMax' => 3,
            'offset' => 0,
            'numberRow' => 20,
            'limit' => 10
        ]);
    }
    public function readUsers()
    {
        $contents = [];
        echo $this->view->render('/app/adminApp.php', [
            'subTitle' => 'Admin',
            'tabName' => 'Users',
            'tabs' => Tabs::ADMIN_TAB,
            'contents' => $contents,
            'type' => 'account',
            'tableHeaders' => TableHeaders::USERS,
            'pageActive' => 1,
            'pageMax' => 3,
            'offset' => 0,
            'numberRow' => 20,
            'limit' => 10
        ]);
    }
}
