<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Config\Tabs;
use Framework\Contracts\MiddlewareInterface;
use Framework\TemplateEngine;

class TemplateDataMiddleware implements MiddlewareInterface
{
    public function __construct(private TemplateEngine $view)
    {
    }
    public function process(callable $next)
    {
        $this->view->addGlobal('title', 'CodeWhizPalace');
        $this->view->addGlobal('mTabs', Tabs::MAIN_TAB);
        $next();
    }
}
