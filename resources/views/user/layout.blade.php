<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>
    @include('user.topNav')

    <!-- page content -->
    <div id="partial-escort">
        @yield('page_content')
    </div>
    <!-- /page content -->
    
    @include('user.disclaimer')
    @include('user.footer')
    @include('user.footerJS')
</body>

</html>
