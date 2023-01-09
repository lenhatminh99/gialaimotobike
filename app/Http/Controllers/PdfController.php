<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Vatttan\Apdf\Apdf;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Database\Query\Builder;

class PdfController extends Controller
{
    public function ordered_List(){
        $order_by_customer =  DB::table('tbl_customers')
            ->join('tbl_order','tbl_order.customer_id','=','tbl_customers.customer_id')
            ->select('tbl_order.*','tbl_customers.*')
            ->where('tbl_order.customer_id',session::get('customer_id'))
            ->paginate(6);
        return view('user.ordered_list')->with('order_by_customer',$order_by_customer);
    }
    public function ordered_Details_List($order_id){
        $order_details_by_customer =  DB::table('tbl_order')
            ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
            ->select('tbl_order.*','tbl_order_details.*')
            ->where('tbl_order_details.order_id', $order_id)
            ->paginate(6);
        return view('user.ordered_details_list')->with('order_details_by_customer',$order_details_by_customer);
    }
    public function pdf_DonHang(){
        $data2= DB::table('tbl_order')
            ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')
            ->select('tbl_order.*','tbl_payment.*')
            ->where('tbl_order.customer_id',Session::get('customer_id'))
            ->get();
        session::put('data2',$data2);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('user.bought_list',  compact('data2'));
        return $pdf->download('donhang.pdf');
    }
}
