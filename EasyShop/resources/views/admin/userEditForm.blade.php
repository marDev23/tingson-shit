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
                            <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
                            Name:    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            <br/>
                            E-mail:     <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            <br/>

                            New Password:    <input type="password" name="password" class="form-control">
                            <br/>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @endforeach
                        {!! Form::close() !!}
                        </div>



                    </div>
                </div>

      </section>
 </section>

@endsection
