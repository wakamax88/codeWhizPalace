<?php

declare(strict_types=1);

namespace Framework;

class App
{
    private Router $router;
    private Container $container;

    public function __construct(string $containerDefinitionsPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();

        if ($containerDefinitionsPath) {
            $containerDefinitionsPath = include $containerDefinitionsPath;
            $this->container->addDefinitions($containerDefinitionsPath);
        }
    }

    public function run()
    {
        $this->router->dispatch($this->container);
    }

    public function get(string $path, array $controller, array $middleware = [])
    {
        $this->router->addRoute('GET', $path, $controller, $middleware);
    }

    public function post(string $path, array $controller, array $middleware = [])
    {
        $this->router->addRoute('POST', $path, $controller, $middleware);
    }

    public function addMiddleware(string $middleware)
    {
        $this->router->addMiddleware($middleware);
    }
}
