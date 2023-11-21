<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class AccountService
{
    public function __construct(private Database $db)
    {
    }

    public function isEmailExist(string $email)
    {
        $emailCount = $this->db->query(
            "SELECT COUNT(*) FROM accounts WHERE email = :email",
            ['email' => $email]
        )->count();

        if ($emailCount > 0) {
            throw new ValidationException(['email' => 'Email Exist']);
        }
    }

    public function signup(array $formData)
    {
        $numberRow = $this->count();
        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        if ($numberRow == 0) {
            $role_id = 1;
            $this->db->query(
                "INSERT INTO accounts(email, password, role_id)
                VALUES(:email, :password, :role_id)",
                [
                    'email' => $formData['email'],
                    'password' => $password,
                    'role_id' => $role_id,
                ]
            );
        } else {
            $role_id = 5;
            $this->db->query(
                "INSERT INTO accounts(email, password, role_id)
                VALUES(:email, :password, :role_id)",
                [
                    'email' => $formData['email'],
                    'password' => $password,
                    'role_id' => $role_id,
                ]
            );
        }


        session_regenerate_id();

        $_SESSION['account'] = ['id' => $this->db->id(), 'password' => $password, 'email' => $formData['email'], 'roleId' => $role_id];
        $_SESSION['profile'] = ['id' => null, 'pseudo' => null];
        $_SESSION['setting'] = ['themeName' => null];
    }

    public function signin(array $formData)
    {
        $account = $this->db->query(
            "SELECT 
            accounts.id,
            accounts.password,
            accounts.email,
            accounts.role_id AS roleId,
            t.name AS themeName,
            p.id AS profileId,
            p.firstname AS profilePseudo 
            FROM accounts
            LEFT JOIN themes t ON t.id = accounts.theme_id
            LEFT JOIN profiles p ON p.account_id = accounts.id 
            WHERE email = :email",
            ['email' => $formData['email']]
        )->find();

        $passwordMatch = password_verify($formData['password'], $account['password'] ?? '');

        if (!$account || !$passwordMatch) {
            throw new ValidationException(['password' => ['Invalid credentials']]);
        }

        session_regenerate_id();


        $_SESSION['account'] = ['id' => $account['id'], 'password' => $account['password'], 'email' => $account['email'], 'roleId' => $account['roleId']];
        $_SESSION['profile'] = ['id' => $account['profileId'], 'pseudo' => $account['profilePseudo']];
        $_SESSION['setting'] = ['theme' => $account['themeName']];
    }

    public function signout()
    {
        unset($_SESSION['account']);
        session_regenerate_id();
        session_destroy();
    }

    public function verify(array $sessionAccount): bool
    {
        $account = $this->db->query("SELECT * FROM accounts WHERE email = :email", ['email' => $sessionAccount['email']])->find();
        $passwordMatch = $sessionAccount['password'] === $account['password'] ?? '';

        // ToDo
        return $passwordMatch;
    }

    public function read(int $page, int $limit, int $offset)
    {
        $contents = $this->db->query(
            "SELECT 
            accounts.id,
            accounts.email,
            p.id AS profileId,
            p.firstname AS profileFirstname,
            p.lastname AS profileLastname,
            r.id AS roleId,
            r.name AS roleName
            FROM accounts
            JOIN roles r ON r.id = accounts.role_id
            LEFT JOIN profiles p ON p.account_id = accounts.id
            LIMIT {$limit} OFFSET {$offset};"
        )->findAll();

        return $contents;
    }

    public function count()
    {
        $numberRow = $this->db->query("SELECT COUNT(*) FROM accounts")->count();
        return $numberRow;
    }

    public function readAllRole()
    {
        $contents = $this->db->query(
            "SELECT * FROM roles;"
        )->findAll();

        return $contents;
    }

    public function delete(int $id)
    {
        $this->db->query(
            "DELETE FROM accounts WHERE accounts.id = :id",
            [
                'id' => $id
            ]
        );
    }

    public function hasAdmin()
    {
        $numberRow = $this->db->query(
            "SELECT COUNT(*) 
            FROM accounts
            JOIN roles r ON r.id = accounts.role_id
            where r.name = 'admin';"
        )->count();

        return $numberRow;
    }

    public function getAccount(int $id)
    {
        $account = $this->db->query(
            "SELECT * 
            FROM accounts 
            where accounts.id = :id;",
            [
                'id' => $id,
            ]
        )->find();

        return $account;
    }

    public function updateUsers($account_id, $role_id)
    {
        $this->db->query(
            "UPDATE accounts
            SET role_id = :role_id
            WHERE accounts.id = :account_id;",
            [
                'role_id' => $role_id,
                'account_id' => $account_id
            ]
        );
    }
}
