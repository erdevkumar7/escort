<!DOCTYPE html>
<html lang="en">

<head>
    @include('contributor.headerCSS')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- main sidebar -->
            @include('contributor.sidebar')
            <!-- top navigation -->
            @include('contributor.topNavbar')
            <!-- page content -->
            @yield('page_content')
            <!-- footer content -->
            @include('contributor.footer')
        </div>
    </div>

    @include('contributor.footerJS')

</body>

</html>
