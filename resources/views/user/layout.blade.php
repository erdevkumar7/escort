<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>
    @include('user.topNav')

    <!-- page content -->
    @yield('page_content')
    <!-- /page content -->
    
    @include('user.footer')
    @include('user.footerJS')
</body>

</html>
