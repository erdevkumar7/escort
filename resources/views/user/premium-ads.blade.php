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
                @if ($allPremiumEscort->isEmpty())
                    <div class="col-12">
                        <p>No Premium Escort Available</p>
                    </div>
                @else
                    @foreach ($allPremiumEscort as $escort)
                        <article class="thumbnail item">
                            <a href="{{ route('escort.detail_by_id', $escort->id) }}">
                                {{-- @if ($escort->profile_pic)
                                    <img src="{{ asset('/public/images/profile_img/' . $escort->profile_pic) }}"
                                        alt="Profile_Picture">
                                @else
                                    <img src="{{ asset('/public/images/static_img/adrina.png') }}"
                                        class="img-responsive" />
                                @endif --}}
                                <img src="{{ asset('/public/images/static_img/adrina.png') }}" class="img-responsive" />
                            </a>
                            <div class="caption">
                                <h3 class="text-white">{{ $escort->nickname }}
                                    @if ($premimBadgeDetail->icon)
                                        <img src="{{ asset('/public/images/badge_icons/' . $premimBadgeDetail->icon) }}"
                                            alt="Icon">
                                    @else
                                        <img src="{{ asset('/public/images/static_img/vip-img.png') }}">
                                    @endif
                                    </h4>

                                    <p>Categoty: {{ $escort->type ? $escort->type : 'Not Available' }} </p>
                                    <p>City: {{ $escort->city }}</p>
                                    <p>Last update:
                                        {{ $escort->updated_at ? \Carbon\Carbon::parse($escort->updated_at)->format('m-d-Y') : 'Not Available' }}
                                    </p>
                                    <a href="{{ route('escort.detail_by_id', $escort->id) }}"
                                        class="btn btn-primary btn-block">VIEW DETAILS</a>
                            </div>
                        </article>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- third section end -->
