@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Đơn hàng của khách hàng
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="m-b-none">

                            </label>
                        </th>
                        <th>Mã đơn hàng</th>
                        <th>Username</th>
                        <th>Địa chỉ người nhận</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th style="width:30px;"></th>
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
                                <a href="{{URL::to('/dia-chi-nguoi-nhan/' . $customer->shipping_id)}}">
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
@endsection
