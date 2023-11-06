<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class AuthzMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        if (!empty($_SESSION['account'])) {
            redirectTo('/');
        }

        $next();
    }
}
