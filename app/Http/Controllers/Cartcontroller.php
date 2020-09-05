<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
Session_start();

class Cartcontroller extends Controller
{
    public function save_cart(Request $Request)
    {
    	$productID=$Request->productID_hidden;
    	$quantity=$Request->qty;
    	$product_info=DB::table('tbl_product')->where('product_id',$productID)->first();
    	$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
    	$data['id']=$product_info->product_id;
    	$data['qty']=$quantity;
    	$data['name']=$product_info->product_name;
    	$data['price']=$product_info->product_price;
    	$data['weight']=$product_info->product_price;;
    	$data['options']['image']=$product_info->product_image;
    	Cart::add($data);

    	return Redirect::to('/gio-hang');
    }
    public function show_cart()
    {
    	$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
    	return view('pages.cart.show_cart')->with('brand',$brand_product);
    }   
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/gio-hang');
    }
    public function update_cart(Request $Request)
    {
        $rowId=$Request->rowId_cart;
        $qty=$Request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/gio-hang');
    }
}
