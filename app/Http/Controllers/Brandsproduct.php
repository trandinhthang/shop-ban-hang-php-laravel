<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();

class Brandsproduct extends Controller
{
    //Admin
    public function add_brand_product()
    {
    	return view('admin.add_brand_product');
    }
    public function list_brand_product()
    {
    	$list_brand_product =DB::table('tbl_brand_product')->get();
    	$manager_brand_product=view('admin.list_brand_product')->with('list_brand_product',$list_brand_product);

    	return view('admin_layout')->with('admin.list_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $Request )
    {
    	$data =array();
    	$data['brand_name']=$Request->brand_pro_name;
    	$data['brand_desc']=$Request->brand_pro_desc;
    	$data['brand_date']=$Request->brand_pro_date;

    	DB::table('tbl_brand_product')->insert($data);
    	Session::put('message','Thêm thương hiệu sản phẩm thành công');

    	return Redirect::to('/add-brand-product');
    }
    public function edit_brand_product($brand_pro_id)
    {
        $edit_brand_product =DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->get();
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $Request,$brand_pro_id)
    {
        $data =array();
        $data['brand_name']=$Request->brand_pro_name;
        $data['brand_desc']=$Request->brand_pro_desc;
        $data['brand_date']=$Request->brand_pro_date;

        DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');

        return Redirect::to('list-brand-product');
    }
    public function delete_brand_product($brand_pro_id)
    {
        DB::table('tbl_brand_product')->where('brand_id',$brand_pro_id)->delete();
        DB::table('tbl_product')->where('brand_id',$brand_pro_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');

        return Redirect::to('list-brand-product');
    }
    //Home
    public function show_brand_home($brand_id)
    {
        $brand=DB::table('tbl_brand_product')-> orderby('brand_id','desc') ->get();
        $brand_by_id=DB::table('tbl_product')
        ->join('tbl_brand_product','tbl_product.brand_id','=','tbl_brand_product.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name=DB::table('tbl_brand_product')
        -> where('tbl_brand_product.brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('brand',$brand)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
