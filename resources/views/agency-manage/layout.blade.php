<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="nav-md"> 
    <div class="container body">
        <div class="main_container">
            <!-- main sidebar -->
            @include('agency-manage.sidebar')
            <!-- top navigation -->
            @include('agency-manage.topNavbar')
            <!-- page content -->
            @yield('agency_page_content')
            <!-- footer content -->
            @include('agency-manage.footer')
        </div>
    </div>

    @include('admin.footerJS')

</body>

</html>