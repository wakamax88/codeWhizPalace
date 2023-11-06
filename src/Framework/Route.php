<?php

declare(strict_types=1);

namespace Framework;

class Route
{
    protected string $method;
    protected string $path;
    protected array $controller;
    protected array $parameters = [];
    protected array $middleware;

    public function __construct(string $method, string $path, array $controller, array $middleware)
    {
        $this->method = $method;
        $this->path = $this->normalizePath($path);
        $this->controller = $controller;
        $this->middleware = $middleware;
    }

    public function parameters()
    {
        return $this->parameters;
    }

    public function method()
    {
        return $this->method;
    }

    public function path()
    {
        return $this->path;
    }

    public function middleware()
    {
        return $this->middleware;
    }

    public function matches(string $method, string $path)
    {
        if (
            $this->method === $method
            && $this->path === $this->normalizePath($path)
        ) {
            return true;
        }
        $parameterNames = [];
        $pattern = $this->normalizePath($this->path);
        $url = $this->normalizePath($path);
        if (substr_count($url, '/') > substr_count($pattern, '/')) {
            return false;
        };

        $pattern = preg_replace_callback('#{([^}]+)}/#', function (array $found) use (&$parameterNames) {
            array_push($parameterNames, rtrim($found[1], '?'));

            if (str_ends_with($found[1], '?')) {
                return '([^/]*)(?:/?)';
            }

            return '([^/]+)/';
        }, $pattern);

        if (
            !str_contains($pattern, '+')
            && !str_contains($pattern, '*')
        ) {
            return false;
        }

        preg_match_all("#{$pattern}#", $this->normalizePath($path), $matches);

        $parameterValues = [];


        if (count($matches[1]) > 0) {
            foreach ($matches[1] as $value) {
                if ($value) {
                    array_push($parameterValues, $value);
                    continue;
                }

                array_push($parameterValues, null);
            }

            $emptyValues = array_fill(0, count($parameterNames), false);
            $parameterValues += $emptyValues;

            $this->parameters = array_combine($parameterNames, $parameterValues);
            return true;
        }
        return false;
    }

    public function dispatchRoute($container, $middlewares)
    {
        [$class, $method] = $this->controller;
        $controllerInstance = $container ? $container->resolve($class) : new $class;
        $action = fn () => $controllerInstance->{$method}($this->parameters());
        $allMiddleware = [...$this->middleware(), ...$middlewares];
        foreach ($allMiddleware as $middleware) {
            $middlewareInstance = $container ? $container->resolve($middleware) : new $middleware;
            $action = fn () => $middlewareInstance->process($action);
        }
        $action();
        return;
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = filter_var($path, FILTER_SANITIZE_URL);
        $path = "/{$path}/";
        $path = preg_replace('/[\/]{2,}/', '/', $path);
        return $path;
    }
}
