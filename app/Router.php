<?php

namespace PhpMvc\App;

class Router
{
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public static function run(): void
    {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['path'] === $path && $route['method'] === $method) {
                $controllerPath = __DIR__ . '\\controller\\' . $route['controller'] . '.php';

                if (file_exists($controllerPath)) {
                    $controller = "PhpMvc\\App\\Controller\\" . $route['controller'];                    
                    $controller = new $controller;
                    
                    if (method_exists($controller, $route['function'])) {
                        $controller->{$route['function']}();
                        return;
                    }
                }
            }
        }

        http_response_code(404);
        echo "ERROR NOT FOUND";
    }
}