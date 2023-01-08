@extends('layout')
@section('content')
    <div class="motobike">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="motobike_img">
                        <a class="motobike_img__link"
                           href="{{URL::to('#')}}">
                            <img src="{{asset('public/frontend/images/carousel4.jpg')}}" alt="#"/>
                        </a>
                        <a class="motobike_img__btn"
                           href="{{URL::to('/show-product')}}">Mua Ngay
                        </a>
                    </div>
                    <div class="titlepage">
                        <h2>XE MÁY</h2>
                        <p>
                            Xe máy (còn gọi là mô tô hay xe hai bánh, xe gắn máy, phiên âm từ tiếng Pháp: Motocyclette)
                            là loại xe có hai bánh theo chiều trước-sau và chuyển động nhờ động cơ gắn trên nó.
                            Xe ổn định khi chuyển động nhờ lực hồi chuyển con quay khi chạy
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="motobike_img">
                        <a class="motobike_img__link" href="#">
                            <img src="{{asset('/public/frontend/images/phukien.png')}}" alt="#"/>
                        </a>
                        <a class="motobike_img__btn"
                           href="{{URL::to('/show-product#scrollToShowProduct')}}">Mua Ngay
                        </a>
                    </div>
                    <div class="titlepage">
                        <h2>PHỤ KIỆN</h2>
                        <p>
                            Sở hữu ngay những món phụ kiện cho. ...
                            Vỏ Bọc Da Yên Xe Máy Chữ Thuê Thái Cho Dream, Wave,
                            Future, Cub, Sirius, Exciter, Winner, Winner X, Raider, Satria, ...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="new-product">
        <div class="container">
            <div>
                <ol class="breadcrumb">
                    <li><span>SẢN PHẨM MỚI</span></li>
                </ol>
            </div>
            <div class="row">
                @foreach($danhsachsanpham as $key => $product)
                    <div class="col-md-3 text-center col-sm-6 col-xs-6">
                        <form class="product-form">
                            @csrf
                            {{--                                xu ly ajax - backend--}}
                            <input type="hidden" value="{{ $product->product_id }}"
                                   class="cart_product_id_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_name }}"
                                   class="cart_product_name_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_image }}"
                                   class="cart_product_image_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_price }}"
                                   class="cart_product_price_{{ $product->product_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                            {{--                                hien thi giao dien - frontend --}}
                            <a href=" {{ URL::to('/chi-tiet-san-pham/' . $product->product_id) }}">
                                <div class="product-images">
                                    <div class="product-image">
                                        <img src="{{ URL::to('public/upload/product/' . $product->product_image) }}"
                                             alt="anh san pham"/>
                                    </div>
                                </div>
                                <p class="product-name">{{ $product->product_name }}</p>
                                <h3>
                                    <strong>
                                        {{number_format($product->product_price) }}đ
                                    </strong>
                                </h3>
                            </a>
                            <button type="button" class="btn btn-default add-to-cart"
                                    data-id_product="{{ $product->product_id }}" name="add-to-cart">Thêm vào
                                giỏ
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            {{ $danhsachsanpham->links() }}
        </div>
    </div>
@endsection
