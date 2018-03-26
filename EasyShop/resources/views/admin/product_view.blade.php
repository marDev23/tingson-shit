@extends('admin.master')

@section('content')
<style type="text/css">
  .pro_img img {
    height: 50px;
    width: 50px;
  }
</style>
  <section id="container" class="">
    @include('admin.sidebar')
    <section id="main-content">
            <div class="content-box-large">
                <div class="row">
                  <div class="col-lg-12">
                      <!--notification start-->
                          <header class="panel-heading">
                            Orders Preview
                          </header>
                          <div class="panel-body">                            
                              <div class="alert alert-default">
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>

                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                            @foreach($data as $order)
                                            <tr>
                                                <td>{{$order->pro_name}}</td>
                                                <td class="pro_img"><img src="{{ asset('public/products/small') }}/{{$order->pro_img}}" alt="Product Image"></td>
                                                <td>{{$order->qty}}</td>
                                                <td>₱ {{number_format($order->pro_price, 2, '.', ',')}}</td>
                                              
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                            <th> </th>
                                            <th>Shipping Fee</th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                              @foreach($data as $order)
                                              @if($loop->first)
                                            <tr>
                                                <td> </td>
                                                <td>₱ {{number_format($order->shipping_fee, 2, '.', ',')}}</td>
                                                <td>₱ {{number_format($order->tax, 2, '.', ',')}}</td>
                                                <td>₱ {{number_format($order->total, 2), '.', ','}}</td>
                                              @endif
                                              @endforeach
                                            </tr>
                                        </tbody>
                                    
                                </table>
                              </div>
                              <div class="alert alert-default">
                                @foreach($data as $order)
                                  @if($loop->first)
                                  <strong>Shipping Address: </strong> {{$order->baranggay}} {{$order->city_mun}} {{$order->name}}, {{$order->zip}}  <br>
                                  
                                  <strong>Email: </strong> {{$order->email}}<br>
                                  <strong>Phone: </strong> {{$order->phone}}<br>
                                  <strong>Name: </strong> {{$order->fullname}} <br>
                              </div>
                              @endif
                              @endforeach
                          </div>
                    </div>
                  </div>
            </div>
      </section>
    </section>

@endsection