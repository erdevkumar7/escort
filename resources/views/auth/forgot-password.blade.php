@extends('user.layout-auth')
@section('auth_content')  
    <div class="form-login forgot-escort-form" id="forgot-escort-form-id">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('password.email') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Forgot-Password
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="email"
                            placeholder="Enter your email..." oninput="removeError('emailErr')">
                        @error('email')
                            <span class="text-danger input100" id="emailErr">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Send Password Reset Link
                        </button>

                        <p class="text-center text-muted mt-3 mb-0"> <a
                            href="{{route('login')}}" class="fw-bold text-body"><u>Back To Login</u></a></p>
                    </div>
                </form>
                <div class="login100-more"
                    style="background-image: url('https://votivelaravel.in/escorts/public/images/static_img/loginform-pic.jpg');">
                </div>
            </div>
        </div>
    </div>
@endsection
