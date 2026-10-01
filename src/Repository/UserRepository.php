<?php

namespace App\Repository;

use App\Core\Db;

/**
 * users 表的查询（表结构见 sql/init.sql）。
 */
final class UserRepository
{
    /** 返回 id, email, name */
    public static function find(int $id): ?array
    {
        return Db::fetch('SELECT id, email, name FROM users WHERE id = ?', [$id]);
    }

    /** 包含 password_hash，仅用于登录校验 */
    public static function findByEmail(string $email): ?array
    {
        return Db::fetch('SELECT id, email, name, password_hash FROM users WHERE email = ?', [$email]);
    }
}
