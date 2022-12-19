@extends('layout')
@section('content')
    <div class="motobike">
        <div class="container">
            <div>
                <ol class="breadcrumb">
                    <li>CHI TIẾT SẢN PHẨM</li>
                </ol>
            </div>
            <div class="row" style="margin-bottom: 4em;">
                @foreach ($products as $key => $product)
                    <div class="col-md-6 view-product">
                         <img src="{{ URL::to('public/upload/product/' . $product->product_image) }}" alt="" />
                    </div>
                    <div class="col-md-6 product-information">
                        <h2> {{ $product->product_name }}</h2>
                        <p>Mã sản phẩm: {{ $product->product_id }}</p>
                        <form method="post" action="{{ URL::to('/save-cart') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $product->product_id }}"
                                   class="cart_product_id_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_name }}"
                                   class="cart_product_name_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_image }}"
                                   class="cart_product_image_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_price }}"
                                   class="cart_product_price_{{ $product->product_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                            <span>
                                <h3>
                                    <strong>
                                        <i class="fas fa-dollar-sign"></i>{{number_format($product->product_price) }}
                                    </strong>
                                </h3>
                                <br />
                                {{-- <label>Số lượng:</label>
                                <input name="qty" type="number" min="1" max="99" value="1" /> --}}
                                <input name="productid_hidden" type="hidden" value="{{ $product->product_id }}" />
                            </span>

                            <p><b>Trạng thái:</b> Còn hàng</p>
                            <p><b>Tình trạng sản phẩm:</b> New</p>
                            <button type="button" class="btn btn-default add-to-cart"
                                    data-id_product="{{ $product->product_id }}"
                                    name="add-to-cart">Thêm vào giỏ
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="col-sm-12" id="reviews">
                <form>
                    @csrf
                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->product_id}}" />

                    <div id="comment_show"></div>
                </form>
                <p><b>Viết bình luận</b></p>
                <form action="{{URL::to('/send-comment')}}" method="post">
                    @csrf
                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->product_id}}" />
                    @if(!session::get('customer_id'))
                        <span>
                            <input type="text" name="comment_name" class="comment_name" placeholder="Họ tên" required>
                        </span>
                        <textarea name="comment_content" class="comment_content" placeholder="Viết bình luận tại đây" required></textarea>
                    @else
                        <span>
                                <input type="text" name="comment_name" class="comment_name"
                                       value="{{session::get('customer_name')}}" disabled>
{{--                            cach 2: dung foreach lap qua, ma thay cach nay nhanh nen xai luon--}}
                        </span>
                        <textarea name="comment_content" class="comment_content" placeholder="Viết bình luận tại đây" required></textarea>
                    @endif
                    <button type="submit" id="send-comment" class="btn btn-default pull-right">Bình luận</button>
                    <div id="notify_submit"></div>
{{--                    <script>--}}
{{--                        const success = document.querySelector('#send-comment');--}}
{{--                        success.onclick = function(){--}}
{{--                        alert('thêm bình luận thành công!');--}}
{{--                        }--}}
{{--                    </script>--}}
                </form>
            </div>
            <div class="recommended_items">
                <!--recommended_items-->
                <h2 class="title text-center">Sản phẩm gợi ý</h2>
                <div class="row">
                    @foreach($list_products as $key => $product)
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
                                            <i class="fas fa-dollar-sign"></i>{{number_format($product->product_price) }}
                                        </strong>
                                    </h3>
                                </a>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
