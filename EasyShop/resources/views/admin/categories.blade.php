@extends('admin.master')

@section('content')

  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">
                @if(session('msg-udt'))
                <div class="alert alert-info">  {{session('msg-udt')}}</div>
                @endif
                @if(session('msg-add'))
                <div class="alert alert-success">  {{session('msg-add')}}</div>
                @endif
                @if(session('msg-dlt'))
                <div class="alert alert-danger">  {{session('msg-dlt')}}</div>
                @endif
                <div class="content-box-large">
                    <div style="padding:10px;" class="col-md-12">
                            <a href="{{url('admin/addCat')}}" class="btn btn-md btn-info">Add Categories</a>
                    </div>
                    <h1>Categories</h1>
                    <table class="table table-striped">
                        <thead>  <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Parent Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach($cats as $cat)
                        <tbody>
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>@if($cat->p_id == '1')
                                    Home Furniture
                                    @endif
                                    @if($cat->p_id == '2')
                                    Office Furniture
                                    @endif
                                    @if($cat->p_id == '3')
                                    Decor
                                    @endif</td>
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
