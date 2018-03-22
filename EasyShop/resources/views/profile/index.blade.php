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
                <li class="active">My Profile</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">

                @if(session('msg'))
                <div class="alert alert-info col-md-8"><a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                {{session('msg')}}</div>
                @endif

                <h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Welcome</h3>
                {!! Form::open(['url' => 'updateProfile',  'method' => 'post']) !!}


                <div class="container" >


                    <div class="form-group row">
                        @foreach($user as $data)
                        <div class="form-group col-md-5">
                            <label for="example-text-input">Name</label>
                            <input class="form-control" type="text"  name="name" value="{{$data->name}}" required>
                            <span style="color:red">{{ $errors->first('name') }}</span>

                            <br>

                            <label for="example-text-input" >Email</label> 
                            <input class="form-control" type="email"  name="email" value="{{$data->email}}" required>
                            <span style="color:red">{{ $errors->first('email') }}</span>

                            <br>
                            <label for="example-text-input" >Phone</label>
                            <input class="form-control" type="number"  name="phone" value="{{$data->phone}}" required>
                            <span style="color:red">{{ $errors->first('phone') }}</span>
                            <br>
                            <div align="right"> <input type="submit" value="Update Profile" class="btn btn-primary"></div>
                        </div>
                      @endforeach



                    </div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
