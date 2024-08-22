@extends('user.layout-auth')
@section('auth_content')
    <div class="form-login reset-escort">
        <div class="container-login100">
            <div class="wrap-login100">

                <form class="login100-form validate-form reset-escort-form" id="reset-escort-form-id"
                    action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <span class="login100-form-title p-b-43">
                        Reset-Password
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <input class="input100" type="Password" name="password" id="pass"
                            placeholder="Enter your password." oninput="removeError('CpassPassErr')">
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Re-enter your password." oninput="removeError('CpassPassErr')">
                    </div>

                    @if ($errors->has('password_confirmation') || $errors->has('password'))
                        <span class="text-danger input100" id="CpassPassErr">
                            {{ $errors->first('email') ?: $errors->first('password') }}
                        </span>
                    @endif

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Submit
                        </button>
                    </div>
                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection
