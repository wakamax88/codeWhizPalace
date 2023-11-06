<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class ProfileService
{

    public function __construct(private Database $db)
    {
    }

    public function create(array $formData)
    {
        $formattedDate = "{$formData['birthday']} 00:00:00";
        $this->db->query(
            "INSERT INTO profiles(accounts_id, firstname, lastname, birthday)
            VALUES(:accounts_id, :firstname, :lastname, :birthday)",
            [
                'accounts_id' => $_SESSION['account'],
                'firstname' => $formData['firstname'],
                'lastname' => $formData['lastname'],
                'birthday' => $formattedDate
            ]
        );
    }

    public function read()
    {
        $profile = $this->db->query(
            "SELECT *, DATE_FORMAT(birthday, '%Y-%m-%d') as formatted_date FROM profiles WHERE accounts_id = :accounts_id",
            ['accounts_id' => $_SESSION['account']['id']]
        )->find();

        return $profile;
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
