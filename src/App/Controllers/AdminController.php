<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\CategoryService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AdminController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private CategoryService $categoryService)
    {
    }

    public function readAll()
    {
        $categories = $this->categoryService->readAll();
        if ($categories) {
            header("Content-Type: application/json");
            echo json_encode($categories);
            exit;
        }
    }
}
