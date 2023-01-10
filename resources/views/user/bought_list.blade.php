<!doctype html>
<html lang="en">
<head>
    <title>Gia Lai Motobike</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
        .gradient-custom {
            /* fallback for old browsers */
            background: #b686da;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to top left, rgba(205, 156, 242, 1), rgba(246, 243, 255, 1))
        }
    </style>
</head>
<body>
<section class="h-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <p style="font-family: 'Roboto', sans-serif; text-align: center; font-size: 36px;">Danh sách đơn hàng</p>
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <p class="text-muted mb-0">Khách hàng <span style="color: #a8729a;">{{session::get('customer_name')}}</span>!</p>
                        <p class="text-muted mb-0">Email của bạn: <span style="color: #a8729a;">{{session::get('customer_email')}}</span></p>
                        <p class="text-muted mb-0">Số điện thoại: <span style="color: #a8729a;">{{session::get('customer_phone')}}</span></p>
                    </div>
                    <div class="card-body p-4">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <table style="width: 100%; margin-left: auto; margin-right: auto">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Total</th>
                                            <th>Order status</th>
                                            <th>Payment method</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data2 as $key => $value)
                                        <tr style="text-align: center;">
                                            <td>{{$value->order_id}}</td>
                                            <td>{{number_format($value->order_total)}} VND</td>
                                            @if($value->order_status === 'Đang chờ xử lý')
                                                <td>Đang chờ xử lý</td>
                                            @elseif($value->order_status === 'Đã duyệt đơn hàng')
                                                <td>Đã duyệt đơn hàng</td>
                                            @else
                                                <td>Từ chối đơn hàng</td>
                                            @endif
                                                @if($value->payment_method == 1)
                                                    <td>Thanh toán bằng Visa/Mastercard</td>
                                                @elseif($value->payment_method == 2)
                                                    <td>Thanh toán tiền mặt</td>
                                                @elseif($value->payment_method == 3)
                                                    <td>Thanh toán Mono</td>
                                                @else
                                                    <td>Thanh toán trả góp</td>
                                                @endif
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
                    <p>Thắc mắc vui lòng liên hệ hot-line: 0909.47.28.46 hoặc email: admin@gialaimotobike.com</p>
        </div>
    </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <p style="display: block; float: right; clear: left;">Admin</p>
        <br /><br />
        <img style="display: block; float: right; clear: left;" src="{{asset('public/frontend/images/hand-sign.png')}}" alt="" width="15%">
        <br />
        <p style="display: block; float: right; clear: left;">Le Nhat Minh</p>

    </div>
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
