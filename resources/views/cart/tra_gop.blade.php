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
                            <td><span>{{ number_format(
                        ($total_after_tax / 3) + ($total_after_tax * 0.03)/3
                        ) }}đ</span></td>
                            <td><span>0.3%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.03) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="3">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>6 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 6) + ($total_after_tax * 0.06)/6
                        ) }}đ</span></td>
                            <td><span>0.6%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.06) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="6">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>9 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 9) + ($total_after_tax * 0.9)/9
                        ) }}đ</span></td>
                            <td><span>0.9%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.09) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="9">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>12 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 12) + ($total_after_tax * 0.12)/12
                        ) }}đ</span></td>
                            <td><span>1.2%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.12) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="12">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>15 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 15) + ($total_after_tax * 0.15)/15
                        ) }}đ</span></td>
                            <td><span>1.5%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.15) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="15">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>18 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 18) + ($total_after_tax * 0.18)/18
                        ) }}đ</span></td>
                            <td><span>1.8%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.18) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="18">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>21 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 21) + ($total_after_tax * 0.21)/21
                        ) }}đ</span></td>
                            <td><span>2.1%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.21) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="21">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>24 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 24) + ($total_after_tax * 0.21)/21
                        ) }}đ</span></td>
                            <td><span>2.4%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.24) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="24">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>27 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 27) + ($total_after_tax * 0.27)/27
                        ) }}đ</span></td>
                            <td><span>2.7%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.27) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="27">Chọn</button></td>
                        </tr>
                        <tr>
                            <td><span>30 Tháng</span></td>
                            <td><span>{{ number_format(
                        ($total_after_tax / 30) + ($total_after_tax * 0.3)/30
                        ) }}đ</span></td>
                            <td><span>3%</span></td>
                            <td><span>{{ number_format($total_after_tax * 0.3) }}đ</span></td>
                            <td><button type="submit" name="monthly_pay" value="30">Chọn</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            @endif
        </div>
    </div>
@endsection
