@extends('admin.layout')

@section('page_content')
    <!-- page content -->
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
                                            <video width="600" controls>
                                                @foreach ($video as $vdo)
                                                    <source src="{{ asset('videos') . '/' . $vdo }}" type="video/mp4">
                                                @endforeach
                                            </video>
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
                                            <input type="number" class="form-control" id="build" name="build"
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
                                        <label for="payment_methods"
                                            class="col-form-label col-md-3 col-sm-3 label-align">Payment
                                            Methods</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control" id="payment_methods" name="payment_methods[]"
                                                multiple>
                                                @foreach ($payment_methods as $payment)
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
    </div>
    <!-- /page content -->
@endsection
