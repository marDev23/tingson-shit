@extends('admin.master')

@section('content')


  <section id="container" class="">
       @include('admin.sidebar')
       <section id="main-content">
           <section class="wrapper">

            <div class="row">
                <div class="col-md-6">
                    <div class="content-box-large">
                        <div class="panel-heading">
                        {!! Form::open(['url' => 'admin/editUser',  'method' => 'post']) !!}
                            <div class="panel-title">Edit User
                                <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin:-5px">
                            </div>
                              




                            </div>
                        <div class="panel-body">
                            @foreach($users as $user)
                            Name:    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            <span style="color:red">{{ $errors->first('name') }}</span>
                            <br/>
                            E-mail:     <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            <span style="color:red">{{ $errors->first('email') }}</span>
                            <br/>
                            Phone:     <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                            <span style="color:red">{{ $errors->first('phone') }}</span>
                            <br/>
                            New Password:    <input type="password" name="password" class="form-control">
                            <span style="color:red">{{ $errors->first('password') }}</span>
                            <br/>
                            <input type="hidden" name="admin" value="1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @endforeach
                        {!! Form::close() !!}
                        </div>



                    </div>
                </div>

      </section>
 </section>

@endsection
