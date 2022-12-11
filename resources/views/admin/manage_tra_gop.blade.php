@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liệt kê đơn hàng trả góp
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="m-b-none">

                            </label>
                        </th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Chi tiết đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_order as $key => $order)
                        <tr>
                            <td><label class="i-checks m-b-none"></label>
                            </td>
                            <td>{{ $order->order_id }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>
                                <a href="" class="active" ui-toggle-class="">
                                    <a href="{{ URL::to('/details-tra-gop/' . $order->order_id) }}" class="">Nhấn
                                        vào đây</a></a>
                            </td>
                            <td>{{ number_format($order->order_total) }}đ</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">

            </footer>
        </div>
    </div>
@endsection
