<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class SettingService
{
    public function __construct(private Database $db)
    {
    }

    public function home()
    {
        $accountId = $_SESSION['account']['id'];
        $contents = [
            'themes' => $this->getAllTheme(),
            'themeActive' => $this->getThemeByAccount((int) $accountId)
        ];

        return $contents;
    }

    public function update()
    {
        $accountId = $_SESSION['account']['id'];
        if (isset($_POST['theme'])) {
            $this->updateTheme($accountId, (int) $_POST['theme']);
            $content = $this->getThemeById((int) $_POST['theme']);
            $_SESSION['setting']['theme'] = $content['name'];
        }
    }

    public function updateTheme(int $accountId, int $themeId)
    {

        $this->db->query(
            "UPDATE accounts
            SET accounts.theme_id = :themeId
            WHERE accounts.id = :accountId;",
            [
                'themeId' => $themeId,
                'accountId' => $accountId
            ]
        );
    }

    public function getAllTheme()
    {
        $contents = $this->db->query(
            "SELECT * FROM themes;"
        )->findAll();

        return $contents;
    }

    public function getThemeByAccount(int $id)
    {
        $content = $this->db->query(
            "SELECT
            a.id AS accountId,
            themes.name,
            themes.id
            FROM themes
            RIGHT JOIN accounts a ON a.theme_id = themes.id
            WHERE a.id = :id;",
            [
                'id' => $id
            ]
        )->find();

        return $content;
    }
    public function getThemeById(int $id)
    {
        $content = $this->db->query(
            "SELECT *
            FROM themes
            WHERE themes.id = :id;",
            [
                'id' => $id,
            ]
        )->find();

        return $content;
    }
}
