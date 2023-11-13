<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\TableHeaders;
use App\Services\CategoryService;

class HomeController
{
    public function __construct(private TemplateEngine $view, private CategoryService $categoryService)
    {
    }

    public function home()
    {
        $content = $this->categoryService->read();
        echo $this->view->render('/App/homeApp.php', [
            'subTitle' => 'Home',
            'tabs' => [
                'tab-1' => [
                    'tabName' => 'News',
                    'tabContent' => '',
                    'active' => true,
                ],
                'tab-2' => [
                    'tabName' => 'Tags',
                    'tabContent' => '',
                ],
                'tab-3' => [
                    'tabName' => 'Categories',
                    'tabContent' => $content,
                    'tableHeaders' => TableHeaders::CATEGORIES
                ],
            ],
        ]);
    }
}
