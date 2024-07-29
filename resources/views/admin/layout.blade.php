<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="nav-md">
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
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
