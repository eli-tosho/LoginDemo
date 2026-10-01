<?php

/**
 * API 入口
 */

use App\Core\Response;
use App\Core\Router;

require dirname(__DIR__) . '/vendor/autoload.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: /login.html');
    exit;
}

session_start();

try {
    Router::dispatch(require dirname(__DIR__) . '/config/routes.php');
} catch (Throwable $e) {
    error_log($e);
    Response::error('Server error', 500);
}
