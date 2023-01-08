 @extends('admin_layout')
 @section('content')
     <div class="row">
         <div class="col-lg-12">
             <section class="panel">
                 <header class="panel-heading">
                     Thêm danh mục sản phẩm
                 </header>
                 <div class="panel-body">
                     @if (session('message'))
                         <div class="alert alert-success">
                             {{ session('message') }}
                         </div>
                     @endif
                     <div class="position-center">
                         <form role="form" action="{{ URL::to('/save-category-products') }}" method="post">
                             {{ csrf_field() }}
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Tên danh mục</label>
                                 <input type="text" name="category_products_name" class="form-control"
                                     id="exampleInputEmail1" placeholder="Tên danh mục" required>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Mô tả danh mục</label>
                                 <textarea style="resize : none" rows="5" type="text" name="category_products_desc" class="form-control"
                                     id="exampleInputPassword1" placeholder="Mô tả danh mục" required></textarea>
                             </div>
                             <div class="form-group">
                                 <select name="category_products_status" class="form-control input-sm m-bot15">
                                     <option value="1">Hiện danh mục</option>
                                     <option value="0">Ẩn danh mục</option>
                                 </select>

                             </div>
                             <button type="submit" name="add_category_products" class="btn btn-info">Thêm danh
                                 mục</button>
                         </form>
                     </div>

                 </div>
             </section>

         </div>
     </div>
 @endsection
