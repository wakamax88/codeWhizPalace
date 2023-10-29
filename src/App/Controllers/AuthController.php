<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, AccountService};

class AuthController
{
    public function __construct(private TemplateEngine $view, private ValidatorService $validatorService, private AccountService $accountService)
    {
    }

    public function signupView()
    {
        echo $this->view->render("signup_v2.php");
    }

    public function signup()
    {
        $this->validatorService->validateSignup($_POST);
        $this->accountService->isEmailExist($_POST['email']);
        $this->accountService->create($_POST);
        redirectTo('/app');
    }

    public function signinView()
    {
        echo $this->view->render("signin_v2.php");
    }

    public function signin()
    {
        $this->validatorService->validateSignin($_POST);

        $this->accountService->signin($_POST);

        redirectTo('/app');
    }

    public function signout()
    {
        $this->accountService->signout();

        redirectTo('/signin');
    }
}
