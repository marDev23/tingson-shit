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
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>




        <?php // form start here 
        ?>
        <form action="{{url('/')}}/formvalidate" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <p>Shopper Information</p>
                            <?php if (empty($profile_address)) { ?>
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

                            
                            <?php } ?>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Upload Reciept</p>
                            <textarea disabled name="message"  placeholder="Please! Provide a clear image of the payment reciept. If you haven't done paying, Please! do pay in your nearest Padala Center. Then take a snap (take photo) of it." rows="6"></textarea>
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
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>₱{{Cart::subtotal()}}</td>
                                </tr>
                                <tr>
                                    <td> Tax</td>
                                    <td>₱{{Cart::tax()}}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><span>₱{{Cart::total()}}</span></td>
                                </tr>
                            </table>
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
