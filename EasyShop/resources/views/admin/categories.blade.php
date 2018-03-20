@extends('admin.master')

@section('content')

  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">
                
                <div class="content-box-large">
                    <h1>Categories</h1>

                    <div style="padding:10px;" class="col-md-12">
                    <a href="{{url('admin/addCat')}}" class="btn btn-large btn-info">Add Categories</a>
                </div>
                    <table class="table table-striped">
                        <thead>  <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($cats as $cat)
                        <tbody>
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>@if($cat->status=='0')
                                    Enable
                                    @else
                                    Disable

                                    @endif</td>
                                <td><a href="{{url('/')}}/admin/CatEditForm/{{$cat->id}}" class="btn btn-info btn-small">Edit</a>
                                    <a href="{{url('/admin/deleteCat')}}/{{$cat->id}}" class="btn btn-danger">Remove</a></td>

                            </tr>
                        </tbody>
                        @endforeach
                    </table>

                </div>



        </section>
      </section>
  </section>

@endsection
