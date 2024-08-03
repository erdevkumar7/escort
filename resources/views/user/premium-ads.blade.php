    <!-- third section start -->

    <section class="premium-ads">
        <h1 class="text-white">Premium Ads</h1>
        <p class="text-white pb-5 featured-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna
            aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
        </p>
        <div class="container-fluid">
            <div id="owl-demo-2" class="owl-carousel owl-theme">
                @foreach ($allescorts as $escort)                 
                    <article class="thumbnail item">
                        <a href="#">  
                            <img src="{{ asset('/public/images/static_img/adrina.png') }}" class="img-responsive" />
                        </a>
                        <div class="caption">
                            <h3 class="text-white">{{ $escort->nickname }}<img
                                    src="{{ asset('/public/images/static_img/vip-img.png') }}"></h4>
                                <p>City: {{ $escort->city }}</p>
                                <p>Phone:{{ $escort->phone_number }}</p>
                                <p>Origin: {{ $escort->origin }}</p>
                                <p>Rates in CHF: {{ $escort->rates_in_chf }}</p>
                                <a href="#" class="btn btn-primary btn-block">VIEW DETAILS</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- third section end -->
