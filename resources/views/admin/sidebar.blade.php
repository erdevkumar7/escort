<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"> <span>Admin Dashboard </span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('images/profile_img') . '/' . Auth::guard('admin')->user()->image }}" alt="..."
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::guard('admin')->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    {{-- home --}}
                    <li><a href="{{ route('admin_dashboard') }}"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-right"></span></a>                
                    </li>
                    {{-- Escorts listing --}}
                    <li><a href="{{ route('admin.escorts') }}"><i class="fa fa-table"></i> Escorts <span class="fa fa-chevron-right"></span></a>                
                    </li>
                    
                    {{-- <li><a><i class="fa fa-table"></i> Users <span class="fa fa-chevron-right"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin_allusers') }}">Users</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.allagencies') }}"><i class="fa fa-sitemap"></i> Agencies <span
                                class="fa fa-chevron-right"></span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        {{-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" onclick="handleLogOut()">
                <span class="glyphicon glyphicon-off full-width" aria-hidden="true"></span>
            </a>
            <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div> --}}
        <!-- /menu footer buttons -->
    </div>
</div>
