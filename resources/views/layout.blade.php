<!doctype html>
<html lang="en">
<head>
    <title>Gia Lai Motobike</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--google font--}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    {{--    font awesome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/font-awesome.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
{{--style nav--}}
    <link rel="stylesheet" href="{{asset('/public/frontend/css/style.css')}}">
{{--    my css--}}
{{--    <link rel="stylesheet" href="public/frontend/css/main.css">--}}
    <link rel="stylesheet" href="{{asset('/public/frontend/css/main.css')}}">

</head>
<body>
{{--header--}}
<div id="header">
{{--    nav--}}
    <section class="gNav">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="{{asset('public/frontend/images/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="/" class="nav-link">Trang chủ</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">Liên hệ</a></li>
                        <li class="nav-item"><a href="{{URL::to('/cart')}}" class="nav-link">Giỏ hàng</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Thanh toán</a></li>
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
    <!--banner-->
    <div class="banner">
        <div class="swiper mySwiperBanner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide-image-banner">
                        <div class="image">
                            <img src="{{asset('public/frontend/images/slide1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="content-banner">
                        <div class="title">
                            <h2>Xe máy <span>gia lai</span> - ve chai đồng nát</h2>
                        </div>
                        <div class="subtitle">
                            <p>Công ty TNHH Gia Lai Motobike chuyên mua bán,
                                sửa chữa xe máy đặc biệt là xe Honda,
                                và các dịch vụ hậu mãi đi kèm nhằm phục vụ càng tốt hơn nhu cầu của ...
                            </p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide-image-banner">
                        <div class="image">
                            <img src="{{asset('public/frontend/images/slide2.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="content-banner">
                        <div class="title">
                            <h2>Xe máy <span>gia lai</span> - ve chai đồng nát</h2>
                        </div>
                        <div class="subtitle">
                            <p>Công ty TNHH Gia Lai Motobike chuyên mua bán,
                                sửa chữa xe máy đặc biệt là xe Honda,
                                và các dịch vụ hậu mãi đi kèm nhằm phục vụ càng tốt hơn nhu cầu của ...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

{{--page body--}}
<div class="pageBody">

    @yield('content')
{{--    product: show cung website--}}
{{--    product_buy_action: khi click vao mua ngay thi show ra, hien thi sp kem danh muc--}}
{{--    product_by_category: nhin la nho--}}

</div>

{{--footer--}}
<div id="footer">
    <div class="main-block" id="contact">
        <form action="/" class="contact-form">
            <h4>Để lại lời nhắn</h4>
            <div class="info">
                <input class="fname" type="text" name="name" placeholder="Họ và tên">
                <input type="text" name="name" placeholder="Email">
                <input type="text" name="name" placeholder="Số điện thoại">
                <p><textarea rows="2" placeholder="Vui lòng nhập phản hồi"></textarea></p>
                <button type="submit">Gửi</button>
            </div>
        </form>
    </div>
</div>

<script src="https://kit.fontawesome.com/7172a51dfe.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="/public/frontend/js/jquery.min.js"></script>
<script src="/public/frontend/js/popper.js"></script>
<script src="/public/frontend/js/bootstrap.min.js"></script>
<script src="/public/frontend/js/main.js"></script>
</body>
</html>

