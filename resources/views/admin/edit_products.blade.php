 @extends('admin_layout')
 @section('content')
     <div class="row">
         <div class="col-lg-12">
             <section class="panel">
                 <header class="panel-heading">
                     Sửa sản phẩm
                 </header>
                 <div class="panel-body">
                     @foreach ($edit_products as $key => $edit_value)
                         @if (session('message'))
                             <div class="alert alert-success">
                                 {{ session('message') }}
                             </div>
                         @endif
                         <div class="position-center">
                             <form role="form" action="{{ URL::to('/update-products/' . $edit_value->product_id) }}"
                                 method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Tên sản phẩm</label>
                                     <input type="text" value="{{ $edit_value->product_name }}" name="product_name"
                                         class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Giá sản phẩm</label>
                                     <input type="text" value="{{ $edit_value->product_price }}" name="product_price"
                                         class="form-control" id="exampleInputEmail1">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                     <input type="file" name="product_image" class="form-control" id="img">
                                     <img src="{{ URL::to('public/upload/product/' . $edit_value->product_image) }}"
                                         height="100px" width="150px" />
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Thông tin sản phẩm</label>
                                     <textarea style="resize : none" rows="5" type="text" name="product_desc" class="form-control"
                                         id="exampleInputPassword1"
                                         placeholder="Mô tả sản phẩm">{{ $edit_value->product_desc }}</textarea>
                                 </div>
                                 <div class="form-group">
                                     <label>Danh mục sản phẩm</label>
                                     <select name="cate_products" class="form-control input-sm m-bot15">
                                         @foreach ($cate_products as $key => $cate)
                                             <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                                             </option>
                                         @endforeach
                                     </select>

                                 </div>
                                 <div class="form-group">
                                     <select name="product_status" class="form-control input-sm m-bot15">
                                         <option value="1">Hiện sản phẩm</option>
                                         <option value="0">Ẩn sản phẩm</option>
                                     </select>

                                 </div>
                                 <button type="submit" name="add_Products" class="btn btn-info">Cập nhật sản
                                     phẩm</button>
                             </form>
                         </div>
                     @endforeach
                 </div>
             </section>

         </div>
     </div>
 @endsection
