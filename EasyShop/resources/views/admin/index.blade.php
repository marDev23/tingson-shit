@extends('admin.master')

@section('content')

  <section id="container" class="">

        @include('admin.sidebar')

        <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
              </div>
            </div>
                    
                  <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="" style="color:white;">
                <div class="info-box blue-bg">
                  <div class="count">6.674</div>
                  <div class="title">Pending Orders</div>           
                </div><!--/.info-box--> 
                </a>    
              </div><!--/.col-->
              
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="">
                <div class="info-box brown-bg">
                  <div class="count">7.538</div>
                  <div class="title">Approved Orders</div>            
                </div><!--/.info-box--> 
                </a>    
              </div><!--/.col-->  
              
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="" style="color:white;">
                <div class="info-box dark-bg">
                  <div class="count">4.362</div>
                  <div class="title">Canceled Orders</div>            
                </div><!--/.info-box--> 
                </a>    
              </div><!--/.col-->
              
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <a href="" style="color:white;">
                <div class="info-box green-bg">
                  <div class="count">1.426</div>
                  <div class="title">Delivered Orders</div>            
                </div><!--/.info-box-->
                </a>     
              </div><!--/.col-->
              
            </div><!--/.row-->
          </section>
        </section>

</section>

@endsection
