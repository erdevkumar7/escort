@extends('user.layout-auth')
@section('auth_content')
    {{-- <section>
        <div class="container mt-3 escort-register">
            <form id="agency_register_form" action="{{ route('agency.register.form_submit') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h2 class="text-center text-info">Agency-Register</h2>

                <div class="row jumbotron box8 register-inner-content">

                    <div class="col-sm-6 form-group">
                        <label for="name">Agency Name *</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                            placeholder="Enter Agency Name." oninput="removeError('nameErr')">
                        @error('name')
                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="col-sm-6 form-group">
                        <label for="phone_number">Phone Number *</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="Enter Your Contact Number." value="{{ old('phone_number') }}"
                            oninput="removeError('phoneErr')">
                        @error('phone_number')
                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                            placeholder="Enter your email." oninput="removeError('emailErr')">
                        @error('email')
                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address"
                            value="{{ old('address') }}" placeholder="Enter Your Address">
                    </div>
                   
                    <div class="col-sm-6 form-group">
                        <label for="pass">Password</label>
                        <input type="Password" name="password" class="form-control" id="pass"
                            placeholder="Enter your password." oninput="removeError('PasswordErr')">
                        @error('password')
                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                        @enderror
                    </div>
                  
                    <div class="col-sm-6 form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Re-enter your password." oninput="removeError('C_PasswordErr')">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-12">
                        <p class="text-center text-muted mt-3 mb-0">Have already an agency? <a
                                href="{{ route('agency.login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                    </div>


                    <div class="col-sm-12 form-group mb-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </section> --}}

    <div class="form-login register-form">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" id="agency_register_form"
                    action="{{ route('agency.register.form_submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Agency-Register
                    </span>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" placeholder="Enter agency name."
                                oninput="removeError('nameErr')">
                            @error('name')
                                <span class="text-danger" id="nameErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="nickname" id="nickname"
                                value="{{ old('nickname') }}" placeholder="Enter your name"
                                oninput="removeError('nicknameErr')">
                            @error('nickname')
                                <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                            @enderror
                        </div> --}}

                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Enter contact number." value="{{ old('phone_number') }}"
                                oninput="removeError('phoneErr')">
                            @error('phone_number')
                                <span class="text-danger" id="phoneErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="col-sm-6 form-group">
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Enter phone number." value="{{ old('phone_number') }}"
                                oninput="removeError('phoneErr')">
                            @error('phone_number')
                                <span class="text-danger" id="phoneErr">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>

                    <div class="row">
                        {{-- email --}}
                        <div class="col-sm-6 form-group">
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" placeholder="Enter agency email."
                                oninput="removeError('emailErr')">
                            @error('email')
                                <span class="text-danger" id="emailErr">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- address --}}
                        <div class="col-sm-6 form-group">
                            <input type="address" class="form-control" name="address" id="address"
                                value="{{ old('address') }}" placeholder="Enter agency address">
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
                        <button class="login100-form-btn signup-btn">
                            Sign Up
                        </button>
                    </div>

                    <div class="col-sm-12 already-account">
                        <p class="text-center text-muted mt-3 mb-0">Have already an account? <a
                                href="{{ route('agency.login') }}" class="fw-bold text-body"><u>Login here</u></a></p>
                    </div>

                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>

    </div>
@endsection
