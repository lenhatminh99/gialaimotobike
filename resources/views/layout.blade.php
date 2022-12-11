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
{{--    sweet alert--}}
    <link rel="stylesheet" href="{{asset('/public/frontend/css/sweetalert.css')}}">
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
                        <li class="nav-item"><a href="{{URL::to('/gio-hang')}}" class="nav-link">Giỏ hàng</a></li>
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

<div class="container" id="contact">
    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li class="active">ĐỂ LẠI LỜI NHẮN!</li>
        </ol>
    </div>
    <form action="{{URL::to('/contact')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                @if(!session::get('customer_id'))
                    <input type="email" class="form-control" name="email_contact" placeholder="exam@gmail.com">
                @else
                <input type="email" class="form-control"
                       name="email_contact" value="{{session::get('customer_email')}}" disabled>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">Tên tài khoản</label>
                @if(!session::get('customer_id'))
                    <input type="text" class="form-control"
                           name="username_contact" placeholder="Nguyễn Văn A">
                @else
                    <input type="email" class="form-control"
                           name="email_contact" value="{{session::get('customer_name')}}" disabled>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Địa chỉ</label>
                <input type="text" class="form-control"
                       name="address_contact" placeholder="125/159A Nguyễn Thị Tần">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">Nội dung</label>
                <textarea type="text" class="form-control"
                          name="content_contact" placeholder="Nhập nội dung tin nhắn vào đây..."></textarea>
            </div>
            <button type="submit" id="send-contact" onclick="alert('Gửi phản hồi thành công!');" class="btn btn-primary">Gửi</button>
        </div>
    </form>
</div>
{{--footer--}}
<div id="footer">
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-facebook-f"></i
                    ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-twitter"></i
                    ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-google"></i
                    ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-instagram"></i
                    ></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-linkedin-in"></i
                    ></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-github"></i
                    ></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-5 col-12">
                            <!-- Email input -->
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="form5Example21" class="form-control" />
                                <label class="form-label" for="form5Example21">Email address</label>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white">Link 1</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 2</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 3</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">Link 4</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</div>

<script src="https://kit.fontawesome.com/7172a51dfe.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="/public/frontend/js/jquery.min.js"></script>
<script src="/public/frontend/js/popper.js"></script>
<script src="/public/frontend/js/bootstrap.min.js"></script>
<script src="/public/frontend/js/sweetalert.js"></script>
<script src="/public/frontend/js/main.js"></script>
</body>
</html>

