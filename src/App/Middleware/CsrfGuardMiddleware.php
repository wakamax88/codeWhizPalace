<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class CsrfGuardMiddleware implements MiddlewareInterface
{
    public function process(callable $next)
    {

        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
        $validMethods = ['POST', 'PATCH', 'DELETE'];

        if ($requestMethod == 'PATCH' or $requestMethod == 'DELETE') {
            $data = file_get_contents("php://input");

            $jsonData = json_decode($data, true);

            $_POST = $jsonData;
        }

        if (!in_array($requestMethod, $validMethods)) {
            $next();
            return;
        }

        if ($_SESSION['token'] !== $_POST['token']) {
            redirectTo('/');
        }
        unset($_SESSION['token']);
        $next();
    }
}
