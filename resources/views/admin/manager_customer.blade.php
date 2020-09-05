@extends('admin_layout')

@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <font  color="Darkorange"> Tài khoản khách hàng </font>
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
            <th>ID </th> 
            <th>Họ tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_customer as $key=> $customer )
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$customer->customer_id}}</td>
            <td>{{$customer->customer_name}}</td> 
            <td>{{$customer->customer_email}}</td> 
            <td>{{$customer->customer_phone}}</td> 
            <td></td> 
            <td></td>           
            </tr>
            @endforeach()
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