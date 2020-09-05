@extends('layout')

@section('content')
<section id="cart_items">
	<div class="">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng của bạn</li>
			</ol>
		</div>
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
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="">

		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{(cart::subtotal())}}</span></li>
						<li>Thuế VAT <span>{{(cart::tax())}}</span></li>
						<li>Phí vận chuyển <span>0</span></li>
						<li>Thành tiền <span>{{(cart::total())}}</span></li>
					</ul>
					<a class="btn btn-default check_out" href="{{URL::to('/dang-nhap-thanh-toan')}}">Thanh toán</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection()
