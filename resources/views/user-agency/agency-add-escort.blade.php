@extends('user.layout-auth')
@section('auth_content')
    <div class="escort-profile">
        <div class="container-xl px-4 mt-4 agency-add-escort-containt">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link ms-0"
                    href="{{ route('agency.dashboard', Auth::guard('agency')->user()->id) }}">Dashboard</a>
                <a class="nav-link" href="{{ route('agency.profile', Auth::guard('agency')->user()->id) }}">Profile</a>
                <a class="nav-link active" href="{{ route('agency.escort_listing', Auth::guard('agency')->user()->id) }}">My
                    Listing</a>

            </nav>
            <hr class="mt-0 mb-4">
            <div class="row add-agency-escort">
                <div class="card mb-4">

                    <div class="agency-add-escort-title">
                        <h3>Add Escort</h3>
                        <a href="{{ route('agency.escort_listing', Auth::guard('agency')->user()->id) }}"><button
                                type="button" class="btn btn-primary">Back</button></a>
                    </div>

                    <form class="agency-add-escort"
                        action="{{ route('agency.add.escortFormSubmit', Auth::guard('agency')->user()->id) }}"
                        id="agency-add-escort-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            {{-- nickname --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="nickname">Nickname * </label>
                                <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}"
                                    class="form-control" oninput="removeError('nicknameErr')">
                                @error('nickname')
                                    <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- phone_number --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="phone_number">Phone Number * </label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number') }}" oninput="removeError('phoneErr')">
                                @error('phone_number')
                                    <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- address --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}">
                            </div>
                        </div>

                        <div class="row">
                            {{-- email --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="email">Email * </label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email') }}" placeholder="Enter escort email"
                                    oninput="removeError('emailErr')">
                                @error('email')
                                    <span class="text-danger" id="emailErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- password --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="password">Password * </label>
                                <input type="Password" name="password" class="form-control" id="pass"
                                    placeholder="Enter escort password." oninput="removeError('PasswordErr')">
                                @error('password')
                                    <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- confirm_password --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="password_confirmation">Confirm Password * </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Re-enter password."
                                    oninput="removeError('C_PasswordErr')">
                                @error('password_confirmation')
                                    <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- city --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="city">City *</label>
                                <select class="form-control" id="city" name="city" oninput="removeError('cityErr')">
                                    <option value="">Select City</option>
                                    <option value="city1" {{ old('city') == 'city1' ? 'selected' : '' }}>city1
                                    </option>
                                    <option value="city2" {{ old('city') == 'city2' ? 'selected' : '' }}>city2
                                    </option>
                                    <option value="city3" {{ old('city') == 'city3' ? 'selected' : '' }}>city3
                                    </option>
                                    <option value="city4" {{ old('city') == 'city4' ? 'selected' : '' }}>city4
                                    </option>
                                </select>
                                @error('city')
                                    <span class="text-danger" id="cityErr">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- age --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="age">Age <span class="required">*</span></label>
                                <select class="form-control" id="age" name="age" oninput="removeError('ageErr')">
                                    <option value="">Select Age</option>
                                    <option value="18-25" {{ old('age') == '18-25' ? 'selected' : '' }}>18-25
                                    </option>
                                    <option value="26-35" {{ old('age') == '26-35' ? 'selected' : '' }}>26-35
                                    </option>
                                    <option value="36-45" {{ old('age') == '36-45' ? 'selected' : '' }}>36-45
                                    </option>
                                    <option value="45-55" {{ old('age') == '45-55' ? 'selected' : '' }}>45-55
                                    </option>
                                    <option value="56+" {{ old('age') == '56+' ? 'selected' : '' }}>56+</option>
                                </select>
                                @error('age')
                                    <span class="text-danger" id="ageErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- origin --}}
                            <div class="col-md-4 col-sm-4 ">
                                <label for="origin">Origin<span class="required"> *</span></label>
                                <select class="form-control" id="origin" name="origin"
                                    oninput="removeError('originErr')">
                                    <option value="">Select Origin</option>
                                    <option value="Caucasian" {{ old('origin') == 'Caucasian' ? 'selected' : '' }}>
                                        Caucasian</option>
                                    <option value="Latin" {{ old('origin') == 'Latin' ? 'selected' : '' }}>Latin
                                    </option>
                                    <option value="Asian" {{ old('origin') == 'Asian' ? 'selected' : '' }}>Asian
                                    </option>
                                    <option value="Oriental" {{ old('origin') == 'Oriental' ? 'selected' : '' }}>
                                        Oriental</option>
                                    <option value="Black" {{ old('origin') == 'Black' ? 'selected' : '' }}>Black
                                    </option>
                                    <option value="Other" {{ old('origin') == 'Other' ? 'selected' : '' }}>Other
                                    </option>
                                </select>
                                @error('origin')
                                    <span class="text-danger"id="originErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- type --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="type">Type<span class="required"> *</span></label>
                                <select class="form-control" id="type" name="type"
                                    oninput="removeError('typeErr')">
                                    <option value="">Selecte Type</option>
                                    <option value="Independent Escort"
                                        {{ old('type') == 'Independent Escort' ? 'selected' : '' }}>
                                        Independent
                                        Escort</option>
                                    <option value="Escort" {{ old('type') == 'Escort' ? 'selected' : '' }}>Escort
                                    </option>
                                    <option value="Trans" {{ old('type') == 'Trans' ? 'selected' : '' }}>Trans
                                    </option>
                                    <option value="SM" {{ old('type') == 'SM' ? 'selected' : '' }}>SM</option>
                                    <option value="Salon" {{ old('type') == 'Salon' ? 'selected' : '' }}>Salon
                                    </option>
                                </select>
                                @error('type')
                                    <span class="text-danger" id="typeErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- canton --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="canton">Canton *</label>
                                <select class="form-control" id="canton" name="canton"
                                    oninput="removeError('cantonErr')">
                                    <option value="">Select Canton</option>
                                    <option value="canton1" {{ old('canton') == 'canton1' ? 'selected' : '' }}>
                                        canton1</option>
                                    <option value="canton2" {{ old('canton') == 'canton2' ? 'selected' : '' }}>
                                        canton2</option>
                                    <option value="canton3" {{ old('canton') == 'canton3' ? 'selected' : '' }}>
                                        canton3</option>
                                    <option value="canton4" {{ old('canton') == 'canton4' ? 'selected' : '' }}>
                                        canton4</option>
                                </select>
                                @error('canton')
                                    <span class="text-danger" id="cantonErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- build --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="build">Build</label>
                                <select class="form-control" id="build" name="build">
                                    <option value="">Select</option>
                                    <option value="Slim" {{ old('build') == 'Slim' ? 'selected' : '' }}>Slim
                                    </option>
                                    <option value="Normal" {{ old('build') == 'Normal' ? 'selected' : '' }}>Normal
                                    </option>
                                    <option value="Chubby" {{ old('build') == 'Chubby' ? 'selected' : '' }}>Chubby
                                    </option>
                                    <option value="Large" {{ old('build') == 'Large' ? 'selected' : '' }}>Large
                                    </option>
                                    <option value="Muscular" {{ old('build') == 'Muscular' ? 'selected' : '' }}>
                                        Muscular</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- breast_size --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="breast_size">Breast
                                    Size</label>
                                <select class="form-control" id="breast_size" name="breast_size">
                                    <option value="">Select</option>
                                    <option value="Small"{{ old('breast_size') == 'Small' ? 'selected' : '' }}>
                                        Small</option>
                                    <option value="Medium"{{ old('breast_size') == 'Medium' ? 'selected' : '' }}>
                                        Medium</option>
                                    <option value="Large"{{ old('breast_size') == 'Large' ? 'selected' : '' }}>
                                        Large</option>
                                </select>
                            </div>
                            {{-- hair_color --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="hair_color">Hair Color</label>
                                <select class="form-control" id="hair_color" name="hair_color">
                                    <option value="">Select</option>
                                    <option value="Brunette" {{ old('hair_color') == 'Brunette' ? 'selected' : '' }}>
                                        Brunette
                                    </option>
                                    <option value="Blonde" {{ old('hair_color') == 'Blonde' ? 'selected' : '' }}>
                                        Blonde</option>
                                    <option value="Red" {{ old('hair_color') == 'Red' ? 'selected' : '' }}>Red
                                    </option>
                                    <option value="Auburn" {{ old('hair_color') == 'Auburn' ? 'selected' : '' }}>
                                        Auburn</option>
                                    <option value="Grey" {{ old('hair_color') == 'Grey' ? 'selected' : '' }}>
                                        Grey</option>
                                    <option value="Other" {{ old('hair_color') == 'Other' ? 'selected' : '' }}>
                                        Other</option>
                                </select>
                            </div>
                            {{-- hair_length --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="hair_length">Hair
                                    Length</label>
                                <select class="form-control" id="hair_length" name="hair_length">
                                    <option value="">Select</option>
                                    <option value="Short" {{ old('hair_length') == 'Short' ? 'selected' : '' }}>
                                        Short</option>
                                    <option value="Medium" {{ old('hair_length') == 'Medium' ? 'selected' : '' }}>
                                        Medium</option>
                                    <option value="Long" {{ old('hair_length') == 'Long' ? 'selected' : '' }}>
                                        Long</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            {{-- height --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="height">Height
                                    (cm)</label>
                                <input type="number" class="form-control" id="height" name="height"
                                    value="{{ old('height') }}">
                            </div>
                            {{-- weight --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="weight">Weight
                                    (kg)</label>
                                <input type="number" class="form-control" id="weight" name="weight"
                                    value="{{ old('weight') }}">
                            </div>
                            {{-- pictures --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="pictures">Pictures<span class="required">*</span></label>
                                <input type="file" class="form-control" id="pictures" name="pictures[]" accept="image/*" multiple
                                    oninput="removeError('picturesErr')">
                                <input type="hidden" name="media_type_image" value="image">
                                @error('pictures')
                                    <span class="text-danger" id="picturesErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- whatsapp_number --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="whatsapp_number">WhatsApp Number</label>
                                <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number"
                                    value="{{ old('whatsapp_number') }}">
                            </div>
                            {{-- rates_in_chf --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="rates_in_chf">Rates in CHF</label>
                                <input type="text" class="form-control" id="rates_in_chf" name="rates_in_chf"
                                    value="{{ old('rates_in_chf') }}">
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <label for="video">Videos</label>
                                <input type="file" class="form-control" id="video" name="videos[]" accept="video/*" multiple>
                                <input type="hidden" name="media_type_video" value="video">
                                @error('video')
                                    <span class="text-danger" id="videoErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row p-3 check-boxes-smoker-oncall-etc">
                            <div class="col-md-4 col-sm-4">
                                {{-- smoker --}}
                                <span class="m-3">
                                    <label for="smoker">Smoker</label>
                                    <input type="checkbox" id="smoker" name="smoker" value="1"
                                        {{ old('smoker') ? 'checked' : '' }}>
                                </span>
                                {{-- elderly --}}
                                <span class="m-3">
                                    <label for="elderly">Elderly</label>
                                    <input type="checkbox" id="elderly" name="elderly" value="1"
                                        {{ old('elderly') ? 'checked' : '' }}>
                                </span>
                                {{-- parking --}}
                                <span class="m-3">
                                    <label for="parking">Parking</label>
                                    <input type="checkbox" id="parking" name="parking" value="1"
                                        {{ old('parking') ? 'checked' : '' }}>
                                </span>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                {{-- outcall --}}
                                <span class="m-3">
                                    <label for="outcall">Outcall</label>
                                    <input type="checkbox" id="outcall" name="outcall" value="1"
                                        {{ old('outcall') ? 'checked' : '' }}>
                                </span>
                                {{-- incall --}}
                                <span class="m-3">
                                    <label for="incall">Incall</label>
                                    <input type="checkbox" id="incall" name="incall" value="1"
                                        {{ old('incall') ? 'checked' : '' }}>
                                </span>
                                {{-- disabled --}}
                                <span class="m-3">
                                    <label for="disabled">Disabled</label>
                                    <input type="checkbox" id="disabled" name="disabled" value="1"
                                        {{ old('disabled') ? 'checked' : '' }}>
                                </span>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                {{-- accepts_couples --}}
                                <span class="m-3">
                                    <label for="accepts_couples">Accepts Couples</label>
                                    <input type="checkbox" id="accepts_couples" name="accepts_couples" value="1"
                                        {{ old('accepts_couples') ? 'checked' : '' }}>
                                </span>
                                {{-- air_conditioned --}}
                                <span class="m-3">
                                    <label for="air_conditioned">Air Conditioned</label>
                                    <input type="checkbox" id="air_conditioned" name="air_conditioned" value="1"
                                        {{ old('air_conditioned') ? 'checked' : '' }}>
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            {{-- language_spoken --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="languages_spoken">Languages Spoken</label>
                                <select class="form-control" id="language_spoken" name="language_spoken[]" multiple>
                                    <option value="French"
                                        {{ in_array('French', old('language_spoken', [])) ? 'selected' : '' }}>
                                        French</option>
                                    <option value="English"
                                        {{ in_array('English', old('language_spoken', [])) ? 'selected' : '' }}>
                                        English</option>
                                    <option value="German"
                                        {{ in_array('German', old('language_spoken', [])) ? 'selected' : '' }}>
                                        German</option>
                                    <option value="Italian"
                                        {{ in_array('Italian', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Italian</option>
                                    <option value="Spanish"
                                        {{ in_array('Spanish', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Spanish</option>
                                    <option value="Portuguese"
                                        {{ in_array('Portuguese', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Portuguese</option>
                                    <option value="Arabic"
                                        {{ in_array('Arabic', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Arabic</option>
                                    <option value="Russian"
                                        {{ in_array('Russian', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Russian</option>
                                    <option value="Chinese"
                                        {{ in_array('Chinese', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Chinese</option>
                                    <option value="Other"
                                        {{ in_array('Other', old('language_spoken', [])) ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                            </div>
                            {{-- services --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="services">Services *</label>
                                <select class="form-control" id="services" name="services[]" multiple
                                    oninput="removeError('servicesErr')">
                                    <option value="service1"
                                        {{ in_array('service1', old('services', [])) ? 'selected' : '' }}>One
                                        Option</option>
                                    <option value="service2"
                                        {{ in_array('service2', old('services', [])) ? 'selected' : '' }}>Two
                                        Option</option>
                                    <option value="service3"
                                        {{ in_array('service3', old('services', [])) ? 'selected' : '' }}>
                                        Third
                                        Option</option>
                                </select>
                                @error('services')
                                    <span class="text-danger" id="servicesErr">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- description --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="description">Description *</label>
                                <textarea class="form-control" id="description" name="text_description" oninput="removeError('descriptionErr')">{{ old('text_description') }}</textarea>
                                @error('text_description')
                                    <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            {{-- availability --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="availability">Availability</label>
                                <select class="form-control" id="availability" name="availability[]" multiple>
                                    <option value="Monday"
                                        {{ in_array('Monday', old('availability', [])) ? 'selected' : '' }}>
                                        Monday
                                    </option>
                                    <option value="Tuesday"
                                        {{ in_array('Tuesday', old('availability', [])) ? 'selected' : '' }}>
                                        Tuesday</option>
                                    <option value="Wednesday"
                                        {{ in_array('Wednesday', old('availability', [])) ? 'selected' : '' }}>
                                        Wednesday</option>
                                    <option value="Thursday"
                                        {{ in_array('Thursday', old('availability', [])) ? 'selected' : '' }}>
                                        Thursday</option>
                                    <option value="Friday"
                                        {{ in_array('Friday', old('availability', [])) ? 'selected' : '' }}>
                                        Friday
                                    </option>
                                    <option value="Saturday"
                                        {{ in_array('Saturday', old('availability', [])) ? 'selected' : '' }}>
                                        Saturday</option>
                                </select>
                            </div>
                            {{-- currencies_accepted --}}
                            <div class="col-md-4 col-sm-4">
                                <label for="currencies_accepted">Currencies Accepted</label>
                                <select class="form-control" id="currencies_accepted" name="currencies_accepted[]"
                                    multiple>
                                    <option value="CHF"
                                        {{ in_array('CHF', old('currencies_accepted', [])) ? 'selected' : '' }}>CHF
                                    </option>
                                    <option value="EUR"
                                        {{ in_array('EUR', old('currencies_accepted', [])) ? 'selected' : '' }}>EUR
                                    </option>
                                    <option value="USD"
                                        {{ in_array('USD', old('currencies_accepted', [])) ? 'selected' : '' }}>USD
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-4">
                                <label for="payment_method">Payment Methods</label>
                                <select class="form-control" id="payment_method" name="payment_method[]" multiple>
                                    <option value="Cash"
                                        {{ in_array('Cash', old('payment_method', [])) ? 'selected' : '' }}>
                                        Cash
                                    </option>
                                    <option value="Credit Card"
                                        {{ in_array('Credit Card', old('payment_method', [])) ? 'selected' : '' }}>Credit
                                        Card
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row cancel-reset-submit-button">
                            <div class="col-md-4 col-sm-4 offset-md-3 route-listing-btn">
                                <a href="{{ route('agency.escort_listing', Auth::guard('agency')->user()->id) }}">
                                    <button class="btn btn-one" type="button">Cancel</button></a>
                                <button class="btn btn-three" type="reset">Reset</button>
                                <button type="submit" class="btn btn-two">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
