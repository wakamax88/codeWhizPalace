<?php

declare(strict_types=1);

namespace Framework;

class App
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        echo 'Application is running';
        $this->router->dispatch();
    }

    public function get(string $path, array $controller)
    {
        $this->router->addRoute('GET', $path, $controller);
    }

    public function post(string $path, array $controller)
    {
        $this->router->addRoute('POST', $path, $controller);
    }
}
