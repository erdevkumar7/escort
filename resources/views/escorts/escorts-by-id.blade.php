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
                                    {{-- description --}}
                                    <div class="col-md-8 col-sm-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="text_description" readonly>{{ $escorts->text_description }}</textarea>
                                    </div>
                                    {{-- rates_in_chf --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="rates_in_chf">Rates in CHF</label>
                                        <input type="text" class="form-control" id="rates_in_chf" name="rates_in_chf"
                                            value="{{ $escorts->rates_in_chf }}" readonly>
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
                                            <select class="form-control" id="language_spoken" name="language_spoken[]"
                                                multiple disabled>
                                                <option value="French"
                                                    {{ in_array('French', $language_spoken) ? 'selected' : '' }}>French
                                                </option>
                                                <option value="English"
                                                    {{ in_array('English', $language_spoken) ? 'selected' : '' }}>English
                                                </option>
                                                <option value="German"
                                                    {{ in_array('German', $language_spoken) ? 'selected' : '' }}>German
                                                </option>
                                                <option value="Italian"
                                                    {{ in_array('Italian', $language_spoken) ? 'selected' : '' }}>Italian
                                                </option>
                                                <option value="Spanish"
                                                    {{ in_array('Spanish', $language_spoken) ? 'selected' : '' }}>Spanish
                                                </option>
                                                <option value="Portuguese"
                                                    {{ in_array('Portuguese', $language_spoken) ? 'selected' : '' }}>
                                                    Portuguese</option>
                                                <option value="Arabic"
                                                    {{ in_array('Arabic', $language_spoken) ? 'selected' : '' }}>Arabic
                                                </option>
                                                <option value="Russian"
                                                    {{ in_array('Russian', $language_spoken) ? 'selected' : '' }}>Russian
                                                </option>
                                                <option value="Chinese"
                                                    {{ in_array('Chinese', $language_spoken) ? 'selected' : '' }}>Chinese
                                                </option>
                                                <option value="Other"
                                                    {{ in_array('Other', $language_spoken) ? 'selected' : '' }}>Other
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                    {{-- services --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="services">Services *</label>
                                        @if ($services)
                                            <select class="form-control" id="services" name="services[]" multiple
                                                disabled>
                                                <option value="service1"
                                                    {{ in_array('service1', $services) ? 'selected' : '' }}>One Option
                                                </option>
                                                <option value="service2"
                                                    {{ in_array('service2', $services) ? 'selected' : '' }}>Two Option
                                                </option>
                                                <option value="service3"
                                                    {{ in_array('service3', $services) ? 'selected' : '' }}>Third Option
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                    {{-- availability --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="availability">Availability</label>
                                        @if ($availability)
                                            <select class="form-control" id="availability" name="availability[]" multiple
                                                disabled>
                                                <option value="Monday"
                                                    {{ in_array('Monday', $availability) ? 'selected' : '' }}>Monday
                                                </option>
                                                <option value="Tuesday"
                                                    {{ in_array('Tuesday', $availability) ? 'selected' : '' }}>Tuesday
                                                </option>
                                                <option value="Wednesday"
                                                    {{ in_array('Wednesday', $availability) ? 'selected' : '' }}>Wednesday
                                                </option>
                                                <option value="Thursday"
                                                    {{ in_array('Thursday', $availability) ? 'selected' : '' }}>Thursday
                                                </option>
                                                <option value="Friday"
                                                    {{ in_array('Friday', $availability) ? 'selected' : '' }}>Friday
                                                </option>
                                                <option value="Saturday"
                                                    {{ in_array('Saturday', $availability) ? 'selected' : '' }}>Saturday
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- currencies_accepted --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="currencies_accepted">Currencies Accepted</label>
                                        @if ($currencies_accepted)
                                            <select class="form-control" id="currencies_accepted"
                                                name="currencies_accepted[]" multiple disabled>
                                                <option value="CHF"
                                                    {{ in_array('CHF', $currencies_accepted) ? 'selected' : '' }}>CHF
                                                </option>
                                                <option value="EUR"
                                                    {{ in_array('EUR', $currencies_accepted) ? 'selected' : '' }}>EUR
                                                </option>
                                                <option value="USD"
                                                    {{ in_array('USD', $currencies_accepted) ? 'selected' : '' }}>USD
                                                </option>
                                            </select>
                                        @else
                                            <input type="text" class="form-control" value="Not Selected" readonly />
                                        @endif
                                    </div>
                                    {{-- payment_method --}}
                                    <div class="col-md-4 col-sm-4">
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
                                </div>

                                <div class="item form-group">
                                    {{-- pictures --}}

                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="pictures">Pictures *</label></div>
                                        @if ($pictures)
                                            @foreach ($pictures as $picture)
                                                <img src="{{ asset('/public/images/escorts_img') . '/' . $picture }}"
                                                    alt="" width="200px" height="200px" />
                                            @endforeach
                                        @else
                                            <div></div>
                                        @endif
                                    </div>

                                    {{-- video --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="video">Videos</label></div>
                                        @if ($video)
                                            @foreach ($video as $vdo)
                                                <video width="300" controls>
                                                    <source src="{{ asset('/public/videos') . '/' . $vdo }}"
                                                        type="video/mp4">
                                                </video>
                                            @endforeach
                                        @else
                                            <div></div>
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
