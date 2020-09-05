@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data"> 
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name='product_brand' class="form-control input-lg m-bot15">
                                @foreach($brand_product as $key=>$brand)
                                <option value="{{$brand->brand_id}}"> {{$brand->brand_name}} 
                                </option>
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày</label>
                            <input type="date" name="product_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea type="resize:none" rows="10" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea type="resize:none" rows="10" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection()