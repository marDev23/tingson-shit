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
        <section class="wrapper">
            <div class="content-box-large">
                <div class="row">
                  <div class="col-lg-10">
                      <!--notification start-->
                      <section class="panel">
                          <header class="panel-heading">
                            Orders Preview
                          </header>
                          <div class="panel-body">                            
                              <div class="alert alert-info fade in">
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
                                                <td class="pro_img"><img src="{{ asset('upload/images/small') }}/{{$order->pro_img}}" alt="Product Image"></td>
                                                <td>{{$order->qty}}</td>
                                                <td>₱ {{$order->pro_price}}</td>
                                              
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                            <th> </th>
                                            <th> </th>
                                            <th>Tax</th>
                                            <th>Total</th>
                                        
                                        </tr>
                                    </thead>

                                    <tbody>
                                              @foreach($data as $order)
                                              @if($loop->first)
                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td>₱ {{$order->tax}}</td>
                                                <td>₱ {{$order->total}}</td>
                                              @endif
                                              @endforeach
                                            </tr>
                                        </tbody>
                                    
                                </table>
                              </div>
                              <div class="alert alert-default">
                                @foreach($data as $order)
                                  @if($loop->first)
                                  <strong>Shipping Address: </strong> {{$order->city}} {{$order->state}} {{$order->country}}, {{$order->pincode}}  <br>
                                  
                                  <strong>Email: </strong> {{$order->email}}<br>
                                  
                                  <strong>Name: </strong> {{$order->name}}
                              </div>
                              @endif
                              @endforeach
                          </div>
                      </section>
                    </div>
                  </div>
            </div>
        </section>
      </section>
    </section>

@endsection