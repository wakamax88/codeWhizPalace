<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class CategoryService
{

    public function __construct(private Database $db)
    {
    }

    public function read(): array
    {
        $categories = $this->db->query(
            "SELECT * FROM categories;"
        )->findAll();
        $categoriesNb = $this->db->query(
            "SELECT COUNT(*) as categoriesNb FROM categories;"
        )->count();

        $categoriesNbPage = ceil($categoriesNb / 1);

        return [
            'rows' => $categories,
            'nbRow' => $categoriesNb,
            'limit' => 10,
            'offset' => 0,
            'currentPage' => 1,
            'nbPage' => $categoriesNbPage
        ];
    }
    public function readAll()
    {
        $contents = $this->db->query(
            "SELECT *
            FROM categories;"
        )->findAll();
        return $contents;
    }
}
