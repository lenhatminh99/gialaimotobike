@extends('layout')
@section('content')
    <div class="container">
        <section id="cart_items">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li class="active">ĐẶT HÀNG</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-sm-6 clearfix">
                    <div class="bill-to">
                        <p>Thông tin người nhận</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-one">
                            <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="shipping_email" placeholder="Email">
                                <input type="text" name="shipping_name" placeholder="Họ và tên">
                                <input type="text" name="shipping_address" placeholder="Địa chỉ">
                                <input type="text" name="shipping_phone" placeholder="Số điện thoại">
                                <textarea name="shipping_notes" placeholder="Ghi chú đơn hàng"></textarea>
                                <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
