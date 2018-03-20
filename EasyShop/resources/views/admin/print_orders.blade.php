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
      }, 10);
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
        <section class="wrapper">
            <div class="content-box-large">
                <div class="row">
                  <div class="col-lg-10">
                      <!--notification start-->
                      <section class="panel">
                        <div class="logo pull-center">
                    <a href="{{url('/')}}"><img src="{{url('../')}}/theme/images/home/logo.png" alt="" /></a>
                </div>


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


      <footer>
         <div class="container">

            <div class="copy text-center">
               Copyright 2018 <a href='#'>TINGSON FURNITURE</a>
            </div>

         </div>
      </footer>




  </body>
</html>


