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
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Escort-Profile</h2>
                        <button class="btn btn-default float-right">Edit Profile</button>
                    </div>

                    {{-- nickname --}}
                    <div class="col-sm-4 form-group">
                        <label for="nickname">Nickname *</label>
                        <input type="text" class="form-control" name="nickname" id="nickname"
                            value="{{ $escort->nickname ?? 'Not Selected' }}" disabled style="background-color: #fff">

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
                        <input type="text" class="form-control" value="{{ $escort->hair_color ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- hair_length --}}
                    <div class="col-sm-4 form-group">
                        <label for="hair_length">Hair Length </label>
                        <input type="text" class="form-control" value="{{ $escort->hair_length ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- height --}}
                    <div class="col-sm-4 form-group">
                        <label for="height">Height </label>
                        <input type="text" class="form-control" value="{{ $escort->height ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- weight --}}
                    <div class="col-sm-4 form-group">
                        <label for="weight">Weight </label>
                        <input type="text" class="form-control" value="{{ $escort->weight ?? 'Not Selected' }}"
                            disabled style="background-color: #fff">
                    </div>
                    {{-- rates_in_chf --}}
                    <div class="col-sm-4 form-group">
                        <label for="rates_in_chf">Rates in CHF </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->rates_in_chf ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="rates_in_chf">Rates in CHF </label>
                        <input type="text" class="form-control"
                            value="{{ $escort->rates_in_chf ?? 'Not Selected' }}" disabled
                            style="background-color: #fff">
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
