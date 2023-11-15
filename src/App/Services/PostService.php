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
        $profile_id = $_SESSION['profile']['id'];
        $news = $this->db->query(
            "SELECT 
            p.firstname AS profilePseudo,
            c.name AS categoryName, 
            p.id AS profileId, 
            posts.id AS postId,
            posts.title,
            posts.thumbnail,
            posts.id,
            posts.createdAt AS date,
            CONCAT(SUBSTRING(posts.exercpt, 1, 255), '...') AS exercpt,
            COUNT(v.id) AS voteNb,
            CASE WHEN EXISTS (SELECT 1 FROM votes WHERE post_id = posts.id AND profile_id = :profile_id) THEN 1 ELSE 0 END AS hasVoted
            FROM posts
            JOIN profiles p ON posts.profile_id = p.id
            JOIN categories c ON posts.category_id = c.id
            LEFT JOIN votes v ON posts.id = v.post_id
            GROUP BY 
            p.firstname,
            c.name, 
            p.id,
            posts.id,
            posts.title,
            posts.thumbnail,
            posts.exercpt
            ORDER BY createdAt 
            DESC LIMIT 3;",
            ['profile_id' => $profile_id]
        )->findAll();

        $bests = $this->db->query(
            "SELECT 
            p.firstname AS profilePseudo,
            c.name AS categoryName, 
            p.id AS profileId, 
            posts.id AS postId,
            posts.title,
            posts.thumbnail,
            posts.id,
            posts.createdAt AS date,
            CONCAT(SUBSTRING(posts.exercpt, 1, 255), '...') AS exercpt,
            COUNT(v.id) AS voteNb,
            CASE WHEN EXISTS (SELECT 1 FROM votes WHERE post_id = posts.id AND profile_id = :profile_id) THEN 1 ELSE 0 END AS hasVoted
            FROM posts
            JOIN profiles p ON posts.profile_id = p.id
            JOIN categories c ON posts.category_id = c.id
            LEFT JOIN votes v ON posts.id = v.post_id
            GROUP BY 
            p.firstname,
            c.name, 
            p.id,
            posts.id,
            posts.title,
            posts.thumbnail,
            posts.exercpt
            ORDER BY voteNb 
            DESC LIMIT 3;",
            ['profile_id' => $profile_id]
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

    public function readAll(int $page, int $limit, int $offset): array|false
    {

        $profile_id = $_SESSION['profile']['id'];
        $contents = $this->db->query(
            "SELECT 
            p.firstname AS profilePseudo,
            c.name AS categoryName, 
            p.id AS profileId, 
            posts.id AS postId,
            posts.title,
            posts.thumbnail,
            posts.id,
            posts.createdAt AS date,
            CONCAT(SUBSTRING(posts.exercpt, 1, 255), '...') AS exercpt,
            COUNT(v.id) AS voteNb,
            CASE WHEN EXISTS (SELECT 1 FROM votes WHERE post_id = posts.id AND profile_id = :profile_id) THEN 1 ELSE 0 END AS hasVoted
            FROM posts
            JOIN profiles p ON posts.profile_id = p.id
            JOIN categories c ON posts.category_id = c.id
            LEFT JOIN votes v ON posts.id = v.post_id
            GROUP BY 
            p.firstname,
            c.name, 
            p.id,
            posts.id,
            posts.title,
            posts.thumbnail,
            posts.exercpt
            LIMIT {$limit} OFFSET {$offset};",
            ['profile_id' => $profile_id]
        )->findAll();
        return $contents;
    }

    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM posts")->count();
        return $numberRow;
    }
}
