-- 初始化数据库和演示用户
-- 测试账户: demo@example.com / secret123

CREATE DATABASE IF NOT EXISTS login_demo
    DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE login_demo;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email          VARCHAR(190) NOT NULL,
    password_hash  VARCHAR(255) NOT NULL,
    name           VARCHAR(120) NOT NULL,
    created_at     DATETIME     NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_email (email)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- password_hash('secret123', PASSWORD_BCRYPT)
INSERT INTO users (email, password_hash, name, created_at) VALUES
    ('demo@example.com', '$2y$10$TmdCvSmwqbed8smIFb3jKuERWjxHZFgrGV0QlRH7Upji88sdf7nsu', 'Demo User', NOW());
