<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">

                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{url('/')}}" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Home Furniture<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              @foreach(App\pro_cat::with('childs')->where('p_id',1)->get() as $cat)
                              <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                              @endforeach

                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Office Furniture<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              @foreach(App\pro_cat::with('childs')->where('p_id',2)->get() as $cat)
                              <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                              @endforeach

                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Decor<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                              @foreach(App\pro_cat::with('childs')->where('p_id',3)->get() as $cat)
                              <li><a href="{{url('/')}}/products/{{$cat->name}}">{{ucwords($cat->name)}}</a></li>
                              @endforeach

                            </ul>
                        </li>



                        <?php /* <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                          <ul role="menu" class="sub-menu">
                          <li><a href="blog.html">Blog List</a></li>
                          <li><a href="blog-single.html">Blog Single</a></li>
                          </ul>
                          </li>
                          <li><a href="404.html">404</a></li>
                         *
                         */ ?>
                       {{--  <li><a href="{{url('/contact')}}">Contact</a></li>
                        <li><a href="{{url('/newArrival')}}">New Arrival</a></li> --}}
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">


                    <form action='{{url('/search')}}' method="post">
                        <input type="text" placeholder="Search" name="search_data" id="proList"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->
