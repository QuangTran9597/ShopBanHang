<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;


class CategoryProduct extends Controller
{

    //   public function __construct(){
    //     $this->middleware('check');
    // }
    public function add_category_product() {

        return view('admin.add_category_product');
    }

    public function all_category_product() {

        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request) {

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        session()->put('message', 'Thêm danh mục sản phẩm thành công');
        // Session::put('message' , ' Them danh muc san pham thanh cong');
        return redirect('add-category-product');
    }

    public function unactive_category_product($category_product_id) {

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        // Session::put('message', 'Khong kich hoat san pham thanh cong');
        session()->put('message', 'Không kích hoạt sản phẩm thành công');
        return redirect('all-category-product');


    }

    public function active_category_product($category_product_id) {

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        // Session::put('message', ' Kich hoat san pham thanh cong');
        session()->put('message', 'Kích hoạt sản phẩm thành công');
        return redirect('all-category-product');

    }

    public function edit_category_product($category_product_id) {

        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id) {

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        // Session::put('message' , ' Update san pham thanh cong');
        $request->session()->put('message', 'Update sản phẩm thành công');
        return redirect('all-category-product');
    }

    public function delete_category_product($category_product_id) {


        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        // Session::put('message' , ' Delete san pham thanh cong');
        // return Redirect::to('all-category-product');
        session()->put('message', 'Delete sản phẩm thành công');
        return redirect('all-category-product');
    }
    // End function Admin Page


    // Show_Category_Home
    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')
        ->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')
        ->orderby('brand_id', 'desc')->get();
       $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=',
        'tbl_category_product.category_id')->where('tbl_product.category_id', $category_id)->get();
       $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id' , $category_id)
       ->limit(1)->get();

        return view('pages.category.show_category')->with('category', $cate_product)
        ->with('brand', $brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }





}

