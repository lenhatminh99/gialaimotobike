<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    //phpstorm goi y tao ham insertOrderDonHang de cac ham khac goi lai => do ton tai nguyen, web chay nhanh hon
    /**
     * @return void
     */
    public function insertOrderDonHang(Request $request): void //ham chu yeu insert vào table, để 2 hàm kia tận dụng lại, chức năng như cũ
    {
        $tax = 0;
        $total = 0;
        $total_after_tax = 0;
        foreach (Session::get('cart') as $key => $cart){
            $subtotal = $cart['product_price'] * $cart['product_qty'];
            $total += $subtotal;
            $tax = $total * 0.1;
            $total_after_tax = $total + $tax;
        }
        Session::put('total_after_tax', $total_after_tax);
        $payment_data = array();
        $payment_data['payment_method'] = $request->payment_options;
        $payment_data['payment_status'] = 'Đang chờ xử lý';

        $payment_id = DB::table('tbl_payment')->insertGetId($payment_data);

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $total_after_tax;
        $order_data['order_status'] = 'Đang chờ xử lý';

        $order_id = DB::table('tbl_order')->insertGetId($order_data);
        Session::put('order_id', $order_id);

        $order_details_data= array();
        foreach (Session::get('cart') as $key => $cart){
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $cart['product_id'];
            $order_details_data['product_name'] = $cart['product_name'];
            $order_details_data['product_price'] = $cart['product_price'];
            $order_details_data['product_sales_quantity'] = $cart['product_qty'];
            $order_details_id = DB::table('tbl_order_details')->insert($order_details_data);
        }
    }
    public function Authlogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function gio_Hang(Request $request){

        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        return view('cart.show_cart')->with('category', $cate_products);
    }
    public function add_Cart_Ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_available = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_available++;
                }
            }
            if ($is_available == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }
    public function delete_Product_Cart($session_id){
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key =>  $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return Redirect::back()->with('message', 'Xóa sản phẩm thành công');
        } else {
            return Redirect::back()->with('message', 'Xóa sản phẩm thất bại');
        }
    }
    public function delete_All_Product(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart'); //chi delete session card
            return Redirect::back()->with('message', 'Xóa hết giỏ hàng thành công');
        }
    }
    public function update_Cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
                Session::put('cart', $cart);
                return Redirect::back()->with('message', 'Cập nhật giỏ hàng thành công');
            }else{
                return Redirect::back()->with('message', 'Cập nhật giỏ hàng thất bại');
        }
    }
    public function checkout(){
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        return view('cart.checkout')->with('category', $cate_products);
    }
    public function save_Checkout_Customer(Request $request){
        $data= array();
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_address'] = $request->shipping_address;
            $data['shipping_phone'] = $request->shipping_phone;
            $data['shipping_notes'] = $request->shipping_notes;

            $validated = $request->validate([
            'shipping_name' => 'required',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required',
            'shipping_address' => 'required',
            'shipping_notes' => 'required'
        ]);
        if(!$validated){
            return Redirect::to('/checkout')->withErrors($validated);
        }else{
            $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
            return Redirect::to('/payment');
        }
    }
    public function payment(){
        $cate_products = DB::table('tbl_category_products')->where('category_status', '1')->orderby('category_id', 'desc')->get();

        return view('cart.payment')->with('category', $cate_products);
    }
    public function save_payment_Customer(Request $request){
        //gọi lại hàm đầu tiên
        $this->insertOrderDonHang($request);
        if($request->payment_options==1){
            // echo 'Chức năng thanh toán bằng thẻ ghi nợ đang hoàn thiện';
            //thanh toan visa / mastercard
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('cart.handcash');
        }elseif($request->payment_options==2){
            //thanh toan tien mat
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('cart.handcash');
        }elseif($request->payment_options==3){
            // echo ' Chức năng thanh toán bằng momo đang hoàn thiện';
            //thanh toan momo
            Session::forget('cart');
            Session::forget('shipping_id');
            return view('cart.handcash');
        }else{
            return view('cart.tra_gop');
        }
            // return Redirect::to('/payment');
    }
    public function done_Order(Request $request){ //ham tra gop, ko biet dat ten gi
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        //gọi lại hàm đầu tiên
//        $this->insertOrderDonHang($request);
        //khúc này nếu gọi hàm insertOrderDonHang() sẽ bị thêm dữ liệu vô database 2 lần, để ý khi chạy dd(),
        //nó chạy qua hàm save_payment_Customer() để mình chọn 1 trong 4 phương thức thanh toán trước
        //là nó đã thêm dữ liệu vô 1 lần rồi, nên gọi lại hàm insertOrderDonHang() trong đây sẽ gọi lại lần 2
        $tragop_data= array();
        $tragop_data['order_id'] = Session::get('order_id');
        $tragop_data['customer_id'] = Session::get('customer_id');
        $tragop_data['shipping_id'] = Session::get('shipping_id');
        $tragop_data['order_total'] = Session::get('total_after_tax');
        $tragop_data['monthly_pay'] = $request->monthly_pay;
        $tragop_data['order_status'] = 'Đang chờ xử lý';
        $tragop_data['deadline_pay'] = date('d-m-Y');

        $first_month = strtotime($tragop_data['deadline_pay']);
        $last_month = date('d-m-Y', strtotime("+ $request->monthly_pay month", $first_month));
        Session::put('last_month', $last_month);
        DB::table('tbl_tragop')->insertGetId($tragop_data);
        Session::forget('cart');
        Session::forget('shipping_id');
        return view('cart.handcash');
    }
    public function manage_Order(){
        $this->Authlogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','asc')
        ->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manager_order', $manager_order);
    }
    public function manage_Tra_Gop(){
        $this->Authlogin();
        $all_order = DB::table('tbl_tragop')
            ->join('tbl_customers','tbl_customers.customer_id','=','tbl_tragop.customer_id')
            ->select('tbl_customers.*','tbl_tragop.*')
            ->orderby('tbl_tragop.order_id','asc')
            ->get();
        $manager_order = view('admin.manage_tra_gop')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manager_tra_gop', $manager_order);
    }
    public function details_Order($order_id){
        $this->Authlogin();
        $order_details_data = DB::table('tbl_order')
        ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_order.order_id')
        ->select('tbl_order.*','tbl_order_details.*')
        ->where('tbl_order_details.order_id',$order_id)
        ->get();
        $manager_details_order =  view('admin.details_order')->with('order_details_data',$order_details_data);
        return view('admin_layout')->with('admin.manager_details_order', $manager_details_order);
    }
    public function details_Tra_Gop($order_id){
        $this->Authlogin();
        $all_order = DB::table('tbl_tragop')
            ->join('tbl_order_details','tbl_order_details.order_id','=','tbl_tragop.order_id')
            ->select('tbl_order_details.*','tbl_tragop.*')
            ->where('tbl_order_details.order_id',$order_id)
            ->get();
        $manager_details_order =  view('admin.details_tra_gop')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manager_details_order', $manager_details_order);
    }
    public function accept_Order($order_id){
        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_status' => 'Đã duyệt đơn hàng']);
        DB::table('tbl_payment')->where('payment_id',$order_id)->update(['payment_status' => 'Chấp nhận thanh toán']);
        return Redirect('/manage-order');
    }
    public function deny_Order($order_id){
        DB::table('tbl_order')->where('order_id', $order_id)->update(['order_status' => 'Từ chối đơn hàng']);
        DB::table('tbl_payment')->where('payment_id',$order_id)->update(['payment_status' => 'Từ chối thanh toán']);
        return Redirect('/manage-order');
    }
}
