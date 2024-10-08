@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0" href="{{ route('agency.dashboard', $agency->id) }}">Dashboard</a>
                <a class="nav-link active" href="#">Profile</a>
                <a class="nav-link" href="{{ route('agency.escort_listing', $agency->id) }}">My Listing</a>

            </nav>
            <hr class="mt-0 mb-4">
            <div class="row">
                <div class="col-xl-3 left-content">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <form action="{{ route('agency.profilePic.update', $agency->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                @if ($agency->profile_pic)
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('/public/images/profile_img') . '/' . $agency->profile_pic }}"
                                        alt="avatar">
                                @else
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="https://votivelaravel.in/escorts/public/images/profile_img/avatar.jpg"
                                        alt="avatar">
                                @endif
                                {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                <input type="file" id="profilePicInput" accept="image/*" name="profile_pic"
                                    style="display: none;" onchange="this.form.submit()">

                                <i class="fa-regular fa-pen-to-square"
                                    onclick="document.getElementById('profilePicInput').click();"
                                    style="cursor: pointer;"></i>
                                <div class="name-text">{{ $agency->name }}</div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-9 right-content">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">
                            Update Account Details
                            <a href="{{ Route('agency.profile', $agency->id) }}">
                                <button type="button" class="btn btn-default float-right">Back</button></a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('agency.edit_agency', $agency->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group nickname)-->
                                    <div class="col-md-6">
                                        <label for="name">Agency Name *</label>
                                        <input class="form-control " type="text" id="name" name="name"
                                            value="{{ $agency->name ?? 'Not Selected' }}" oninput="removeError('nameErr')">
                                        @error('name')
                                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Form Group email-->
                                    <div class="col-md-6">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $agency->email ?? 'Not Selected' }}"
                                            oninput="removeError('emailErr')">
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group phone_number -->
                                    <div class="col-md-6">
                                        <label for="phone_number">Phone Number *</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            value="{{ $agency->phone_number ?? 'Not Selected' }}"
                                            oninput="removeError('phoneErr')">
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Form Group (address)-->
                                    <div class="col-md-6">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" name="address" id="address"
                                            value="{{ $agency->address ?? 'Not Selected' }}">
                                    </div>
                                </div>
                        </div>

                        <!-- Save changes button-->
                        <button class="btn all-btn-design" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
