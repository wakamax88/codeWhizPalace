<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class CategoryService
{

    public function __construct(private Database $db)
    {
    }

    public function home()
    {
        $categories = $this->db->query(
            "SELECT * FROM categories;"
        )->findAll();
        return $categories;
    }
}
