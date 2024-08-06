<section class="profile-moment">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-carousel">
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
            </div>
        </div>
    </div>

    <!-- listing page start -->
    <div class="table-list">
        <div class="container">
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="row gy-5">
                        @foreach ($allescorts as $escort)
                            <div class="col-lg-3 menu-item">
                                <a href="{{route('escort.detail_by_id', $escort->id)}}" class="glightbox"><img
                                        src="{{ asset('/public/images/static_img/liza.png') }}"
                                        class="menu-img img-fluid" alt=""></a>
                                <h4>{{ $escort->nickname }}</h4>
                                <p class="ingredients">
                                    {{ $escort->origin }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
