<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\CategoryService;
use Framework\TemplateEngine;

class CommonController
{
    public function __construct(
        private TemplateEngine $view,
        private CategoryService $categoryService,
    ) {
    }
    public function getAllCategories()
    {
        $categories = $this->categoryService->readAll();
        if ($categories) {
            header("Content-Type: application/json");
            echo json_encode($categories);
            exit;
        }
    }
}
