<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
Session_start();

class Customercontroller extends Controller
{
    public function manager_customer()
    {
		$list_customer =DB::table('tbl_customer')
		->select('tbl_customer.*')->get();
		$manager_customer=view('admin.manager_customer')->with('list_customer',$list_customer);

		return view('admin_layout')->with('admin.manager_customer',$manager_customer);
    }
  }

