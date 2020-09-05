<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class Homecontroller extends Controller
{
  public function index()
  {
   $brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
   $list_product=DB::table('tbl_product')-> orderby('product_id','desc')->limit(6)->get(); 

   return view('pages.home')->with('brand',$brand_product)->with('product',$list_product);
 }
 public function search(Request $Request)
 {
   $keywords=$Request->keywords_submit;
   $brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
   $search_product=DB::table('tbl_product')
   -> where('product_name','like','%'.$keywords.'%')->limit(6)->get(); 

   return view('pages.product.search')->with('brand',$brand_product)->with('search_product',$search_product);
 }

}
