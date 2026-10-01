<?php

/**
 * 数据库配置
 */

return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'database' => getenv('DB_NAME') ?: 'login_demo',
    'username' => getenv('DB_USER') ?: 'root',
    'password' => getenv('DB_PASS') ?: '',
];
