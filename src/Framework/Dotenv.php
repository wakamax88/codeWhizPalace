<?php

declare(strict_types=1);

namespace Framework;

class Dotenv
{

    public static function load($path)
    {
        $lines = file($path . '.env');
        foreach ($lines as $line) {
            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            putenv(sprintf('%s=%s', $key, $value));
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}
