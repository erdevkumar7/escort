@extends('user.layout-auth')
@section('auth_content') 
    <div class="form-login">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Escort Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="email"
                            placeholder="Enter your email..." oninput="removeError('emailPasswordErr')">
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Enter your password..."
                            oninput="removeError('emailPasswordErr')">
                    </div>
                    @if ($errors->has('email') || $errors->has('password'))
                        <span class="text-danger input100" id="emailPasswordErr">
                            {{ $errors->first('email') ?: $errors->first('password') }}
                        </span>
                    @endif

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
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
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                        <a href="{{ route('escorts.register_form') }}"><button type="button"
                                class="login100-form-btn signup-btn">
                                Sign Up
                            </button></a>
                    </div>
                    <!--<div class="login100-form-social flex-c-m">
                                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                    <i class="fa fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    </div>-->
                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection
