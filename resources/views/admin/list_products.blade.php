 @extends('admin_layout')
 @section('content')
     <div class="table-agile-info">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Liệt kê sản phẩm
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
                             <th>ID</th>
                             <th>Tên sản phẩm</th>
                             <th>Giá</th>
                             <th>Hình ảnh</th>
                             <th>Danh mục</th>
                             <th>Hiển thị</th>
                             <th style="width:30px;"></th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($list_products as $key => $pro)
                             <tr>
                                 <td><label class="i-checks m-b-none"></label>
                                 </td>
                                 <td>{{ $pro->product_id }}</td>
                                 <td>{{ $pro->product_name }}</td>
                                 <td>{{ $pro->product_price }}</td>
                                 <td><img src="public/upload/product/{{ $pro->product_image }}" height="100px"
                                         width="150px" /></td>
                                 <td>{{ $pro->category_name }}</td>
                                 <td><span class="text-ellipsis">
                                         <?php
                                         if ($pro->product_status == 1) {
                                             ?>
                                         <a href="{{ URL::to('/active-products/' . $pro->product_id) }}"><span
                                                 class="fas fa-check"></span></a>
                                         <?php
                                         } else {
                                             ?>
                                         <a href="{{ URL::to('/unactive-products/' . $pro->product_id) }}"><span
                                                 style="color:red; " class="fa fa-close"></span></a>
                                         <?php }
                                         ?>
                                     </span></td>
                                 <td>
                                     <a href="" class="active" ui-toggle-class="">
                                         <a href="{{ URL::to('/edit-products/' . $pro->product_id) }}"
                                             class="fa fa-pencil-square text-success text-active"></a>
                                         <a href="{{ URL::to('/delete-products/' . $pro->product_id) }}"
                                             class="fa fa-times text-danger text"></a></a>
                                 </td>
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
