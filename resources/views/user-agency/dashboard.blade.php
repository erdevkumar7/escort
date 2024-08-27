@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="#">Dashboard</a>
                <a class="nav-link" href="{{ route('agency.profile', $agency->id) }}">Profile</a>
                <a class="nav-link" href="{{ route('agency.escort_listing', $agency->id) }}">My Listing</a>

            </nav>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted">Total enrolled</div>
                            <div class="h3">Escort {{ $allescorts->count() }}</div>
                            <a class="text-arrow-icon small" href="{{ route('agency.escort_listing', $agency->id) }}">
                                View All Escorts                          
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 2-->
                    <div class="card h-100 border-start-lg border-start-secondary">
                        <div class="card-body">
                            <div class="small text-muted">Next payment due</div>
                            <div class="h3">July 15</div>
                            <a class="text-arrow-icon small text-secondary" href="#!">
                                View payment history                         
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <!-- Billing card 3-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Current monthly bill</div>
                            <div class="h3">$20.00</div>
                            <a class="text-arrow-icon small" href="#!">
                                Switch to yearly billing
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
