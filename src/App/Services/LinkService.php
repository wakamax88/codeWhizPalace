<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class LinkService
{
    public function __construct(private Database $db)
    {
    }

    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM links")->count();
        return $numberRow;
    }
}
