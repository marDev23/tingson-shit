@extends('admin.master')

@section('content')
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('admin_theme/css/lightbox.min.css') }}">
<script src="{{ asset('admin_theme/js/lightbox-plus-jquery.min.js') }}"></script>
<style type="text/css">
   .reciept_img img{
    width: 50px;
    height: 50px;
    filter: grayscale(100%);
    transition: 1s;
   }

   .reciept_img img:hover{
    filter: grayscale(0%);
    transform: scale(1.1);
   }
   .status_order {
    text-transform: capitalize;
    color: red;
   }
   .name_order {
    text-transform: capitalize;
   }
</style>

  <section id="container" class="">
    @include('admin.sidebar')
    <section id="main-content">
        <section class="wrapper">
            <div class="content-box-large">
                @if(session('msg-dlt'))
                <div class="alert alert-danger">  {{session('msg-dlt')}}</div>
                @endif
                <h1>Canceled Orders</h1>
                <table class="table table-striped">
                    <thead>
                      <tr>
                            <th>Order Id</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Reciept Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                            <tr>
                            @foreach($data as $orders)
                                <td>{{$orders->id}}</td>
                                <td class="name_order">{{$orders->name}}</td>
                                <td class="status_order">{{$orders->status}}</td>
                                <td>₱ {{$orders->total}}</td>
                                <td class="reciept_img"><a data-lightbox="myreciept_img" href="{{ asset('reciept/images') }}/{{$orders->reciept_img}}"> <img src="{{ asset('reciept/images') }}/{{$orders->reciept_img}}" alt="Reciept Image Captured"></a></td>
                                <td>
                               <a href="{{url('/admin/pro_preview')}}/{{$orders->id}}"
                                   class="btn btn-primary btn-small">View</a>
                                 <a href="{{ url('/admin/delete_order') }}/{{$orders->id}}"
                                      class="btn btn-danger btn-small">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                </table>
            </div>
        </section>
      </section>
    </section>

@endsection