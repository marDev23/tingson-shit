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
                <h1>Sales (Today)</h1>
                {{-- <table class="table table-striped">
                  <div class="form-group">
                      <div class="col-sm-2">
                          <label class="col-lg-2 control-label">From</label>
                          <input class="form-control" type="date"  name="from">
                          <span style="color:red">{{ $errors->first('old_password') }}</span>
                      </div>
                      <div class="col-sm-2">
                          <label class="col-lg-2 control-label">To</label>
                          <input class="form-control" type="date"  name="to">
                          <span style="color:red">{{ $errors->first('old_password') }}</span>
                      </div>
                  </div>
                </table> --}}
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
                             <td>₱ {{number_format($data->pro_price, 2, '.', ',')}}</td>
                             <td>₱ {{number_format($data->total, 2, '.', ',')}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                </table>
            </div>
        </section>
      </section>
    </section>

@endsection
