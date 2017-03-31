DB_CONNECTION=sqlite

touch database/database.sqlite

php artisan migrate

// 生成资源控制器
php artisan make:controller UserController --resource
// 这里只生成一个简单控制器
php artisan make:controller UserController


web.php
```
Route::post('/register', 'UsersController@store');
```