@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div>
                <a href="#" class="list-group-item active">Danh mục
                </a>
                @foreach($category as $key => $cate)
                <ul class="list-group">
                    <li class="list-group-item">
                       {{$cate ->category_name}}
                    </li>
                </ul>
                @endforeach
            </div>
            <!-- /.div -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Electronics</li>
                </ol>
            </div>
            <!-- /.div -->
            <div class="row">
                <div class="btn-group alg-right-pad">
                    <button type="button" class="btn btn-default"><strong>1235  </strong>items</button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            Sort Products &nbsp;
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">By Price Low</a></li>
                            <li class="divider"></li>
                            <li><a href="#">By Price High</a></li>
                            <li class="divider"></li>
                            <li><a href="#">By Popularity</a></li>
                            <li class="divider"></li>
                            <li><a href="#">By Reviews</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-4 text-center col-sm-6 col-xs-6">
                    <div class="thumbnail product-box">
                        <img src="public/frontend/images/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p>Price : <strong>$ 3,45,900</strong>  </p>
                            <p><a href="#">Ptional dismiss button </a></p>
                            <p>Ptional dismiss button in tional dismiss button in   </p>
                            <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4 text-center col-sm-6 col-xs-6">
                    <div class="thumbnail product-box">
                        <img src="public/frontend/images/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p>Price : <strong>$ 3,45,900</strong>  </p>
                            <p><a href="#">Ptional dismiss button </a></p>
                            <p>Ptional dismiss button in tional dismiss button in   </p>
                            <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4 text-center col-sm-6 col-xs-6">
                    <div class="thumbnail product-box">
                        <img src="public/frontend/images/dummyimg.png" alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p>Price : <strong>$ 3,45,900</strong>  </p>
                            <p><a href="#">Ptional dismiss button </a></p>
                            <p>Ptional dismiss button in tional dismiss button in   </p>
                            <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
    </div>
    <!-- /.row -->
</div>

@endsection
