<?php

declare(strict_types=1);

namespace App\Config;

class Sanitize
{
    const POST = [
        'title' => 'string',
        'alt' => 'string',
        'excerpt' => 'string',
        'content' => 'url',
        'categoryId' => 'int'
    ];

    const CONTACT = [
        'name' => 'string',
        'email' => 'email',
        'message' => 'string'
    ];
}
