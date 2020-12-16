<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Model\City;
use App\Model\Province;
use App\Model\Wards;
use App\Model\Ship;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Model\Shipping;

class CheckoutController extends Controller
{
    public function login_checkout() {
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();

        return view('pages.checkout.login_checkout')->with('category' , $cate_product)->with('brand', $brand_product);
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);
        $request->session()->put('customer_id', $customer_id);
        $request->session()->put('customer_name', $request->customer_name);

        return redirect('checkout');

    }

    public function checkout(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();
        $customer_id = $request->customer_id;
        // $tesst = DB::table('tbl_customer')->where('customer_id',$customer_id)->orderByDesc('customer_id')->get();
        $content = Cart::content();
        $city = City::orderby('matp' , 'ASC')->get();
         return view('pages.checkout.show_check_out')->with('category' , $cate_product)->with('brand', $brand_product)
         ->with('city',$city)->with('content',$content);

    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        $request->session()->put('shipping_id', $shipping_id);
        return redirect('payment');
    }

    public function payment(){
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category' , $cate_product)->with('brand', $brand_product);
    }

    public function pay_order(Request $request){
        // Insert PayMent
        $data = array();
        $data['payment_method'] = $request->payment_options;

        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        // Insert Order

        $order_data = array();
        $order_data['customer_id'] = session()->get('customer_id');
        $order_data['shipping_id'] = session()->get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        // Insert Order_detail
        $content = Cart::content();
        foreach($content as $v_content){
            $order_detail = array();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $v_content->id;
            $order_detail['product_name'] = $v_content->name;
            $order_detail['product_price'] = $v_content->price;
            $order_detail['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_detail);
        }
        if($data['payment_method']=='ATM'){
            echo 'Thanh toan the ATM';
        }elseif($data['payment_method']=='Pay-Money'){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
            $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();

            return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand',$brand_product);
        }
        //return redirect('payment');
    }

    public function logout_checkout(){
            session()->flush();
        return redirect('login-checkout');
    }

    public function login_customer(Request $request) {
       $email = $request->customer_email;
       $password = md5($request->customer_password);
       $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password', $password)->first();

        if($result){
            session()->put('customer_id', $result->customer_id);
            return redirect('checkout');
        }else{
            return redirect('login-checkout');
        }
    }

    public function manage_order(){
        $all_order = DB::table('tbl_order')
        ->join('tbl_customer', 'tbl_order.customer_id', 'tbl_customer.customer_id')
        ->orderByDesc('tbl_order.order_id')->get();

        return view('admin.manage_order',compact('all_order'));

    }

    public function view_order($id){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customer', 'tbl_order.customer_id',  'tbl_customer.customer_id')
        ->join('tbl_shipping', 'tbl_order.shipping_id', 'tbl_shipping.shipping_id')
        ->join('tbl_order_details', 'tbl_order.order_id','tbl_order_details.order_id')

        ->where('tbl_order.order_id',$id)->get();
        // $order = DB::table('tbl_order_details')->where('order_id',$id)->get();
        return view('admin.view_order', compact('order_by_id'));
    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output.='<option>--Chọn quận huyện--</option>';
                foreach($select_province as  $province){
                $output.='<option value="'.$province->maqh.'" >'.$province->name_qhuyen.'</option>';
                }
            }else{

                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output.='<option>--Chọn xã phường--</option>';
                foreach($select_wards as  $wards){
                $output.='<option value="'.$wards->xaid.'">'.$wards->name_xaphuong.'</option>';
                }
            }
        } echo $output;
    }

    public function calculate_ship(Request $request){
        $data = $request->all();
        if($data['matp']){
            $ship = Ship::where('ship_matp', $data['matp'])->where('ship_maqh',$data['maqh'])
            ->where('ship_xaid', $data['xaid'])->get();
            if($ship){
                $count_ship = $ship->count();
                if($count_ship>0){
                    foreach($ship as $value){
                        $request->session()->put('fee', $value->ship);
                        Session::save();
                    }
                }else{
                    $request->session()->put('fee', 35000);
                        Session::save();
                }
            }
        }
    }

    public function confirm_order(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order = new Order();
        $order->customer_id = session()->get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

        $content = Cart::content();
        foreach($content as $cart){
            $order_details = new OrderDetails();
            $order_details->order_code = $checkout_code;
            $order_details->product_id = $cart->id;
            $order_details->product_name = $cart->name;
            $order_details->product_price = $cart->price;
            $order_details->product_sales_quantity = $cart->qty;
            $order_details->product_ship = $data['order_fee'];
            $order_details->save();

        }
        $request->session()->forget('cart');
        $request->session()->forget('fee');
    }
}
