@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="#">Dashboard</a>
                <a class="nav-link " href="{{ route('escorts.profile', Auth::guard('escort')->user()->id) }}">Profile</a>
                <a class="nav-link" href="{{ route('escorts.myPictures', Auth::guard('escort')->user()->id) }}">My
                    Pictures</a>
                <a class="nav-link " href="{{ route('escorts.myVideos', Auth::guard('escort')->user()->id) }}">My Videos</a>
            </nav>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Active advertise plan</div>
                            @if ($adsDetailsOfMaxEndDatePlan)
                                <div class="h3"> {{ $adsDetailsOfMaxEndDatePlan->price }} chf /
                                    {{ $adsDetailsOfMaxEndDatePlan->time_duration }} days</div>
                                <a class="text-arrow-icon small" href="#!">
                                    View plan details
                                </a>
                            @else
                                <div class="h3">
                                    No active plan
                                </div>
                                <a class="text-arrow-icon small" href="{{ route('escorts.getAllAdvrtise') }}">
                                    Select plan
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary">
                        <div class="card-body">
                            <div class="small text-muted">Next payment due</div>
                            <div class="h3">
                                {{ $paymentMaxEndDate ? \Carbon\Carbon::parse($paymentMaxEndDate->end_date)->format('d M Y') : 'Today' }}
                            </div>
                            <a class="text-arrow-icon small" href="{{ route('escorts.getAllAdvrtise') }}">
                                Add new plan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted"> Total photos</div>
                            <div class="h3">
                                @if ($pictures)
                                    <p> <span>Available photos</span> {{ count($pictures) }} </p>
                                @else
                                    <p> <span>Available photo</span> 0 </p>
                                @endif
                                {{-- <p>Total Images: {{ $pictures }}</p> --}}
                            </div>
                            <a class="text-arrow-icon small"
                                href="{{ route('escorts.myPictures', Auth::guard('escort')->user()->id) }}">
                                View all photos
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted"> Total videos</div>
                            <div class="h3">
                                @if ($pictures)
                                    <p> <span>Available videos</span> {{ count($videos) }} </p>
                                @else
                                    <p> <span>Available videos</span> 0 </p>
                                @endif
                                {{-- <p>Total Images: {{ $pictures }}</p> --}}
                            </div>
                            <a class="text-arrow-icon small"
                                href="{{ route('escorts.myVideos', Auth::guard('escort')->user()->id) }}">
                                View all videos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
