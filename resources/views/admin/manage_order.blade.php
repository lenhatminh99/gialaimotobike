 @extends('admin_layout')
 @section('content')
     <div class="table-agile-info">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Liệt kê đơn hàng
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
                             <th>Tình trạng</th>
                             <th>Duyệt/Từ chối</th>
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
                                         <a href="{{ URL::to('/details-order/' . $order->order_id) }}" class="">Nhấn
                                             vào đây</a></a>
                                 </td>
                                 <td>{{ number_format($order->order_total) }}đ</td>
                                 <td>{{ $order->order_status }}</td>
                                 <td>
                                     <a style="margin-left: 15px;" href="" class="active" ui-toggle-class="">
                                         <a style="color:green;" href="{{ URL::to('/accept-order/' . $order->order_id) }}"
                                             class="fa fa-check"></a></a>
                                     <a style="margin-left: 25px; href="" class="" ui-toggle-class="">
                                         <a style="color:red;" href="{{ URL::to('/deny-order/' . $order->order_id) }}"
                                             class="fa fa-ban"></a></a>
                                 </td>
                             </tr>
                         @endforeach
                         {{-- <?php
                         $numItems = count($all_order);
                         $i = 0;
                         foreach ($all_order as $key => $order) {
                             if (++$i === $numItems) {
                                 echo $order->order_id;
                             }
                         }
                         ?> --}}
                     </tbody>
                 </table>
             </div>
         </div>
         <div style="display: flex; justify-content: center;">
             {{ $all_order->links() }}
         </div>
     </div>
 @endsection
