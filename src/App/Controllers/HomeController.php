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
        echo $this->view->render('/App/homeApp.php', [
            'subTitle' => 'Home',
            'tabs' => [],
        ]);
    }
}
