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

            <div class="row agency-escort-list">
                <div class="card mb-4">
                    <div class="card-body p-0">
                        <!-- Billing history table-->
                        <div class="table-responsive table-billing-history">
                            <table id="agencies_escort" class="display table mb-0 agency-escort-listing">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Plan Name</th>
                                        <th>Price(In-CHF)</th>
                                        <th>Time Duraction(In-Days)</th>
                                        <th>Description</th>
                                        <th>Purchase</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advertises as $ads)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $ads->name ?? 'Not Available' }}</td>
                                            <td>{{ $ads->price ?? 'Not Available' }}</td>
                                            <td>{{ $ads->time_duration ?? 'Not Available' }}</td>
                                            <td>{{ $ads->description ?? 'Not Available' }}</td>
                                            <td>
                                                <a href="{{route('escorts.showPaymentForm', $ads->id)}}">
                                                    <button type="button"
                                                        class="btn btn-primary agency-escort-view-button">Add</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
