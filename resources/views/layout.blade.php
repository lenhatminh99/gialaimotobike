<!doctype html>
<html lang="en">
<head>
    <title>Gia Lai Motobike</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="public/frontend/css/style.css">
    <link rel="stylesheet" href="public/frontend/css/main.css">

</head>
<body>
<div id="header">
    <section class="gNav">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="public/frontend/images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="#" class="nav-link">Trang chủ</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Liên hệ</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Tuyển dụng</a></li>
                        @if(Session::get('customer_id') == true)
                            <li class="nav-item dropdown">
                                <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">
                                    <span class="customer_name">
                                        <?php
                                        $show_username = Session::get('customer_name');
                                        if ($show_username) {
                                            echo $show_username;
                                        }
                                        ?>
                                        </span>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin</a></li>
                                    <li><a href="{{ URL::to('/logout-customer') }}"><i
                                                class="fa fa-key"></i>Đăng
                                            xuất</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{URL::to('/login')}}" class="nav-link">Đăng nhập</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </section>
</div>
<div id="pageBody">
    <div id="content">

    </div>
    <div id="sidebar"></div>
</div>
<div id="footer">

</div>


<script src="public/frontend/js/jquery.min.js"></script>
<script src="public/frontend/js/popper.js"></script>
<script src="public/frontend/js/bootstrap.min.js"></script>
<script src="public/frontend/js/main.js"></script>

</body>
</html>

