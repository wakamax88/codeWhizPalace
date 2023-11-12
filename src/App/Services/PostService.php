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
        $posts = $this->db->query(
            "SELECT * FROM posts;"
        )->findAll();
        $postsView = $this->db->query("SELECT * FROM `posts` ORDER BY `like` DESC LIMIT 3;")->findAll();
        $blog = ['postsView' => $postsView, 'posts' => $posts];
        return $blog;
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function read(int $id): array|false
    {
        $post = $this->db->query("SELECT * FROM `posts` WHERE `id` = :id;", ['id' => $id])->find();
        return $post;
    }
}
