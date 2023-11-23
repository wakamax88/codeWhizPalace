<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;
use App\Config\Sanitize;
use App\Services\SanitizeService;
use App\Services\ValidatorService;
use App\Services\MailService;

class PageController
{
    public function __construct(
        private TemplateEngine $view,
        private SanitizeService $sanitizeService,
        private ValidatorService $validatorService
    ) {
    }

    public function home()
    {
        echo $this->view->render('index.php',  ['subTitle' => 'Home Page']);
    }

    public function docs()
    {
        echo $this->view->render('docs.php', ['subTitle' => 'Docs Page']);
    }

    public function contactView()
    {
        echo $this->view->render('contact.php', ['subTitle' => 'Contact Page']);
    }
    public function contact()
    {
        $formData = $this->sanitizeService->sanitize($_POST, Sanitize::CONTACT);
        $this->validatorService->validateContact($formData);
        $mail = new MailService('alicia', 'wakamax@live.fr', 'wakamax@live.fr', 'test');
        var_dump($mail->header());
        $mail->send();
        echo $this->view->render('contact.php', ['subTitle' => 'Contact Page']);
    }
}
