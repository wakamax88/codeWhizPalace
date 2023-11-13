<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\DiscussionService;

class ForumController
{
    public function __construct(private TemplateEngine $view, private DiscussionService $discussionService)
    {
    }
    public function home()
    {
        $contents = $this->discussionService->home();
        echo $this->view->render('/App/indexApp.php', ['subTitle' => 'Forum', 'contents' => $contents]);
    }
}
