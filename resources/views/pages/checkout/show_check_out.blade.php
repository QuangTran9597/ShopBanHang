@extends('layout')
@section('content')

<section id="cart_items" >
		<div class="container" style="width:930px;">
        <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			<div class="step-one">
				<h2 class="heading">Thời Trang Nam Routine</h2>
			</div>
			<div class="checkout-options">
				<h3>Giỏ hàng</h3>
				<p>Bạn đã có tài khoản?<a href="#">Đăng nhập</a></p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div>

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div>

			<div class="shopper-informations">
				<div class="row">

					<div class="col-sm-12   clearfix">
						<div class="bill-to">
							<p>Thông tin giao hàng</p>

							<div class="col-sm-6 form-one">

								<form method="POST">
                                    @csrf

									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Email">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ">
                                    <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
                                    <textarea name="shipping_note" class="shipping_note" placeholder="Notes about your order, Special Notes for Delivery" rows="5"></textarea>

                                    @if(Session::get('fee'))
                                        <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                    @else
                                        <input type="hidden" name="order_fee" class="order_fee" value="35000">
                                    @endif


                                    <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">

                                    <div class="form-group">
                                                <label for="exampleInputPassword1">Phương thức thanh toán</label>
                                                    <select name="payment_select"  class="form-control input-sm m-bot15 payment_select " >
                                                        <option value="0" > Chuyển khoản</option>
                                                        <option value="1" > Thanh toán khi nhận hàng</option>

                                                    </select>
                                    </div>
								</form>

                            </div>

                            <div class="col-sm-6 from-one">
                                        <form method="POST">
                                                @csrf

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Chọn thành phố</label>
                                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city " >
                                                        <option value="0" > --Chọn tỉnh thành phố--</option>
                                                        @foreach ($city as $ci)
                                                        <option  value="{{$ci->matp}}">{{$ci->name_thanhpho}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Chọn quận huyện</label>
                                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province " >
                                                        <option  value="0" > --Chọn quận huyện-- </option>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Chọn xã phường</label>
                                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards " >
                                                        <option  value="0" > --Chọn xã phường-- </option>
                                                    </select>
                                            </div>

                                            <input type="button" value="Tính phí vận chuyển " name="" class="btn btn-primary btn-sm calculate_delivery">

                                        </form>
                                        <br>
                                            <p>Phí vận chuyển là: {{ number_format(Session::get('fee'))}}đ</p>
                            </div>

							<div class="form-two">

							</div>
						</div>
                    </div>
                    <div class="col-sm-12 clearfix">
                        <div class="table-responsive cart_info">
                                <table class="table table-condensed" style="width:930px;">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Hình ảnh </td>
                                            <td class="description">Mô tả</td>
                                            <td class="price">Giá</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Tổng tiền</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @php
                                            $i = 0;
                                           $total = 0;
                                           $sum = 0;
                                           $ship = 0;
                                        @endphp

                                        @foreach($content as $v_content)
                                        <tr>
                                            <td class="cart_product">
                                                <a href=""><img src="{{url('public/upload/product/'.$v_content->options->image)}}" width="100px" alt=""></a>
                                            </td>
                                            <td class="cart_description">
                                                <h4><a href="">{{$v_content->name}}</a></h4>
                                                <p>ID: {{$v_content->id}}</p>
                                            </td>
                                            <td class="cart_price">
                                                <p>{{number_format($v_content->price).' '.'vnd'}}</p>
                                            </td>
                                            <td class="cart_quantity">
                                                <div class="cart_quantity_button">
                                                    <form action="{{url('update-cart-quantity')}}" method="POST">
                                                    @csrf
                                                    <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" size="2">
                                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">

                                                    </form>
                                                </div>
                                            </td>
                                            <td class="cart_total">
                                                <p class="cart_total_price">
                                                    @php
                                                        $subtotal = $v_content->price * $v_content->qty;
                                                        $total += $subtotal;
                                                        $ship = Session::get('fee');
                                                        $sum = $ship + $total;
                                                        echo number_format($subtotal).' '.'vnd';
                                                    @endphp
                                                </p>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                <ul>

                                        <li>Tổng <span>{{number_format($total).' '.'vnd'}}</span></li>
                                        <li>Phí vận chuyển <span>{{ number_format(Session::get('fee'))}} vnd</span></li>
                                        <li>Thành tiền <span>
                                            {{ number_format($sum).' '.'vnd' }}
                                           </span></li>

                                        <li>
                                                @if(Session::get('customer_id'))
                                                <a href="{{url('checkout')}}" class="btn btn-default check_out" >Đặt hàng</a>
                                                @else
                                                    <a href="{{url('login-checkout')}}" class="btn btn-default check_out">Đặt hàng</a>
                                                @endif
                                        </li>

                                </ul>
                            </div>
                        </div>
				    </div>
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

			<div class="table-responsive cart_info">

			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
	</section> <!--/#cart_items-->

@endsection
