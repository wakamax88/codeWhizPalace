<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;


class PageController
{
    public function __construct(private TemplateEngine $view)
    {
    }

    public function home()
    {
        echo $this->view->render('index.php',  ['subTitle' => 'Home Page']);
    }

    public function about()
    {
        echo $this->view->render('about.php', ['subTitle' => 'About Page']);
    }

    public function contact()
    {
        echo $this->view->render('contact.php', ['subTitle' => 'Contact Page']);
    }
}
