<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
Session_start();

class Checkoutcontroller extends Controller
{	
	//Home
	public function login_checkout()
	{
		$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
		$list_product=DB::table('tbl_product')-> orderby('product_id','desc')->get();

		return view('pages.checkout.login_checkout')->with('brand',$brand_product);
	}
	public function add_customer(Request $Request)
	{
		$data=array();
		$data['customer_name']=$Request->customer_name;
		$data['customer_email']=$Request->customer_email;
		$data['customer_phone']=$Request->customer_phone;
		$data['customer_pass']=MD5($Request->customer_pass);
		$customer_id=DB::table('tbl_customer')->insertgetId($data);
		session::put('customer_id',$customer_id);
		session::put('customer_name',$Request->customer_name);

		return Redirect::to('/thanh-toan');
	}
	public function checkout()
	{
		$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
		$list_product=DB::table('tbl_product')-> orderby('product_id','desc')->get();

		return view('pages.checkout.show_checkout')->with('brand',$brand_product);
	}
	public function save_checkout(Request $Request)
	{
		$data=array();
		$data['shipping_name']=$Request->shipping_name;
		$data['shipping_phone']=$Request->shipping_phone;
		$data['shipping_email']=$Request->shipping_email;
		$data['shipping_address']=$Request->shipping_address;
		$shipping_id=DB::table('tbl_shipping')->insertgetId($data);
		session::put('shipping_id',$shipping_id);

		return Redirect::to('/hinh-thuc-thanh-toan');
	}
	public function save_payment()
	{
		$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc')->get();
		return view('pages.checkout.show_payment')->with('brand',$brand_product);
	}
	public function login_customer(Request $Request)
	{
		$email=$Request->email_account;
		$pass=MD5($Request->password_account);
		$result=DB::table('tbl_customer')->where('customer_email',$email)->where('customer_pass',$pass)->first();
		if($result)
		{
			Session::put('customer_id',$result->customer_id);
			return Redirect('/thanh-toan');
		}
		else
		{
			Session::put('message_1','Tài khoản hoặc mật khẩu không đúng. Xin hãy nhập lại!');
			return Redirect::to('/dang-nhap-thanh-toan');
		}
	}
	public function save_order(Request $Request)
	{
		//get payment
		$data=array();
		$data['payment_method']=$Request->payment_option;
		$payment_id=DB::table('tbl_payment')->insertgetId($data);
		
		//insert order
		$order_data=array();
		$order_data['customer_id']=Session::get('customer_id');
		$order_data['shipping_id']=Session::get('shipping_id');
		$order_data['payment_id']=$payment_id;
		$order_data['order_total']=Cart::total();
		$order_id=DB::table('tbl_order')->insertgetId($order_data);

		//insert order detail
		$content= Cart::content();
		foreach($content as $value_content	)
		{
			$o_detail_data=array();
			$o_detail_data['order_id']=$order_id;
			$o_detail_data['product_id']=$value_content->id;
			$o_detail_data['product_name']=$value_content->name;
			$o_detail_data['product_price']=$value_content->price;
			$o_detail_data['product_quantity']=$value_content->qty;
			DB::table('tbl_order_detail')->insert($o_detail_data);
		}
		if($data['payment_method']==1)
		{
			echo 'Thanh toán bằng thẻ ATM đang bị bảo trì. Xin khách hàng thông cảm !';
		}
		else
		{
			Cart::destroy();
			$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
			return view('pages.checkout.handcash')->with('brand',$brand_product);
		}	

	}
	//Admin
	public function manager_order()
	{
		$list_order =DB::table('tbl_order')
		->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
		->select('tbl_order.*','tbl_customer.customer_id') 
		->orderby('tbl_order.order_id','desc')->get();
		$manager_order=view('admin.manager_order')->with('list_order',$list_order);

		return view('admin_layout')->with('admin.manager_order',$manager_order);
	}
	public function view_order()
	{
		$detail_order =DB::table('tbl_order')
		->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')
		->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
		->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
		->select('tbl_order.*','tbl_customer.customer_name','tbl_order_detail.*','tbl_shipping.*') 
		->orderby('tbl_order.order_id','desc')->get();
		$manager_d_order=view('admin.view_order')->with('detail_order',$detail_order);
		return view('admin_layout')->with('admin.view_order',$manager_d_order);
	}
}
