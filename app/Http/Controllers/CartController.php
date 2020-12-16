<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        dd($data);
    }

    public function save_cart(Request $request){

        $productId = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first();

         $data['id'] = $product_info->product_id;
         $data['qty'] =$quantity ;
         $data['name'] = $product_info->product_name;
         $data['price'] = $product_info->product_price;
         $data['weight'] = $product_info->product_content;
         $data['options']['image'] = $product_info->product_image;
         Cart::add($data);
          return redirect('show-cart');



    }

    public function show_cart(){
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function delete_cart($rowId) {
        Cart::update($rowId,0);
        return redirect('show-cart');
    }

    public function delete_cart1($rowId) {
        Cart::update($rowId,0);
        return redirect('checkout');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return redirect('show-cart');
    }


}
