@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <div class="panel-body">
                <?php
                $message =Session::get('message');
                if($message)
                {
                    echo $message;
                    Session::put('message',null);
                }
                ?>
                @foreach($edit_product as $key => $product)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data"> 
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file"  name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('public/upload/imageProduct/'.$product->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" value="{{$product->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name='product_brand'class="form-control input-lg m-bot15">
                                @foreach($brand_product as $key=>$brand)
                                @if($brand->brand_id==$product->brand_id)
                                <option  selected value="{{$brand->brand_id}}"> {{$brand->brand_name}} 
                                </option>
                                @else
                                <option value="{{$brand->brand_id}}"> {{$brand->brand_name}} 
                                </option>
                                @endif
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày</label>
                            <input type="date" value="{{$product->product_date}}" name="product_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea type="resize:none" rows="10" name="product_desc" class="form-control" id="exampleInputPassword1">{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea type="resize:none" rows="10" name="product_content" class="form-control" id="exampleInputPassword1" >{{$product->product_content}}</textarea>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach()
                </div>
            </div>
        </section>
    </div>
@endsection()