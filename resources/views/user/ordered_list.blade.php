@extends('layout')
@section('content')
    <div class="container">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div>
                    <ol class="breadcrumb">
                        <li><span>LỊCH SỬ MUA HÀNG</span></li>
                    </ol>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width:20px;">
                                <label class="m-b-none">

                                </label>
                            </th>
                            <th>Mã đơn hàng</th>
                            <th>Username</th>
                            <th>Chi tiết đơn hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order_by_customer as $key => $customer)
                            <tr>
                                <td><label class="i-checks m-b-none"></label>
                                </td>
                                <td>{{ $customer->order_id }}</td>
                                <td>{{ $customer->customer_name }}</td>
                                <td>
                                    <a href="{{URL::to('/chi-tiet-don-hang/' . $customer->order_id)}}">
                                        Nhấn vào đây
                                    </a>
                                </td>
                                <td>{{ number_format($customer->order_total) }}đ</td>
                                <td>{{ $customer->order_status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex; justify-content: center;">
                {{ $order_by_customer->links() }}
            </div>
        </div>
    </div>
@endsection
