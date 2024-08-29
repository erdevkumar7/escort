@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0"
                    href="{{ route('escorts.dashboard', Auth::guard('escort')->user()->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                <a class="nav-link active" href="#">My Pictures</a>
            </nav>

            <div class="row escort-pictures">

                @if ($pictures == [])
                    <div class="escort-no-pic-heading">
                        <h4>No Pictures Available</h4>
                    </div>
                @else
                    @foreach ($pictures as $picture)
                        <div class="col-lg-3 menu-item">
                            <a href="" class="glightbox">
                                @if ($picture)
                                    <img src="{{ asset('/public/images/escorts_img') . '/' . $picture }}"
                                        class="menu-img img-fluid" alt="Picture">
                                @else
                                    <img src="{{ asset('/public/images/escorts_img') . '/' . 'escort_profile.png' }}"
                                        class="menu-img img-fluid" alt="Picture">
                                @endif
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
@endsection
