<section class="new-escorts">
    <h1 class="text-white">New escorts, masseuses and TS</h1>
    <p class="text-white featured-text">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna
        aliqua. Ut enim ad minim veniam,quis nostrud.</p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-carousel">
                <div class="owl-carousel carousel-main-two">
                    @if ($allNewEscort->isEmpty())
                        <div class="card text-white">
                            No New Escort Avaialble
                        </div>
                    @else
                        @foreach ($allNewEscort as $escort)
                            <div class="card text-white">
                                <a href="{{ route('escort.detail_by_id', $escort->id) }}">
                                    {{-- @if ($escort->profile_pic)
                                    <img src="{{ asset('/public/images/profile_img/' . $escort->profile_pic) }}"
                                        alt="Profile_Picture">
                                @else
                                    <img src="{{ asset('/public/images/static_img/eliza.png') }}">
                                @endif --}}
                                    <img src="{{ asset('/public/images/static_img/eliza.png') }}">
                                </a>
                                <h4 class="">{{ $escort->nickname }}</h4>
                                <p>City: {{ $escort->city }}</p>
                                <p>Category: {{ $escort->type }}</p>
                                <p>Last update:
                                    {{ $escort->updated_at ? \Carbon\Carbon::parse($escort->updated_at)->format('m-d-Y') : 'Not Available' }}
                                </p>
                                <p>Status: {{ $escort->status ? 'Active' : '' }}</p>
                                <a href="{{ route('escort.detail_by_id', $escort->id) }}"><button>VIEW DETAILS</button></a>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>

</section>
