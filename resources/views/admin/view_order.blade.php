@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     THÔNG TIN KHÁCH HÀNG ĐĂNG NHẬP
    </div>

    <div class="table-responsive">

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Số điện thoại</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_email }}</td>
                <td>{{ $customer->customer_phone }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     THÔNG TIN VẬN CHUYỂN HÀNG
    </div>

    <div class="table-responsive">

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người nhận hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Phương thức thanh toán</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $shipping->shipping_name }}</td>
            <td>{{ $shipping->shipping_address }}</td>
            <td>{{ $shipping->shipping_phone }}</td>
            <td>{{ $shipping->shipping_email }}</td>
            <td>{{ $shipping->shipping_note }}</td>
            <td>@if($shipping->shipping_method==0)
                    Thanh toán qua thẻ ATM
                @else
                    Thanh toán khi nhận hàng
                @endif
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt kê đơn hàng
    </div>

    <div class="table-responsive">

      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng </th>
            <th>Gía</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
                $subtotal = 0;
                $ship = 0;
                $sum = 0;
            @endphp
            @foreach($order_details as $value)
          <tr>
            <td><i>{{$i++}}</i></td>
            <td>{{ $value->product_name }}</td>
            <td>{{ $value->product_sales_quantity }}</td>
            <td>{{ number_format($value->product_price).' '.'đ' }} </td>
            <td> @php  $total = $value->product_sales_quantity * $value->product_price;
                        $ship = $value->product_ship;
                        $subtotal += $total ;
                        $sum = $ship + $subtotal;
                    @endphp
                {{ number_format($total).' '.'đ'}}</td>

          </tr>
            @endforeach
            <tr>
                <td>Phí ship: {{ number_format($ship).' '.'đ' }}</td>
                <td>Thanh toán: {{ number_format($subtotal).' '.'đ'}}</td>
                <td>Tổng thanh toán: {{ number_format($sum).' '.'đ'}}</td>
            </tr>
        </tbody>
      </table>
      <a href="#">In đơn hàng</a>
    </div>
  </div>
</div>


@endsection
