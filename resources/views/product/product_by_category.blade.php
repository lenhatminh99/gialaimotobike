@extends('layout')
@section('content')
    <div class="container">
        <div class="row" id="scrollToShowProduct">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Danh mục
                    </a>
                    @foreach($category as $key => $cate)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{URL::to('/product-by-category/'. $cate->category_id)}}">{{$cate ->category_name}}</a>
                            </li>
                        </ul>
                    @endforeach
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="/">Trang chủ</a></li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default">Có tổng cộng n xe máy trên hệ thống</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Lọc sản phẩm
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Thấp đến cao</a></li>
                                <li><a href="#">Cao đến thấp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    @foreach($products as $key => $product)
                        <div class="col-md-4 text-center col-sm-6 col-xs-6">
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
                                        <img class="product-image"
                                             src="{{ URL::to('public/upload/product/' . $product->product_image) }}"
                                             alt="anh san pham"/>
                                    </div>
                                    <p class="product-name">{{ $product->product_name }}</p>
                                    <h3>
                                        <strong>
                                            <i class="fas fa-dollar-sign"></i>{{number_format($product->product_price) }}
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
            </div>
            <!-- /.row -->
        </div>

@endsection
