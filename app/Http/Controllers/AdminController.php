<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function Authlogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customers.*')
        ->get();
        $manager_order = view('admin.dashboard')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.dashboard', $manager_order);
            // return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
       return view('admin_login');
    }
    // public function show_dashboard(){
    //     $this->Authlogin();
    //     // return view('admin.dashboard');
    //     $all_order = DB::table('tbl_order')
    //     ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
    //     ->select('tbl_order.*','tbl_customers.*')
    //     ->get();
    //     $manager_order = view('admin.dashboard')->with('all_order', $all_order);
    //     return view('admin_layout')->with('admin.dashboard', $manager_order);
    // }
    public function show_dashboard(){
        $this->Authlogin();
        // return view('admin.dashboard');
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customers.*')
        ->get();
        $clients = DB::table('tbl_customers')->get();
        return view('admin.dashboard')->with('all_order', $all_order)->with('clients',$clients);
    }
    public function login(Request $request){
   		$admin_mail = $request->admin_mail;

   		$admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_mail', $admin_mail)->orwhere('admin_password', $admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->with('message','Vui lòng kiểm tra thông tin đăng nhập!');
        }
   	}
   	public function logout(){
           $this->Authlogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
   	}
    public function show_Customer_Message(){
        $customer_message = DB::table('tbl_sendmessage')->get();
        return view('admin.customer_message')->with('customer_message',$customer_message);
    }
    public function save_Customer_Message(Request $request){
        $customer_message = array();
        $customer_message['message_content'] = $request->message_content;

        DB::table('tbl_sendmessage')->insertGetId($customer_message);
        return Redirect::to('/')->with('message','Để lại lời nhắn thành công');
    }
}