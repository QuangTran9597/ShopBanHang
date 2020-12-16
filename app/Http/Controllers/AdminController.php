<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{


    public function index() {

        return view('admin_login');
    }
    public function Show_Dashboard() {

        return view ('admin.dashboard');
    }

    public function Dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password =md5 ($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password', $admin_password)->first();
        if($result) {
                // Session::put('admin_name' , $result->admin_name);
                // Session::put('admin_id' , $result->admin_id);
                // Session::put('admin_status' , $result->admin_status);
                // return Redirect::to('dashboard');
                $request->session()->put('admin_name', $result->admin_name);
                $request->session()->put('admin_id', $result->admin_id);
                $request->session()->put('admin_status', $result->admin_status);
                return redirect('dashboard');
        } else {
                // Session::put('message' , 'Email or Password not found');
                // return Redirect::to('admin');
                $request->session()->put('message', 'Email or Password not found');
                return redirect('admin');
        }
    }
    public function logout() {
        session()->put('admin_name', null);
        session()->put('admin_id', null);
        session()->put('admin_status', null);
        return redirect('admin');

    }
}
