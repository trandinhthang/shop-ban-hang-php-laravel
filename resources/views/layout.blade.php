<!DOCTYPE html>

<html lang="en">

<head>
   <meta charset="utf-8">   
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Home | Shop Công Nghệ</title>
   <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">     
   <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
   <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
   <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header--> 
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{('public/frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>  
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{URL::to('/dang-nhap-thanh-toan')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <li><a href="{{URL::to('/dang-nhap-thanh-toan')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <li><a href="{{URL::to('/dang-xuat')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle--> 
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trangchu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Điện thoại<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">iPhone</a></li>
                                        <li><a href="#">Samsung</a></li> 
                                        <li><a href="#">OPPO</a></li> 
                                        <li><a href="#">Vivo</a></li> 
                                        <li><a href="#">Nokia</a></li> 
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Laptop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Macbook</a></li>
                                        <li><a href="#">Dell</a></li> 
                                        <li><a href="#">Lenovo</a></li> 
                                        <li><a href="#">HP</a></li> 
                                        <li><a href="#">Asus</a></li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Phụ kiện<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="#">Tai nghe</a></li>
                                        <li><a href="#">Sạc sự phòng</a></li> 
                                        <li><a href="#">Ốp lưng</a></li>
                                        <li><a href="#">Thẻ nhớ</a></li> 
                                        <li><a href="#">Phụ kiện khác</a></li> 
                                    </ul>
                                </li> 
                                <li class=""><a href="{{URL::to('/gio-hang')}}">Giỏ hàng<i class=""></i></a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{ csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                                <button  type="submit" name="search_items " class="btn btn-warning " >Tìm kiếm </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->  
    </header><!--/header-->

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">

                                <div class="col-sm-5">
                                    <h2><font size='10'  color="Darkorange">I-SHOP </font> </h2>
                                    <h2><font  color="Darkorange"> UY TÍN-CHẤT LƯỢNG </font> </h2>

                                    <p>Shop công nghệ uy tín hàng đầu Việt Nam<br> Chất lượng sản phẩm đảm bảo 100%<br> Giao hàng toàn quốc</p>
                                    <button type="button" class="btn btn-danger get">Hãy đến với chúng tôi</button>
                                </div>
                                <div class=" col-sm-6 ">
                                    <img src="" class="img-responsive " alt="" />
                                </div>

                            </div>
                            <div class="item  ">
                                <div class="col-sm-5">
                                    <h2><font size='10'  color="Darkorange">I-SHOP </font> </h2>
                                    <h2><font  color="Darkorange"> UY TÍN-CHẤT LƯỢNG </font> </h2>

                                    <p>Shop công nghệ uy tín hàng đầu Việt Nam<br> Chất lượng sản phẩm đảm bảo 100%<br> Giao hàng toàn quốc</p>
                                    <button type="button" class="btn btn-danger get">Hãy đến với chúng tôi</button>
                                </div>
                                <div class=" col-sm-6 ">
                                    <img src="" class="img-responsive " alt="" />

                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-5">
                                    <h2><font size='10'  color="Darkorange">I-SHOP </font> </h2>
                                    <h2><font  color="Darkorange"> UY TÍN-CHẤT LƯỢNG </font> </h2>

                                    <p>Shop công nghệ uy tín hàng đầu Việt Nam<br> Chất lượng sản phẩm đảm bảo 100%<br> Giao hàng toàn quốc</p>
                                    <button type="button" class="btn btn-danger get">Hãy đến với chúng tôi</button>
                                </div>
                                <div class=" col-sm-6 ">
                                    <img src="" class="img-responsive " alt="" />  
                                </div>
                            </div>

                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>    
                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">     
                        <div class="brands_products"><!--brands_products-->
                            <h2><br>THƯƠNG HIỆU</h2>
                            <div class="brands-name">
                                @foreach($brand as $key => $value_brand)  
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$value_brand->brand_id)}}"><span class="pull-right"></span>{{$value_brand->brand_name}} </a></li>   
                                </ul>
                                @endforeach()
                            </div>
                        </div><!--/brands_products-->
                    </div>
                </div>                
                <div class="col-sm-9 padding-right">
                   @yield('content')   
                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2>SHOP CONG NGHE</h2>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="" alt="" />
                                    </div>     
                                </a>
                                <p>Giao hàng hoả tốc <br> trong 1 giờ</p>
                            </div>
                        </div>                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="" alt="" />
                                    </div>                                    
                                </a>
                                <p>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</p>                                
                            </div>
                        </div>                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="" alt="" />
                                    </div> 
                                </a>
                                <p>Trải nghiệm sản phẩm <br> tại nhà</p> 
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Lỗi đổi tại nhà trong 1 ngày</p>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>              
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2019 Công ty cổ phần Hai thành viên</p>
                    <p class="pull-right">Designed by <span><a target="_blank">Tran Dinh Thang-Hoàng Phi Long</a></span></p>
                </div>
            </div>
        </div>      
    </footer><!--/Footer-->
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>    
</body>

</html>