@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link active" href="#">Profile</a>
                <a class="nav-link" href="{{route('user.myescorts', Auth::guard('web')->user()->id)}}">My Escorts</a>
            </nav>

            <div class="row">
                <div class="col-xl-3 left-content">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <form action="{{ route('user.profilePic.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                @if ($user->profile_pic)
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('/public/images/profile_img') . '/' . $user->profile_pic }}"
                                        alt="avatar">
                                @else
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('/public/images/static_img/avatar.jpg') }}"
                                        alt="avatar">
                                @endif
                                {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                <input type="file" id="profilePicInput" accept="image/*" name="profile_pic"
                                    style="display: none;" onchange="this.form.submit()">

                                <i class="fa-regular fa-pen-to-square"
                                    onclick="document.getElementById('profilePicInput').click();"
                                    style="cursor: pointer;"></i>
                                <div class="name-text">{{ $user->fname }}</div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-9 right-content">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">
                            Update Account Details
                            <a href="{{ route('user.profile', $user->id) }}">
                                <button type="button" class="btn btn-default float-right">Back</button></a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update.profile', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group first_name)-->
                                    <div class="col-md-6">
                                        <label for="first_name">First Name * </label>
                                        <input type="text" id="first_name" name="first_name" value="{{ $user->fname }}"
                                            class="form-control ">
                                        @error('first_name')
                                            <span class="text-danger" id="firstnameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- Form Group phone_number -->
                                    <div class="col-md-6">
                                        <label for="last_name">Last Name *</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            value="{{ $user->lname }}">
                                        @error('last_name')
                                            <span class="text-danger" id="lastnameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group email-->
                                    <div class="col-md-6">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $user->email ?? 'Not Selected' }}">
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gender">Gender *</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>male
                                            </option>
                                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>female
                                            </option>
                                            <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger" id="genderErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <div class="save-changes-btn-part">
                                    <button class="btn save-changes-btn" type="submit">Save changes</button>

                                    <a href="{{ route('user.profile', $user->id) }}">
                                        <button type="button" class="btn cencel-btn">Cancel</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
