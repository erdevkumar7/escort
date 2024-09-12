@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link" href="{{ route('user.profile', Auth::guard('web')->user()->id) }}">Profile</a>
                <a class="nav-link active" href="#">My Escorts</a>
            </nav>

            <div class="row my-escorts-followed">
                @if ($allescorts->isEmpty())
                    <div class="col-12">
                        <p>No Data Available</p>
                    </div>
                @else
                    @foreach ($allescorts as $escort)
                        <div class="col-lg-3 menu-item my-follow">
                            <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="glightbox">
                                @if ($escort->profile_pic)
                                    <img src="{{ asset('/public/images/profile_img/' . $escort->profile_pic) }}"
                                        class="menu-img img-fluid" alt="Profile_Picture">
                                @else
                                    <img src="{{ asset('/public/images/profile_img/default_profile.png') }}"
                                        class="menu-img img-fluid" alt="Profile_Picture">
                                @endif
                                <h4>{{ $escort->nickname }}</h4>
                            </a>

                            <p class="ingredients"> Categoty:
                                {{ $escort->type ? $escort->type : 'Not Available' }}</p>
                            <p class="ingredients"> City:
                                {{ $escort->city ? $escort->city : 'Not Available' }}</p>
                            <p class="ingredients">
                                Last update:
                                {{ $escort->updated_at ? \Carbon\Carbon::parse($escort->updated_at)->format('m-d-Y') : 'Not Available' }}
                            </p>
                            <p class="ingredients"> Status:
                                {{ $escort->status === 1 ? 'Active' : 'In-Active' }}</p>
                            <a href="{{ route('escort.detail_by_id', $escort->id) }}" class="btn btn-primary btn-block">VIEW
                                DETAILS</a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
