 @extends('admin_layout')
 @section('content')
     <div class="table-agile-info">
         <div class="panel panel-default">
             <div class="panel-heading">
                 Liệt kê danh mục sản phẩm
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
                             <th>Tên danh mục</th>
                             <th>Hiển thị</th>
                             <th style="width:30px;"></th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($list_category_products as $key => $cate_pro)
                             <tr>
                                 <td><label class="i-checks m-b-none"></label>
                                 </td>
                                 <td>{{ $cate_pro->category_name }}</td>
                                 <td><span class="text-ellipsis">
                                         <?php
                                         if ($cate_pro->category_status == 1) {
                                             ?>
                                         <a href="{{ URL::to('/active-category-products/' . $cate_pro->category_id) }}"><span
                                                 class="fas fa-check"></span></a>
                                         <?php
                                         } else {
                                             ?>
                                         <a href="{{ URL::to('/unactive-category-products/' . $cate_pro->category_id) }}"><span
                                                 style="color:red; " class="fa fa-close"></span></a>
                                         <?php }
                                         ?>
                                     </span></td>
                                 <td>
                                     <a href="" class="active" ui-toggle-class="">
                                         <a href="{{ URL::to('/edit-category-products/' . $cate_pro->category_id) }}"
                                             class="fa fa-pencil-square text-success text-active"></a>
                                         <a href="{{ URL::to('/delete-category-products/' . $cate_pro->category_id) }}"
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
