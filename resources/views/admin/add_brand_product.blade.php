@extends('admin_layout')

@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
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
                    <form role="form"action="{{URL::to('/save-brand-product')}}"method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="brand_pro_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày</label>
                            <input type="date" name="brand_pro_date" class="form-control" id="exampleInputEmail1" placeholder="Ngày">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea type="resize:none" rows="10" name="brand_pro_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                        </div>
                        <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection()