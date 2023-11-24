<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\Show;
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
        $contents = $this->linkService->home();
        echo $this->view->render('App/newsApp.php', [
            'subTitle' => 'Resource',
            'tabName' => 'News',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'link'
        ]);
    }

    public function lists()
    {
        $numberRow = $this->linkService->count();
        $pagination = calculPagination($numberRow, Show::LINKS, Show::LINKS[0]);
        extract($pagination);
        $contents = $this->linkService->readAll($limit, $offset);
        echo $this->view->render('/app/listsApp.php', [
            'subTitle' => 'Resource',
            'tabName' => 'Lists',
            'tabs' => Tabs::SECOND_TAB,
            'contents' => $contents,
            'type' => 'link',
            'pageActive' => $page,
            'pageMax' => $pageMax,
            'offset' => $offset,
            'numberRow' => $numberRow,
            'limit' => $limit,
            'shows' => Show::LINKS
        ]);
    }
}
