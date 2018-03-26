@extends('admin.master')

@section('content')
<script src="{{asset('js/jquery-1.12.4.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('admin_theme/css/lightbox.min.css') }}">
<script src="{{ asset('admin_theme/js/lightbox-plus-jquery.min.js') }}"></script>
  <section id="container" class="">
    @include('admin.sidebar')
    <section id="main-content">
        <section class="wrapper">
          @if(session('msg'))
                <div class="alert alert-info">  {{session('msg')}}</div>
                @endif
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
        </div>
      </div>
              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4 style="text-transform: capitalize;">{{Auth::user()->name}}</h4>
                              <h6>Administrator</h6>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                                <p style="text-transform: capitalize;">Hello I’m {{Auth::user()->name}}.</p>
                             </div>
                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>
                                  <li>
                                      <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Change Password
                                      </a>
                                  </li>
                              </ul>
                          </header>
                              <div class="tab-content">
                                  <!-- profile -->
                                  <div id="profile" class="tab-pane active">
                                      <div class="panel-body bio-graph-info">
                                          <h1>Bio Graph</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Name </span>{{Auth::user()->name}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Email </span>{{Auth::user()->email}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Mobile </span>{{Auth::user()->phone}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p></p>
                                              </div>
                                          </div>
                                      </div>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">                                        
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                              <form class="form-horizontal" action="{{ url('/admin/editProfile') }}" method="POST" role="form">
                                                  <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                                         
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Name</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{Auth::user()->name}}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Email</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="email" name="email" placeholder=" " value="{{Auth::user()->email}}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Mobile</label>
                                                      <div class="col-lg-6">
                                                          <input type="text" class="form-control" id="mobile" name="phone" placeholder=" " value="{{Auth::user()->phone}}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                          <a href="{{ url('/admin/profile') }}" class="btn btn-danger">Cancel</a>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                  </div>
                                  <div id="recent-activity" class="tab-pane">                                         
                                          <div class="panel-body bio-graph-info">
                                              <h1> Change Password</h1>
                                              <form class="form-horizontal" action="{{ url('admin/updatePassword') }}" method="POST" role="form">                                                  
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">Current Password</label>
                                                      <div class="col-lg-6">
                                                          <input class="form-control" type="password"  name="oldPassword">
                                                          <span style="color:red">{{ $errors->first('old_password') }}</span>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <label class="col-lg-2 control-label">New Password</label>
                                                      <div class="col-lg-6">
                                                          <input class="form-control" type="password"  name="newPassword">
                            <span style="color:red">{{ $errors->first('newPassword') }}</span>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="col-lg-offset-2 col-lg-10">
                                                          <button type="submit" class="btn btn-primary">Change</button>
                                                          <a href="{{ url('/admin/profile') }}" class="btn btn-danger">Cancel</a>
                                                      </div>
                                                  </div>
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              </form>
                                          </div>
                                  </div>
                              </div>
                 </div>
              </div>

              <!-- page end-->
          </section>
    </section>

@endsection
