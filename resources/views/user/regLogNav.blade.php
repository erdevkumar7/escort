   <!-- nav section start -->
   @if (!Auth::guard()->user())
       <div class="top-text">
           <div class="first-order">
               <p>Sign up and get 20% off to your first order. <a href="{{ route('escorts.register_form') }}">Sign Up
                       Now</a></p>
           </div>
           {{-- <div class="first-order-img">
               <a href="#"><img src="{{ asset('/public/images/static_img/vector.png') }}"></a>
           </div> --}}
       </div>
   @endif
   <nav class="navbar navbar-expand-lg">
       <div class="container-fluid">
           <div class="toggle-bar">
               <a class="navbar-brand" href="{{ route('index') }}"><img
                       src="{{ asset('/public/images/static_img/logo.png') }}" class="img-fluid" alt="..."></a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                   aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
               </button>
           </div>
           <div class="collapse navbar-collapse" id="navbarScroll">
               <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle active" href="#" id="categoriesDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           Categories
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                           <li><a class="dropdown-item categoty-type-select"
                                   data-category="Independent Escort">Independent Escort</a></li>
                           <li><a class="dropdown-item categoty-type-select" data-category="Escort">Escort</a></li>
                           <li><a class="dropdown-item categoty-type-select" data-category="Trans">Trans</a></li>
                           <li><a class="dropdown-item categoty-type-select" data-category="SM">SM</a></li>
                           <li><a class="dropdown-item categoty-type-select" data-category="Salon">Salon</a></li>
                       </ul>

                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="{{ route('escort.list') }}">Escorts</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">Transex</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">BDSM</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">cams LIVE</a>
                   </li>
               </ul>
               <div class="d-flex search-input profile-login-logout">
                   {{-- Search for escots --}}
                   <div class="input-group">
                       <i class="fa fa-search"></i>
                       <input class="form-control" type="search" placeholder="Search for escots"
                           id="example-search-input" value="{{ request()->input('search') }}">
                       <span class="input-group-append"></span>
                   </div>
                   <li class="nav-item inner-icons">
                       <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                   </li>

                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle active escort-agency-menu" href="#"
                           id="escortAgencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fa-solid fa-user"></i>
                       </a>

                       <ul class="dropdown-menu logout-user" aria-labelledby="profileDropdown">
                           <li><a class="dropdown-item" href="{{ route('user.login.form') }}"> User Login</a>
                           </li>
                           <li><a class="dropdown-item" href="{{ route('login') }}"> Escort Login</a>
                           </li>
                           <li><a class="dropdown-item" href="{{ route('agency.login') }}"> Agency Login </a>
                           </li>
                       </ul>
                   </li>


               </div>
           </div>
           {{-- logout form --}}
           <div>
               <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
               <form id="escort-logout-form" action="{{ route('escorts.logout') }}" method="POST"
                   style="display: none;">
                   @csrf
               </form>

               <form id="agency-logout-form" action="{{ route('agency.logout') }}" method="POST"
                   style="display: none;">
                   @csrf
               </form>
           </div>
       </div>

       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script>
           $(document).ready(function() {
               $('#example-search-input').on('keyup', function() {
                   let query = $(this).val();
                   $.ajax({
                       url: '{{ route('index') }}',
                       type: 'GET',
                       data: {
                           search: query
                       },
                       success: function(data) {
                           $('#partial-escort').html(data);
                       }
                   });
               });
           });
       </script>
       <script>
           $(document).ready(function() {
               $('.categoty-type-select').on('click', function(e) {
                   e.preventDefault();
                   var category = $(this).data('category');
                   $.ajax({
                       url: '{{ route('index') }}', // Your route for getting category data
                       type: 'GET',
                       data: {
                           category: category
                       },
                       success: function(data) {
                           $('#partial-escort').html(data);
                       },
                       error: function(xhr, status, error) {
                           // Handle errors here
                           console.log("Error: " + error);
                       }
                   });
               });
           });
       </script>

   </nav>
   <!-- nav section end -->
