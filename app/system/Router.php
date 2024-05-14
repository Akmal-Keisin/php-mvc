<?php

namespace PhpMvc\App\System;

class Router
{
    private static array $routes = [];

    public static function add(string $method, string $path, string $controller, string $function, array $middleware = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middleware
        ];
    }

    public static function run(): void
    {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if (preg_match_all('#\{(.*?)\}#', $route['path'], $routePatternMatch)) {
                $routePath = preg_replace('#\{(.*?)\}#', '([a-zA-Z0-9])', $route['path']);
                $routePath = '#' . $routePath . '$#';

                if (preg_match_all($routePath, $path, $pathMatch)) {
                    foreach ($route['middleware'] as $middleware) {
                        $middlewareInstance = new $middleware;
                        $middlewareInstance->before();
                    }
                    
                    $controller = new $route['controller'];
                    $function = $route['function'];
                    call_user_func_array([$controller, $function], $pathMatch[1]);
                    return;
                }
            }
            
            if ($route['path'] === $path && $route['method'] === $method) {                
                $controller = new $route['controller'];
                $function = $route['function'];
                $controller->$function();
                return;
            }
        }

        http_response_code(404);
        echo "ERROR NOT FOUND";
    }
}