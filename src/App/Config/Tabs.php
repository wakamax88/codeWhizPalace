<?php

declare(strict_types=1);

namespace App\Config;

class Tabs
{
    public const MAIN_TAB = ['Home', 'Blog', 'Forum', 'Course', 'Tutorials', 'Resource', 'Game', 'Admin'];
    public const SECOND_TAB = ['News', 'Lists'];
    public const ADMIN_TAB = ['Home', 'Categories', 'Users'];
    public const ICON_TAB =
    [
        'fa-solid fa-house',
        'fa-solid fa-newspaper',
        'fa-solid fa-pen-to-square',
        'fa-solid fa-graduation-cap',
        'fa-solid fa-handshake-angle',
        'fa-solid fa-link',
        'fa-solid fa-dice',
        'fa-solid fa-gauge'
    ];
}
