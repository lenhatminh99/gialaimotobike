<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Comment;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();


class ProductsController extends Controller
{
    public function Authlogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //----------------------------------PRODUCTS-----------------------------------

    // return trang Add products
    public function add_Products(){
        $this->Authlogin();
        $cate_products = DB::table('tbl_category_products')->orderby('category_id','desc')->get();

        return view('admin.add_products')->with('cate_products', $cate_products);
    }


    //click submit them san pham
    public function save_Products(Request $request){
        $this->Authlogin();
        $data = new Product;
        // $data = array();
        $data['product_name'] = $request -> product_name;
        $data['category_id'] = $request -> cate_products;
        $data['product_desc'] = $request -> product_desc;
        $data['product_price'] = $request -> product_price;
        $data['product_status'] = $request -> product_status;
        $get_image = $request->file('product_image');
        $validated = $request->validate([
            'product_name' => 'required',
            'product_desc' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|mimes:jpeg,png,jpg,gif',
        ]);
        if(!$validated){
            return Redirect::to('/add-products')->withErrors($validated);
        }else{
        if($get_image){
            $new_image = rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;

            $product_view = $data->save();
            return Redirect::to('add-products')->with('message', 'Thêm sản phẩm thành công!');
        }
            // $data['product_image'] = '';
            // $data->save();
            // return Redirect::to('add-products')->with('message', 'Thêm sản phẩm thành công!');
        }
    }

    //list products
    public function list_Products(){
        $this->Authlogin();
        $list_products = DB::table('tbl_products')
        ->join('tbl_category_products','tbl_category_products.category_id','=','tbl_products.category_id')->get();
        $manager_products = view('admin.list_products')->with('list_products', $list_products);
        return view('admin_layout')->with('admin.list_products', $manager_products);
    }

    //edit products
     public function edit_Products($product_id){
         $this->Authlogin();
        $cate_products = DB::table('tbl_category_products')->get();
        $edit_products = DB::table('tbl_products')->where('product_id', $product_id)->get();
        $manager_products = view('admin.edit_products')->with('edit_products', $edit_products)->with('cate_products', $cate_products);
        return view('admin_layout')->with('admin.edit_products',$manager_products);
    }

    public function update_Products(Request $request,$product_id){
        $this->Authlogin();
        $data = array();
        $data['product_name'] = $request -> product_name;
        $data['category_id'] = $request -> cate_products;
        $data['product_desc'] = $request -> product_desc;
        $data['product_price'] = $request -> product_price;
        $data['product_status'] = $request -> product_status;

        $get_image =$request->file('product_image');
        if($get_image){
            $new_image = rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_products')->where('product_id',$product_id)->update($data);
            return Redirect::to('list-products')->with('message', 'Sửa sản phẩm thành công!');
        }
        DB::table('tbl_products')->where('product_id',$product_id)->update($data);
        return Redirect::to('list-products')->with('message', 'Sửa sản phẩm thành công');
    }
    public function delete_Products($product_id){
        $this->Authlogin();
        DB::table('tbl_products')->where('product_id',$product_id)->delete();
        return Redirect::to('list-products')->with('message','Xóa sản phẩm thành công!');
    }

    public function active_Products($products_id){
        $this->Authlogin();
        DB::table('tbl_products')->where('product_id', $products_id)->update(['product_status' => 0]);
        return Redirect('/list-products')->with('message','Cập nhật thành công!');
    }
    public function unactive_Products($products_id){
        $this->Authlogin();
        DB::table('tbl_products')->where('product_id', $products_id)->update(['product_status' => 1]);
        return Redirect('/list-products')->with('message','Cập nhật thành công!');
    }
    //-------------------------------SHOW PRODUCT WHEN CLICK ON MUA NGAY-------------------------------
    public function showProduct(){ //trang web luc vua truy cap vao
        // $ds_sanpham = Product::all();
        $ds_sanpham = Product::where('product_status','1')
            ->orderby('product_id','desc')
            ->paginate(15);
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('product.product')->with('category', $cate_products)->with('danhsachsanpham',$ds_sanpham);
    }
    public function showProductWhenClickBuy(){ //sau khi thuc hien action click btn mua ngay
        // $ds_sanpham = Product::all();
        $ds_sanpham = Product::where('product_status','1')
            ->orderby('product_id','desc')
            ->paginate(15);
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('product.product_buy_action')->with('category', $cate_products)->with('danhsachsanpham',$ds_sanpham);
    }
    //-------------------------------SHOW PRODUCT BY CATEGORY WHEN CLICK ON CATEGORY-------------------------------
    public function show_Product_ByCategory($category_id){ //sau khi thuc hien nhan vao danh muc sp
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        $products = DB::table('tbl_category_products')
        ->join('tbl_products','tbl_products.category_id','=','tbl_category_products.category_id')
        ->where('tbl_category_products.category_id',$category_id)->get();
        return view('product.product_by_category')->with('products', $products)->with('category', $cate_products);
    }
    public function product_Details($product_id){
        $list_products = DB::table('tbl_products')->where('product_status','1')->orderby(DB::raw('RAND()'))->limit(4)->get();
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        $products = DB::table('tbl_products')
        ->join('tbl_category_products','tbl_category_products.category_id','=','tbl_products.category_id')
        ->where('tbl_products.product_id',$product_id)->get();
        session::get('customer_id');
        //ko biet vi sao 4 file product ko get dc session, nen them session zo ham cai no moi chay duoc.
        return view('product.product_details')->with('products', $products)->with('category', $cate_products)
        ->with('list_products',$list_products);
    }
    public function send_Comment(Request $request){
        $product_id = $request->comment_product_id;
        if(!session::get('customer_id')){
            $comment_name = $request->comment_name;
        }else{
            $comment_name = session::get('customer_name');
        }
        $comment_content = $request->comment_content;

        $comment = new Comment;
        $comment['comment'] = $comment_content;
        $comment['comment_name'] = $comment_name;
        $comment['comment_product_id'] = $product_id;
        $comment['comment_date'] = date('Y-m-d H:i:s');
        $comment->save();
        return Redirect::to('/chi-tiet-san-pham/'.$product_id);
    }
    public function load_Comment(Request $request){
        $product_id = $request->product_id;
        $comments = Comment::where('comment_product_id',$product_id)->get();
        $output = '';
        foreach ($comments as $key => $comment){
            $output .= '
                <div class="col-sm-12 product_comment">
                <ul>
                	<li><p><i class="fas fa-user"></i> ' .$comment->comment_name. '</p></li>
                	<li><p><i class="fa fa-clock-o"></i>'.$comment->comment_date. '</p></li>
                </ul>
                <p class="content">' .$comment->comment. '</p>
                </div>
                ';
        };
        echo $output;
    }
}
