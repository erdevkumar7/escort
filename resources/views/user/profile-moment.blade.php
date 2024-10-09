<section class="profile-moment">
    <h1 class="text-white">HOT profiles of the moment</h1>
    <p class="text-white pb-5 featured-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna
        aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex. </p>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-carousel">
                @if ($escortWithMaxFollowers->isEmpty())
                    <div class="owl-carousel carousel-main text-white text-center">
                        <div>
                            <img src="{{ asset('/public/images/static_img/abella.png') }}">
                            <h4>Abella</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/angela.png') }}">
                            <h4>Angela</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/violet.png') }}">
                            <h4>Violet</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/brandi.png') }}">
                            <h4>Brandi</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/natasha.png') }}">
                            <h4>Natasha</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/view-all.png') }}">
                            <h4>View-all</h4>
                            <p>Geneva</p>
                        </div>
                        <div>
                            <img src="{{ asset('/public/images/static_img/abella.png') }}">
                            <h4>Abella</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/angela.png') }}">
                            <h4>Angela</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/violet.png') }}">
                            <h4>Violet</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/brandi.png') }}">
                            <h4>Brandi</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/natasha.png') }}">
                            <h4>Natasha</h4>
                            <p>Geneva</p>
                        </div>
                        <div><img src="{{ asset('/public/images/static_img/view-all.png') }}">
                            <h4>View-all</h4>
                            <p>Geneva</p>
                        </div>
                    </div>
                @else
                    <div class="owl-carousel carousel-main text-white text-center">
                        @foreach ($escortWithMaxFollowers as $escort)
                            <div>
                                @if ($escort->profile_pic)
                                    <img src="{{ asset('/public/images/profile_img') . '/' . $escort->profile_pic }}"
                                        width="180px" height="180px">
                                @else
                                    <img src="{{ asset('/public/images/static_img/abella.png') }}">
                                @endif
                                <h4>{{ $escort->nickname }}</h4>
                                <p>Geneva</p>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>



</section>
