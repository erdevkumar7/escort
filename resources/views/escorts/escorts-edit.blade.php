@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Edit escort</h3>
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
                            <form action="{{ route('admin.edit_escorts', $escort->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    {{-- nickname --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="nickname">Nickname * </label>
                                        <input type="text" id="nick-name" name="nickname" value="{{ $escort->nickname }}"
                                            class="form-control ">
                                        @error('nickname')
                                            <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" value="{{ $escort->phone_number }}"
                                            id="phone_number" name="phone_number">
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $escort->address }}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- city --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="city">City *</label>
                                        <select class="form-control" id="city" name="city">
                                            <!-- Add options dynamically from the database -->
                                            <option value="city1" {{ $escort->city == 'city1' ? 'selected' : '' }}>city1
                                            </option>
                                            <option value="city2" {{ $escort->city == 'city2' ? 'selected' : '' }}>city2
                                            </option>
                                            <option value="city3" {{ $escort->city == 'city3' ? 'selected' : '' }}>city3
                                            </option>
                                            <option value="city4" {{ $escort->city == 'city4' ? 'selected' : '' }}>city4
                                            </option>
                                        </select>
                                        @error('city')
                                            <span class="text-danger" id="cityErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- age --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="age">Age <span class="required">*</span></label>
                                        <select class="form-control" id="age" name="age">
                                            <option value="18-25" {{ $escort->age == '18-25' ? 'selected' : '' }}>18-25
                                            </option>
                                            <option value="26-35" {{ $escort->age == '26-35' ? 'selected' : '' }}>26-35
                                            </option>
                                            <option value="36-45" {{ $escort->age == '36-45' ? 'selected' : '' }}>36-45
                                            </option>
                                            <option value="45-55" {{ $escort->age == '45-55' ? 'selected' : '' }}>45-55
                                            </option>
                                            <option value="56+" {{ $escort->age == '56+' ? 'selected' : '' }}>56+
                                            </option>
                                        </select>
                                        @error('age')
                                            <span class="text-danger" id="ageErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- origin --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="origin">Origin *</label>
                                        <select class="form-control" id="origin" name="origin">
                                            <option value="Caucasian"
                                                {{ $escort->origin == 'Caucasian' ? 'selected' : '' }}>Caucasian</option>
                                            <option value="Latin" {{ $escort->origin == 'Latin' ? 'selected' : '' }}>
                                                Latin</option>
                                            <option value="Asian" {{ $escort->origin == 'Asian' ? 'selected' : '' }}>
                                                Asian</option>
                                            <option value="Oriental" {{ $escort->origin == 'Oriental' ? 'selected' : '' }}>
                                                Oriental</option>
                                            <option value="Black" {{ $escort->origin == 'Black' ? 'selected' : '' }}>
                                                Black</option>
                                            <option value="Other" {{ $escort->origin == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                        @error('origin')
                                            <span class="text-danger"id="originErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- type --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="type">Type<span class="required"> *</span></label>
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="Independent Escort"
                                                {{ $escort->type == 'Independent Escort' ? 'selected' : '' }}>Independent
                                                Escort</option>
                                            <option value="Escort" {{ $escort->type == 'Escort' ? 'selected' : '' }}>
                                                Escort</option>
                                            <option value="Trans" {{ $escort->type == 'Trans' ? 'selected' : '' }}>Trans
                                            </option>
                                            <option value="SM" {{ $escort->type == 'SM' ? 'selected' : '' }}>SM
                                            </option>
                                            <option value="Salon" {{ $escort->type == 'Salon' ? 'selected' : '' }}>Salon
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger" id="typeErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- canton --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="canton">Canton *</label>
                                        <select class="form-control" id="canton" name="canton">
                                            <option value="canton" {{ $escort->canton == 'canton' ? 'selected' : '' }}>
                                                canton</option>
                                            <option value="canton2" {{ $escort->canton == 'canton2' ? 'selected' : '' }}>
                                                canton2</option>
                                            <option value="canton3" {{ $escort->canton == 'canton3' ? 'selected' : '' }}>
                                                canton3</option>
                                            <option value="canton4" {{ $escort->canton == 'canton4' ? 'selected' : '' }}>
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
                                            <option value="Slim" {{ $escort->build == 'Slim' ? 'selected' : '' }}>Slim
                                            </option>
                                            <option value="Normal" {{ $escort->build == 'Normal' ? 'selected' : '' }}>
                                                Normal</option>
                                            <option value="Chubby" {{ $escort->build == 'Chubby' ? 'selected' : '' }}>
                                                Chubby</option>
                                            <option value="Large" {{ $escort->build == 'Large' ? 'selected' : '' }}>Large
                                            </option>
                                            <option value="Muscular" {{ $escort->build == 'Muscular' ? 'selected' : '' }}>
                                                Muscular</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- breast_size --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="breast_size">Breast Size</label>
                                        <select class="form-control" id="breast_size" name="breast_size">
                                            <option value="">Select</option>
                                            <option value="Small"
                                                {{ $escort->breast_size == 'Small' ? 'selected' : '' }}>Small</option>
                                            <option value="Medium"
                                                {{ $escort->breast_size == 'Medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="Large"
                                                {{ $escort->breast_size == 'Large' ? 'selected' : '' }}>Large</option>
                                        </select>
                                    </div>
                                    {{-- hair_color --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_color">Hair Color</label>
                                        <select class="form-control" id="hair_color" name="hair_color">
                                            <option value="">Select</option>
                                            <option value="Brunette"
                                                {{ $escort->hair_color == 'Brunette' ? 'selected' : '' }}>Brunette</option>
                                            <option value="Blonde"
                                                {{ $escort->hair_color == 'Blonde' ? 'selected' : '' }}>
                                                Blonde</option>
                                            <option value="Red" {{ $escort->hair_color == 'Red' ? 'selected' : '' }}>
                                                Red
                                            </option>
                                            <option value="Auburn"
                                                {{ $escort->hair_color == 'Auburn' ? 'selected' : '' }}>
                                                Auburn</option>
                                            <option value="Grey" {{ $escort->hair_color == 'Grey' ? 'selected' : '' }}>
                                                Grey</option>
                                            <option value="Other" {{ $escort->hair_color == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                    {{-- hair_length --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_length">Hair Length</label>
                                        <select class="form-control" id="hair_length" name="hair_length">
                                            <option value="">Select</option>
                                            <option value="Short"{{ $escort->hair_length == 'Short' ? 'selected' : '' }}>
                                                Short</option>
                                            <option
                                                value="Medium"{{ $escort->hair_length == 'Medium' ? 'selected' : '' }}>
                                                Medium</option>
                                            <option value="Long"{{ $escort->hair_length == 'Long' ? 'selected' : '' }}>
                                                Long</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- height --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="height">Height (cm)</label>
                                        <input type="number" class="form-control" id="height" name="height"
                                            value="{{ $escort->height }}">
                                    </div>
                                    {{-- weight --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="weight">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight" name="weight"
                                            value="{{ $escort->weight }}">
                                    </div>
                                    {{-- whatsapp_number --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="whatsapp_number">WhatsApp Number</label>
                                        <input type="text" class="form-control" id="whatsapp_number"
                                            name="whatsapp_number" value="{{ $escort->whatsapp_number }}">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- description --}}
                                    <div class="col-md-8 col-sm-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="text_description" oninput="removeError('descriptionErr')">{{ $escort->text_description }}</textarea>
                                        @error('text_description')
                                            <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- rates_in_chf --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="rates_in_chf">Rates in CHF</label>
                                        <input type="text" class="form-control" id="rates_in_chf" name="rates_in_chf"
                                            value="{{ $escort->rates_in_chf }}">
                                    </div>
                                </div>

                                <div class="item form-group p-3">
                                    <div class="col-md-4 col-sm-4">
                                        {{-- smoker --}}
                                        <span class="m-3">
                                            <label for="smoker">Smoker</label>
                                            <input type="checkbox" id="smoker" name="smoker" value="1"
                                                {{ $escort->smoker == true ? 'checked' : '' }}>
                                        </span>
                                        {{-- elderly --}}
                                        <span class="m-3">
                                            <label for="elderly">Elderly</label>
                                            <input type="checkbox" id="elderly" name="elderly" value="1"
                                                {{ $escort->elderly == true ? 'checked' : '' }}>
                                        </span>
                                        {{-- parking --}}
                                        <span class="m-3">
                                            <label for="parking">Parking</label>
                                            <input type="checkbox" id="parking" name="parking" value="1"
                                                {{ $escort->parking == true ? 'checked' : '' }}>
                                        </span>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        {{-- outcall --}}
                                        <span class="m-3">
                                            <label for="outcall">Outcall</label>
                                            <input type="checkbox" id="outcall"
                                                {{ $escort->outcall == true ? 'checked' : '' }} name="outcall"
                                                value="1">
                                        </span>
                                        {{-- incall --}}
                                        <span class="m-3">
                                            <label for="incall"> Incall </label>
                                            <input type="checkbox" id="incall" name="incall" value="1"
                                                {{ $escort->incall == true ? 'checked' : '' }}>
                                        </span>
                                        {{-- disabled --}}
                                        <span class="m-3">
                                            <label for="disabled">Disabled</label>
                                            <input type="checkbox" id="disabled" name="disabled" value="1"
                                                {{ $escort->disabled == true ? 'checked' : '' }}>
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        {{-- accepts_couples --}}
                                        <span class="m-3">
                                            <label for="accepts_couples">Accepts Couples</label>
                                            <input type="checkbox" id="accepts_couples" name="accepts_couples"
                                                value="1" {{ $escort->accepts_couples == true ? 'checked' : '' }}>
                                        </span>
                                        {{-- air_conditioned --}}
                                        <span class="m-3">
                                            <label for="air_conditioned">Air Conditioned</label>
                                            <input type="checkbox" id="air_conditioned" name="air_conditioned"
                                                {{ $escort->air_conditioned == true ? 'checked' : '' }} value="1">
                                        </span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- language_spoken --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="languages_spoken">Languages Spoken</label>
                                        @if ($language_spoken)
                                            <select class="form-control" id="language_spoken" name="language_spoken[]"
                                                multiple>
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
                                            <select class="form-control" id="language_spoken" name="language_spoken[]"
                                                multiple>
                                                <option value="French">French</option>
                                                <option value="English">English</option>
                                                <option value="German">German</option>
                                                <option value="Italian">Italian</option>
                                                <option value="Spanish">Spanish</option>
                                                <option value="Portuguese">Portuguese</option>
                                                <option value="Arabic">Arabic</option>
                                                <option value="Russian">Russian</option>
                                                <option value="Chinese">Chinese</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        @endif
                                    </div>
                                    {{-- services --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="services">Services *</label>
                                        @if ($services)
                                            <select class="form-control" id="services" name="services[]" multiple>
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
                                            <select class="form-control" id="availability" name="availability[]"
                                                multiple>
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
                                            <select class="form-control" id="availability" name="availability[]"
                                                multiple>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                                <option value="Saturday">Saturday</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- currencies_accepted --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="currencies_accepted">Currencies Accepted</label>
                                        @if ($currencies_accepted)
                                            <select class="form-control" id="currencies_accepted"
                                                name="currencies_accepted[]" multiple>
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
                                            <select class="form-control" id="currencies_accepted"
                                                name="currencies_accepted[]" multiple>
                                                <option value="CHF">CHF</option>
                                                <option value="EUR">EUR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        @endif
                                    </div>
                                    {{-- payment_method --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="payment_method">Payment Methods</label>
                                        @if ($payment_method)
                                            <select class="form-control" id="payment_method" name="payment_method[]"
                                                multiple>
                                                <option value="Cash"
                                                    {{ in_array('Cash', $payment_method) ? 'selected' : '' }}>Cash
                                                </option>
                                                <option value="Credit Card"
                                                    {{ in_array('Credit Card', $payment_method) ? 'selected' : '' }}>
                                                    Credit
                                                    Card</option>
                                            </select>
                                        @else
                                            <select class="form-control" id="payment_method" name="payment_method[]"
                                                multiple>
                                                <option value="Cash">Cash</option>
                                                <option value="Credit Card">Credit Card</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- pictures --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="pictures">Pictures *</label></div>
                                        @if ($pictures)
                                            @foreach ($pictures as $picture)
                                                <img src="{{ asset('/public/images/escorts_img/') . '/' . $picture->name }}"
                                                    alt="..." width="200px" height="200px">
                                            @endforeach
                                        @else
                                            <div></div>
                                        @endif
                                        <input type="file" class="form-control" id="pictures" name="pictures[]"
                                            multiple>
                                        <input type="hidden" name="image_type" value="image">
                                        @error('pictures')
                                            <span class="text-danger" id="picturesErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- video --}}
                                    <div class="col-md-6 col-sm-6">
                                        <div><label for="video">Videos</label></div>
                                        @if ($videos)
                                            @foreach ($videos as $vdo)
                                                <video width="300" controls>
                                                    <source src="{{ asset('/public/videos') . '/' . $vdo->name }}"
                                                        type="video/mp4">
                                                </video>
                                            @endforeach
                                        @endif
                                        <input type="file" class="form-control" id="videos" name="videos[]"
                                            multiple>
                                        <input type="hidden" name="video_type" value="video">
                                        @error('videos')
                                            <span class="text-danger" id="videoErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                {{-- submit button  --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-3">
                                        <a href="{{ route('admin.escorts') }}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button type="submit" class="btn btn-success">Submit</button>
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
