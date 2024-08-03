<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.headerCSS')
</head>

<body>
    <!-- nav  -->
    @include('user.topNav')
    <section>
        <div class="container mt-3 escort-register">
            <form >
                @csrf
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">My Profile</h2>
                       <a href="{{route('escorts.profileEditForm', $escort->id)}}">
                        <button type="button"
                            class="btn btn-default float-right">Edit Profile</button></a>
                    </div>

                    {{-- nickname --}}
                    <div class="col-sm-4 form-group">
                        <label for="nickname">Nickname *</label>
                        <input type="text" id="nick-name" name="nickname" value="{{ $escort->nickname ?? 'Not Selected' }}"
                            class="form-control " disabled style="background-color: #fff">
                     
                    </div>
                    {{-- email --}}
                    <div class="col-sm-4 form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $escort->email ?? 'Not Selected' }}" disabled style="background-color: #fff">

                    </div>
                    {{-- phone_number --}}
                    <div class="col-sm-4 form-group">
                        <label for="phone_number">Phone Number *</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            value="{{ $escort->phone_number ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">

                    </div>
                    {{-- whatsapp_number --}}
                    <div class="col-sm-4 form-group">
                        <label for="whatsapp_number">WhatsApp Number </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->whatsapp_number ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    {{-- address --}}
                    <div class="col-sm-4 form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address"
                            value="{{ $escort->address ?? 'Not Selected' }}" disabled style="background-color: #fff">
                    </div>
                    {{-- city --}}
                    <div class="col-sm-4 form-group">
                        <label for="city">City *</label>
                        <input type="text" class="form-control" value="{{ $escort->city ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- age --}}
                    <div class="col-sm-4 form-group">
                        <label for="age">Age *</label>
                        <input type="text" class="form-control" value="{{ $escort->age ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    {{-- origin --}}
                    <div class="col-sm-4 form-group">
                        <label for="origin">Origin </label>
                        <input type="text" class="form-control" value="{{ $escort->origin ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- type --}}
                    <div class="col-sm-4 form-group">
                        <label for="type">Type </label>
                        <input type="text" class="form-control" value="{{ $escort->type ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- build --}}
                    <div class="col-sm-4 form-group">
                        <label for="build">Build </label>
                        <input type="text" class="form-control" value="{{ $escort->build ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- canton --}}
                    <div class="col-sm-4 form-group">
                        <label for="canton">Canton </label>
                        <input type="text" class="form-control" value="{{ $escort->canton ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- breast_size --}}
                    <div class="col-sm-4 form-group">
                        <label for="breast_size">Breast Size </label>
                        <input type="text" class="form-control" value="{{ $escort->breast_size ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- hair_color --}}
                    <div class="col-sm-4 form-group">
                        <label for="hair_color">Hair color </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->hair_color ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    {{-- hair_length --}}
                    <div class="col-sm-4 form-group">
                        <label for="hair_length">Hair Length </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->hair_length ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    {{-- height --}}
                    <div class="col-sm-4 form-group">
                        <label for="height">Height (cm) </label>
                        <input type="text" class="form-control" value="{{ $escort->height ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- weight --}}
                    <div class="col-sm-4 form-group">
                        <label for="weight">Weight (kg) </label>
                        <input type="text" class="form-control" value="{{ $escort->weight ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- description --}}
                    <div class="col-sm-8 form-group">
                        <label for="description">Description *</label>
                        <textarea class="form-control" id="description" name="text_description" disabled style="background-color: #fff">{{ $escort->text_description }}</textarea>
                    </div>

                    <div class="col-sm-4 form-group">
                        {{-- smoker --}}
                        <span class="m-3">
                            <label for="smoker">Smoker</label>
                            <input type="checkbox" id="smoker" name="smoker" value="1"
                                {{ $escort->smoker ? 'checked' : '' }} disabled>
                        </span>
                        {{-- elderly --}}
                        <span class="m-3">
                            <label for="elderly">Elderly</label>
                            <input type="checkbox" id="elderly" name="elderly"
                                value="1"{{ $escort->elderly ? 'checked' : '' }} disabled>
                        </span>
                        {{-- parking --}}
                        <span class="m-3">
                            <label for="parking">Parking</label>
                            <input type="checkbox" id="parking" name="parking" value="1"
                                {{ $escort->parking ? 'checked' : '' }} disabled>
                        </span>
                    </div>
                    <div class="col-sm-4 form-group">
                        {{-- outcall --}}
                        <span class="m-3">
                            <label for="outcall">Outcall</label>
                            <input type="checkbox" id="outcall" name="outcall"
                                {{ $escort->outcall ? 'checked' : '' }} disabled>
                        </span>
                        {{-- incall --}}
                        <span class="m-3">
                            <label for="incall"> Incall </label>
                            <input type="checkbox" id="incall" name="incall"
                                {{ $escort->incall ? 'checked' : '' }} disabled>
                        </span>
                        {{-- disabled --}}
                        <span class="m-3">
                            <label for="disabled">Disabled</label>
                            <input type="checkbox" id="disabled" name="disabled" value="1"
                                {{ $escort->disabled ? 'checked' : '' }} disabled>
                        </span>
                    </div>
                    <div class="col-sm-4 form-group">
                        {{-- accepts_couples --}}
                        <span class="m-2">
                            <label for="accepts_couples">Accepts Couples</label>
                            <input type="checkbox" id="accepts_couples" name="accepts_couples" value="1"
                                {{ $escort->accepts_couples ? 'checked' : '' }} disabled>
                        </span>
                        {{-- air_conditioned --}}
                        <span class="m-2">
                            <label for="air_conditioned">Air Conditioned</label>
                            <input type="checkbox" id="air_conditioned" name="air_conditioned" value="1"
                                {{ $escort->air_conditioned ? 'checked' : '' }} disabled>
                        </span>
                    </div>
                    {{-- language_spoken --}}
                    <div class="col-sm-4 form-group">
                        <label for="language_spoken"> Language Spoken</label>
                        @if ($language_spoken)
                            <select class="form-control" id="language_spoken" name="language_spoken[]" multiple
                                disabled>
                                <option value="French" {{ in_array('French', $language_spoken) ? 'selected' : '' }}>
                                    French
                                </option>
                                <option value="English" {{ in_array('English', $language_spoken) ? 'selected' : '' }}>
                                    English
                                </option>
                                <option value="German" {{ in_array('German', $language_spoken) ? 'selected' : '' }}>
                                    German
                                </option>
                                <option value="Italian" {{ in_array('Italian', $language_spoken) ? 'selected' : '' }}>
                                    Italian
                                </option>
                                <option value="Spanish" {{ in_array('Spanish', $language_spoken) ? 'selected' : '' }}>
                                    Spanish
                                </option>
                                <option value="Portuguese"
                                    {{ in_array('Portuguese', $language_spoken) ? 'selected' : '' }}>
                                    Portuguese</option>
                                <option value="Arabic" {{ in_array('Arabic', $language_spoken) ? 'selected' : '' }}>
                                    Arabic
                                </option>
                                <option value="Russian" {{ in_array('Russian', $language_spoken) ? 'selected' : '' }}>
                                    Russian
                                </option>
                                <option value="Chinese" {{ in_array('Chinese', $language_spoken) ? 'selected' : '' }}>
                                    Chinese
                                </option>
                                <option value="Other" {{ in_array('Other', $language_spoken) ? 'selected' : '' }}>
                                    Other
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="Not Selected" readonly>
                        @endif
                    </div>
                    {{-- services --}}
                    <div class="col-sm-4 form-group">
                        <label for="services">Services </label>
                        @if ($services)
                            <select class="form-control" id="services" name="services[]" multiple disabled>
                                <option value="service1" {{ in_array('service1', $services) ? 'selected' : '' }}>One
                                    Option
                                </option>
                                <option value="service2" {{ in_array('service2', $services) ? 'selected' : '' }}>Two
                                    Option
                                </option>
                                <option value="service3" {{ in_array('service3', $services) ? 'selected' : '' }}>Third
                                    Option
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="Not Selected" readonly>
                        @endif
                    </div>
                    {{-- availability --}}
                    <div class="col-sm-4 form-group">
                        <label for="availability">Availability</label>
                        @if ($availability)
                            <select class="form-control" id="availability" name="availability[]" multiple disabled>
                                <option value="Monday" {{ in_array('Monday', $availability) ? 'selected' : '' }}>
                                    Monday
                                </option>
                                <option value="Tuesday" {{ in_array('Tuesday', $availability) ? 'selected' : '' }}>
                                    Tuesday
                                </option>
                                <option value="Wednesday"
                                    {{ in_array('Wednesday', $availability) ? 'selected' : '' }}>Wednesday
                                </option>
                                <option value="Thursday" {{ in_array('Thursday', $availability) ? 'selected' : '' }}>
                                    Thursday
                                </option>
                                <option value="Friday" {{ in_array('Friday', $availability) ? 'selected' : '' }}>
                                    Friday
                                </option>
                                <option value="Saturday" {{ in_array('Saturday', $availability) ? 'selected' : '' }}>
                                    Saturday
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="Not Selected" readonly>
                        @endif
                    </div>
                    {{-- rates_in_chf --}}
                    <div class="col-sm-4 form-group">
                        <label for="rates_in_chf">Rates in CHF </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->rates_in_chf ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    {{-- currencies_accepted --}}
                    <div class="col-sm-4 form-group">
                        <label for="currencies_accepted">Currencies Accepted</label>
                        @if ($currencies_accepted)
                            <select class="form-control" id="currencies_accepted" name="currencies_accepted[]"
                                multiple disabled>
                                <option value="CHF" {{ in_array('CHF', $currencies_accepted) ? 'selected' : '' }}>
                                    CHF
                                </option>
                                <option value="EUR" {{ in_array('EUR', $currencies_accepted) ? 'selected' : '' }}>
                                    EUR
                                </option>
                                <option value="USD" {{ in_array('USD', $currencies_accepted) ? 'selected' : '' }}>
                                    USD
                                </option>
                            </select>
                        @else
                            <input type="text" class="form-control" value="Not Selected" readonly />
                        @endif
                    </div>

                    {{-- payment_method --}}
                    <div class="col-sm-4 form-group">
                        <label for="payment_method"> Payment Methods </label>
                        @if ($payment_method)
                            <select class="form-control" id="payment_method" name="payment_method[]" multiple
                                disabled>
                                <option value="Cash" {{ in_array('Cash', $payment_method) ? 'selected' : '' }}>Cash
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
            </form>
        </div>
    </section>
    <!-- footer -->
    @include('user.footer')
    <!-- footerJS -->
    @include('user.footerJS')

</body>

</html>
