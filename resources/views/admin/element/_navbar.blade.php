<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            <div class="">
                <div class="main-menu-header">

                    <img class="img-radius" src=""" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">
                            @if (Auth::check())
                             Welcome {{ Auth::user()->name }}
                        @endif
                            <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="#!"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="{{ Route('getLogout') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Page layouts</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="layout-vertical.html" target="_blank">Vertical</a></li>
                        <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>Products</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ Route('product-list') }}">List product</a></li>
                        <li><a href="{{ Route('product-create') }}">Create product</a></li>

                    </ul>
                </li>

                {{-- END MENU PRODUCT --}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Attribute</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{Route('attribute-list')}}">List Attribute</a></li>
                        <li><a href="{{Route('attribute-create')}}">Create Attribute</a></li>

                    </ul>
                </li>
                {{-- END MENU ATTRIBUTE --}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Category</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{Route('category-list')}}">List category</a></li>
                        <li><a href="{{ Route('category-create') }}">Create category</a></li>

                    </ul>
                </li>
                {{-- END MENU CATEGORY --}}
                <li class="nav-item pcoded-menu-caption">
                    <label>User</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{Route('user-list')}}">List User</a></li>
                        <li><a href="bc_button.html">Creat User</a></li>

                    </ul>
                </li>
                {{-- END MENU CATEGORY --}}

            </ul>



        </div>
    </div>
</nav>
