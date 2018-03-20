@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">

                <div class="content-box-large">
                    <h1>Change Product Image</h1>

                    <div class="col-md-5">
                        {!! Form::open(['url' => 'admin/editProImage',  'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

                    @foreach($Products as $product)
                    <input type="hidden" name="id" class="form-control" value="{{$product->id}}">

                    <input type="hidden" class="form-control" value="{{$product->pro_name}}">
                    <br/>
                    <img src="{{url('/')}}/public/products/medium/<?php echo $product->pro_img; ?>" alt="" width="150px" height="150px"/>

                    <br/>
                    Select Image:
                    <input type="file" name="new_image" class="form-control" required>
                    <span style="color:red">{{ $errors->first('new_image') }}</span>
                    @endforeach
                    <br/>
                    <input type="submit" value="Upload Image" class="btn btn-success pull-right">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {!! Form::close() !!}
                  </div>
                </div>


        </section>
</section>

@endsection
