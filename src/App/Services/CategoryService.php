<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class CategoryService
{

    public function __construct(private Database $db)
    {
    }

    public function read(int $page, int $limit, int $offset): array
    {
        $contents = $this->db->query(
            "SELECT * FROM categories
            LIMIT {$limit} OFFSET {$offset};"
        )->findAll();

        return $contents;
    }
    public function readAll()
    {
        $contents = $this->db->query(
            "SELECT *
            FROM categories;"
        )->findAll();
        return $contents;
    }
    public function readOne(int $id)
    {
        $contents = $this->db->query(
            "SELECT * 
            FROM categories
            WHERE categories.id = :id;",
            [
                'id' => $id
            ]
        )->find();
        return $contents;
    }
    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM categories")->count();
        return $numberRow;
    }
}
