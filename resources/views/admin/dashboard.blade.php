@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        {{-- <div class="row" style="display: inline-block;">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Escorts</span>
                    <div class="count green">{{$totalEscorts}}</div>
                    <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-usd" aria-hidden="true"></i> Total CHF</span>
                    <div class="count">123.50</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-sitemap"></i> Total Agencies</span>
                    <div class="count green">{{$totalAgencies}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                        Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last
                        Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                    <div class="count green">{{$totalUsers}}</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                        Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                        Week</span>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Escorts</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> Total Escorts</span>
                            <div class="count green">{{$totalEscorts}}</div>
                            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Users</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
                            <div class="count green">{{$totalUsers}}</div>
                            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="x_panel tile fixed_height_200">
                    <div class="x_title">
                        <h2>Total Agencies</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content tile_count">
                        <div class=" tile_stats_count">
                            <span class="count_top"><i class="fa fa-sitemap"></i> Total Agencies</span>
                            <div class="count green">{{$totalAgencies}}</div>
                            <span class="count_bottom"><i class="green">4% </i> From last Week</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /top tiles -->
    </div>
    <!-- /page content -->
@endsection
