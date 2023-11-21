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

    public function create(array $formData, string $imageName)
    {
        $profile_id = $_SESSION['profile']['id'];
        $this->db->query(
            "INSERT INTO posts(title, content, excerpt, profile_id, category_id, thumbnail)
            VALUES(:title, :content, :excerpt, :profile_id, :category_id, :thumbnail)",
            [
                'title' => $formData['title'],
                'content' => $formData['content'],
                'excerpt' => $formData['excerpt'],
                'profile_id' => $profile_id,
                'category_id' => $formData['categoryId'],
                'thumbnail' => $imageName
            ]
        );
        return $this->db->id();
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
            CONCAT(SUBSTRING(posts.excerpt, 1, 255), '...') AS excerpt,
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
            posts.excerpt
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
            CONCAT(SUBSTRING(posts.excerpt, 1, 255), '...') AS excerpt,
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
            posts.excerpt
            ORDER BY voteNb 
            DESC LIMIT 3;",
            ['profile_id' => $profile_id]
        )->findAll();

        return ['news' => $news, 'bests' => $bests];
    }

    public function update(array $formData, int $id)
    {
        $changeData = $this->db->query(
            "UPDATE posts
            SET title = :title,
            content = :content,
            alt = :alt,
            excerpt = :excerpt,
            category_id = :category_id
            WHERE posts.id = :id;",
            [
                'title' => $formData['title'],
                'content' => $formData['content'],
                'excerpt' => $formData['excerpt'],
                'category_id' => $formData['categoryId'],
                'alt' => $formData['alt'],
                'id' => $id
            ]
        )->rowCount();
        return $changeData;
    }

    public function delete(int $id)
    {
        $this->db->query(
            "DELETE FROM posts WHERE posts.id = :id",
            [
                'id' => $id
            ]
        );
    }

    public function read(int $id): array|false
    {
        $post = $this->db->query(
            "SELECT posts.*, c.name AS categoryName 
            FROM `posts`
            JOIN categories c ON posts.category_id = c.id 
            WHERE posts.`id` = :id;",
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
            CONCAT(SUBSTRING(posts.excerpt, 1, 255), '...') AS excerpt,
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
            posts.excerpt
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

    public function countVote($profile_id, $post_id)
    {
        $numberRow = $this->db->query(
            "SELECT COUNT(*) 
            FROM votes 
            WHERE votes.profile_id = :profile_id
            AND votes.post_id = :post_id;",
            [
                'post_id' => $post_id,
                'profile_id' => $profile_id
            ]
        )->count();
        return $numberRow;
    }

    public function deleteVote($profile_id, $post_id)
    {
        $changeData = $this->db->query(
            "DELETE 
            FROM votes
            WHERE votes.profile_id = :profile_id
            AND votes.post_id = :post_id;",
            [
                'post_id' => $post_id,
                'profile_id' => $profile_id
            ]
        )->rowCount();
        return $changeData;
    }

    public function createVote($profile_id, $post_id)
    {
        $this->db->query(
            "INSERT INTO votes(profile_id,post_id)
            VALUES(:profile_id, :post_id);",
            [
                'post_id' => $post_id,
                'profile_id' => $profile_id
            ]
        );
    }
}
