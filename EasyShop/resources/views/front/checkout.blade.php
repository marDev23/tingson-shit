@extends('front.master')

@section('content')

<section id="cart_items">
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
        <form action="{{url('/')}}/formvalidate" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="shopper-info">
                            <p>Shopper Information</p>

                            <input type="text" name="fullname"  placeholder="Display Name" class="form-control"  value="{{ old('fullname') }}">

                            <span style="color:red">{{ $errors->first('fullname') }}</span>
                            <hr>

                            {{-- <input type="text" placeholder="Province" name="province" class="form-control" value="{{ old('state') }}"> --}}
                            <input type="text" placeholder="City/Municipal" name="state" class="form-control" value="{{ old('state') }}">

                            <span style="color:red">{{ $errors->first('state') }}</span>

                            <hr>
                            <input type="text" placeholder="Zip" name="pincode" class="form-control" value="{{ old('pincode') }}">

                            <span style="color:red">{{ $errors->first('pincode') }}</span>

                            <hr>
                            <input type="text" placeholder="Baranggay" name="city" class="form-control" value="{{ old('city') }}">

                            <span style="color:red">{{ $errors->first('city') }}</span>

                            <hr>

                            <select name="country" class="form-control" >
                                <option value="{{ old('country') }}" selected="selected">Select City/Municipal</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                            <span style="color:red">{{ $errors->first('country') }}</span>




                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Shipping Order</p>
                            <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
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
                            <a href=""><img src="{{ asset('upload/images/small') }}/{{$cartItem->options->img}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$cartItem->name}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>₱{{$cartItem->price}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">

                                <input class="cart_quantity_input" type="text"  value="{{$cartItem->qty}}" readonly="readonly" size="2">

                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">₱{{$cartItem->subtotal}}</p>
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
        <div class="payment-options">
            {{-- <span>
                <input type="radio" name="pay" value="COD" checked="checked" id="cash"> COD

            </span> --}}
            <span>
                {{-- <input type="radio" name="pay" value="paypal" id="paypal"> PayPal --}}
                @include('front.paypal')
            </span>

            {{-- <span>
            <input type="submit" value="COD" class="btn btn-primary" id="cashbtn">
            </span> --}}
        </div>
    </div>

      </form>





        {{-- <script>

            $('#paypalbtn').show();
          $('#cashbtn').hide();

            $(':radio[id=paypal]').change(function(){
                $('#paypalbtn').show();
                $('#cashbtn').hide();

            });

              $(':radio[id=cash]').change(function(){
                $('#paypalbtn').hide();
                $('#cashbtn').show();

            });
            </script> --}}
</section> <!--/#cart_items-->


@endsection
