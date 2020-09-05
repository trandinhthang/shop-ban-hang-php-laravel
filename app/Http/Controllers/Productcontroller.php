<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();
//Admin Page
class Productcontroller extends Controller
{
    public function add_product()
    {
    	$brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
    	return view('admin.add_product')->with('brand_product',$brand_product);
    }
    public function list_product()
    {
    	$list_product =DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
    	$manager_product=view('admin.list_product')->with('list_product',$list_product);

    	return view('admin_layout')->with('admin.list_product',$manager_product);
    }
    public function save_product(Request $Request )
    {
    	$data =array();
    	$data['product_name']=$Request->product_name;
    	$data['product_desc']=$Request->product_desc;
    	$data['product_content']=$Request->product_content;
    	$data['product_price']=$Request->product_price;
    	$data['product_date']=$Request->product_date;
    	$data['brand_id']=$Request->product_brand;
    	$get_image=$Request->file('product_image');
    	if($get_image)
    	{
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/imageProduct',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');

            return Redirect::to('/add-product');
        }  
    }
    public function edit_product($product_id)
    {
        $brand_product=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
        $edit_product =DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product=view('admin.edit_product')
        ->with('edit_product',$edit_product)->with('brand_product',$brand_product);

        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $Request,$product_id)
    {
        $data =array();
        $data['product_name']=$Request->product_name;
        $data['product_desc']=$Request->product_desc;
        $data['product_content']=$Request->product_content;
        $data['product_price']=$Request->product_price;
        $data['product_date']=$Request->product_date;
        $data['brand_id']=$Request->product_brand;
        $get_image=$Request->file('product_image');
        if($get_image)
        {
            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.', $get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/imageProduct',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$product_id) ->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');

            return Redirect::to('/list-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id) ->update($data);
        DB::table('tbl_product')->insert($data);
        Session::put('message','Cập nhật sản phẩm thành công');

        return Redirect::to('/list-product');
    }
    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');

        return Redirect::to('list-product');
    }
    //Home Details 
    public function detail_product($product_id)
    {
        $brand_product=DB::table('tbl_brand_product')
        -> orderby('brand_id','desc') ->get();
        $detail_product =DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        foreach($detail_product as $key => $value)
        {
            $brand_id=$value->brand_id;
        }
        $related_product =DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_brand_product.brand_id','=','tbl_product.brand_id')
        ->where('tbl_brand_product.brand_id',$brand_id)
        ->wherenotin('tbl_product.product_id',[$product_id])  ->limit(1)->get();
        
        return view('pages.product.show_detail')->with('brand',$brand_product)->with('product_detail',$detail_product)->with('related',$related_product);
    }
}
