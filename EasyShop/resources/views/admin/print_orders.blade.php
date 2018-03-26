<!DOCTYPE html>
<html>
  <head>
    <title>Tingson (Admin) </title>
    <meta charset="utf-8">
    <link href="{{asset('admin_theme/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin_theme/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin_theme/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_theme/css/font-awesome.min.css')}}" rel="stylesheet" />


  	<link href="{{asset('admin_theme/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_theme/css/style-responsive.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
<script>
$(document).ready(function(){
      setTimeout(function() {
       window.location.href = "http://localhost:8000/admin/approvedOrders"
      }, 100);
      window.print();
    });
</script>

<style>
#main-content{min-height: 550px}
}
</style>
  </head>
  <body>

      <style type="text/css">
  .pro_img img {
    height: 50px;
    width: 50px;
  }
</style>

  <section id="container" class="">

    <section id="main-content">
            <div class="content-box-large">
                  <div class="col-lg-12">
                      <!--notification start-->
                        <div class="logo pull-center" style="text-align: center;">
                    <img src="{{url('../')}}/theme/images/home/logo.png" alt="" />
                </div>
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
      </section>
    </section>


      <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2018 <a href='#'>TINGSON FURNITURE</a>
            </div>

         </div>
      </footer>




  </body>
</html>


