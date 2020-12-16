<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();

        $all_product =DB::table('tbl_product')->where('product_status','0')
        ->orderby('product_id', 'desc')->limit(6)->get();
        return view('pages.home')->with('category', $cate_product)
        ->with('brand', $brand_product)->with('all_product',$all_product);
    }

    public function search(Request $request){
        $keywords = $request->keyword_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')->orderby('brand_id', 'desc')->get();

        $search_product =DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')
        ->orWhere('product_price','like','%'.$keywords.'%')->get();

        if($search_product){

            return view('pages.show_product.search')->with('category', $cate_product)->with('brand',$brand_product)
        ->with('search_product', $search_product);
        }else {
            session()->put('message', 'Không có sản phẩm nào phù hợp');
            dd($search_product);
        }
    }

    public function send_mail(){
       $details = [
           'title'=>'Thu gui mail',
           'body'=>'Ban da gui mail thanh cong'
       ];
       Mail::to('quangductran9597@gmail.com')->send(new \App\Mail\MailNotify($details));
        echo 'Email okkkk' ;
    }
}
