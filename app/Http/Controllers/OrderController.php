<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ship;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Shipping;
use App\Model\Customer;
use Cart;

class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.manage_order')->with(compact('order'));
    }

    public function view_order($order_code){

        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $value){
            $customer_id = $value->customer_id;
            $shipping_id = $value->shipping_id;
        }
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $cart = Cart::content();
        return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','cart'));
    }

    public function print_order(){
        
    }
}
