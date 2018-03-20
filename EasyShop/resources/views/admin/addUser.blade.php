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
                            @if(session('msg'))
                            <div class="alert alert-info">  {{session('msg')}}</div>
                            @endif
                        {!! Form::open(['url' => 'admin/add_user',  'method' => 'post']) !!}
                            <div class="panel-title">Add New User
                                <input type="submit" value="Submit" class="btn btn-primary pull-right" style="margin:-5px">
                            </div>
                              




                            </div>
                        <div class="panel-body">

                            Name:    <input type="text" name="name" class="form-control">
                            <br/>
                            E-mail:     <input type="text" name="email" class="form-control">
                            <br/>

                            Password:    <input type="password" name="password" class="form-control">
                            <br/>
                            <input type="hidden" name="admin" value="1">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::close() !!}
                        </div>



                    </div>
                </div>

               




      </section>
</section>

@endsection
