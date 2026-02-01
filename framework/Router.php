<?php

namespace Framework;

class Router
{
    private array $routes = [];
    private string $controllerNamespace = 'App\\Controllers';

    public function setControllerNamespace(string $namespace): void
    {
        $this->controllerNamespace = $namespace;
    }

    public function get(string $path, $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute(string $method, string $path, $handler): void
    {
        $this->routes[] = [
            'method'  => $method,
            'path'    => $this->normalizePath($path),
            'handler' => $handler,
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = '/' . trim($path, '/');

        return $path === '/' ? $path : rtrim($path, '/');
    }

    public function dispatch(string $method, string $uri, Container $container): void
    {
        $uri = $this->normalizePath($uri);

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            $params = $this->match($route['path'], $uri);

            if ($params !== null) {
                $this->runHandler($route['handler'], $params, $container);
                return;
            }
        }

        http_response_code(404);

        echo '404 Not Found';
    }

    private function match(string $pattern, string $uri): ?array
    {
        if ($pattern === $uri) {
            return [];
        }

        $regex = preg_replace('/\{([a-zA-Z_]+)\}/', '(?P<$1>[^/]+)', $pattern);
        $regex = '#^' . $regex . '$#';

        if (preg_match($regex, $uri, $m)) {
            return array_filter($m, 'is_string', ARRAY_FILTER_USE_KEY);
        }

        return null;
    }

    private function runHandler($handler, array $params, Container $container): void
    {
        if (is_callable($handler)) {
            echo $handler($container, ...$params);
            return;
        }

        if (is_string($handler)) {
            [$class, $method] = explode('@', $handler);
            $class = $this->controllerNamespace . '\\' . $class;

            if (!class_exists($class)) {
                throw new \RuntimeException("Controller not found: {$class}");
            }

            $controller = new $class($container);

            echo $controller->$method(...$params);
        }
    }
}
