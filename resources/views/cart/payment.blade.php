@extends('layout')
@section('content')
    <section id="do_action">
        <div class="container2">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
            </div>
            <div class="review-payment">
                <h2 style="margin-top: -60px;">Giá trị cần thanh toán</h2>
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
                        <ul>
                            <li>Tổng tiền <span>{{ number_format($total) }}đ</span></li>
                            <li>Thuế(10%) <span>{{ number_format($tax) }}đ</span></li>
                            <li>Tổng tiền sau thuế <span>{{ number_format($total_after_tax) }}đ</span></li>
                        </ul>
                    </div>
                @endif
                <h2 style="margin: -50px 0px 70px 0px;">Chọn hình thức thanh toán</h4>
                    <form method="post" action="{{ URL::to('/save-payment-customer') }}">
                        {{ csrf_field() }}
                        <div class="payment-options">
                            <span>
                                <label><input class="chk" name="payment_options" value="1" type="checkbox" checked>
                                    Thanh toán bằng
                                    thẻ</label>
                            </span>
                            <span>
                                <label><input class="chk" name="payment_options" value="2" type="checkbox"> Thanh
                                    toán
                                    tiền
                                    mặt</label>
                            </span>
                            <span>
                                <label><input class="chk" name="payment_options" value="3" type="checkbox"> Thanh
                                    toán
                                    bằng thẻ
                                    ghi
                                    nợ</label>
                            </span>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <input type="submit" value="Thanh toán" name="send_order_place" class="check_out">
                        </div>
                    </form>
            </div>
    </section>
@endsection
