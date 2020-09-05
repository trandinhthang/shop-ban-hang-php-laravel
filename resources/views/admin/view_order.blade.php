@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID khách hàng</th> 
            <th>Tên nhận hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($detail_order as $key=> $d_order)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{($d_order->customer_id)}}</td>
            <td>{{($d_order->shipping_name)}}</td> 
            <td>{{($d_order->shipping_phone)}}</td> 
            <td>{{($d_order->shipping_address)}}</td>  
            <td>{{($d_order->product_name)}}</td>
            <td>{{($d_order->product_quantity)}}</td>           
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