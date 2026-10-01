<?php

namespace App\Services;

use App\Repository\UserRepository;

/**
 * 基于 Session 的认证。Session 中仅存储用户 ID。
 */
final class AuthService
{
    public static function attempt(string $email, string $password): bool
    {
        $user = UserRepository::findByEmail($email);

        if ($user === null || !password_verify($password, $user['password_hash'])) {
            return false;
        }

        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];

        return true;
    }

    public static function logout(): void
    {
        unset($_SESSION['user_id']);
    }

    /** 当前登录用户（id, email, name），未登录返回 null */
    public static function user(): ?array
    {
        return isset($_SESSION['user_id']) ? UserRepository::find($_SESSION['user_id']) : null;
    }
}
