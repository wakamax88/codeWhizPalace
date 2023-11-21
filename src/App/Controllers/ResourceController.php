<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Tabs;
use App\Services\LinkService;
use Framework\TemplateEngine;

class ResourceController
{

    public function __construct(
        private TemplateEngine $view,
        private LinkService $linkService,
    ) {
    }

    public function home()
    {
        echo $this->view->render('App/newsApp.php', [
            'subTitle' => 'Resource',
            'tabName' => 'News',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => [],
            'type' => 'link'
        ]);
    }

    public function lists()
    {
        $numberRow = $this->linkService->count();
        $pagination = calculPagination($numberRow, [3, 6, 9], 3);
        extract($pagination);
        echo $this->view->render('/app/listsApp.php', [
            'subTitle' => 'Resource',
            'tabName' => 'Lists',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => [],
            'type' => 'link'

        ]);
    }
}
