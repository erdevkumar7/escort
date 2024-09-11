@extends('user.layout-auth')
@section('auth_content')
    <div class="form-login">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        User-Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="email"
                            @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif
                            placeholder="Enter your email..." oninput="removeError('emailPasswordErr')">
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password"
                            @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif
                            placeholder="Enter your password..." oninput="removeError('emailPasswordErr')">
                    </div>
                    @if ($errors->has('email'))
                        @foreach ($errors->get('email') as $message)
                            @if ($message === 'email_not_verify')
                                <span class="text-danger input100 txt2">Your email address is not verified. Please verify your email first
                                <a href="{{ route('user.verification.notice') }}" class="text-primary">resend verification
                                    email</a>
                                </span>
                            @else
                                <span class="text-danger input100 txt2">{{ $message }}</span>
                            @endif
                        @endforeach
                    @elseif ($errors->has('password'))
                        <span class="text-danger input100 txt2">{{ $errors->first('password') }}</span>
                    @endif

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                        <div>
                            <a href="{{ route('password.request') }}" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    {{-- g-recaptcha --}}
                    <div class="g-recaptcha" data-sitekey="6LepGisqAAAAAHoBrq14Bfdc9Zn81TrSv6M-5iST"
                        data-callback="removeRecaptchaError"></div>

                    @error('g-recaptcha-response')
                        <span class="text-danger input100" id="g_recaptcha_id">{{ $message }}</span>
                    @enderror

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                        <a href="{{ route('user.register.form') }}"><button type="button"
                                class="login100-form-btn signup-btn">
                                Sign Up
                            </button></a>
                    </div>
                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection