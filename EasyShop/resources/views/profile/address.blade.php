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
                <li class="active">My Address</li>
            </ol>
        </div><!--/breadcrums-->




        <div class="row">

            @include('profile.menu')
            <div class="col-md-8">

                @if(session('msg'))
                <div class="alert alert-info col-md-10">  
                    <a href='#' class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{session('msg')}}
                
                </div>
                @endif
                <h3 class="container col-md-10"><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>
                
                @if(count($address_data) > 0)
                {!! Form::open(['url' => 'updateAddress',  'method' => 'post']) !!}
                
                @foreach($address_data as $address)
                <div class="container col-md-10" >
                            <hr>
                            <input type="text" name="fullname"  placeholder="Full Name" class="form-control"  value="{{$address->fullname}}" required>

                            <span style="color:red">{{ $errors->first('fullname') }}</span>

                            <hr>

                            <select name="country" class="country form-control" required>
                                @if(!$address->name == '' || !$address->name == '0' || !$address->name == 'null')
                                    <option value="0" selected="true" disabled="true">{{$address->name}}</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                @else
                                    <option value="0" selected="true" disabled="true">Select Province</option>
                                    @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span style="color:red">{{ $errors->first('country') }}</span>
                            <hr>
                            <select name="state" class="state form-control" required>
                                @if(!$address->city_mun == '' || !$address->city_mun == '0' || !$address->city_mun == 'null')
                                    <option value="0" disabled="true" selected="true">{{$address->city_mun}}</option>
                                @else
                                    <option value="0" disabled="true" selected="true">Select City/Municipal</option>
                                @endif
                            </select>

                            <span style="color:red">{{ $errors->first('state') }}</span>

                            <hr>
                            <select name="city" class="city form-control" required>
                                @if(!$address->baranggay == '' || !$address->baranggay == '0' || !$address->baranggay == 'null')
                                    <option value="{{$address->address_id}}" selected="true">{{$address->baranggay}}</option>
                                @else
                                    <option value="0" disabled="true" selected="true">Select Baranggay</option>
                                @endif
                            </select>

                            <span style="color:red">{{ $errors->first('city') }}</span>

                            <hr>
                            <input type="text" placeholder="Zip" name="pincode" class="pincode form-control" value="{{$address->zip}}">

                            <span style="color:red">{{ $errors->first('pincode') }}</span>


                    <div class="form-group row">

                        <div class="form-group col-md-12" align="right">
                            <input class="btn btn-primary" type="submit"  value="Update Address">
                        </div>
                    </div>


                </div>
                @endforeach
                {!! Form::close() !!}
                
                @else
                {!! Form::open(['url' => 'saveAddress',  'method' => 'post']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="container col-md-10" >

                    <hr>
                            <input type="text" name="fullname"  placeholder="Full Name" class="form-control"  value="{{old('fullname')}}" required>

                            <span style="color:red">{{ $errors->first('fullname') }}</span>

                            <hr>

                            <select name="country" class="country form-control" required>
                                <option value="{{ old('country') }}" selected="true" disabled="true">Select Province</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                            <span style="color:red">{{ $errors->first('country') }}</span>
                            <hr>
                            <select name="state" class="state form-control" required>

                                <option value="0" disabled="true" selected="true">Select City/Municipal</option>
                            </select>

                            <span style="color:red">{{ $errors->first('state') }}</span>

                            <hr>
                            <select name="city" class="city form-control" required>
                                <option value="0" disabled="true" selected="true">Select Baranggay</option>
                            </select>

                            <span style="color:red">{{ $errors->first('city') }}</span>

                            <hr>
                            <input type="text" placeholder="Zip" name="pincode" class="pincode form-control" value="{{ old('pincode') }}">

                            <span style="color:red">{{ $errors->first('pincode') }}</span>

                    <div class="form-group row">

                        <div class="form-group col-md-12" align="right">
                            <input class="btn btn-primary" type="submit"  value="Save Address">
                        </div>
                    </div>


                </div>
                {!! Form::close() !!}
                @endif
            </div>
        </div>


    </div>

<script>
            $(document).ready(function(){
                $(document).on('change','.country',function(){
                    console.log('changed');
                    var cat_id=$(this).val();
                    // console.log(cat_id);
                    var div=$(this).parent();

                    var op=" ";

                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findlocation_mun')!!}',
                        data:{'id':cat_id},
                        success:function(data){
                            //console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            op+='<option value="0" selected disabled>Choose City/Municipal</option>';
                            for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].city_mun+'</option>';
                           }

                           div.find('.state').html(" ");
                           div.find('.state').append(op);
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('change','.state',function(){
                    console.log('changed');
                    var af=$(this).val();
                    // console.log(cat_id);
                    var ag=$(this).parent();

                    var ad=" ";

                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findlocation_bar')!!}',
                        data:{'id':af},
                        success:function(data){
                            //console.log('success');

                            console.log(data);

                            //console.log(data.length);
                            ad+='<option value="0" selected disabled>Choose Baranggay</option>';
                            for(var i=0;i<data.length;i++){
                            ad+='<option value="'+data[i].id+'">'+data[i].baranggay+'</option>';
                           }

                           ag.find('.city').html(" ");
                           ag.find('.city').append(ad);
                        },
                        error:function(){

                        }
                    });
                });

                $(document).on('change','.city',function () {
                var prod_id=$(this).val();

                var a=$(this).parent();
                console.log(prod_id);
                var op="";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findlocation_zip')!!}',
                    data:{'id':prod_id},
                    dataType:'json',//return data will be json
                    success:function(data){
                        // console.log("price");
                        console.log(data.zip);

                        // here price is coloumn name in products table data.coln name

                        a.find('.pincode').val(data.zip);

                    },
                    error:function(){

                    }
                });


        });
            });
           
        </script>
</section>
@endsection
