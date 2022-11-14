@extends('layout')
@section('content')
    <div class="container">
        <section id="cart_items">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="active">Giỏ hàng</li>
                    </ol>
                </div>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="table-responsive cart_info">
                    <form action="{{ URL::to('/update-cart') }}" method="post">
                        {{ csrf_field() }}
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Hình ảnh</td>
                                    <td class="description">Tên sản phẩm</td>
                                    <td class="price">Giá</td>
                                    <td class="quantity">Số lượng</td>
                                    <td class="total">Thành tiền</td>
                                    <td></td>
                                </tr>
                            </thead>
                            @php
                                $tax = 0;
                                $total = 0;
                                $total_after_tax = 0;
                            @endphp
                            @if (Session::get('cart') == true)
                                <tbody>
                                    @foreach (Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price'] * $cart['product_qty'];
                                            $total += $subtotal;
                                            $tax = $total * 0.1;
                                            $total_after_tax = $total + $tax;
                                        @endphp
                                        <tr>
                                            <td class="cart_product">
                                                <img src="{{ asset('/public/upload/product/' . $cart['product_image']) }}"
                                                    width="90" alt="{{ $cart['product_name'] }}" />
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href=""></a></h4>
                                                <p>{{ $cart['product_name'] }}</p>
                                            </td>
                                            <td class="cart_price">
                                                <p>{{ number_format($cart['product_price']) }}đ</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <input style="width: 60px;" class="cart_quantity" type="number"
                                                        min="1" max="10" name="cart_qty[{{ $cart['session_id'] }}]"
                                                        value="{{ $cart['product_qty'] }}">
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">{{ number_format($subtotal) }}đ</p>
                                            </td>
                                            <td class="cart_delete">
                                                <a class="cart_quantity_delete"
                                                    href="{{ URL::to('/delete-product-cart/' . $cart['session_id']) }}"><i
                                                        class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr class="handleTwoBtn">
                                        <td>
                                            <input type="submit" value="Cập nhật giỏ hàng" name="update_qty">
                                        </td>
                                        <td>
                                            <a class="btn btn-default"
                                            href="{{ URL::to('/delete-all-product') }}">Xóa tất cả</a>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            @php
                                                echo 'Giỏ hàng rỗng, hãy đi mua ngay cho mình vài chiếc xe nào!';
                                            @endphp
                                        </td>
                                    </tr>
                            @endif
                            </tbody>
                        </table>
                    </form>
                </div>
        </section>
        <!--/#cart_items-->
        <section id="do_action">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="total_area">
                            <ul>
                                <li>Tổng tiền <span>{{ number_format($total) }}đ</span></li>
                                <li>Thuế(10%) <span>{{ number_format($tax) }}đ</span></li>
                                <li>Tổng tiền sau thuế <span>{{ number_format($total_after_tax) }}đ</span></li>
                            </ul>
                            {{-- <a class="btn btn-default update" href="">Cập nhật giỏ hàng</a> --}}
                            @if (Session::get('customer_id') == true && Session::get('shipping_id') == true)
                                <a class="btn btn-default check_out" href="{{ URL::to('/payment') }}">Đặt hàng</a>
                            @elseif (Session::get('customer_id') == true && Session::get('cart') == true)
                                <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Đặt hàng</a>
                            @elseif (Session::get('customer_id') == true && Session::get('cart') == false)
                                <a class="btn btn-default check_out" href="{{ URL::to('/') }}">Đặt hàng</a>
                            @else
                                <a class="btn btn-default check_out" href="{{ URL::to('/login') }}">Đặt hàng</a>
                            @endif
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!--/#do_action-->
@endsection
