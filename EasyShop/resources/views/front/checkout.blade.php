@extends('front.master')

@section('content')
<section id="cart_items">
    <?php if ($cartItems->isEmpty()) { ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div align="center">  <img src="{{asset('theme/images/cart/empty-cart.png')}}"/></div>

        </div>
    </section> <!--/#cart_items-->
    <?php } else { ?>
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Checkout</h2>
        </div>




        <?php // form start here 
        ?>
        @if($errors->first('city'))
            <div class="alert alert-info">  
                <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                {{$errors->first('city')}}
            
            </div>
        @endif
        @if($errors->first('fullname'))
            <div class="alert alert-info">  
                <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                {{$errors->first('fullname')}}
            
            </div>
        @endif
        @if($errors->first('reciept_img'))
            <div class="alert alert-info">  
                <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                {{$errors->first('reciept_img')}}
            
            </div>
        @endif
        <form action="{{url('/')}}/formvalidate" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <h2>Shopper Information</h2>
                        @if(count($profile_address) > 0)
                            @foreach($profile_address as $address)
                            <hr>
                            <input type="text" name="fullname"  placeholder="Full Name" class="form-control"  value="{{$address->fullname}}" required>

                            <span style="color:red">{{ $errors->first('fullname') }}</span>

                            <hr>

                            <select name="country" class="country form-control" required>
                                @if(!$address->name == '' || !$address->name == '0' || !$address->name == 'null')
                                    <option value="0" selected="true" disabled="true">{{$address->name}}</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                @else
                                    <option value="0" selected="true" disabled="true">Select Province</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span style="color:red">{{ $errors->first('country') }}</span>
                            <hr>
                            <select name="state" class="state form-control" required>
                                @if(!$address->city_mun == '' || !$address->city_mun == '0' || !$address->city_mun == 'null')
                                    <option value="0" disabled="true" selected="true">{{$address->city_mun}}</option>
                                @else
                                    <option value="0" disabled="true" selected="true">Select City/Municipal</option>
                                @endif
                            </select>

                            <span style="color:red">{{ $errors->first('state') }}</span>

                            <hr>
                            <select name="city" class="city form-control" required>
                                @if(!$address->baranggay == '' || !$address->baranggay == '0' || !$address->baranggay == 'null')
                                    <option value="{{$address->address_id}}" selected="true">{{$address->baranggay}}</option>
                                @else
                                    <option value="0" disabled="true" selected="true">Select Baranggay</option>
                                @endif
                            </select>

                            <span style="color:red">{{ $errors->first('city') }}</span>

                            <hr>
                            <input type="text" placeholder="Zip" name="pincode" class="pincode form-control" value="{{$address->zip}}">

                            <span style="color:red">{{ $errors->first('pincode') }}</span>
                            @endforeach
                        @else
                            <hr>
                            <input type="text" name="fullname"  placeholder="Full Name" class="form-control"  value="{{old('fullname')}}" required>

                            <span style="color:red">{{ $errors->first('fullname') }}</span>

                            <hr>

                            <select name="country" class="country form-control" required>
                                <option value="{{ old('country') }}" selected="true" disabled="true">Select Province</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                            <span style="color:red">{{ $errors->first('country') }}</span>
                            <hr>
                            <select name="state" class="state form-control" required>

                                <option value="0" disabled="true" selected="true">Select City/Municipal</option>
                            </select>

                            <span style="color:red">{{ $errors->first('state') }}</span>

                            <hr>
                            <select name="city" class="city form-control" required>
                                <option value="0" disabled="true" selected="true">Select Baranggay</option>
                            </select>

                            <span style="color:red">{{ $errors->first('city') }}</span>

                            <hr>
                            <input type="text" placeholder="Zip" name="pincode" class="pincode form-control" value="{{ old('pincode') }}">

                            <span style="color:red">{{ $errors->first('pincode') }}</span>
                            
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <h2>Upload Reciept</h2>
                            <h4>First</h4>
                            <h5>Pay: Any of these remittance</h5>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="social-icons pull-right">
                                            <ul class="nav navbar-nav">
                                                <li><a><img style="margin-right: 1em; width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/rd.png') }}"></a></li>
                                                <li><a><img style="margin-right: 1em; width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/palawan.jpeg') }}"></a></li>
                                                <li><a><img style="margin-right: 1em; width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/lbc.jpeg') }}"></a></li>
                                                <li><a><img style="width: 55px; height: 47px;" src="{{ asset('/theme/images/cart/ml.png') }}"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="social-icons pull-right">
                                            <ul class="nav navbar-nav">
                                                <li><a><img style="margin-right: 1em; width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/cebuana.png') }}"></a></li>
                                                <li><a><img style="margin-right: 1em; width: 55px; height: 47px;" src="{{ asset('/theme/images/cart/western.png') }}"></a></li>
                                                <li><a><img style="margin-right: 1em; width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/gcash.png') }}"></a></li>
                                                <li><a><img style="width: 50px; height: 47px;" src="{{ asset('/theme/images/cart/smart.png') }}"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 style="margin-bottom: .09em;">To:</h5>
                            <p style="font-size: 1.11em; margin-bottom: .1em;">Name: Tingson</p>
                            <p style="font-size: 1.11em; margin-bottom: .1em;">Address: Masao Tungwan Zamboanga Sibugay, 7018</p>
                            <p style="font-size: 1.11em; margin-bottom: .1em;">Phone: 09454545454</p>
                            <p style="font-size: 1.11em;">E-mail: tingson_shit@gmail.com</p>
                            <h4>Then</h4>
                            <h5>Take A Clear Photo Of The Reciept And Upload</h5>
                            <input type="file" name="reciept_img" class="form-control">
                            <span style="color:red">{{ $errors->first('reciept_img') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        <?php // form end here
        ?>

        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $cartItem)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img style="height: 50px; height: 50px;" src="{{ asset('public/products/small') }}/{{$cartItem->options->img}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cartItem->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>₱ {{number_format($cartItem->price, 2, '.', ',')}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <input class="cart_quantity_input" type="text"  value="{{$cartItem->qty}}" readonly="readonly" size="2">

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">₱ {{number_format($cartItem->subtotal, 2, '.', ',')}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{url('/cart/remove')}}/{{$cartItem->rowId}}"><i class="fa fa-times"></i></a>

                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            @if(count($profile_address) > 0)
                            @foreach($profile_address as $address)
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>₱ {{number_format(Cart::subtotal(), 2), '.', ','}}</td>
                                </tr>
                                <tr>
                                    <td> VAT</td>
                                    <td>₱ {{Cart::tax()}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping</td>
                                    @if(!$address->shipping_fee == '' || !$address->shipping_fee == '0' || !$address->shipping_fee== 'null')
                                    <td class="shipping_fee">₱ {{number_format($address->shipping_fee, 2, '.', ',')}}</td>
                                    @else
                                    <td class="shipping_fee">₱ 0.00</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span class="total">₱ {{number_format(Cart::total() + $address->shipping_fee, 2, '.', ',')}}</span></td>
                                </tr>
                            </table>
                            <input type="hidden" id="fee" name="shipping_fee" value="{{$address->shipping_fee}}">
                            @endforeach
                            @else
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>₱ {{Cart::subtotal()}}</td>
                                </tr>
                                <tr>
                                    <td> VAT</td>
                                    <td>₱ {{Cart::tax()}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping</td>
                                    <td class="shipping_fee">₱ 0.00</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span class="total">₱ {{Cart::total()}}</span></td>
                                </tr>
                            </table>
                            <input type="hidden" id="fee" name="shipping_fee" value="">
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="container">
        
        <div class="col-sm-10">
            
        </div>
        <div class="payment-options">
            <span>
                <input type="hidden" name="pay" value="Padala" checked="checked" id="cash">

            </span>
            <span>
            <input type="submit" value="Place Order(s)" class="btn btn-primary" id="cashbtn">
            </span>
        </div>
        </div>
    </div>

      </form>





        <script>
            $(document).ready(function(){
                $(document).on('change','.country',function(){
                    console.log('changed');
                    var cat_id=$(this).val();
                    // console.log(cat_id);
                    var div=$(this).parent();

                    var op=" ";

                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findlocation_mun')!!}',
                        data:{'id':cat_id},
                        success:function(data){
                            //console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            op+='<option value="0" selected disabled>Choose City/Municipal</option>';
                            for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].city_mun+'</option>';
                           }

                           div.find('.state').html(" ");
                           div.find('.state').append(op);
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('change','.state',function(){
                    console.log('changed');
                    var af=$(this).val();
                    // console.log(cat_id);
                    var ag=$(this).parent();

                    var ad=" ";

                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findlocation_bar')!!}',
                        data:{'id':af},
                        success:function(data){
                            //console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            ad+='<option value="0" selected disabled>Choose Baranggay</option>';
                            for(var i=0;i<data.length;i++){
                            ad+='<option value="'+data[i].id+'">'+data[i].baranggay+'</option>';
                           }

                           ag.find('.city').html(" ");
                           ag.find('.city').append(ad);
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('change','.city',function () {
                var marv = $('.shipping').text();
                console.log(marv);
                var prod_id=$(this).val();

                var a=$(this).parent();
                console.log(prod_id);
                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findlocation_zip')!!}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        // console.log("price");

                        console.log(data.zip);
                        console.log(data.shipping_fee);
                        $('#fee').val(data.shipping_fee);
                        // var subtotal = parseFloat('{{Cart::subtotal()}}'.replace(/,/g, ''));
                        var result = {{Cart::subtotal()}} + data.shipping_fee;
                        console.log(result.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                        var result_type = result.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                        var shipping_type = data.shipping_fee.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                        // marv = data.shipping_fee;
                        $('.shipping_fee').text('₱ ' + shipping_type);
                        $('.total').text('₱ ' + result_type);
                        

                        // here price is coloumn name in products table data.coln name

                        a.find('.pincode').val(data.zip);

                    },
                    error:function(){

                    }
                });


        });
            });
           
        </script>
    <?php } ?>
</section> <!--/#cart_items-->


@endsection
