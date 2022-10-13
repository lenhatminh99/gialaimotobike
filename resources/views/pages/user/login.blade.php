<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/frontend/css/main.css">
</head>
<body>
    <section class="loginForm">
        <h2>ĐĂNG NHẬP</h2>
        @if (session('message'))
            <div class="alert alert-success">
                {{session ('message') }}
            </div>
        @endif
        <form action="{{URL::to('/login-customer')}}" method="post">
            @csrf
            <p><input type="text" name="customer_name" placeholder="Tài khoản"></p>
            <p><input type="password" name="customer_password" placeholder="Mật khẩu"></p>
            <button type="submit">Đăng nhập</button>
        </form>
        <a id="registerBtn" href="{{'/register'}}"><button>Đăng kí</button></a>
    </section>
</body>
</html>
