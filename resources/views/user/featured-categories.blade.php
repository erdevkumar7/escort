<section class="featured-categories">
    <h1 class="text-white text-center">Featured Categories</h1>
    <p class="text-white text-center featured-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna
        aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p>

    <div class="card-deck">
        <div class="card card-first">
            <img class="card-img-top" src="{{asset('/public/images/static_img/card-one.png')}}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title text-white">Escort Girl</h3>
                <a href="{{route('escort.getEscortByCategory', 'Escort')}}"><button>VIEW DETAILS</button></a>
            </div>
        </div>
        <div class="card card-second">
            <img class="card-img-top" src="{{asset('/public/images/static_img/card-two.png')}}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title text-white">Men</h3>
                <a href="{{route('escort.getEscortByCategory', 'SM')}}"><button>VIEW DETAILS</button></a>
            </div>
        </div>
        <div class="card card-third">
            <img class="card-img-top" src="{{asset('/public/images/static_img/card-three.png')}}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title text-white">Salon</h3>
                <a href="{{route('escort.getEscortByCategory', 'Salon')}}"><button>VIEW DETAILS</button></a>
            </div>
        </div>
        <div class="card card-fourth">
            <img class="card-img-top" src="{{asset('/public/images/static_img/card-four.png')}}" alt="Card image cap">
            <div class="card-body">
                <h3 class="card-title text-white">Trans</h3>
                <a href="{{route('escort.getEscortByCategory', 'Trans')}}"><button>VIEW DETAILS</button></a>
            </div>
        </div>
    </div>


</section>