<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class Admincontroller extends Controller
{
    public function index()
    {
    	return view('admin_login');
    }
    public function show_dashboard()
    {
    	return view('admin.dashboard');
    }
    public function dashboard(Request $Request)
    {
    	$admin_email=$Request->admin_email;
    	$admin_password=MD5($Request->admin_password);
    	$result =DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    	if($result)
    	{
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return Redirect::to('/dashboard');
    	}
    	else
    	{

    		Session::put('message','Tài khoản hoặc mật khẩu không đúng. Xin hãy nhập lại!');
    		return Redirect::to('/admin');
    		
    	}
    }
    public function logout()
    {
    	return Redirect::to('/admin');
    }
}
