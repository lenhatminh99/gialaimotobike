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
                        <li class="nav-item active"><a href="/" class="nav-link">Trang ch???</a></li>
                        <li class="nav-item"><a href="#contact" class="nav-link">Li??n h???</a></li>
                        <li class="nav-item"><a href="{{URL::to('/gio-hang')}}" class="nav-link">Gi??? h??ng</a></li>
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
                                    <li><a href="{{URL::to('/lich-su-mua-hang/'. Session::get('customer_id'))}}"><i class=" fa fa-suitcase"></i>L???ch s??? mua h??ng</a></li>
                                    <li><a href="{{URL::to('/xuat-file-don-hang/'. Session::get('customer_id'))}}"><i class=" fa fa-suitcase"></i>Xu???t PDF l???ch s??? mua h??ng</a></li>
                                    <li><a href="{{ URL::to('/logout-customer') }}"><i
                                                class="fa fa-key"></i>????ng xu???t</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a href="{{URL::to('/login')}}" class="nav-link">????ng nh???p</a></li>
                        @endif
                        <div style="margin: auto;">
                            <ul>
                                <form action="{{ URL::to('/tim-kiem') }}" method="post">
                                    @csrf
                                    <div class="search_box">
                                        <input name="keywords_submit" type="text"
                                               placeholder="T??m ki???m s???n ph???m" />
                                        <input style="background: rgb(245, 209, 113);"type="submit" name="search_items"
                                               class="btn-sm" value="T??m ki???m" />
                                    </div>
                                </form>
                            </ul>
                        </div>
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
                            <h2>Xe m??y <span>gia lai</span> - Ph???c v??? cho t???t c??? m???i ng?????i</h2>
                        </div>
                        <div class="subtitle">
                            <p>C??ng ty TNHH Gia Lai Motobike chuy??n mua b??n,
                                s???a ch???a xe m??y ?????c bi???t l?? xe Honda,
                                v?? c??c d???ch v??? h???u m??i ??i k??m nh???m ph???c v??? c??ng t???t h??n nhu c???u c???a ...
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
                            <h2>Xe m??y <span>gia lai</span> - Ph???c v??? cho t???t c??? m???i ng?????i</h2>
                        </div>
                        <div class="subtitle">
                            <p>C??ng ty TNHH Gia Lai Motobike chuy??n mua b??n,
                                s???a ch???a xe m??y ?????c bi???t l?? xe Honda,
                                v?? c??c d???ch v??? h???u m??i ??i k??m nh???m ph???c v??? c??ng t???t h??n nhu c???u c???a ...
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
            <li class="active">????? L???I L???I NH???N!</li>
        </ol>
    </div>
    <form action="{{URL::to('/contact')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputEmail4">Email</label>
                @if(!session::get('customer_id'))
                    <input type="email" class="form-control" name="email_contact" placeholder="exam@gmail.com" required>
                @else
                <input type="email" class="form-control"
                       name="email_contact" value="{{session::get('customer_email')}}" disabled>
                @endif
            </div>
            <div class="form-group col-md-3">
                <label for="inputPassword4">T??n t??i kho???n</label>
                @if(!session::get('customer_id'))
                    <input type="text" class="form-control"
                           name="username_contact" placeholder="Nguy???n V??n A" required>
                @else
                    <input type="email" class="form-control"
                           name="email_contact" value="{{session::get('customer_name')}}" disabled>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">?????a ch???</label>
                <input type="text" class="form-control"
                       name="address_contact" placeholder="125/159A Nguy???n Th??? T???n" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputAddress">N???i dung</label>
                <textarea type="text" class="form-control"
                          name="content_contact" placeholder="Nh???p n???i dung tin nh???n v??o ????y..." required></textarea>
            </div>
            <button type="submit" id="send-contact" class="btn btn-primary">G???i</button>
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
                                <strong>Nh???n ngay c??c th??ng tin m???i nh???t:</strong>
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
                                Nh???n ngay!
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
                    Xe m??y Gia Lai  <br />Chuy??n ph??n ph???i xe m??y c??c lo???i, xe ph??n kh???i l???n, xe nh???p kh???u...
                </p>
            </section>
            <!-- Section: Text -->

            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2022 Copyright:
            <a class="text-white" href="#">Gia Lai Motobike</a>
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

