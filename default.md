DB_CONNECTION=sqlite

touch database/database.sqlite

php artisan migrate

// 生成资源控制器
php artisan make:controller UserController --resource
