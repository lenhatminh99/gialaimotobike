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
    {{--    <link rel="stylesheet" href="{{asset('/public/frontend/css/main.css')}}">--}}
    <style>
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
            <h1>Don hang</h1>
            <div class="col-lg-10 col-xl-8">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header px-4 py-5">
                        <h3 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;">{{session::get('customer_name')}}</span>!</h3>
                        <h3 class="text-muted mb-0">Your email address: <span style="color: #a8729a;">{{session::get('customer_email')}}</span></h3>
                        <h3 class="text-muted mb-0">Your phone number: <span style="color: #a8729a;">{{session::get('customer_phone')}}</span></h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="card shadow-0 border mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <table class="table table-dark" style="width: 100%; margin-left: auto; margin-right: auto">
                                        <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Order Status</th>
                                            <th scope="col">Payment Method</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data2 as $key => $value)
                                        <tr style="text-align: center;">
                                            <td>{{$value->order_id}}</td>
                                            <td>{{number_format($value->order_total)}} VND</td>
                                            @if($value->order_status === 'Đang chờ xử lý')
                                                <td>Your order are in queue to process</td>
                                            @elseif($value->order_status === 'Đã duyệt đơn hàng')
                                                <td>Your order has been accepted</td>
                                            @else
                                                <td>Your order has been declined</td>
                                            @endif
                                                @if($value->payment_method == 1)
                                                    <td>Pay using Visa/Mastercard</td>
                                                @elseif($value->payment_method == 2)
                                                    <td>Pay using cash</td>
                                                @elseif($value->payment_method == 3)
                                                    <td>Pay using Momo</td>
                                                @else
                                                    <td>Pay using installment</td>
                                                @endif
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                </div>
            </div>
                    <p>Send us an email if you have any questions: admin@gialaimotobike.com</p>
        </div>
    </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <p style="display: block; float: right; clear: left;">Product Manage</p>
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
