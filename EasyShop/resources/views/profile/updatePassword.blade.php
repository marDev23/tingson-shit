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
                <li class="active">Update Password</li>
            </ol>
        </div><!--/breadcrums-->



        <div class="row">
            @include('profile.menu')
            <div class="col-md-8">

                @if(session('msg'))
                <div class="alert alert-info col-md-10"><a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                {{session('msg')}}</div>
                @endif

                <h3 class="col-md-10"><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Update your Password</h3>

                {!! Form::open(['url' => 'updatePassword',  'method' => 'post']) !!}


                <div class="container col-md-10" >

                            <label for="example-text-input">Current Password</label>
                            <input class="form-control" type="password"  name="oldPassword">
                            <span style="color:red">{{ $errors->first('old_password') }}</span>

                            <br>

                            <label for="example-text-input" >New Password</label>
                            <input class="form-control" type="password"  name="newPassword">
                            <span style="color:red">{{ $errors->first('newPassword') }}</span>

                            <br>
                            <div align="right"> <input type="submit" value="Update Password" class="btn btn-primary"></div>

                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
