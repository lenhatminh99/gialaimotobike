<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Models\Product;
use Illuminate\Database\Query\Builder;
class HomeController extends Controller
{

    public function index(){
        // $ds_sanpham = Product::all();
        $ds_sanpham = Product::where('product_status','1')
            ->orderby('product_id','desc')
            ->paginate(6);
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('pages.home')->with('category', $cate_products)->with('danhsachsanpham',$ds_sanpham);
    }
    // public function index(){
    //     $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
    //     $list_products = DB::table('tbl_products')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();
    //     return view('pages.home')->with('category', $cate_products)->with('list_products', $list_products);
    // }
    public function Search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        $search_product = DB::table('tbl_products')
        ->where('product_status','1')
        ->where('product_name','like','%'.$keywords.'%')
        ->orwhere('product_desc','like','%'.$keywords.'%')
        ->orwhere('product_price','like','%'.$keywords.'%')
        ->get();
        return view('pages.product.search')->with('category', $cate_products)->with('search_product', $search_product);
    }
    public function product_By_Price1(){
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','asc')->get();
        $mil_50 = DB::table('tbl_products')
        ->where('product_status','1')
        ->where('product_price','>=','10000000')
        ->where('product_price','<=','50000000')
        ->orderby('product_price','asc')
        ->get();
        return view('pages.product.price_filter.product_by_price')->with('category', $cate_products)->with('mil_50',$mil_50);
    }
    public function product_By_Price2( ){
       $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','asc')->get();
       $mil_100 = DB::table('tbl_products')
        ->where('product_status','1')
        ->where('product_price','>=','50000000')
        ->where('product_price','<=','100000000')
        ->orderby('product_price','asc')
        ->get();
        return view('pages.product.price_filter.product_by_price2')->with('category', $cate_products)->with('mil_100',$mil_100);
    }
    public function product_By_Price3( ){
       $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','asc')->get();
       $mil_500 = DB::table('tbl_products')
        ->where('product_status','1')
        ->where('product_price','>=','100000000')
        ->where('product_price','<=','500000000')
        ->orderby('product_price','asc')
        ->get();
        return view('pages.product.price_filter.product_by_price3')->with('category', $cate_products)->with('mil_500',$mil_500);
    }
    public function product_By_Price4( ){
       $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','asc')->get();
       $bil_1 = DB::table('tbl_products')
        ->where('product_status','1')
        ->where('product_price','>=','500000000')
        ->where('product_price','<=','1000000000')
        ->orderby('product_price','asc')
        ->get();
        return view('pages.product.price_filter.product_by_price4')->with('category', $cate_products)->with('bil_1',$bil_1);
    }
}