@extends('layout')

@section('content')
@foreach($product_detail as $key =>$value_detail)
<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img src="{{URL::to('/public/upload/imageProduct/'.$value_detail->product_image)}}" alt="" />			
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="{{URL::to('/public/frontend/images/new.jpg')}}" class="newarrival" alt="" />
			<h2>{{$value_detail->product_name }} </h2>
			<p>ID PRODUCT: {{$value_detail->product_id }}</p>
			<img src="{{URL::to('/public/frontend/images/rating.jpg')}}" alt="" />
			<form action="{{URL::to('/add-to-cart')}}" method="POST">
				{{ csrf_field() }}
				<span>
					<span>{{number_format($value_detail->product_price).' VND'}}</span>
					<label>Số lượng:</label>
					<input name="qty" type="number" min=1 value="1" />
					<input name="productID_hidden" type="hidden" value="{{$value_detail->product_id}}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Thêm vào giỏ hàng
					</button>
				</span>
			</form>
			<p><b>Tình trạng:</b> Còn hàng</p>
			<p><b>Chất lượng:</b> Mới </p>
			<p><b>Thương hiệu:</b> {{$value_detail->brand_name}}</p>
			<a href=""><img src="{{URL::to('/public/frontend/images/share.png')}}" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
</div><!--/product-details-->
					
<div class="category-tab shop-details-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#contentP" data-toggle="tab">Thông tin sản phẩm</a></li>
			<li  ><a href="#descripP" data-toggle="tab">Chi tiết sản phẩm</a></li>
			<li><a href="#ratingP" data-toggle="tab">Đánh giá & Nhận xét</a></li>
			<li ><a href="#questionP" data-toggle="tab">Hỏi & Đáp</a></li>		
		</ul>
	</div>
	<div class="tab-content ">
		<div class="tab-pane fade active in" id="contentP" >
			<p>{{$value_detail->product_content}}</p>
		</div>

		<div class="tab-pane fade " id="descripP" >
			<p>{{$value_detail->product_desc}}</p>
		</div>
		<div class="tab-pane fade" id="ratingP" >
			<div class="col-sm-12">
				<p><b>Hãy gửi đánh giá và nhận xét của bạn</b></p>
				<form action="#">
					<span>
						<input type="text" placeholder="Tên khách hàng"/>
						<input type="email" placeholder="Địa chỉ Email"/>
					</span>
					<textarea name="" ></textarea>
					<b>Đánh giá: </b> <img src="{{URL::to('/public/frontend/images/rating.jpg')}}" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Gửi đi
					</button>
				</form>
			</div>
		</div>
		<div class="tab-pane fade " id="questionP" >
			<div class="col-sm-12">
				<p><b>Câu hỏi của bạn</b></p>
				<form action="#">
					<span>
						<input type="text" placeholder="Tên khách hàng"/>
						<input type="email" placeholder="Địa chỉ Email"/>
					</span>
					<textarea name="" ></textarea>
					<button type="button" class="btn btn-default pull-right">
						Gửi đi
					</button>
				</form>
			</div>
		</div>
	</div>
</div><!--/category-tab-->
@endforeach()					
<div class="recommended_items"><!--recommended_items-->
	<h2 class="title text-center" >  <br>SẢN PHẨM GỢI Ý</h2>
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">
				@foreach($related as $key =>$value_related)							
				<div class="col-sm-4">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to('/public/upload/imageProduct/'.$value_related->product_image)}}" alt="" />
								<h5><br><font color="black" > {{$value_related->product_name}}</font> </h5>
								<h2>{{number_format($value_related->product_price).' VND'}}</h2>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
				@endforeach()
			</div>
		</div>
		<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
</div><!--/recommended_items-->		
@endsection()