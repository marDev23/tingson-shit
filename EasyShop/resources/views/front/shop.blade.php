@extends('front.master')

@section('content')
<script>
$(document).ready(function(){
<?php $maxP = count($Products);
  for($i=0;$i<$maxP; $i++) {?>
    $('#successMsg<?php echo $i;?>').hide();
    $('#cartBtn<?php echo $i;?>').click(function(){
      var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();

      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/addItem');?>/'+ pro_id<?php echo $i;?>,
        success:function(){
        $('#cartBtn<?php echo $i;?>').hide();
        $('#successMsg<?php echo $i;?>').show();
        $('#successMsg<?php echo $i;?>').append('Product Added');
        setTimeout(function() {// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
            }, 100); 
        }
      });

    });
    <?php }?>
});
</script>
{{-- <section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">{{$}}</li>
            </ol>
        </div>
        <div align="center">  <img src="{{asset('theme/images/cart/empty-cart.png')}}"/></div>

    </div>
</section> <!--/#cart_items--> --}}
<section id="advertisement">
    <div class="container">
      <h3 align="center">Products</h3>
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

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{url('../')}}/theme/images/home/blahh.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
          </div>

            <div class="col-sm-9 padding-right"  id="updateDiv" >

                 <div class="features_items"> <!--features_items marvin-->
                      <b> Total Products</b>:  {{$Products->total()}}
                    <h2 class="title text-center">
                       <?php
                        if (isset($msg)) {
                            echo $msg;
                        } else {
                            ?> Features Item <?php } ?> </h2>

                    <?php if ($Products->isEmpty()) { ?>
                        sorry, products not found
                    <?php } else {
                      $countP=0;?>
                        @foreach($Products as $product)
                        <input type="hidden" id="pro_id<?php echo $countP;?>" value="{{$product->id}}"/>
                        <div class="col-sm-4" >
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{url('/product_details')}}">
                                            <img src="{{ asset('upload/images/large') }}/<?php echo $product->pro_img; ?>" alt="" />
                                        </a>

                                        <h2 id="price">
                                          @if($product->spl_price==0)
                                          ₱{{$product->pro_price}}
                                          @else
                                          <img src="{{ asset('theme/images/shop/sale.png') }}" style="width:60px"/>
                                        <span style="text-decoration:line-through; color:#ddd">
                                           ₱{{$product->pro_price}} </span>
                                           ₱{{$product->spl_price}}
                                          @endif

                                        </h2>

                                        <p><a href="{{url('/product_details')}}"><?php echo $product->pro_name; ?></a></p>
                                        <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <a href="{{url('/product_details')}}/<?php echo $product->id; ?>">
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>
                                                  @if($product->spl_price==0)
                                                  ₱{{$product->pro_price}}
                                                  @else
                                                <img src="{{ asset('theme/images/shop/sale.png') }}" style="width:60px"/>
                                                <span style="text-decoration:line-through; color:#ddd">
                                                   ₱{{$product->pro_price}} </span>
                                                   ₱{{$product->spl_price}}
                                                  @endif
                                                </h2>
                                                <p><?php echo $product->pro_name; ?></p>
                                                <a href="{{url('/cart/addItem')}}/<?php echo $product->id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div></a>
                                    </div>

                                </div>
                                <div class="choose">
                                    @if (Auth::check())
                                    <?php
                                    $wishData = DB::table('wishlist')->leftJoin('products', 'wishlist.pro_id', '=', 'products.id')->where('wishlist.pro_id', '=', $product->id)->get();
                                    $count = App\wishList::where(['pro_id' => $product->id])->count();
                                    ?>

                                    <?php if ($count == "0") { ?>
                                        <form action="{{url('/addToWishList')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$product->id}}" name="pro_id"/>
                                            <p align="center">
                                                <input type="submit" value="Add to WishList" class="btn btn-primary"/>
                                            </p>
                                        </form>
                                    <?php } else { ?>
                                        <h5 style="color:green"> Added to <a href="{{url('/WishList')}}">Wishlist</a></h5>
                                    <?php } ?>
                                    @else
                                    <form action="{{url('/addToWishList')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$product->id}}" name="pro_id"/>
                                            <p align="center">
                                                <input type="submit" value="Add to WishList" class="btn btn-primary"/>
                                            </p>
                                        </form>
                                    @endif
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <?php $countP++?>
                        
                    <?php } ?>


                </div>
                <ul class="pagination">
                    {{ $Products->links()}}
                </ul>
            </div>

        </div>
    </div>
</div>
</section>
@endsection
