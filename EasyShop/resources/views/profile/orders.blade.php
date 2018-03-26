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
                @if(session('msg-cnl'))
                <div class="alert alert-danger">  
                    <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{session('msg-cnl')}}
                
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
                        @if ($loop->first)
                        <tr class="btn-default">
                            <td>{{ucwords($list->created_at)}}</td>
                            <td>₱ {{number_format($list->total, 2, '.', ',')}}</td>
                            @if ($list->status == 'approved')
                            <td style="color: green; text-transform: capitalize;">{{$list->status}}</td>
                            @elseif ($list->status == 'pending')
                            <td style="color: #FE980F; text-transform: capitalize;">{{$list->status}}</td>
                            @elseif ($list->status == 'canceled')
                            <td style="color: red; text-transform: capitalize;">{{$list->status}}</td>
                            @endif
                            @if ($list->status == 'pending')
                            <td><a href="{{ url('/cancel_ordered') }}/{{$list->id}}" class="btn btn-default add-to-cart">Cancel</a></td>
                            @else
                            <td><button class="btn btn-default add-to-cart" disabled>Cancel</button></td>
                            @endif
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
                            <td>Product Price: ₱ {{number_format($list->pro_price, 2, '.', ',')}}</td>
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
