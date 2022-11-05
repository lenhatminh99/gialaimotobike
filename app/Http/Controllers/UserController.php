<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function registerCustomer(Request $request){
        $user = array();
        $user['customer_name'] = $request -> customer_name;
        $user['customer_password'] = md5($request -> customer_password);
        $user['customer_email'] = $request -> customer_email;
        $user['customer_phone'] = $request -> customer_phone;

        $validated = $request->validate([
            'customer_name' => 'required|unique:tbl_customers',
            'customer_email' => 'required|unique:tbl_customers|email',
            'customer_password' => 'min:6|required_with:r_password|same:r_password',
            'r_password' => 'min:6',
            'customer_phone' => 'required'
        ]);
        if(!$validated){
            return Redirect::to('/register')->withErrors($validated);
        }else{
            $insert_customer=DB::table('tbl_customers')->insertGetId($user);
            return Redirect::to('/login')->with('message','Đăng ký thành công!');
        }
    }

    public function loginCustomer(Request $request){
        $customer_name = $request->customer_name;
        $customer_password = md5($request->customer_password);

        $result= DB::table('tbl_customers')
            ->where('customer_name',$customer_name)
            ->where('customer_password',$customer_password)
            ->first();

        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
//            Session::forget('cart');
//            Session::forget('shipping_id');
            return Redirect::to('/');
        }else{
            return Redirect::to('/login')->with('message','Vui lòng kiểm tra thông tin đăng nhập');
        }
    }

    public function logoutCustomer(){
        Session::put('customer_id',null);
        Session::put('customer_name',null);
        return Redirect::to('/');
    }
}
