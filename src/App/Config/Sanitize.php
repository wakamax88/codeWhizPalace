<?php

declare(strict_types=1);

namespace App\Config;

class Sanitize
{
    const POST = [
        'title' => 'string',
        'alt' => 'string',
        'excerpt' => 'string',
        'content' => 'string',
        'categoryId' => 'int'
    ];
}
