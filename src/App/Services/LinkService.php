<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class LinkService
{
    public function __construct(private Database $db)
    {
    }

    public function home()
    {
        $news = $this->db->query(
            "SELECT
            links.id,
            links.description,
            links.image,
            links.name,
            links.url,
            links.rating,
            DATE_FORMAT(createdAt, '%d/%m/%Y à %Hh%i') AS date,
            c.id AS categoryId,
            c.name AS categoryName
            FROM links
            JOIN categories c ON links.category_id = c.id
            ORDER BY createdAt
            DESC LIMIT 3;"
        )->findAll();

        $bests = $this->db->query(
            "SELECT
            links.id,
            links.description,
            links.image,
            links.name,
            links.url,
            links.rating,
            DATE_FORMAT(createdAt, '%d/%m/%Y à %Hh%i') AS date,
            c.id AS categoryId,
            c.name AS categoryName
            FROM links
            JOIN categories c ON links.category_id = c.id
            ORDER BY links.rating
            DESC LIMIT 3;"
        )->findAll();
        return ['news' => $news, 'bests' => $bests];
    }

    public function readAll(int $limit, int $offset)
    {
        $contents = $this->db->query(
            "SELECT
            links.id,
            links.name,
            links.url,
            links.image,
            links.description,
            links.rating,
            c.id AS categoryId,
            c.name AS categoryName,
            DATE_FORMAT(createdAt, '%d/%m/%Y à %Hh%i') AS date
            FROM links
            JOIN categories c ON links.category_id = c.id
            LIMIT {$limit} OFFSET {$offset};"
        )->findAll();

        return $contents;
    }

    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM links")->count();
        return $numberRow;
    }
}
