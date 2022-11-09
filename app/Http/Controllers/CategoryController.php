<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function Authlogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    //------------------------CATEGORY PRODUCTS-------------------------------

    // return view trang them danh muc
    public function add_Category_Products(){
        $this->Authlogin();
        return view('admin.add_category_products');
    }

    //danh sach danh muc
    public function list_Category_Products(){
        $this->Authlogin();
        $list_category_products = DB::table('tbl_category_products')->get();
        $manager_category_products = view('admin.list_category_products')->with('list_category_products', $list_category_products);
        return view('admin_layout')->with('admin.list_category_products', $manager_category_products);
    }

    public function edit_Category_Products($category_products_id){
        $this->Authlogin();
        $edit_category_products = DB::table('tbl_category_products')->where('category_id', $category_products_id)->get();
        $manager_category_products = view('admin.edit_category_products')->with('edit_category_products', $edit_category_products);
        return view('admin_layout')->with('admin.edit_category_products', $manager_category_products);
    }

    //click submit them danh muc
    public function save_Category_Products(Request $request){
        $this->Authlogin();
        $data = array();
        $data['category_name'] = $request -> category_products_name;
        $data['category_desc'] = $request -> category_products_desc;
        $data['category_status'] = $request -> category_products_status;

        DB::table('tbl_category_products')->insert($data);
        return Redirect('/add-category-products')->with('message','Thêm danh mục sản phẩm thành công');
    }

    public function update_Category_Products(Request $request, $category_products_id){
        $this->Authlogin();
        $data = array();
        $data['category_name'] = $request -> category_products_name;
        $data['category_desc'] = $request -> category_products_desc;

        DB::table('tbl_category_products')->where('category_id', $category_products_id)->update($data);
        return Redirect('list-category-products')->with('message','Cập nhật danh mục sản phẩm thành công');

    }

    public function delete_Category_Products($category_products_id){
        $this->Authlogin();
        DB::table('tbl_category_products')->where('category_id', $category_products_id)->delete();
        return Redirect('list-category-products')->with('message','Xóa danh mục sản phẩm thành công');
    }

    public function active_Category_Products($category_products_id){
        $this->Authlogin();
        DB::table('tbl_category_products')->where('category_id', $category_products_id)->update(['category_status' => 0]);
        return Redirect('/list-category-products');
    }

    public function unactive_Category_Products($category_products_id){
        $this->Authlogin();
        DB::table('tbl_category_products')->where('category_id', $category_products_id)->update(['category_status' => 1]);
        return Redirect('/list-category-products');
    }

}