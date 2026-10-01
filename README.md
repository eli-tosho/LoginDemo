一个简易的登录页面

## 环境搭建

需要 PHP 8.2、MySQL、Composer 和 npm。

```bash
mysql -u root < sql/init.sql   
composer install               
npm install                    
npm start                      # http://localhost:8000
```

登录账号：`demo@example.com` / `secret123`

数据库默认连接 `127.0.0.1`，用户 `root`，无密码
