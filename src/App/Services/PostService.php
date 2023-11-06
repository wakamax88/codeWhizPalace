<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class PostService
{

    public function __construct(private Database $db)
    {
    }

    public function create(array $formData)
    {
    }

    public function read()
    {
        $posts = $this->db->query(
            "SELECT * FROM posts;"
        )->findAll();
        return $posts;
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
