<?php

namespace App\Core;

use PDO;

/**
 * 首次使用时按 config/database.php 建立 PDO 连接，并提供预处理查询。
 */
final class Db
{
    private static ?PDO $pdo = null;

    /** 执行查询并返回第一行，没有结果时返回 null */
    public static function fetch(string $sql, array $params = []): ?array
    {
        if (self::$pdo === null) {
            $c = require dirname(__DIR__, 2) . '/config/database.php';
            self::$pdo = new PDO(
                "mysql:host={$c['host']};dbname={$c['database']};charset=utf8mb4",
                $c['username'],
                $c['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }

        $statement = self::$pdo->prepare($sql);
        $statement->execute($params);

        return $statement->fetch() ?: null;
    }
}
