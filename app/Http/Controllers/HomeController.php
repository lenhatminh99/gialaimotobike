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
        $ds_sanpham = Product::where('product_status','1')
            ->orderby('product_id','desc')
            ->paginate(6);
        $cate_products = DB::table('tbl_category_products')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('layout')->with('category', $cate_products)->with('danhsachsanpham',$ds_sanpham);
        //return ve / khai bao them cho chac
    }

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
}
