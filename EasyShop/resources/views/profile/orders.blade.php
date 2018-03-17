@extends('front.master')

@section('content')
<style>
    table td { padding:10px
    }</style>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{url('/profile')}}">Profile</a></li>
                <li class="active">My Order</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">
                @if(session('msg'))
                <div class="alert alert-info">  
                    <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{session('msg')}}
                
                </div>
                @endif
               <h3 ><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,  Your Orders</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Total</th>
                            <th>Order Status</th>
                            

                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>
                        
                    @foreach($orders as $order)
                    @foreach($order as $list)
                        
                        <tr>@if ($loop->first)
                            <td>{{ucwords($list->created_at)}}</td>
                            <td>₱ {{$list->total}}</td>
                            <td style="color: green;">{{$list->status}}</td>
                            
                            <td><a href="" class="btn btn-default add-to-cart">Cancel</a></td>
                        </tr>
                        @endif
                        {{-- <tr>
                            <td>Product Name: {{ucwords($order->pro_name)}}</td>
                            <td>Product Price: {{$order->pro_price}}</td>
                            <td>Quantity: {{$order->qty}}</td></tr>
                        <tr>
                            <td>{{ucwords($order->created_at)}}</td>
                            <td>{{$order->total}}</td>
                            <td style="color: green;">{{$order->status}}</td>
                            
                            <td><a href="" class="btn btn-default add-to-cart">Cancel</a></td>
                        </tr> --}}
                        <tr>
                            <td>Product Name: {{ucwords($list->pro_name)}}</td>
                            <td>Product Price: ₱ {{$list->pro_price}}</td>
                            <td>Quantity: {{$list->qty}}</td>
                        </tr>
                        
                        
                    @endforeach
                    @endforeach
                            
                        
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
@endsection
