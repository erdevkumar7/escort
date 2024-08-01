<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>
    <!-- nav  -->
    @include('user.topNav')

    <section>
        <div class="container mt-3 escort-login-form">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <div class="row jumbotron box8 ">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Reset-Password</h2>
                    </div>
                    {{-- password --}}
                    <div class="col-sm-6 form-group ">
                        <label for="pass">New Password</label>
                        <input type="Password" name="password" class="form-control" id="pass"
                            placeholder="Enter your password." oninput="removeError('PasswordErr')">

                        @error('password')
                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- password_confirmation --}}
                    <div class="col-sm-6 form-group">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="Re-enter your password."
                            oninput="removeError('C_PasswordErr')">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-12 form-group mb-0 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
