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
            "SELECT d.id, d.title, p.firstname AS profilePseudo, p.id, c.name AS category, MAX(cm.content) AS commentContent, COUNT(cm.id) AS commentNb
            FROM discussions d
            JOIN comments cm ON d.id = cm.discussion_id
            JOIN profiles p ON d.profile_id = p.id
            JOIN categories c ON d.category_id = c.id
            GROUP BY d.id, d.title, p.firstname, p.id, c.name
            ORDER BY d.created_at DESC
            LIMIT 3;"
        )->findAll();

        $bests = $this->db->query(
            "SELECT d.id, d.title, p.firstname AS discussionProfileName, p.id, c.name AS category, MAX(cm.content) AS lastComment, COUNT(cm.id) AS nbComment
            FROM discussions d
            JOIN comments cm ON d.id = cm.discussion_id
            JOIN profiles p ON d.profile_id = p.id
            JOIN categories c ON d.category_id = c.id
            GROUP BY d.id, d.title, p.firstname, p.id, c.name
            ORDER BY nbComment DESC
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
