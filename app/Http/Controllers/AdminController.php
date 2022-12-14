<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;

if (!isset($_SESSION)) {
    session_start();
} else {
    session_destroy();
    session_start();
}

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
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return view('admin.dashboard');
        }
        else{
            return view('admin_login');
        }

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
        $clients = sizeof(DB::table('tbl_customers')->select('customer_id')->get());
        session::put('clients',$clients-1);
        $all_order = sizeof(DB::table('tbl_order')->select('order_id')->get());
        session::put('all_order',$all_order);
        $order_total = number_format(DB::table('tbl_order')->sum('tbl_order.order_total'));
        session::put('order_total',$order_total);
        return view('admin.dashboard');
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
            return Redirect::to('/admin')->with('message','Vui l??ng ki???m tra th??ng tin ????ng nh???p!');
        }
   	}
   	public function logout(){
           $this->Authlogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
   	}
    public function show_Customer_Message(){
        $customer_message = DB::table('tbl_contact')->get();
        return view('admin.customer_message')->with('customer_message',$customer_message);
    }
    public function send_Mail(){
        Mail::send('email.send_mail', ['name'=>session::get('shipping_info.shipping_name')], function($email){
            $email->subject('X??c nh???n ????n h??ng');
            $email->to(session::get('shipping_info.shipping_email'), session::get('shipping_info.shipping_name'));
        });
    }
}
