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
        $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        $this->db->query(
            "INSERT INTO accounts(email, password)
            VALUES(:email, :password)",
            [
                'email' => $formData['email'],
                'password' => $password
            ]
        );
        session_regenerate_id();

        $_SESSION['account'] = ['id' => $this->db->id(), 'password' => $password, 'email' => $formData['email']];
    }

    public function signin(array $formData)
    {
        $account = $this->db->query(
            "SELECT 
            accounts.id,
            accounts.password,
            accounts.email,
            p.id AS profileId,
            p.firstname AS profilePseudo 
            FROM accounts
            LEFT JOIN profiles p ON p.account_id = accounts.id 
            WHERE email = :email",
            ['email' => $formData['email']]
        )->find();

        $passwordMatch = password_verify($formData['password'], $account['password'] ?? '');

        if (!$account || !$passwordMatch) {
            throw new ValidationException(['password' => ['Invalid credentials']]);
        }

        session_regenerate_id();


        $_SESSION['account'] = ['id' => $account['id'], 'password' => $account['password'], 'email' => $account['email']];
        $_SESSION['profile'] = ['id' => $account['profileId'], 'pseudo' => $account['profilePseudo']];
    }

    public function signout()
    {
        unset($_SESSION['account']);
        session_regenerate_id();
        session_destroy();
    }

    /* test if the email still exists and if the password has not changed */
    public function verify(array $sessionAccount): bool
    {
        $account = $this->db->query("SELECT * FROM accounts WHERE email = :email", ['email' => $sessionAccount['email']])->find();
        $passwordMatch = $sessionAccount['password'] === $account['password'] ?? '';

        // ToDo
        return $passwordMatch;
    }
}
