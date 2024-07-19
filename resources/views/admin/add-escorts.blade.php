@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>New escorts</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.post.escorts') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Mandatory Fields -->
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nick-name">Nickname
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="nick-name" name="nickname" class="form-control ">
                                    </div>
                                    @error('nickname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="description">Description<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <textarea class="form-control" id="description" name="text_description"></textarea>
                                    </div>
                                    @error('text_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="pictures">Pictures<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" class="form-control" id="pictures" name="pictures[]" multiple>
                                    </div>
                                    @error('pictures[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone
                                        Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                                    </div>
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="age" class="col-form-label col-md-3 col-sm-3 label-align">Age <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="age" name="age">
                                            <option value="18-25">18-25</option>
                                            <option value="26-35">26-35</option>
                                            <option value="36-45">36-45</option>
                                            <option value="45-55">45-55</option>
                                            <option value="56+">56+</option>
                                        </select>
                                    </div>
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="canton" class="col-form-label col-md-3 col-sm-3 label-align">Canton<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="canton" name="canton">
                                            <option value="canton">canton</option>
                                            <option value="canton2">canton2</option>
                                            <option value="canton3">canton3</option>
                                            <option value="canton4">canton4</option>
                                        </select>
                                    </div>
                                    @error('canton')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="city" class="col-form-label col-md-3 col-sm-3 label-align">City<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="city" name="city">
                                            <!-- Add options dynamically from the database -->
                                            <option value="city">city</option>
                                            <option value="city2">city2</option>
                                            <option value="city3">city3</option>
                                            <option value="city4">city4</option>
                                        </select>
                                    </div>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="services" class="col-form-label col-md-3 col-sm-3 label-align">Services<span
                                            class="required">*<span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="services" name="services[]" multiple>
                                            <option value="1">One Option</option>
                                            <option value="2">Two Option</option>
                                            <option value="3">Third Option</option>
                                        </select>
                                    </div>
                                    @error('services[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="origin" class="col-form-label col-md-3 col-sm-3 label-align">Origin<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="origin" name="origin">
                                            <option value="Caucasian">Caucasian</option>
                                            <option value="Latin">Latin</option>
                                            <option value="Asian">Asian</option>
                                            <option value="Oriental">Oriental</option>
                                            <option value="Black">Black</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    @error('origin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="type" class="col-form-label col-md-3 col-sm-3 label-align">Type<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="Independent Escort">Independent Escort</option>
                                            <option value="Escort">Escort</option>
                                            <option value="Trans">Trans</option>
                                            <option value="SM">SM</option>
                                            <option value="Salon">Salon</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Non-Mandatory Fields -->
                                <div class="item form-group">
                                    <label for="video"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Videos</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="file" class="form-control" id="video" name="video[]" multiple>
                                    </div>
                                    @error('video[]')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="hair_color" class="col-form-label col-md-3 col-sm-3 label-align">Hair
                                        Color</label>
                                    <div class="col-md-6 col-sm-6 ">
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
                                    @error('hair_color')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="hair_length" class="col-form-label col-md-3 col-sm-3 label-align">Hair
                                        Length</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="hair_length" name="hair_length">
                                            <option value="">Select</option>
                                            <option value="Short">Short</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Long">Long</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="breast_size" class="col-form-label col-md-3 col-sm-3 label-align">Breast
                                        Size</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="breast_size" name="breast_size">
                                            <option value="">Select</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="height" class="col-form-label col-md-3 col-sm-3 label-align">Height
                                        (cm)</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" id="height" name="height">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="weight" class="col-form-label col-md-3 col-sm-3 label-align">Weight
                                        (kg)</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" id="weight" name="weight">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="build"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Build</label>
                                    <div class="col-md-6 col-sm-6">
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
                                    <label for="smoker"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Smoker</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" name="smoker" value="0">
                                        <input type="checkbox" id="smoker" name="smoker" value="1">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="languages_spoken"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Languages
                                        Spoken</label>
                                    <div class="col-md-6 col-sm-6">
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
                                </div>

                                <div class="item form-group">
                                    <label for="address"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="address" name="address">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="outcall"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Outcall</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" id="outcall" name="outcall" value="0">
                                        <input type="checkbox" id="outcall" name="outcall" value="1">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="incall"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Incall</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" id="incall" name="incall" value="0">
                                        <input type="checkbox" id="incall" name="incall" value="1">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="whatsapp_number"
                                        class="col-form-label col-md-3 col-sm-3 label-align">WhatsApp
                                        Number</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="whatsapp_number"
                                            name="whatsapp_number">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="availability"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Availability</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="language_spoken" name="availability[]"
                                            multiple>
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                            <option value="saturday">Saturday</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="container d-flex justify-content-center align-items-center">
                                    <div class="row">
                                        <span class="m-3">
                                            <label for="parking">Parking</label>
                                            <input type="checkbox" id="parking" name="parking" value="1">
                                            
                                        </span>
                                        <span class="m-3">
                                            <label for="disabled">Disabled</label>
                                            <input type="checkbox" id="disabled" name="disabled" value="1">
                                        </span>
                                        <span class="m-3">
                                            <label for="accepts_couples">Accepts
                                                Couples</label>
                                            <input type="checkbox" id="accepts_couples" name="accepts_couples" value="1">
                                        </span>
                                        <span class="m-3">
                                            <label for="elderly">Elderly</label>
                                            <input type="checkbox" id="elderly" name="elderly" value="1">
                                        </span>
                                        <span class="m-3">
                                            <label for="air_conditioned">Air
                                                Conditioned</label>
                                            <input type="checkbox" id="air_conditioned" name="air_conditioned" value="1">
                                        </span>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="rates_in_chf" class="col-form-label col-md-3 col-sm-3 label-align">Rates
                                        in
                                        CHF</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="rates_in_chf"
                                            name="rates_in_chf">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="currencies_accepted"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Currencies
                                        Accepted</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="currencies_accepted"
                                            name="currencies_accepted[]" multiple>
                                            <option value="CHF">CHF</option>
                                            <option value="EUR">EUR</option>
                                            <option value="USD">USD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="payment_methods"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Payment
                                        Methods</label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="payment_methods" name="payment_methods[]"
                                            multiple>
                                            <option value="Cash">Cash</option>
                                            <option value="Credit Card">Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
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
