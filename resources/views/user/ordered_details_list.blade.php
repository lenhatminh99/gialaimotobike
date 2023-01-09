@extends('layout')
@section('content')
    <div class="container">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div>
                    <ol class="breadcrumb">
                        <li><span>CHI TIẾT ĐƠN ĐẶT HÀNG</span></li>
                    </ol>
                </div>
                <div class="table-responsive">
                    <table class="table b-t b-dark">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width:20px;">
                                <label class="m-b-none">

                                </label>
                            </th>
                            <th>Mã đơn hàng</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền( Chưa bao gồm thuế)</th>
                            <th>Thành tiền</th>
                            <th>Số lượng</th>
                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order_details_by_customer as $key => $details)
                            <tr>
                                <td><label class="i-checks m-b-none"></label>
                                </td>
                                <td>{{ $details->order_id }}</td>
                                <td>{{ $details->product_id }}</td>
                                <td>{{ $details->product_name }}</td>
                                <td>{{ number_format($details->product_price) }}đ</td>
                                <td>{{ number_format(($details->product_price+$details->product_price*0.1)*$details->product_sales_quantity) }}đ</td>
                                <td>{{ $details->product_sales_quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
