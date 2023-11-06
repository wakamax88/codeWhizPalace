<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {
        try {
            $next();
        } catch (ValidationException $e) {
            $_SESSION['errors'] = $e->errors;
            $_SESSION['oldFormData'] = $_POST;
            $_SESSION['alert'] = ['info' => 'info message'];
            $alert = [...$_SESSION['alert'], ...['danger' => 'danger message', 'warning' => 'warning message', 'success' => 'success message']];
            $_SESSION['alert'] = $alert;
            //TEST
            $referer = $_SERVER['HTTP_REFERER'];
            redirectTo($referer);
        }
    }
}
