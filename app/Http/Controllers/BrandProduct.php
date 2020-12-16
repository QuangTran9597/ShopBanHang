<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Brand;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;


class BrandProduct extends Controller
{

    public function add_brand_product() {
        //
        return view('admin.add_brand_product');
    }

    public function all_brand_product() {
        //
        // $all_brand_product = DB::table('tbl_brand_product')->get();
        $all_brand_product = Brand::orderBy('brand_id', 'DESC')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);

        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function save_brand_product(Request $request) {

        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // $data['brand_status'] = $request->brand_product_status;
        // DB::table('tbl_brand_product')->insert($data);
        // // Session::put('message' , ' Thương hiệu thành công');
        // // return Redirect::to('add-brand-product');
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        $request->session()->put('message', 'Thêm thương hiệu thành công');
        return redirect('all-brand-product');
    }

    public function unactive_brand_product($brand_product_id) {
       //
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        // Session::put('message', 'Không kích hoạt được');
        // return Redirect::to('all-brand-product');
        session()->put('message', 'Không hiển thị được');
        return redirect('all-brand-product');
    }

    public function active_brand_product($brand_product_id) {
       //
        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        // Session::put('message', ' Kích hoạt thành công');
        // return Redirect::to('all-brand-product');
        session()->put('message', 'Hiển thị thành công');
        return redirect('all-brand-product');
    }

    public function edit_brand_product($brand_product_id) {
        //
         $edit_brand_product = DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->get();

        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    public function update_brand_product(Request $request,$brand_product_id) {
       //
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->update($data);
        //
        $request->session()->put('message', 'Update thương hiệu sản phẩm thành công');
        return redirect('all-brand-product');
    }

    public function delete_brand_product($brand_product_id) {
       //

        DB::table('tbl_brand_product')->where('brand_id',$brand_product_id)->delete();
        // Session::put('message' , ' Delete san pham thanh cong');
        // return Redirect::to('all-brand-product');
        session()->put('message', 'Delete thương hiệu sản phẩm thành công');
        return redirect('all-brand-product');
    }

    //Show_Brand_Home
    public function show_brand_home($brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status' , '0')
        ->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status' , '0')
        ->orderby('brand_id', 'desc')->get();
       $brand_by_id = DB::table('tbl_product')->join('tbl_brand_product','tbl_product.brand_id','=',
        'tbl_brand_product.brand_id')->where('tbl_product.brand_id', $brand_id)->get();
        $brand_name = DB::table('tbl_brand_product')->where('tbl_brand_product.brand_id' , $brand_id)
       ->limit(1)->get();

        return view('pages.category.show_brand')->with('category', $cate_product)
        ->with('brand', $brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name' ,$brand_name);
    }
}
