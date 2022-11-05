<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../../../public/frontend/css/main.css">
</head>
<body>
    <section class="loginForm">
        <h2>ĐĂNG KÍ</h2>
        <form action="{{URL::to('/register-customer')}}" method="post">
            @csrf
            <p><input type="text" name="customer_name" placeholder="Tài khoản"></p>
            <p><input type="password" name="customer_password" placeholder="Mật khẩu"></p>
            <p><input type="password" name="r_password" placeholder="Nhập lại mật khẩu"></p>
            <p><input type="email" name="customer_email" placeholder="Email"></p>
            <p><input type="tel" name="customer_phone" placeholder="Số điện thoại"></p>
            <button type="submit">Đăng kí</button>
        </form>
        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
</body>
</html>
