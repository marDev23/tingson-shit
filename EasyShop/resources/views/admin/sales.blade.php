@extends('admin.master')

@section('content')

  <section id="container" class="">
    @include('admin.sidebar')
    <section id="main-content">
        <section class="wrapper">
            <div class="content-box-large">
              @if(session('msg-cnl'))
                <div class="alert alert-warning">  {{session('msg-cnl')}}</div>
                @endif
                @if(session('msg'))
                <div class="alert alert-success">  {{session('msg')}}</div>
                @endif
                <h1>Sales</h1>
                <table class="table table-striped">
                    <thead>
                      <tr>
                            <th></th>
                            <th>Total Sales</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach($sales as $data)
                            <tr>
                             <td></td>
                             <td>{{$data->total->total()}}</td>
                             <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                </table>
                <table class="table table-striped">
                    <thead>
                      <tr>
                            <th>Order Id</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach($sales as $data)
                            <tr>
                             <td>{{$data->id}}</td>
                             <td>{{$data->pro_name}}</td>
                             <td>{{$data->qty}}</td>
                             <td>₱ {{$data->pro_price}}</td>
                             <td>{{$data->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                </table>
            </div>
        </section>
      </section>
    </section>

@endsection
