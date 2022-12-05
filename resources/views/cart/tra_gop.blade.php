@extends('layout')
@section('content')
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li class="active">Trả góp</li>
            </ol>
        </div>
        <div class="review-payment">
            <h2>Giá trị cần thanh toán</h2>
            @php
                $tax = 0; //thuế
                $total = 0; //tổng
                $total_after_tax = 0; //tổng sau thuế
            @endphp
            @if (Session::get('cart') == true)
                @foreach (Session::get('cart') as $key => $cart)
                    @php
                        $subtotal = $cart['product_price'] * $cart['product_qty']; //tổng tiền 1 sản phẩm * số lượng
                        $total += $subtotal;
                        $tax = $total * 0.1;
                        $total_after_tax = $total + $tax;
                    @endphp
                @endforeach
            <form action="{{URL::to('/done-order')}}" method="post">
                @csrf
                <input type="hidden" name="payment_options" value="4">
                <div class="total_area">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col"><i class="fa fa-money" style="color: yellow" aria-hidden="true"></i> Thời gian trả góp</th>
                            <th scope="col"><i class="fa fa-money" style="color: red" aria-hidden="true"></i> Số tiền trả hàng tháng</th>
                            <th scope="col"><i class="fa fa-money" style="color: green" aria-hidden="true"></i> Lãi suất</th>
                            <th scope="col"><i class="fa fa-money" style="color: green" aria-hidden="true"></i>Chênh lệch</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span>3 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 3) }}đ</span></td>
                            <td><span>0.3%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.3) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="3"></td>
                        </tr>
                        <tr>
                            <td><span>6 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 6) }}đ</span></td>
                            <td><span>0.6%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.6) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="6"></td>
                        </tr>
                        <tr>
                            <td><span>9 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 9) }}đ</span></td>
                            <td><span>0.9%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.9) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="9"></td>
                        </tr>
                        <tr>
                            <td><span>12 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 12) }}đ</span></td>
                            <td><span>1.2%</span></td>
                            <td><span>{{ number_format($total_after_tax * 1.2) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="12"></td>
                        </tr>
                        <tr>
                            <td><span>15 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 15) }}đ</span></td>
                            <td><span>1.5%</span></td>
                            <td><span>{{ number_format($total_after_tax * 1.5) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="15"></td>
                        </tr>
                        <tr>
                            <td><span>18 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 18) }}đ</span></td>
                            <td><span>1.8%</span></td>
                            <td><span>{{ number_format($total_after_tax * 1.8) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="18"></td>
                        </tr>
                        <tr>
                            <td><span>21 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 21) }}đ</span></td>
                            <td><span>2.1%</span></td>
                            <td><span>{{ number_format($total_after_tax * 2.1) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="21"></td>
                        </tr>
                        <tr>
                            <td><span>24 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 24) }}đ</span></td>
                            <td><span>2.4%</span></td>
                            <td><span>{{ number_format($total_after_tax * 2.4) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="24"></td>
                        </tr>
                        <tr>
                            <td><span>27 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 27) }}đ</span></td>
                            <td><span>2.7%</span></td>
                            <td><span>{{ number_format($total_after_tax * 2.7) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="27"></td>
                        </tr>
                        <tr>
                            <td><span>30 Tháng</span></td>
                            <td><span>{{ number_format($total_after_tax / 30) }}đ</span></td>
                            <td><span>3%</span></td>
                            <td><span>{{ number_format($total_after_tax * 3) }}đ</span></td>
                            <td><input type="submit" name="monthly_pay" value="30"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection
