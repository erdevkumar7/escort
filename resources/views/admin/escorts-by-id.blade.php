@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    {{-- <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Escorts details</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            <form>
                                <!-- Mandatory Fields -->
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nick-name">Nickname
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="nick-name" name="nickname"
                                            value="{{ $escorts->nickname }}" class="form-control " readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="description">Description<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea class="form-control" id="description" name="text_description">{{ $escorts->text_description }}</textarea>
                                    </div>
                                </div>

                                @if ($pictures)
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="pictures">Pictures<span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            @foreach ($pictures as $picture)
                                                <img src="{{ asset('images/escorts_img') . '/' . $picture }}" alt=""
                                                    width="200px" height="200px" />
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone
                                        Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $escorts->phone_number }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="age" class="col-form-label col-md-3 col-sm-3 label-align">Age <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="age" name="age"
                                            value="{{ $escorts->age }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="canton" class="col-form-label col-md-3 col-sm-3 label-align">Canton<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="canton" name="canton"
                                            value="{{ $escorts->canton }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="city" class="col-form-label col-md-3 col-sm-3 label-align">City<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{ $escorts->city }}" readonly>
                                    </div>
                                </div>
                                @if ($services)
                                    <div class="item form-group">
                                        <label for="services"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Services<span
                                                class="required">*<span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="form-control" id="services" name="services[]" multiple>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service }}" disabled>{{ $service }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="item form-group">
                                    <label for="origin" class="col-form-label col-md-3 col-sm-3 label-align">Origin<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="origin" name="origin"
                                            value="{{ $escorts->origin }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="type" class="col-form-label col-md-3 col-sm-3 label-align">Type<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="type" name="type"
                                            value="{{ $escorts->type }}" readonly>
                                    </div>
                                </div>

                                <!-- Non-Mandatory Fields -->
                                @if ($video)
                                    <div class="item form-group">
                                        <label for="video"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Videos</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            @foreach ($video as $vdo)
                                                <video width="600" controls>
                                                    <source src="{{ asset('videos') . '/' . $vdo }}" type="video/mp4">
                                                </video>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->hair_color)
                                    <div class="item form-group">
                                        <label for="hair_color" class="col-form-label col-md-3 col-sm-3 label-align">Hair
                                            Color</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" class="form-control" id="hair_color" name="hair_color"
                                                value="{{ $escorts->hair_color }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->hair_length)
                                    <div class="item form-group">
                                        <label for="hair_length" class="col-form-label col-md-3 col-sm-3 label-align">Hair
                                            Length</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="hair_length"
                                                name="hair_length" value="{{ $escorts->hair_length }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->breast_size)
                                    <div class="item form-group">
                                        <label for="breast_size"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Breast
                                            Size</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="breast_size"
                                                name="breast_size" value="{{ $escorts->breast_size }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->height)
                                    <div class="item form-group">
                                        <label for="height" class="col-form-label col-md-3 col-sm-3 label-align">Height
                                            (cm)</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="number" class="form-control" id="height" name="height"
                                                value="{{ $escorts->height }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->weight)
                                    <div class="item form-group">
                                        <label for="weight" class="col-form-label col-md-3 col-sm-3 label-align">Weight
                                            (kg)</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="number" class="form-control" id="weight" name="weight"
                                                value="{{ $escorts->weight }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->build)
                                    <div class="item form-group">
                                        <label for="build"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Build</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="build" name="build"
                                                value="{{ $escorts->build }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                <div class="item form-group">
                                    <label for="smoker"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Smoker</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="checkbox" id="smoker" name="smoker" value="1"
                                            {{ $escorts->smoker ? 'checked' : '' }} disabled>
                                    </div>
                                </div>

                                @if ($language_spoken)
                                    <div class="item form-group">
                                        <label for="languages_spoken"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Languages Spoken</label>

                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="language_spoken" name="language_spoken[]"
                                                multiple>
                                                @foreach ($language_spoken as $language)
                                                    <option value="{{ $language }}" disabled>{{ $language }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if ($escorts->address)
                                    <div class="item form-group">
                                        <label for="address"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="address" name="address"
                                                value="{{ $escorts->address }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                <div class="item form-group">
                                    <label for="outcall"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Outcall</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="checkbox" id="outcall" name="outcall"
                                            {{ $escorts->outcall ? 'checked' : '' }} disabled>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="incall"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Incall</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="checkbox" id="incall" name="incall"
                                            {{ $escorts->incall ? 'checked' : '' }} disabled>
                                    </div>
                                </div>

                                @if ($escorts->whatsapp_numbe)
                                    <div class="item form-group">
                                        <label for="whatsapp_number"
                                            class="col-form-label col-md-3 col-sm-3 label-align">WhatsApp
                                            Number</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="whatsapp_number"
                                                name="whatsapp_number" value="{{ $escorts->whatsapp_number }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($availability)
                                    <div class="item form-group">
                                        <label for="availability"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Availability</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="availability" name="availability[]"
                                                multiple>
                                                @foreach ($availability as $available)
                                                    <option value="{{ $available }}" disabled>{{ $available }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="container d-flex justify-content-center align-items-center">
                                    <div class="row">
                                        <span class="m-3">
                                            <label for="parking">Parking</label>
                                            <input type="checkbox" id="parking" name="parking" value="1"
                                                {{ $escorts->parking ? 'checked' : '' }} disabled>

                                        </span>
                                        <span class="m-3">
                                            <label for="disabled">Disabled</label>
                                            <input type="checkbox" id="disabled" name="disabled" value="1"
                                                {{ $escorts->disabled ? 'checked' : '' }} disabled>
                                        </span>
                                        <span class="m-3">
                                            <label for="accepts_couples">Accepts
                                                Couples</label>
                                            <input type="checkbox" id="accepts_couples" name="accepts_couples"
                                                value="1" {{ $escorts->accepts_couples ? 'checked' : '' }} disabled>
                                        </span>
                                        <span class="m-3">
                                            <label for="elderly">Elderly</label>
                                            <input type="checkbox" id="elderly" name="elderly"
                                                value="1"{{ $escorts->elderly ? 'checked' : '' }} disabled>
                                        </span>
                                        <span class="m-3">
                                            <label for="air_conditioned">Air
                                                Conditioned</label>
                                            <input type="checkbox" id="air_conditioned" name="air_conditioned"
                                                value="1" {{ $escorts->air_conditioned ? 'checked' : '' }} disabled>
                                        </span>
                                    </div>
                                </div>

                                @if ($escorts->rates_in_chf)
                                    <div class="item form-group">
                                        <label for="rates_in_chf"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Rates
                                            in
                                            CHF</label>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" id="rates_in_chf"
                                                name="rates_in_chf" value="{{ $escorts->rates_in_chf }}" readonly>
                                        </div>
                                    </div>
                                @endif

                                @if ($currencies_accepted)
                                    <div class="item form-group">
                                        <label for="currencies_accepted"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Currencies
                                            Accepted</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="currencies_accepted"
                                                name="currencies_accepted[]" multiple>
                                                @foreach ($currencies_accepted as $currency)
                                                    <option value="{{ $currency }}" disabled> {{ $currency }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if ($payment_method)
                                    <div class="item form-group">
                                        <label for="payment_method"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Payment
                                            Methods</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="payment_method" name="payment_method[]"
                                                multiple>
                                                @foreach ($payment_method as $payment)
                                                    <option value="{{ $payment }}" disabled>{{ $payment }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- ------------------------------------------------------ --}}
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Escorts details</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.post.escorts') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    {{-- nickname --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="nickname">Nickname * </label>
                                        <input type="text" id="nick-name" name="nickname"
                                            value="{{ $escorts->nickname }}" class="form-control " readonly>
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $escorts->phone_number }}" readonly>
                                    </div>
                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $escorts->address }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- city --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="city">City *</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                            value="{{ $escorts->city }}" readonly>
                                    </div>
                                    {{-- age --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="age">Age <span class="required">*</span></label>
                                        <input type="text" class="form-control" id="age" name="age"
                                            value="{{ $escorts->age }}" readonly>
                                    </div>
                                    {{-- origin --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="origin">Origin<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="origin" name="origin"
                                            value="{{ $escorts->origin }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- type --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="type">Type<span class="required"> *</span></label>
                                        <input type="text" class="form-control" id="type" name="type"
                                            value="{{ $escorts->type }}" readonly>
                                    </div>
                                    {{-- canton --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="canton">Canton *</label>
                                        <input type="text" class="form-control" id="canton" name="canton"
                                            value="{{ $escorts->canton }}" readonly>
                                    </div>
                                    {{-- build --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="build">Build</label>
                                        <input type="text" class="form-control" id="build" name="build"
                                            value="{{ $escorts->build }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- breast_size --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="breast_size">Breast Size</label>
                                        <input type="text" class="form-control" id="breast_size" name="breast_size"
                                            value="{{ $escorts->breast_size }}" readonly>
                                    </div>
                                    {{-- hair_color --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_color">Hair Color</label>
                                        <input type="text" class="form-control" id="hair_color" name="hair_color"
                                            value="{{ $escorts->hair_color }}" readonly>
                                    </div>
                                    {{-- hair_length --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_length">Hair Length</label>
                                        <input type="text" class="form-control" id="hair_length" name="hair_length"
                                            value="{{ $escorts->hair_length }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- height --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="height">Height (cm)</label>
                                        <input type="number" class="form-control" id="height" name="height"
                                            value="{{ $escorts->height }}" readonly>
                                    </div>
                                    {{-- weight --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="weight">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight" name="weight"
                                            value="{{ $escorts->weight }}" readonly>
                                    </div>
                                    {{-- whatsapp_number --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="whatsapp_number">WhatsApp Number</label>
                                        <input type="text" class="form-control" id="whatsapp_number"
                                            name="whatsapp_number" value="{{ $escorts->whatsapp_number }}" readonly>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- services --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="services">Services *</label>
                                        <select class="form-control" multiple>
                                            @foreach ($services as $service)
                                                <option value="{{ $service }}" disabled>{{ $service }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- description --}}
                                    <div class="col-md-8 col-sm-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="text_description" readonly>{{ $escorts->text_description }}</textarea>
                                    </div>
                                </div>

                                <div class="item form-group p-3">
                                    <div class="col-md-4 col-sm-4">
                                        {{-- smoker --}}
                                        <span class="m-3">
                                            <label for="smoker">Smoker</label>
                                            <input type="checkbox" id="smoker" name="smoker" value="1"
                                                {{ $escorts->smoker ? 'checked' : '' }} disabled>
                                        </span>
                                        {{-- elderly --}}
                                        <span class="m-3">
                                            <label for="elderly">Elderly</label>
                                            <input type="checkbox" id="elderly" name="elderly"
                                                value="1"{{ $escorts->elderly ? 'checked' : '' }} disabled>
                                        </span>
                                        {{-- parking --}}
                                        <span class="m-3">
                                            <label for="parking">Parking</label>
                                            <input type="checkbox" id="parking" name="parking" value="1"
                                                {{ $escorts->parking ? 'checked' : '' }} disabled>
                                        </span>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        {{-- outcall --}}
                                        <span class="m-3">
                                            <label for="outcall">Outcall</label>
                                            <input type="checkbox" id="outcall" name="outcall"
                                                {{ $escorts->outcall ? 'checked' : '' }} disabled>
                                        </span>
                                        {{-- incall --}}
                                        <span class="m-3">
                                            <label for="incall"> Incall </label>
                                            <input type="checkbox" id="incall" name="incall"
                                                {{ $escorts->incall ? 'checked' : '' }} disabled>
                                        </span>
                                        {{-- disabled --}}
                                        <span class="m-3">
                                            <label for="disabled">Disabled</label>
                                            <input type="checkbox" id="disabled" name="disabled" value="1"
                                                {{ $escorts->disabled ? 'checked' : '' }} disabled>
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        {{-- accepts_couples --}}
                                        <span class="m-3">
                                            <label for="accepts_couples">Accepts Couples</label>
                                            <input type="checkbox" id="accepts_couples" name="accepts_couples"
                                                value="1" {{ $escorts->accepts_couples ? 'checked' : '' }} disabled>
                                        </span>
                                        {{-- air_conditioned --}}
                                        <span class="m-3">
                                            <label for="air_conditioned">Air Conditioned</label>
                                            <input type="checkbox" id="air_conditioned" name="air_conditioned"
                                                value="1" {{ $escorts->air_conditioned ? 'checked' : '' }} disabled>
                                        </span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- language_spoken --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="languages_spoken">Languages Spoken</label>
                                        @if ($language_spoken)
                                            <select class="form-control" multiple>
                                                @foreach ($language_spoken as $language)
                                                    <option value="{{ $language }}" disabled>{{ $language }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                    {{-- availability --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="availability">Availability</label>
                                        @if ($availability)
                                            <select class="form-control" multiple>
                                                @foreach ($availability as $available)
                                                    <option value="{{ $available }}" disabled>{{ $available }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                    {{-- currencies_accepted --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="currencies_accepted">Currencies Accepted</label>
                                        @if ($currencies_accepted)
                                            <select class="form-control" multiple>
                                                @foreach ($currencies_accepted as $currency)
                                                    <option value="{{ $currency }}" disabled> {{ $currency }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly />
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- rates_in_chf --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="rates_in_chf">Rates in CHF</label>
                                        <input type="text" class="form-control" id="rates_in_chf" name="rates_in_chf"
                                            value="{{ $escorts->rates_in_chf }}" readonly>
                                    </div>
                                    {{-- payment_method --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="payment_method"> Payment Methods </label>
                                        @if ($payment_method)
                                            <select class="form-control" multiple>
                                                @foreach ($payment_method as $payment)
                                                    <option value="{{ $payment }}" disabled>{{ $payment }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- pictures --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="pictures">Pictures *</label></div>
                                        @foreach ($pictures as $picture)
                                            <img src="{{ asset('images/escorts_img') . '/' . $picture }}" alt=""
                                                width="200px" height="200px" />
                                        @endforeach
                                    </div>
                                    {{-- video --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="video">Videos</label></div>
                                        @if ($video)
                                            @foreach ($video as $vdo)
                                                <video width="300" controls>
                                                    <source src="{{ asset('videos') . '/' . $vdo }}" type="video/mp4">
                                                </video>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /page content -->
@endsection
