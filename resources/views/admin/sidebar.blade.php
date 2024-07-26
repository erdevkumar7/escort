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
                    <li><a href="{{ route('admin_dashboard') }}"><i class="fa fa-home"></i> Home <span
                                class="fa fa-chevron-right"></span></a>
                    </li>
                    {{-- Escorts --}}
                    <li><a href="{{ route('admin.escorts') }}"><i class="fa fa-table"></i> Escorts <span
                                class="fa fa-chevron-right"></span></a>
                    </li>
                    {{-- Agency --}}
                    <li><a href="{{ route('admin.allagencies') }}"><i class="fa fa-sitemap"></i> Agencies <span
                                class="fa fa-chevron-right"></span></a>
                    </li>
                    {{-- badges --}}
                    <li><a href="{{route('admin.allbadges')}}"><i class="fa fa-certificate"></i> Badges <span
                        class="fa fa-chevron-right"></span></a>
            </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
