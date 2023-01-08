<!doctype html>
<html lang="en">
<head>
    <title>Gia Lai Motobike</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--    font awesome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/font-awesome.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100&display=swap" rel="stylesheet">
    {{--    my css--}}
    <link rel="stylesheet" href="{{asset('/public/frontend/css/main.css')}}">
    <style>

        .gradient-custom {
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to bottom, #0052D4, rgba(29, 113, 238, 0.85));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to bottom, #0052D4, rgba(29, 113, 238, 0.85));

            padding:15px;
            border-radius: 5px;
            color: #fff;
        }
    </style>
</head>
<body>
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <h1>ĐƠN ĐẶT HÀNG XE MÁY TRÊN GIA LAI MOTOBIKE NGÀY {{date("d/m/Y")}}</h1>
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <h3 class="text-muted mb-0">Cảm ơn vì đã mua hàng trên Gia Lai Motobike, Mr/Mrs. <span style="color: #ad1111;">{{strtoupper(session::get('shipping_info.shipping_name'))}}</span></h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-dark" style="width: 100%; margin-left: auto; margin-right: auto">
                                        <thead>
                                        <tr>
                                            <th scope="col">Mã sản phẩm</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Giá tiền</th>
                                            <th scope="col">Thuế( 10%)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(session::get('cart') as $key => $value)
                                            <tr style="text-align: center;">
                                                <td>{{$value['product_id']}}</td>
                                                <td>{{strtoupper($value['product_name'])}}</td>
                                                <td>{{$value['product_qty']}}</td>
                                                <td>{{number_format($value['product_price'])}}đ</td>
                                                <td>{{number_format($value['product_price']*0.1)}}đ</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Nếu bạn có thắc mắc, vui lòng gửi mail theo địa chỉ: admin@gialaimotobike.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://kit.fontawesome.com/7172a51dfe.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="/public/frontend/js/jquery.min.js"></script>
<script src="/public/frontend/js/popper.js"></script>
<script src="/public/frontend/js/bootstrap.min.js"></script>
<script src="/public/frontend/js/sweetalert.js"></script>
<script src="/public/frontend/js/main.js"></script>
</body>
</html>
