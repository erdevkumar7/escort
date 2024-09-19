@extends('user.layout-auth')
@section('auth_content')
    <div class="form-login register-form">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="loginRegisterForm" action="{{ route('user.register.submit') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        User-Registers
                    </span>

                    <div class="row">
                        {{-- first_name --}}
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                value="{{ old('first_name') }}" placeholder="Enter your first-name"
                                oninput="removeError('first_nameErr')">
                            @error('first_name')
                                <span class="text-danger" id="first_nameErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- last_name --}}
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                value="{{ old('last_name') }}" placeholder="Enter your last-name"
                                oninput="removeError('last_nameErr')">
                            @error('last_name')
                                <span class="text-danger" id="last_nameErr">{{ $message }}</span>
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

                        <div class="col-sm-6 form-group city-select">
                            <select id="gender" name="gender" class="form-control browser-default custom-select"
                                oninput="removeError('genderErr')">
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>female</option>
                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>other</option>

                            </select>
                            @error('gender')
                                <span class="text-danger" id="genderErr">{{ $message }}</span>
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
                            @error('password_confirmation')
                                <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LepGisqAAAAAHoBrq14Bfdc9Zn81TrSv6M-5iST"
                        data-callback="removeRecaptchaError"></div>

                    @error('g-recaptcha-response')
                        <span class="text-danger" id="g_recaptcha_id">{{ $message }}</span>
                    @enderror
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn signup-btn" id="loginSignup_btn" type="submit">
                            Sign Up
                        </button>
                    </div>

                    <div class="col-sm-12 already-account">
                        <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                href="{{ route('user.login.form') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                    </div>
                </form>             
                
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>   
        
    </div>
@endsection
