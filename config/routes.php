<?php

use App\Controllers\SessionController;

/**
 * API Path映射到Controller
 */
return [
    ['GET',  '/api/session', [SessionController::class, 'show']],
    ['POST', '/api/login',   [SessionController::class, 'login']],
    ['POST', '/api/logout',  [SessionController::class, 'logout']],
];
