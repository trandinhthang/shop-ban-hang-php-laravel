@extends('layout')

@section('content')
<div class="features_items"><!--features_items-->
  @foreach($brand_name as $key =>$name_brand)
  <h2 class="title text-center"><br>{{$name_brand->brand_name}} </h2>
  @endforeach()

  @foreach($brand_by_id as $key =>$value_product)
  <a href="{{URL::to('/chi-tiet-san-pham/'.$value_product->product_id)}}">    
    <div class="col-sm-4">
      <div class="product-image-wrapper">
        <div class="single-products">
          <div class="productinfo text-center">
            <img src="{{URL::to('public/upload/imageProduct/'.$value_product->product_image)}}" alt="" />
            <h5><br><font color="black" > {{$value_product->product_name}}</font> </h5>
            <h2>{{number_format($value_product->product_price).' VND'}}</h2>
            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
          </div>
        </div>
        <div class="choose">
          <ul class="nav nav-pills nav-justified">
            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
            <li><a href="#"><i class="fa fa-plus-square"></i>Đánh giá</a></li>
          </ul>
        </div>
      </div>
    </div> 
  </a>  
  @endforeach()                
</div><!--features_items-->
@endsection()