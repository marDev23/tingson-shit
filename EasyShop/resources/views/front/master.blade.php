<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | Tingson Furniture</title>
        <link href="{{asset('theme/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/price-range.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('theme/css/responsive.css')}}" rel="stylesheet">
          <link href="{{asset('theme/css/jquery-ui.css')}}" rel="stylesheet">
        <!--[if lt IE         9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
            <![endif]-->
        <link rel="shortcut icon" href="{{asset('theme/images/ico/favicon.ico')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('../')}}/theme/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('../')}}/theme/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('../')}}/theme/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="{{url('../')}}/theme/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>

<style>
    .brandLi{
        padding:10px;
    }
    .brandLi b{ font-size:16px; color:#FE980F}


    </style>




<script>

    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 100,
            values: [15, 65],
            slide: function (event, ui) {

                $("#amount_start").val(ui.values[ 0 ]);
                $("#amount_end").val(ui.values[ 1 ]);
                var start = $('#amount_start').val();
                var end = $('#amount_end').val();

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "start=" + start + "& end=" + end,
                    success: function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });
            }
        });

        $('.try').click(function(){

            //alert('hardeep');

            var brand = [];
            $('.try').each(function(){
                if($(this).is(":checked")){

                    brand.push($(this).val());
                }
            });
            Finalbrand  = brand.toString();

            $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '',
                    data: "brand=" + Finalbrand,
                    success: function (response) {
                        console.log(response);
                        $('#updateDiv').html(response);
                    }
                });

        });
       });

      <?php $pros = DB::table('products')->get();?>

      $(function(){

         var source = [
             @foreach($pros as $pro)
            { value: "<?php echo url('/');?>/product_details/<?php echo $pro->id;?>",
                label: "<?php echo $pro->pro_name;?>"
            },
            @endforeach

         ];

 $("#proList").autocomplete({

     source: source,
     select: function(event, ui){
         window.location.href = ui.item.value;
     }
 });

      });
</script>

    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            @include('front.top_header')

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{url('/')}}"><img src="{{url('../')}}/theme/images/home/logo.png" alt="" /></a>
                            </div>
                            <div class="btn-group pull-right">
                                <div class="btn-group">
                      
                                </div>

                                <div class="btn-group">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if (Auth::check()) { ?>
                                        <li><a href="{{url('/')}}/profile"><i class="fa fa-user"></i>{{ucwords(Auth::user()->name)}}</a></li>
                                    <?php } ?>
                                    <li><a href="{{url('/WishList')}}"><i class="fa fa-star"></i> Wishlist <span style="color:green; font-weight: bold">(@if(Auth::check())
                                                                         {{App\wishList::count()}}
                                                                         @else
                                                                         0
                                                                         @endif
                                                                        )</span> </a></li>
                                    <li><a href="{{url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                                   <?php
                                   /*<li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i>
                                            Cart <span style="color:green; font-weight: bold">({{Cart::count()}})</span><br>
                                            <p align="center" style="color:green; font-weight:bold">({{Cart::subtotal()}})</p></a>
                                    </li>
                                    */?>


                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-haspopup="true" aria-expanded="true"><i class="fa fa-shopping-cart"></i>
                                            <span class="badge">{{Cart::count()}}</span></a>
                                        <ul class="dropdown-menu" >
                                            <p align="center" class="pull-left"
                                                style="font-weight:bold; margin:5px">
                                                <i class="fa fa-shopping-cart"></i>
                                               <span class="badge">{{Cart::count()}}</span></p>


                                            <p align="center" class="pull-right"
                                                style="font-weight:bold; margin:5px">Total:
                                                <span style="color:green">{{Cart::subtotal()}}</span></p>

                                                 <?php $cartData = Cart::content();?>
                                                  @if(count($cartData)!=0)
                                                    @foreach($cartData as $cartD)
                                                    <div class="col-md-12" style="padding:5px">

                                                        <div class="col-sm-5">
                                                            <img src="{{ asset('upload/images/small') }}/{{$cartD->options->img}}" style="width:80%"/>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <h4 style="margin:0px;">{{$cartD->name}}</h4>
                                                            <p>price: {{$cartD->price}}  qty: {{$cartD->qty}}</p>
                                                        </div>
                                                  </div>
                                                    @endforeach
                                                    <br> <br>
                                                    <div class="row">
                                                        <div class="col-md-5 pull-left">
                                                         <a href="{{url('/checkout')}}"
                                                           style="padding:5px; color:#fff; background-color:orange">Checkout</a>
                                                        </div>

                                                        <div class="col-md-5 pull-right">
                                                            <a href="{{url('/cart')}}"
                                                               style="padding:5px; color:#fff; background-color:blueviolet">View Cart</a>
                                                        </div>
                                                    @endif
                                        </ul>
                                      </li>


                                    <?php if (Auth::check()) { ?>
                                        <li><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                    <?php } else { ?>
                                        <li><a href="{{url('/login')}}"><i class="fa fa-lock"></i> Login</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            @include('front.menu')
        </header><!--/header-->
        @yield('content')

        <footer id="footer"><!--Footer-->

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Where to find us</h2>

                                <p><strong>Tingson Furniture</strong>
                                    <br>Masao
                                    <br>Tungawan
                                    <br>Zamboanga Sibugay
                                    <br>7018
                                    <br>
                                    <strong>Philippines</strong>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Tingson Furniture</h2>

                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2018 Tingson Furniture. All rights reserved.</p>
                    </div>
                </div>
            </div>

        </footer><!--/Footer-->

<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
    </body>
</html>
