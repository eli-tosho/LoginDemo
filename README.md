## 环境搭建

需要 PHP 8.2、MySQL、Composer 和 npm。

```bash
mysql -u root < sql/init.sql   # 创建 login_demo 数据库和演示用户
composer install               # 生成自动加载器
npm install                    # 将 jQuery 复制到 public/assets/js/vendor/
npm start                      # http://localhost:8000
```

登录账号：`demo@example.com` / `secret123`

数据库默认连接 `127.0.0.1`，用户 `root`，无密码
