<?php

declare(strict_types=1);

namespace Framework;

use Framework\Route;

class Router
{
    private array $routes = [];
    protected Route $current;

    public function addRoute(string $method, string $path, array $controller)
    {
        $route = $this->routes[] = new Route($method, $path, $controller);
        return $route;
    }

    public function dispatch()
    {
        $paths = $this->paths();
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $requestPath = $_SERVER['REQUEST_URI'] ?? '/';
        $matching = $this->match($requestMethod, $requestPath);
        dd($paths);
        dd($matching);
        if ($matching) {
            $this->current = $matching;
            try {
                return $matching->dispatchRoute();
            } catch (\Throwable $e) {
                return $this->dispatchError($e);
            }
        }
        if (in_array($requestPath, $paths)) {
            return $this->dispatchNotAllowed();
        }
        return $this->dispatchNotFound();
    }

    public function dispatchNotAllowed()
    {
        dd("not allowed");
    }

    public function dispatchNotFound()
    {
        dd("not found");
    }

    public function dispatchError($e)
    {
        dd($e);
    }

    private function paths(): array
    {
        $paths = [];
        foreach ($this->routes as $route) {
            $paths[] = $route->path();
        }
        return $paths;
    }

    private function match(string $method, string $path): mixed
    {
        foreach ($this->routes as $route) {
            if ($route->matches($method, $path)) {
                return $route;
            }
        }
        return null;
    }
}
