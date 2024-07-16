<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- main sidebar -->
            @include('admin.sidebar')
            <!-- top navigation -->
            @include('admin.topNavbar')
            <!-- page content -->
            @yield('page_content')
            <!-- footer content -->
            @include('admin.footer')
        </div>
    </div>

    @include('admin.footerJS')

</body>

</html>