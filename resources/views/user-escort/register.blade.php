@extends('user.layout-auth')
@section('auth_content')
    <div class="form-login register-form">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('escorts.register_submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Escort-Register
                    </span>

                    <div class="row">
                        {{-- nickname --}}
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="nickname" id="nickname"
                                value="{{ old('nickname') }}" placeholder="Enter your name"
                                oninput="removeError('nicknameErr')">
                            @error('nickname')
                                <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- phone_number --}}
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Enter phone number." value="{{ old('phone_number') }}"
                                oninput="removeError('phoneErr')">
                            @error('phone_number')
                                <span class="text-danger" id="phoneErr">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- email --}}
                        <div class="col-sm-6 form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" placeholder="Enter your email"
                                oninput="removeError('emailErr')">
                            @error('email')
                                <span class="text-danger" id="emailErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- address --}}
                        <div class="col-sm-6 form-group">
                            <input type="address" class="form-control" name="address" id="address"
                                value="{{ old('address') }}" placeholder="Enter your address">
                        </div>
                    </div>

                    <div class="row">
                        {{-- city --}}
                        <div class="col-sm-6 form-group city-select">
                            <select id="city" name="city" class="form-control browser-default custom-select"
                                oninput="removeError('cityErr')">
                                <option value="">Select city</option>
                                <option value="city1" {{ old('city') == 'city1' ? 'selected' : '' }}>city1</option>
                                <option value="city2" {{ old('city') == 'city2' ? 'selected' : '' }}>city2</option>
                                <option value="city3" {{ old('city') == 'city3' ? 'selected' : '' }}>city3</option>
                                <option value="city4" {{ old('city') == 'city4' ? 'selected' : '' }}>city4</option>
                            </select>
                            @error('city')
                                <span class="text-danger" id="cityErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- age --}}
                        <div class="col-sm-6 form-group age-select">
                            <select id="age" name="age" class="form-control browser-default custom-select"
                                oninput="removeError('ageErr')">
                                <option value="">Select age</option>
                                <option value="18-25" {{ old('age') == '18-25' ? 'selected' : '' }}>18-25</option>
                                <option value="26-35" {{ old('age') == '26-35' ? 'selected' : '' }}>26-35</option>
                                <option value="36-45" {{ old('age') == '36-45' ? 'selected' : '' }}>36-45</option>
                                <option value="45-55" {{ old('age') == '45-55' ? 'selected' : '' }}>45-55</option>
                                <option value="56+" {{ old('age') == '56+' ? 'selected' : '' }}>56+</option>
                            </select>
                            @error('age')
                                <span class="text-danger" id="ageErr">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- password --}}
                        <div class="col-sm-6 form-group">
                            <input type="Password" name="password" class="form-control" id="pass"
                                placeholder="Enter your password." oninput="removeError('PasswordErr')">
                            @error('password')
                                <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- password_confirmation --}}
                        <div class="col-sm-6 form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="Re-enter your password."
                                oninput="removeError('C_PasswordErr')">
                        </div>
                    </div>

                    @error('password_confirmation')
                        <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                    @enderror

                    <!--         <div class="flex-sb-m w-full p-t-3 p-b-32">
                                                       <div class="contact100-form-checkbox">
                                                          <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                                          <label class="label-checkbox100" for="ckb1">
                                                          Remember me
                                                          </label>
                                                       </div>
                                                       <div>
                                                          <a href="#" class="txt1">
                                                          Forgot Password?
                                                          </a>
                                                       </div>
                                                    </div -->
                    {{-- ------------------------------------------------------------------------ --}}

                    {{-- {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!} --}}

                    <div class="g-recaptcha" data-sitekey="6LepGisqAAAAAHoBrq14Bfdc9Zn81TrSv6M-5iST"
                        data-callback="removeRecaptchaError"></div>

                    @error('g-recaptcha-response')
                        <span class="text-danger" id="g_recaptcha_id">{{ $message }}</span>
                    @enderror
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn signup-btn">
                            Sign Up
                        </button>
                    </div>

                    <div class="col-sm-12 already-account">
                        <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                href="{{ route('login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                    </div>

                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>

    </div>
@endsection
