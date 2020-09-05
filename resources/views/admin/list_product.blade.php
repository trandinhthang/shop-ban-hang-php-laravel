@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <?php
      $message1 =Session::get('message');
      if($message1)
      {
        echo $message1;
        Session::put('message',null);
      }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hình sản phẩm</th>
            <th>Thương hiệu sản phẩm</th>
            <th>Ngày thêm</th>
            <th>Sửa/xóa</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_product as $key=> $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_price}}</td>
            <td><img src="public/upload/imageProduct/{{$product->product_image}}" height="100" width="100"> </td>
            <td>{{$product->brand_name}}</td>
            <td>{{$product->product_date}}</td>
            <td>
              <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-check text-success text-active"></i></a>
                <a href="{{URL::to('/delete-product/'.$product->product_id)}}" onclick="return confirm('Bạn có muốn xóa thương hiệu này ?')" class="active styling-delete" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <footer class="panel-footer">
          <div class="row">
          </div>
        </footer>
    </div>
</div>
@endsection()