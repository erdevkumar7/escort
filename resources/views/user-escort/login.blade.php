@extends('user.layout-auth')
@section('auth_content')
    <!--<section>
                                        <div class="container mt-3 escort-login-form">
                                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <h2 class="text-center text-info">Escort-Login</h2>
                                                <div class="row jumbotron box8 login-inner-part">
                                                 
                                                    {{-- email --}}
                                                    <div class="col-sm-6 form-group">
                                                        <label for="email">Email *</label>
                                                        <input type="email" class="form-control" name="email" id="email"
                                                            placeholder="Enter your email." oninput="removeError('emailErr')">
                                                        @error('email')
        <span class="text-danger" id="emailErr">{{ $message }}</span>
    @enderror
                                                    </div>

                                                    {{-- password --}}
                                                    <div class="col-sm-6 form-group ">
                                                        <label for="pass">Password</label>
                                                        <input type="Password" name="password" class="form-control" id="pass"
                                                            placeholder="Enter your password." oninput="removeError('PasswordErr')">

                                                        @error('password')
        <span class="text-danger" id="PasswordErr">{{ $message }}</span>
    @enderror
                                                        <a href="{{ route('password.request') }}" class="fw-bold text-body float-right m-1">Forgot
                                                            Password</a>
                                                    </div>


                                                    <div class="col-sm-12">
                                                        <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a
                                                                href="{{ route('escorts.register_form') }}" class="fw-bold text-body"><u>Register
                                                                    here</u></a></p>
                                                    </div>


                                                    <div class="col-sm-12 form-group mb-0">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </section>-->

    <div class="form-login">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
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
