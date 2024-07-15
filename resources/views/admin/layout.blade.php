<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.headCSS')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @yield('main_contents')
      </div>
    </div>

    @include('admin.footerJS')
	
  </body>
</html>