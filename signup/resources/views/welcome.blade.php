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
