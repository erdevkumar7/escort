   <!-- nav section start -->
   <div class="top-text">
    <div class="first-order">
        <p>Sign up and get 20% off to your first order. <a href="#">Sign Up Now</a></p>
    </div>
    <div class="first-order-img">
        <a href="#"><img src="{{asset('/public/images/static_img/vector.png')}}"></a>
    </div>
</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset('/public/images/static_img/logo.png')}}" class="img-fluid" alt="..."></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
        </button>
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
                    <a class="nav-link" href="#">Transex</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">BDSM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">cams LIVE</a>
                </li>
            </ul>
            <div class="d-flex search-input">
                <div class="input-group">
                    <i class="fa fa-search"></i>
                    <input class="form-control" type="search" placeholder="Search for escots"
                        id="example-search-input">
                    <span class="input-group-append"></span>
                </div>
                <li class="nav-item inner-icons">
                    <a class="nav-link" href="#"><img src="{{asset('/public/images/static_img/shop-icon.png')}}"></a>
                </li>
                <li class="nav-item inner-icons">
                    <a class="nav-link" href="{{route('escorts.register_form')}}"><img src="{{asset('/public/images/static_img/frame.png')}}"></a>
                </li>
            </div>
        </div>
    </div>
</nav>
<!-- nav section end -->