@extends('admin.master')

@section('content')


  <section id="container" class="">
        @include('admin.sidebar')
        <section id="main-content">
            <section class="wrapper">


                <div class="content-box-large">
                    <h1>Add Category</h1>

                    {!! Form::open(['url' => 'admin/catForm',  'method' => 'post']) !!}
                    <table class="table-borderless" style="height:200px">
                        <tr>
                          <td> Parent Category:</td>
                          <td>
                            <select name="p_id" class="form-control">
                              <option value="1">Home Furniture</option>
                              <option value="2">Office Furniture</option>
                              <option value="3">Decor</option>
                            </select>
                        </tr>
                        <tr>
                            <td> Catgeory Name:</td>
                            <td>    <input type="text" name="cat_name" class="form-control"></td>
                        </tr>

                         <tr>
                             <td colspan="2">
                        <input type="submit" value="Add Category" class="btn btn-success pull-right">
                             </td>
                         </tr>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        {!! Form::close() !!}
                    </table>
                </div>

            </section>
      </section>
</section>

@endsection
