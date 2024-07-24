@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>New escort</h3>
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
                            <form action="{{ route('admin.agency.add_escorts', $agency->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    {{-- nickname --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="nickname">Nickname *</label>
                                        <input type="text" id="nickname" name="nickname" class="form-control"
                                            oninput="removeError('nicknameErr')">
                                        @error('nickname')
                                            <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            oninput="removeError('phoneErr')">
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- city --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="city">City *</label>
                                        <select class="form-control" id="city" name="city"
                                            oninput="removeError('cityErr')">
                                            <option value="">Select City</option>
                                            <option value="city">city</option>
                                            <option value="city2">city2</option>
                                            <option value="city3">city3</option>
                                            <option value="city4">city4</option>
                                        </select>
                                        @error('city')
                                            <span class="text-danger" id="cityErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- age --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="age">Age <span class="required">*</span></label>
                                        <select class="form-control" id="age" name="age"
                                            oninput="removeError('ageErr')">
                                            <option value="">Select Age</option>
                                            <option value="18-25">18-25</option>
                                            <option value="26-35">26-35</option>
                                            <option value="36-45">36-45</option>
                                            <option value="45-55">45-55</option>
                                            <option value="56+">56+</option>
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
                                            <option value="Caucasian">Caucasian</option>
                                            <option value="Latin">Latin</option>
                                            <option value="Asian">Asian</option>
                                            <option value="Oriental">Oriental</option>
                                            <option value="Black">Black</option>
                                            <option value="Other">Other</option>
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
                                        <select class="form-control" id="type" name="type"
                                            oninput="removeError('typeErr')">
                                            <option value="">Selecte Type</option>
                                            <option value="Independent Escort">Independent Escort</option>
                                            <option value="Escort">Escort</option>
                                            <option value="Trans">Trans</option>
                                            <option value="SM">SM</option>
                                            <option value="Salon">Salon</option>
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
                                            <option value="canton">canton</option>
                                            <option value="canton2">canton2</option>
                                            <option value="canton3">canton3</option>
                                            <option value="canton4">canton4</option>
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
                                            <option value="Slim">Slim</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Chubby">Chubby</option>
                                            <option value="Large">Large</option>
                                            <option value="Muscular">Muscular</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- breast_size --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="breast_size">Breast
                                            Size</label>
                                        <select class="form-control" id="breast_size" name="breast_size">
                                            <option value="">Select</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                                    {{-- hair_color --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_color">Hair Color</label>
                                        <select class="form-control" id="hair_color" name="hair_color">
                                            <option value="">Select</option>
                                            <option value="Brunette">Brunette</option>
                                            <option value="Blonde">Blonde</option>
                                            <option value="Red">Red</option>
                                            <option value="Auburn">Auburn</option>
                                            <option value="Grey">Grey</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    {{-- hair_length --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="hair_length">Hair
                                            Length</label>
                                        <select class="form-control" id="hair_length" name="hair_length">
                                            <option value="">Select</option>
                                            <option value="Short">Short</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Long">Long</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- height --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="height">Height
                                            (cm)</label>
                                        <input type="number" class="form-control" id="height" name="height">
                                    </div>
                                    {{-- weight --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="weight">Weight
                                            (kg)</label>
                                        <input type="number" class="form-control" id="weight" name="weight">
                                    </div>
                                    {{-- pictures --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="pictures">Pictures<span class="required">*</span></label>
                                        <input type="file" class="form-control" id="pictures" name="pictures[]"
                                            multiple oninput="removeError('picturesErr')">
                                        @error('pictures')
                                            <span class="text-danger" id="picturesErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- whatsapp_number --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="whatsapp_number">WhatsApp Number</label>
                                        <input type="text" class="form-control" id="whatsapp_number"
                                            name="whatsapp_number">
                                    </div>
                                    {{-- rates_in_chf --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="rates_in_chf">Rates in CHF</label>
                                        <input type="text" class="form-control" id="rates_in_chf"
                                            name="rates_in_chf">
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <label for="video">Videos</label>
                                        <input type="file" class="form-control" id="video" name="video[]"
                                            multiple>
                                        @error('video')
                                            <span class="text-danger" id="videoErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group p-3">
                                    <div class="col-md-4 col-sm-4">
                                        {{-- smoker --}}
                                        <span class="m-3">
                                            <label for="smoker">Smoker</label>
                                            <input type="checkbox" id="smoker" name="smoker" value="1">
                                        </span>
                                        {{-- elderly --}}
                                        <span class="m-3">
                                            <label for="elderly">Elderly</label>
                                            <input type="checkbox" id="elderly" name="elderly" value="1">
                                        </span>
                                        {{-- parking --}}
                                        <span class="m-3">
                                            <label for="parking">Parking</label>
                                            <input type="checkbox" id="parking" name="parking" value="1">
                                        </span>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        {{-- outcall --}}
                                        <span class="m-3">
                                            <label for="outcall">Outcall</label>
                                            <input type="checkbox" id="outcall" name="outcall" value="1">
                                        </span>
                                        {{-- incall --}}
                                        <span class="m-3">
                                            <label for="incall"> Incall </label>
                                            <input type="checkbox" id="incall" name="incall" value="1">
                                        </span>
                                        {{-- disabled --}}
                                        <span class="m-3">
                                            <label for="disabled">Disabled</label>
                                            <input type="checkbox" id="disabled" name="disabled" value="1">
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        {{-- accepts_couples --}}
                                        <span class="m-3">
                                            <label for="accepts_couples">Accepts Couples</label>
                                            <input type="checkbox" id="accepts_couples" name="accepts_couples"value="1">
                                        </span>
                                        {{-- air_conditioned --}}
                                        <span class="m-3">
                                            <label for="air_conditioned">Air
                                                Conditioned</label>
                                            <input type="checkbox" id="air_conditioned" name="air_conditioned"
                                                value="1">
                                        </span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- language_spoken --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="languages_spoken">Languages Spoken</label>
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
                                    </div>
                                    {{-- services --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="services">Services *</label>
                                        <select class="form-control" id="services" name="services[]" multiple
                                            oninput="removeError('servicesErr')">
                                            <option value="service1">One Option</option>
                                            <option value="service2">Two Option</option>
                                            <option value="service3">Third Option</option>
                                        </select>
                                        @error('services')
                                            <span class="text-danger" id="servicesErr">{{ $message }}</span>
                                        @enderror
                                    </div>                                    
                                    {{-- description --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="text_description" oninput="removeError('descriptionErr')"></textarea>
                                        @error('text_description')
                                            <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- availability --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="availability">Availability</label>
                                        <select class="form-control" id="availability" name="availability[]" multiple>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                    </div>
                                    {{-- currencies_accepted --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="currencies_accepted">Currencies Accepted</label>
                                        <select class="form-control" id="currencies_accepted"
                                            name="currencies_accepted[]" multiple>
                                            <option value="CHF">CHF</option>
                                            <option value="EUR">EUR</option>
                                            <option value="USD">USD</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <label for="payment_method">Payment Methods</label>
                                        <select class="form-control" id="payment_method" name="payment_method[]"
                                            multiple>
                                            <option value="Cash">Cash</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-3">
                                        <a href="{{ route('admin.escorts') }}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
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
