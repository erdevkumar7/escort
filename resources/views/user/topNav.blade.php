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
                           <li><a class="dropdown-item" href="#">Action</a></li>
                           <li><a class="dropdown-item" href="#">Another action</a></li>
                           <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                   <div class="input-group">
                       <i class="fa fa-search"></i>
                       <input class="form-control" type="search" placeholder="Search for escots"
                           id="example-search-input">
                       {{-- <input type="text" id="search" class="form-control" placeholder="Search escort"
                           value="{{ request()->input('search') }}"> --}}
                       <span class="input-group-append"></span>
                   </div>
                   <li class="nav-item inner-icons">
                       <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                   </li>

                   @if (Auth::guard('escort')->user())
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle active profile-image" href="#" id="profileDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               {{-- <img src="{{ asset('/public/images/profile_img/default_escort.png') }}" width="32px"
                                   height="32px" alt=""> --}}

                               @if (Auth::guard('escort')->user()->profile_pic)
                                   <img src="{{ asset('/public/images/profile_img') . '/' . Auth::guard('escort')->user()->profile_pic }}"
                                       width="32px" height="32px" alt="" style="border-radius: 50%">
                               @else
                                   <img src="{{ asset('/public/images/profile_img/avatar.jpg') }}" width="32px"
                                       height="32px" alt="" style="border-radius: 50%">
                               @endif
                           </a>
                           <ul class="dropdown-menu logout-user" aria-labelledby="profileDropdown">
                               <li><a class="dropdown-item"
                                       href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                               </li>
                               <li><a class="dropdown-item" href="#" onclick="handleLogOut('escort')">Logout</a>
                               </li>
                           </ul>
                       </li>
                   @elseif (Auth::guard('agency')->check())
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle active profile-image" href="#" id="profileDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                               {{-- <img src="{{ asset('/public/images/profile_img/avatar.jpg') }}" width="32px" style="border-radius: 50%"
                                   height="32px" alt=""> --}}

                               @if (Auth::guard('agency')->user()->profile_pic)
                                   <img src="{{ asset('/public/images/profile_img') . '/' . Auth::guard('agency')->user()->profile_pic }}"
                                       width="32px" height="32px" alt="" style="border-radius: 50%">
                               @else
                                   <img src="{{ asset('/public/images/profile_img/avatar.jpg') }}"
                                       width="32px" height="32px" alt="" style="border-radius: 50%">
                               @endif
                           </a>

                           <ul class="dropdown-menu logout-user" aria-labelledby="profileDropdown">
                               <li><a class="dropdown-item"
                                       href="{{ route('agency.profile', Auth::guard('agency')->user()->id) }}">Profile</a>
                               </li>
                               <li><a class="dropdown-item"
                                href="{{ route('agency.dashboard', Auth::guard('agency')->user()->id) }}">Dashboard</a>
                        </li>
                               <li><a class="dropdown-item" href="#"
                                       onclick="handleLogOut('agency')">Logout</a>
                               </li>
                           </ul>
                       </li>
                   @else
                       {{-- <li class="nav-item inner-icons">
                           <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-user"></i></a>
                       </li> --}}
                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle active escort-agency-menu" href="#"
                               id="escortAgencyDropdown" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                               <i class="fa-solid fa-user"></i>
                           </a>

                           <ul class="dropdown-menu logout-user" aria-labelledby="profileDropdown">
                               <li><a class="dropdown-item" href="{{ route('login') }}"> Escort Login</a>
                               </li>
                               <li><a class="dropdown-item" href="{{ route('agency.login') }}"> Agency Login </a>
                               </li>
                           </ul>
                       </li>
                   @endif

               </div>
           </div>
           {{-- logout form --}}
           <div>
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
   </nav>
   <!-- nav section end -->
