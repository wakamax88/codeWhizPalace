<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Services\AccountService;
use Framework\Contracts\MiddlewareInterface;

class AuthnMiddleware implements MiddlewareInterface
{
    public function __construct(private AccountService $accountService)
    {
    }

    public function process(callable $next)
    {

        if (empty($_SESSION['account'])) {
            redirectTo('/signin');
        }

        if (!$this->accountService->verify($_SESSION['account'])) {
            $this->accountService->signout();
            redirectTo('/signin');
        }

        $next();
    }
}
