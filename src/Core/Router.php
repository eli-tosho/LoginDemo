<?php

namespace App\Core;

/**
 * 按 [method, path, [Controller::class, 'action']] 匹配当前请求并调用对应方法。
 */
final class Router
{
    public static function dispatch(array $routes): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';

        foreach ($routes as [$routeMethod, $routePath, [$class, $action]]) {
            if ($routeMethod === $method && $routePath === $path) {
                (new $class())->$action();
                return;
            }
        }

        Response::error('Not found', 404);
    }
}
