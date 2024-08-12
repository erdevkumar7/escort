@extends('user.layout')
@section('page_content')
    <section>
        <div class="container mt-3 escort-login-form">
            <form action="{{ route('agency.login_submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center text-info">Agency-Login</h2>
                <div class="row jumbotron box8 login-inner-part">

                    {{-- email --}}
                    <div class="col-sm-6 form-group">
                        <label for="email">Agency Email *</label>
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
                        <a href="{{ route('agency.password.request') }}" class="fw-bold text-body float-right m-1">Forgot
                            Password</a>
                    </div>


                    <div class="col-sm-12">
                        <p class="text-center text-muted mt-3 mb-0">Don't have an agency? <a
                                href="{{ route('agency.register_form') }}" class="fw-bold text-body"><u>Register
                                    here</u></a></p>
                    </div>


                    <div class="col-sm-12 form-group mb-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
