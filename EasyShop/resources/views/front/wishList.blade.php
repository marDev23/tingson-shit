@extends('front.master')

@section('content')


<section id="advertisement">
    <div class="container">
        <img src="{{asset('theme/images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Home Furniture
                                    </a>
                                </h4>
                            </div>
                            <div id="sportswear" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach(App\pro_cat::with('childs')->where('p_id',1)->get() as $cat)
                                          <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Office Furniture
                                    </a>
                                </h4>
                            </div>
                            <div id="mens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach(App\pro_cat::with('childs')->where('p_id',2)->get() as $cat)
                                          <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Decor
                                    </a>
                                </h4>
                            </div>
                            <div id="womens" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach(App\pro_cat::with('childs')->where('p_id',3)->get() as $cat)
                                          <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div><!--/category-productsr-->


                    {{-- <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range--> --}}

                    <div class="shipping text-center"><!--shipping-->
                        <img src="images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">
                        <?php if (isset($msg)) {
                            echo $msg;
                        } else { ?> WishList Item <?php } ?> </h2>

                    <?php if ($Products->isEmpty()) { ?>
                        sorry, products not found
<?php } else { ?>
                    @if(Auth::user())
                        @foreach($Products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}">
                                            <img src="{{ asset('upload/images/large') }}/{{$product->pro_img}}" alt="" />
                                        </a>
                                        <h2>₱<?php echo $product->pro_price; ?></h2>

                                        <p><a href="{{url('/product_details')}}"><?php echo $product->pro_name; ?></a></p>
                                        <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                                    </div>
                                    <a href="{{url('/product_details')}}/<?php echo $product->id; ?>">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>₱<?php echo $product->pro_price; ?></h2>
                                                <p><?php echo $product->pro_name; ?></p>
                                                <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to Cart</a>
                                            </div>
                                        </div></a>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{url('/')}}/removeWishList/{{$product->id}}" style="color:red"><i class="fa fa-minus-square"></i>Remove from Wishlist</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                @else
                    @foreach(Cart::instance('wishlist')->content() as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{url('/product_details')}}">
                                        <img src="{{ asset('upload/images/large') }}/{{$product->options->img}}" alt="" />
                                    </a>
                                    <h2>₱<?php echo $product->price; ?></h2>

                                    <p><a href="{{url('/product_details')}}"><?php echo $product->name; ?></a></p>
                                    <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to cart</a>
                                </div>
                                <a href="{{url('/product_details')}}/<?php echo $product->id; ?>">
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>₱<?php echo $product->price; ?></h2>
                                            <p><?php echo $product->name; ?></p>
                                            <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Move to Cart</a>
                                        </div>
                                    </div></a>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="{{url('/')}}/removeWishList/{{$product->rowId}}" style="color:red"><i class="fa fa-minus-square"></i>Remove from Wishlist</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif


<?php } ?>


                </div>
                <ul class="pagination">
                    {{-- {{ $Products}} --}}
                </ul>
            </div><!--features_items-->
        </div>
    </div>
</div>
</section>



@endsection