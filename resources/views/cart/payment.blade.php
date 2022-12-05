@extends('layout')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active">Thanh toán</li>
            </ol>
        </div>
        <div class="review-payment">
            <h2>Giá trị cần thanh toán</h2>
            @php
                $tax = 0;
                $total = 0;
                $total_after_tax = 0;
            @endphp
            @if (Session::get('cart') == true)
                @foreach (Session::get('cart') as $key => $cart)
                    @php
                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                        $total += $subtotal;
                        $tax = $total * 0.1;
                        $total_after_tax = $total + $tax;
                    @endphp
                @endforeach
                <div class="total_area">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col"><i class="fa fa-money" style="color: yellow" aria-hidden="true"></i> Tổng tiền</th>
                            <th scope="col"><i class="fa fa-money" style="color: red" aria-hidden="true"></i> Thuế(10%)</th>
                            <th scope="col"><i class="fa fa-money" style="color: green" aria-hidden="true"></i> Tổng tiền sau thuế</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span>{{ number_format($total) }}đ</span></td>
                            <td><span>{{ number_format($tax) }}đ</span></td>
                            <td><span>{{ number_format($total_after_tax) }}đ</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endif
            <h3>Chọn hình thức thanh toán</h3>
                <form method="post" action="{{ URL::to('/save-payment-customer') }}">
                    {{ csrf_field() }}
                    <div class="payment-options">
                        <div class="row payment-form">
                            <div class="col-lg-4 mb-lg-0 mb-3 payment-form_option">
                                <div class="card p-3">
                                    <div class="img-box">
                                        <img src="https://e7.pngegg.com/pngimages/415/124/png-clipart-mastercard-visa-bank-card-payment-mastercard-text-service.png" alt="">
                                    </div>
                                    <div class="number">
                                        <label class="fw-bold" for="">Thanh toán bằng Visa/Mastercard</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <small><span>Hỗ trợ thẻ Visa và Mastercard</span></small>
                                        <input class="chk" name="payment_options"
                                               value="1" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-lg-0 mb-3 payment-form_option">
                                <div class="card p-3">
                                    <div class="img-box">
                                        <img src="https://w7.pngwing.com/pngs/40/100/png-transparent-united-states-dollar-money-united-states-one-hundred-dollar-bill-money-saving-bank-cash.png"
                                             alt="">
                                    </div>
                                    <div class="number">
                                        <label class="fw-bold">Thanh toán tiền mặt( COD)</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <small><span>Trả tiền mặt khi nhận hàng</span></small>
                                        <input class="chk" name="payment_options"
                                               value="2" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-4 mb-lg-0 mb-3 payment-form_option">
                                <div class="card p-3">
                                    <div class="img-box">
                                        <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
                                             alt="">
                                    </div>
                                    <div class="number">
                                        <label class="fw-bold">Thanh toán ví điện tử</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <small><span>Chỉ hỗ trợ thanh toán qua ví Momo</span></small>
                                        <input class="chk" name="payment_options"
                                               value="3" type="submit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-lg-0 mb-3 payment-form_option">
                                <div class="card p-3">
                                    <div class="img-box">
                                        <img src="https://png.pngtree.com/png-clipart/20210418/original/pngtree-vector-gold-free-installment-payment-program-png-image_6242360.jpg"
                                             alt="">
                                    </div>
                                    <div class="number">
                                        <label class="fw-bold">Trả góp từ 0 đồng</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <small><span>Hỗ trợ trả góp sản phẩm từ 0 đồng</span></small>
                                        <input class="chk" name="payment_options"
                                               value="4" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        @if ($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach ($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <input type="submit" value="Thanh toán">--}}
                    </div>
                </form>
        </div>
@endsection
