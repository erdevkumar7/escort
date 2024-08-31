@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">

        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0" href="{{route('escorts.dashboard', Auth::guard('escort')->user()->id)}}">Dashboard</a>
                <a class="nav-link active" href="#">Profile</a>
                <a class="nav-link" href="{{ route('escorts.myPictures', Auth::guard('escort')->user()->id) }}">My Pictures</a>
            </nav>
           
            <div class="row">
                <div class="col-xl-3 left-content">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>                       
                        <form action="{{ route('escorts.profilePic.update', $escort->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                @if ($escort->profile_pic)
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('/public/images/profile_img') . '/' . $escort->profile_pic }}"
                                        alt="avatar">
                                @else
                                    <img class="img-account-profile rounded-circle mb-2"
                                        src="{{ asset('/public/images/profile_img/default_profile.png') }}"
                                        alt="avatar">
                                @endif
                                 {{-- <i class="fa-regular fa-pen-to-square"></i> --}}
                                <input type="file" id="profilePicInput" accept="image/*" name="profile_pic"
                                    style="display: none;" onchange="this.form.submit()">

                                <i class="fa-regular fa-pen-to-square"
                                    onclick="document.getElementById('profilePicInput').click();"
                                    style="cursor: pointer;"></i>
                                <div class="name-text">{{ $escort->nickname }}</div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-xl-9 right-content">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">
                            Account Details
                            <a href="{{ route('escorts.profileEditForm', $escort->id) }}">
                                <button type="button" class="btn btn-default float-right">Edit Profile</button></a>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group nickname)-->
                                    <div class="col-md-4">
                                        <label for="nickname">Nickname *</label>
                                        <input class="form-control " type="text" id="nick-name" name="nickname"
                                            value="{{ $escort->nickname ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group phone_number -->
                                    <div class="col-md-4">
                                        <label for="phone_number">Phone Number *</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            value="{{ $escort->phone_number ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group email-->
                                    <div class="col-md-4">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $escort->email ?? 'Not Selected' }}" disabled>
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (whatsapp_number)-->
                                    <div class="col-md-4">
                                        <label for="whatsapp_number">WhatsApp Number </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->whatsapp_number ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group (canton)-->
                                    <div class="col-md-4">
                                        <label for="canton">Canton* </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->cnaton ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group ( city)-->
                                    <div class="col-md-4">
                                        <label for="city">City *</label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->city ?? 'Not Selected' }}" disabled>
                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (address)-->
                                    <div class="col-md-4">
                                        <label for="address">Address</label>
                                        <input type="address" class="form-control" name="address" id="address"
                                            value="{{ $escort->address ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group ( origin)-->
                                    <div class="col-md-4">
                                        <label for="origin">Origin </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->origin ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group (type)-->
                                    <div class="col-md-4">
                                        <label for="type">Type </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->type ?? 'Not Selected' }}" disabled>
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group ( build)-->
                                    <div class="col-md-4">
                                        <label for="build">Build </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->build ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <!-- Form Group (age)-->
                                    <div class="col-md-4">
                                        <label for="age">Age *</label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->age ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="breast_size">Breast Size </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->breast_size ?? 'Not Selected' }}">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="hair_color">Hair color </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->hair_color ?? 'Not Selected' }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="hair_length">Hair Length </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->hair_length ?? 'Not Selected' }}" disabled>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="height">Height (cm) </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->height ?? 'Not Selected' }}" disabled>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="weight">Weight (kg) </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->weight ?? 'Not Selected' }}" disabled>
                                    </div>

                                    <div class="col-md-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="text_description" disabled>{{ $escort->text_description }}</textarea>
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="smoker">Smoker</label>
                                        <input type="checkbox" id="smoker" name="smoker" value="1"
                                            {{ $escort->smoker ? 'checked' : '' }} disabled>

                                        <label for="accepts_couples">Accepts Couples</label>
                                        <input type="checkbox" id="accepts_couples" name="accepts_couples"
                                            value="1" {{ $escort->accepts_couples ? 'checked' : '' }} disabled>

                                    </div>

                                    <div class="col-md-6">
                                        <label for="incall"> Incall </label>
                                        <input type="checkbox" id="incall" name="incall"
                                            {{ $escort->incall ? 'checked' : '' }} disabled>

                                        <label for="outcall">Outcall</label>
                                        <input type="checkbox" id="outcall" name="outcall"
                                            {{ $escort->outcall ? 'checked' : '' }} disabled>
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="parking">Parking</label>
                                        <input type="checkbox" id="parking" name="parking" value="1"
                                            {{ $escort->parking ? 'checked' : '' }} disabled>

                                        <label for="disabled">Disabled</label>
                                        <input type="checkbox" id="disabled" name="disabled" value="1"
                                            {{ $escort->disabled ? 'checked' : '' }} disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="elderly">Elderly</label>
                                        <input type="checkbox" id="elderly" name="elderly"
                                            value="1"{{ $escort->elderly ? 'checked' : '' }} disabled>

                                        <label for="air_conditioned">Air Conditioned</label>
                                        <input type="checkbox" id="air_conditioned" name="air_conditioned"
                                            value="1" {{ $escort->air_conditioned ? 'checked' : '' }} disabled>
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="language_spoken"> Language Spoken</label>
                                        @if ($language_spoken)
                                            <select class="form-control" id="language_spoken" name="language_spoken[]"
                                                multiple disabled>
                                                <option value="French"
                                                    {{ in_array('French', $language_spoken) ? 'selected' : '' }}>
                                                    French
                                                </option>
                                                <option value="English"
                                                    {{ in_array('English', $language_spoken) ? 'selected' : '' }}>
                                                    English
                                                </option>
                                                <option value="German"
                                                    {{ in_array('German', $language_spoken) ? 'selected' : '' }}>
                                                    German
                                                </option>
                                                <option value="Italian"
                                                    {{ in_array('Italian', $language_spoken) ? 'selected' : '' }}>
                                                    Italian
                                                </option>
                                                <option value="Spanish"
                                                    {{ in_array('Spanish', $language_spoken) ? 'selected' : '' }}>
                                                    Spanish
                                                </option>
                                                <option value="Portuguese"
                                                    {{ in_array('Portuguese', $language_spoken) ? 'selected' : '' }}>
                                                    Portuguese</option>
                                                <option value="Arabic"
                                                    {{ in_array('Arabic', $language_spoken) ? 'selected' : '' }}>
                                                    Arabic
                                                </option>
                                                <option value="Russian"
                                                    {{ in_array('Russian', $language_spoken) ? 'selected' : '' }}>
                                                    Russian
                                                </option>
                                                <option value="Chinese"
                                                    {{ in_array('Chinese', $language_spoken) ? 'selected' : '' }}>
                                                    Chinese
                                                </option>
                                                <option value="Other"
                                                    {{ in_array('Other', $language_spoken) ? 'selected' : '' }}>
                                                    Other
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="services">Services </label>
                                        @if ($services)
                                            <select class="form-control" id="services" name="services[]" multiple
                                                disabled>
                                                <option value="service1"
                                                    {{ in_array('service1', $services) ? 'selected' : '' }}>One
                                                    Option
                                                </option>
                                                <option value="service2"
                                                    {{ in_array('service2', $services) ? 'selected' : '' }}>Two
                                                    Option
                                                </option>
                                                <option value="service3"
                                                    {{ in_array('service3', $services) ? 'selected' : '' }}>Third
                                                    Option
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="availability">Availability</label>
                                        @if ($availability)
                                            <select class="form-control" id="availability" name="availability[]" multiple
                                                disabled>
                                                <option value="Monday"
                                                    {{ in_array('Monday', $availability) ? 'selected' : '' }}>
                                                    Monday
                                                </option>
                                                <option value="Tuesday"
                                                    {{ in_array('Tuesday', $availability) ? 'selected' : '' }}>
                                                    Tuesday
                                                </option>
                                                <option value="Wednesday"
                                                    {{ in_array('Wednesday', $availability) ? 'selected' : '' }}>Wednesday
                                                </option>
                                                <option value="Thursday"
                                                    {{ in_array('Thursday', $availability) ? 'selected' : '' }}>
                                                    Thursday
                                                </option>
                                                <option value="Friday"
                                                    {{ in_array('Friday', $availability) ? 'selected' : '' }}>
                                                    Friday
                                                </option>
                                                <option value="Saturday"
                                                    {{ in_array('Saturday', $availability) ? 'selected' : '' }}>
                                                    Saturday
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="currencies_accepted">Currencies Accepted</label>
                                        @if ($currencies_accepted)
                                            <select class="form-control" id="currencies_accepted"
                                                name="currencies_accepted[]" multiple disabled>
                                                <option value="CHF"
                                                    {{ in_array('CHF', $currencies_accepted) ? 'selected' : '' }}>
                                                    CHF
                                                </option>
                                                <option value="EUR"
                                                    {{ in_array('EUR', $currencies_accepted) ? 'selected' : '' }}>
                                                    EUR
                                                </option>
                                                <option value="USD"
                                                    {{ in_array('USD', $currencies_accepted) ? 'selected' : '' }}>
                                                    USD
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly />
                                        @endif
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="payment_method"> Payment Methods </label>
                                        @if ($payment_method)
                                            <select class="form-control" id="payment_method" name="payment_method[]"
                                                multiple disabled>
                                                <option value="Cash"
                                                    {{ in_array('Cash', $payment_method) ? 'selected' : '' }}>Cash
                                                </option>
                                                <option value="Credit Card"
                                                    {{ in_array('Credit Card', $payment_method) ? 'selected' : '' }}>
                                                    Credit
                                                    Card</option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label for="rates_in_chf">Rates in CHF </label>
                                        <input type="text" class="form-control"
                                            value="{{ $escort->rates_in_chf ?? 'Not Selected' }}" disabled>
                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
