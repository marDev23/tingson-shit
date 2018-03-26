
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="{{url('/admin')}}">
                            <i class="icon_house_alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_document_alt"></i>
                            <span>Orders</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('/admin/pendingOrders')}}">Pending</a></li>
                            <li><a href="{{ url('/admin/approvedOrders') }}">Approved</a></li>
                            <li><a href="{{ url('/admin/canceledOrders') }}">Canceled</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_cart_alt"></i>
                            <span>Products</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('/admin/addProduct')}}">Add Products</a></li>
                            <li><a href="{{url('/admin/products')}}">View Products</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_profile"></i>
                            <span>Users</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('/admin/addUser')}}">Add User</a></li>
                            <li><a href="{{url('/admin/users')}}">View Users</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_datareport"></i>
                            <span>Reports</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ url('/admin/sales') }}">Sales Report</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon_cogs"></i>
                            <span>Settings</span>
                            <span class="menu-arrow arrow_carrot-right"></span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{url('/admin/categories')}}">Category</a></li>
                            {{-- <li><a href="">Locations</a></li> --}}
                            <li><a href="{{url('admin/addPropertyAll')}}">Add Properties</a></li>
                        </ul>
                    </li>
                    


                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
