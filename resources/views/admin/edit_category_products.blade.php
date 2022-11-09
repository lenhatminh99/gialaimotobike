@extends('admin_layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sản phẩm
                </header>
                <div class="panel-body">
                    @foreach ($edit_category_products as $key => $edit_value)
                        <div class="position-center">
                            <form role="form"
                                action="{{ URL::to('/update-category-products/' . $edit_value->category_id) }}"
                                method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{ $edit_value->category_name }}"
                                        name="category_products_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize : none" rows="5" type="text" name="category_products_desc" class="form-control"
                                        id="exampleInputPassword1">{{ $edit_value->category_desc }}</textarea>
                                </div>

                                <button type="submit" name="edit_category_products" class="btn btn-info">Sửa danh
                                    mục</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
@endsection
