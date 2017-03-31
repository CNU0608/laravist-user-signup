DB_CONNECTION=sqlite

touch database/database.sqlite

php artisan migrate

生成资源控制器
php artisan make:controller UserController --resource
这里只生成一个简单控制器
php artisan make:controller UserController

web.php
```
Route::post('/register', 'UserController@store');
```

welcome.blade.php
```
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form method="post" action="/register">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label">name:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="用户名">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">email:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="邮箱">
                    </div>
                    <div class="from-group">
                        <label for="password" class="control-label">password:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="密码">
                    </div>
                    <button type="submit" class="btn btn-primary">register</button>
                </form>
            </div>
        </div>
    </body>
</html>
```

UserController.php
```
public function store(){
    // 接收表单数据
    // 验证数据
    // 保存数据到数据库
    // 发送邮件
}
```

php artisan make:request UserSignUpRequest

UserSignUpRequest.php
```
public function authorize()
{
    return true;
}

public function rules()
{
    return [
        'name' => 'required',
        'email' => 'required|email|unique:users, email',
        'password' => 'required|min:6'
    ];
}
```

UserController.php
```
public function store(UserSignUpRequest $request){
    $data = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => bcrypt($request->get('password'))
    ];

    User::create($data);

    return redirect('/success');
}
```

web.php
```
Route::post('/register', 'UserController@store');

Route::get('/success', function(){
    return 'Registered Success';
});
```

查看用户是否注册成功
cd database/
sqlite3 database.sqlite
select * from users


