@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Quản lý khách hàng
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="m-b-none">

                            </label>
                        </th>
                        <th>Mã khách hàng</th>
                        <th>Username</th>
                        <th>Địa chỉ email</th>
                        <th>Số điện thoại</th>
                        <th>Danh sách đơn hàng</th>
                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($all_customer as $key => $customer)
                        <tr>
                            <td><label class="i-checks m-b-none"></label>
                            </td>
                            <td>{{ $customer->customer_id }}</td>
                            <td>{{ $customer->customer_name }}</td>
                            <td>{{ $customer->customer_email }}</td>
                            <td>{{ $customer->customer_phone }}</td>
                            <td>
                                <a href="{{ URL::to('/order-by-customer/' . $customer->customer_id) }}" class="">Nhấn vào đây</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div style="display: flex; justify-content: center;">
            {{ $all_customer->links() }}
        </div>
    </div>
@endsection
