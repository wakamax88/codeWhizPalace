<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\SettingService;
use Framework\TemplateEngine;

class SettingController
{
    public function __construct(
        private TemplateEngine $view,
        private SettingService $settingService,
    ) {
    }

    public function home()
    {
        $contents = $this->settingService->home();
        echo $this->view->render('/app/settingApp.php', [
            'subTitle' => 'Setting',
            'contents' => $contents
        ]);
    }
    public function update()
    {
        $this->settingService->update($_POST);
        redirectTo('/app/setting');
    }
}
