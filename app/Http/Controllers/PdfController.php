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
    public function pdf_DonHang(){
//        $data = DB::table('tbl_order')
//            ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
//            ->select('tbl_order.*','tbl_customers.*')
//            ->where('tbl_order.customer_id',Session::get('customer_id'))
//            ->get();
        $data2= DB::table('tbl_order')
            ->join('tbl_payment','tbl_payment.payment_id','=','tbl_order.payment_id')
            ->select('tbl_order.*','tbl_payment.*')
            ->where('tbl_order.customer_id',Session::get('customer_id'))
            ->get();
        //tam thoi bo $data -> $data2 đã đủ dữ liệu để xuất lên view rồi, thằng customer dùng session đủ xài
//        session::put('data',$data);
        session::put('data2',$data2);
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('user.bought_list',  compact('data2'));
        return $pdf->download('donhang.pdf');
    }
}
