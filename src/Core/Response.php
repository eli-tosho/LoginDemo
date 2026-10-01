<?php

namespace App\Core;

/**
 * 输出 JSON 响应。
 */
final class Response
{
    public static function toJson(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public static function error(string $message, int $status = 400): void
    {
        self::toJson(['error' => $message], $status);
    }
}
