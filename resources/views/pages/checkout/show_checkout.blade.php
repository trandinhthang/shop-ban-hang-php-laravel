@extends('layout')

@section('content')
<section id="cart_items">
	<div class="">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-7 clearfix">
					<div class="bill-to">
						<h3><font color="Darkorange"> Điền thông tin </font></h3>
						<div class="form-one">
							<form action="{{URL::to('/save-checkout')}}" method="POST">
								{{csrf_field()}}
								<input type="text" name="shipping_name" placeholder="Họ và tên">
								<input type="text" name="shipping_phone" placeholder="Số điện thoại">
								<input type="text" name="shipping_email" placeholder="Email">
								<input type="text" name="shipping_address" placeholder="Địa chỉ">		
								<input type="submit" value="Thanh toán" name="send_order" class="btn btn-primary">							
							</form>
						</div>
					</div>
				</div>				
			</div>
		</div>
		<div class="review-cart">
			<h3><font color="Darkorange"> Xem lại giỏ hàng </font></h3>
			<br>
			<div class="table-responsive cart_info">
				<?php
				$content=Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Chi tiết sản phẩm</td>
							<td class="price">Giá (VND)</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền (VND)</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $value_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/upload/imageProduct/'.$value_content->options->image)}}" width="75" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value_content->name}}</a></h4>
								<p>ID:{{$value_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($value_content->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-quantity')}}" method="POST">
										{{ csrf_field()}}
										<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$value_content->qty}}" >
										<input type="hidden" value="{{$value_content->rowId}} "name="rowId_cart" class="form-control">
										<input type="submit" value="cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$total=$value_content->price*$value_content->qty;
									echo number_format($total);
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/xoa-san-pham-gio-hang/'.$value_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach()
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section> 
@endsection()