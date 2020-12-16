<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >  -->
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/style1.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/sweetalert.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{('public/fontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{('public/fontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{('public/fontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
        href="{{('public/fontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="#"><img src="{{('public/fontend/images/trangchu/logo.webp')}}" alt="" style="width: 150px;"/></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">

                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <?php
                                    $customer_id = session()->get('customer_id');
                                    $shipping_id = session()->get('shipping_id');
                                    if($customer_id!=NULL){

                                ?>
                                    <li><a href="{{route('checkout') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>

                                <?php
                                    }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                        ?>
                                         <li><a href="{{route('payment') }}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                                    <?php
                                    }else{
                                ?>
                                     <li><a href="{{route('login-checkout') }}"><i class="fa fa-lock"></i> Thanh toán</a></li>
                                <?php
                                    }
                                ?>
                                <li><a href="{{route('show-cart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <?php
                                    $customer_id = session()->get('customer_id');
                                    if($customer_id!=NULL){

                                ?>
                                      <li><a href="{{route('logout-checkout') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>

                                <?php
                                    }else{
                                ?>
                                     <li><a href="{{route('login-checkout') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>

                                </li>
                                <li><a href="{{ route('show-cart') }}">Giỏ hàng</a></li>
                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ route('tim-kiem') }}" method="POST">
                            @csrf
                            <div class="search pull-right">
                                <input type="text" name="keyword_submit" placeholder="Tìm kiếm..."/>
                                <input type="submit" name="search_item" class="btn btn-info btn-sm"  placeholder="">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                            <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/trangchu/silde2.webp')}}" class="girl img-responsive"
                                        alt="" />
                                    <!-- <img src="{{('public/fontend/images/home/pricing.png')}}" class="pricing" alt="" /> -->
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/trangchu/silde1.webp')}}" class="girl img-responsive"
                                        alt="" />
                                    <!-- <img src="{{('public/fontend/images/home/pricing.png')}}" class="pricing" alt="" /> -->
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                        <img src="{{('public/fontend/images/trangchu/silde2.webp')}}" class="girl img-responsive"
                                            alt="" />
                                        <!-- <img src="{{('public/fontend/images/home/pricing.png')}}" class="pricing" alt="" /> -->
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{('public/fontend/images/trangchu/silde1.webp')}}" class="girl img-responsive"
                                            alt="" />
                                        <!-- <img src="{{('public/fontend/images/home/pricing.png')}}" class="pricing" alt="" /> -->
                                    </div>
                                </div>
                            </div>

                            <div class="item">

                                <!-- <div class="col-sm-6">
                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>Free Ecommerce Template</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/home/girl3.jpg')}}" class="girl img-responsive"
                                        alt="" />
                                    <img src="{{('public/fontend/images/home/pricing.png')}}" class="pricing" alt="" />
                                </div> -->
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
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 ">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->

                            @foreach($category as $key => $cate)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">
                                    {{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li><a href="{{url('danh-muc-thuong-hieu/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--/brands_products-->

                        <!-- <div class="price-range">
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div> -->

                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="{{('public/fontend/images/trangchu/logo1.webp')}}" alt="" style="width: 270px; height:380px " />
                        </div>
                        <!--/shipping-->

                    </div>
				</div>
				<div class="col-sm-9 padding-right">
                	@yield('content')
            	</div>

            </div>



        </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span></span>Routine</h2>
                            <p>Hệ thống thời trang nam</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/fontend/images/trangchu/crop1.webp')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/fontend/images/trangchu/crop2.webp')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/fontend/images/trangchu/logo1.webp')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/fontend/images/trangchu/crop1.webp')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{('public/fontend/images/home/map.png')}}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Công Ty</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Giới Thiệu Về Routine</a></li>
                                <li><a href="#">Tuyển Dụng</a></li>
                                <li><a href="#">Hệ Thống Cửa Hàng</a></li>
                                <li><a href="#">Chăm Sóc Khách Hàng</a></li>
                                <li><a href="#">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Chính Sách Khách Hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Chính Sách Khách Hàng Thân Thiết</a></li>
                                <li><a href="#">Chính Sách Đổi Trả</a></li>
                                <li><a href="#">Chính Sách Bảo Hàng</a></li>
                                <li><a href="#">Câu Hỏi Thường Gặp</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Kết nối với Routine</h2>
                            <ul class="nav nav-pills nav-stacked" >
                                <li><a href="#"><img src="{{('public/fontend/images/trangchu/fb.webp')}}"  alt="">
                                <img src="{{('public/fontend/images/trangchu/ins.webp')}}" style="padding-left:15px;">
                                <img src="{{('public/fontend/images/trangchu/youtube.webp')}}" style="padding-left:15px;" alt="" >
                                <img src="{{('public/fontend/images/trangchu/zalo.webp')}}" alt="" style="width:45px;padding-left:15px;"></a></li>
                                <li><a href="#"> <img src="{{('public/fontend/images/trangchu/note.webp')}}" alt="" style="width:150px; "> </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Thông Tin Cửa Hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Routine Thanh Xuân</a></li>
                                <li><a href="#">Routine Đống Đa</a></li>
                                <li><a href="#">Routine Hai Bà Trưng</a></li>
                                <li><a href="#">Routine Cầu Giấy</a></li>
                                <li><a href="#">Routine Aoen Mall Hà Đông</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">ROUTINE CO ,. LTD | Mã Số Thuế: 0106486365 | Văn Phòng: Tầng 10 Tòa Nhà IMC, 62 Trần Quang Khải, Phường Chương Dương, Quận Hoàn Kiếm, Tp.Hà Nội</p>
                    <p class="pull-right">Designed by<span><a target="_blank"
                                href="#">Quang Tran</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->
    <script src="{{asset('public/fontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>

    <script type="text/javascript">
            $(document).ready(function(){
                $('.add-to-cart').click(function(){
                    var id = $(this).data('id_product');
                    var cart_product_id = $('.cart_product_id_' + id).val();
                    var cart_product_name = $('.cart_product_name_' + id).val();
                    var cart_product_image = $('.cart_product_image_' + id).val();
                    var cart_product_price = $('.cart_product_price_' + id).val();
                    var cart_product_qty = $('.cart_product_qty_' + id).val();
                    alert("Bạn đã thêm thành công");
                    //  var _token = $('input[name="_token"]').val();
                    // $.ajax({
                    //     // url: 'http://localhost/shoplaravel/add-cart-ajax' ,
                    //     url: '{{url('/add-cart-ajax')}}',
                    //         method: 'POST',
                    //         data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name, cart_product_image:cart_product_image,
                    //         cart_product_price:cart_product_price, cart_product_qty:cart_product_qty, _token:_token },

                    //         success:function(data){
                    //             console.log(data);
                    //         }

                    // });
                });

            });
    </script>
    <script type="text/javascript">
            $(document).ready(function(){
                $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '' ;
                // alert(action);
                // alert(matp);
                // alert(_token);

                if(action=='city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url: 'http://localhost/shoplaravel/select-delivery-home',
                    method: 'POST',
                    data:{action:action, ma_id:ma_id, _token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid =  $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh == '' && xaid == ''){
                    alert('Bạn cần chọn đầy đủ địa điểm');
                }else{
                    $.ajax({
                    url: 'http://localhost/shoplaravel/calculate-ship',
                    method: 'POST',
                    data:{matp:matp, maqh:maqh, xaid:xaid , _token:_token},
                    success:function(data){
                       location.reload();
                    }
                });
                }

            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.send_order').click(function(){

                var shipping_name = $('.shipping_name').val();
                var shipping_email = $('.shipping_email').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_note = $('.shipping_note').val();
                var order_fee = $('.order_fee').val();
                var cart_quantity_input = $('.cart_quantity_input').val();
                var _token = $('input[name="_token"]').val();
                var shipping_method = $('.payment_select').val();
                // alert(shipping_name);
                // alert(shipping_email);
                // alert(shipping_address);
                // alert(shipping_phone);
                // alert(shipping_note);
                // alert(shipping_order_fee);
                // alert(_token);
                $.ajax({
                    url: 'http://localhost/shoplaravel/confirm-order',
                    method: 'POST' ,
                    data:{shipping_name:shipping_name, shipping_email:shipping_email, shipping_address:shipping_address,
                    shipping_phone:shipping_phone, shipping_note:shipping_note, order_fee:order_fee,
                    _token:_token, shipping_method:shipping_method, cart_quantity_input:cart_quantity_input },
                    success:function(){
                        swal("Đơn hàng!", "Đơn hàng của bạn đã được gửi thành công", "success")
                    }
                });

                window.setTimeout(function(){
                    location.reload();
                },3000);
            });
        });

    </script>
</body>

</html>
