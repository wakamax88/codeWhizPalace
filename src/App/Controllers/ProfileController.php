<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\{ValidatorService, ProfileService};


class ProfileController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
        private ProfileService $profileService
    ) {
    }

    public function profileView()
    {
        $profile = $this->profileService->read();
        echo $this->view->render("/app/profileApp.php", ['profile' => $profile]);
    }

    public function create()
    {
        $this->validatorService->validateProfile($_POST);
        $this->profileService->create($_POST);
        redirectTo('/app/profile');
    }
}
