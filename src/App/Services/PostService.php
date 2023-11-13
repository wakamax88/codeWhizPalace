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

    public function home()
    {
        $news = $this->db->query(
            "SELECT * 
            FROM posts p;"
        )->findAll();

        $bests = $this->db->query(
            "SELECT * 
            FROM `posts` 
            ORDER BY `like` 
            DESC LIMIT 3;"
        )->findAll();

        return ['news' => $news, 'bests' => $bests];
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function read(int $id): array|false
    {
        $post = $this->db->query(
            "SELECT * 
            FROM `posts` 
            WHERE `id` = :id;",
            ['id' => $id]
        )->find();

        return $post;
    }

    public function readAll(): array|false
    {
        $contents = $this->db->query(
            "SELECT *
            FROM `posts`"
        )->findAll();

        return $contents;
    }
}
