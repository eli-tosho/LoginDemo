<?php

namespace App\Controllers;

use App\Core\Response;
use App\Services\AuthService;

final class SessionController
{
    /** GET /api/session */
    public function show(): void
    {
        Response::toJson(['user' => AuthService::user()]);
    }

    /** POST /api/login  email, password */
    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!AuthService::attempt($email, $password)) {
            Response::error('Invalid email or password', 401);
            return;
        }

        Response::toJson(['user' => AuthService::user()]);
    }

    /** POST /api/logout */
    public function logout(): void
    {
        AuthService::logout();
        Response::toJson(['user' => null]);
    }
}
