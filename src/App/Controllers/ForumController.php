<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Tabs;
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
        echo $this->view->render('/App/newsApp.php', [
            'subTitle' => 'Forum',
            'tabName' => 'News',
            'sTabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'discussion'
        ]);
    }

    public function lists()
    {
        $contents = $this->discussionService->readAll();
        echo $this->view->render('/App/listsApp.php', [
            'subTitle' => 'Forum',
            'tabName' => 'Lists',
            'sTabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'discussion'
        ]);
    }
}
