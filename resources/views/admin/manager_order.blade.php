@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
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
            <th>Tổng đơn hàng(VND)</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_order as $key=> $order)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{($order->customer_id)}}</td>
            <td>{{($order->order_total)}}</td>           
            <td>
              <a href="{{URL::to('/delete-order/'.$order->order_id)}}" onclick="return confirm('Bạn có muốn xóa đơn hàng này ?')" class="active styling-delete" ui-toggle-class="">
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