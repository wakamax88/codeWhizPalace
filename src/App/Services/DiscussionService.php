<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class DiscussionService
{

    public function __construct(private Database $db)
    {
    }
    public function home()
    {
        $news = $this->db->query(
            "SELECT 
            d.id,
            d.title,
            d.lastComment_id AS lastCommentId,
            cm.content AS commentContent,
            p.firstname AS profilePseudo,
            p.id AS profileId,
            c.name AS category,
            dcm.commentCount,
            pcm.firstname AS commentProfilePseudo,
            pcm.id AS commentProfileId,
            DATE_FORMAT(cm.createdAt, '%d/%m/%Y à %Hh%i') AS commentDate,
            DATE_FORMAT(d.createdAt, '%d/%m/%Y à %Hh%i') AS date
            FROM discussions d
            JOIN profiles p ON d.profile_id = p.id
            JOIN categories c ON d.category_id = c.id
            LEFT JOIN discussion_comment_counts dcm ON d.id = dcm.discussion_id
            LEFT JOIN comments cm ON d.lastComment_id = cm.id
            LEFT JOIN profiles pcm ON cm.profile_id = pcm.id
            ORDER BY d.createdAt DESC
            LIMIT 3;"
        )->findAll();

        $bests = $this->db->query(
            "SELECT 
            d.id,
            d.title,
            d.lastComment_id AS lastCommentId,
            cm.content AS commentContent,
            p.firstname AS profilePseudo,
            p.id AS profileId,
            c.name AS category,
            dcm.commentCount,
            pcm.firstname AS commentProfilePseudo,
            pcm.id AS commentProfileId,
            DATE_FORMAT(cm.createdAt, '%d/%m/%Y à %Hh%i') AS commentDate,
            DATE_FORMAT(d.createdAt, '%d/%m/%Y à %Hh%i') AS date
            FROM discussions d
            JOIN profiles p ON d.profile_id = p.id
            JOIN categories c ON d.category_id = c.id
            LEFT JOIN discussion_comment_counts dcm ON d.id = dcm.discussion_id
            LEFT JOIN comments cm ON d.lastComment_id = cm.id
            LEFT JOIN profiles pcm ON cm.profile_id = pcm.id
            ORDER BY commentCount DESC
            LIMIT 3;"
        )->findAll();

        return ['news' => $news, 'bests' => $bests];
    }

    public function readAll(int $limit, int $offset): array|false
    {
        $contents = $this->db->query(
            "SELECT 
            d.id,
            d.title,
            d.lastComment_id AS lastCommentId,
            cm.content AS commentContent,
            p.firstname AS profilePseudo,
            p.id AS profileId,
            c.name AS category,
            dcm.commentCount,
            pcm.firstname AS commentProfilePseudo,
            pcm.id AS commentProfileId,
            DATE_FORMAT(cm.createdAt, '%d/%m/%Y à %Hh%i') AS commentDate,
            DATE_FORMAT(d.createdAt, '%d/%m/%Y à %Hh%i') AS date
            FROM discussions d
            JOIN profiles p ON d.profile_id = p.id
            JOIN categories c ON d.category_id = c.id
            LEFT JOIN discussion_comment_counts dcm ON d.id = dcm.discussion_id
            LEFT JOIN comments cm ON d.lastComment_id = cm.id
            LEFT JOIN profiles pcm ON cm.profile_id = pcm.id
            ORDER BY commentCount DESC
            LIMIT {$limit} OFFSET {$offset};;"
        )->findAll();

        return $contents;
    }

    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM discussions;")->count();
        return $numberRow;
    }

    public function delete(int $id)
    {
        $this->db->query(
            "DELETE FROM comments WHERE comments.discussion_id = :id;",
            [
                'id' => $id
            ]
        );
        $this->db->query(
            "DELETE FROM discussion_comment_counts WHERE discussion_comment_counts.discussion_id = :id;",
            [
                'id' => $id
            ]
        );
        $this->db->query(
            "DELETE FROM discussions WHERE discussions.id = :id;",
            [
                'id' => $id
            ]
        );
    }

    public function read(int $id)
    {
        $discussion = $this->db->query(
            "SELECT discussions.*,
             c.name AS categoryName
             FROM discussions
             JOIN categories c ON discussions.category_id = c.id
             WHERE discussions.id = :id;",
            [
                'id' => $id
            ]
        )->find();

        return $discussion;
    }

    public function create(array $formData)
    {
        $profile_id = $_SESSION['profile']['id'];
        $this->db->query(
            "INSERT INTO discussions(title, content, profile_id, category_id)
            VALUES(:title, :content, :profile_id, :category_id);",
            [
                'title' => $formData['title'],
                'content' => $formData['content'],
                'profile_id' => $profile_id,
                'category_id' => $formData['categoryId']
            ]
        );
        return $this->db->id();
    }

    public function update(array $formData, int $id)
    {
        $changeData = $this->db->query(
            "UPDATE discussions
            SET title = :title,
            content = :content,
            category_id = :category_id
            WHERE discussions.id = :id;",
            [
                'title' => $formData['title'],
                'content' => $formData['content'],
                'category_id' => $formData['categoryId'],
                'id' => $id
            ]
        )->rowCount();
        return $changeData;
    }

    public function getAllComments(int $id)
    {
        $comments = $this->db->query(
            "SELECT comments.*
            FROM comments
            WHERE comments.discussion_id = :id
            ORDER BY createdAt Desc;",
            [
                'id' => $id
            ]
        )->findAll();
        return $comments;
    }

    public function createComment($formData, $id)
    {
        $profile_id = $_SESSION['profile']['id'];
        $this->db->query(
            "INSERT INTO comments(content, profile_id, discussion_id)
            VALUES(:content, :profile_id, :discussion_id);",
            [
                'content' => $formData['comment'],
                'profile_id' => $profile_id,
                'discussion_id' => $id
            ]
        );
        return $this->db->id();
    }
}
