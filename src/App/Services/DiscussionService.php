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

    public function readAll(): array|false
    {
        $contents = $this->db->query(
            "SELECT *
            FROM `discussions`"
        )->findAll();

        return $contents;
    }
}
