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
            <form action="{{ route('password.email') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row jumbotron box8 ">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Forgot-Password</h2>
                    </div>

                    {{-- email --}}
                    <div class="col-sm-6 form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter your email." oninput="removeError('emailErr')">
                        @error('email')
                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-12">
                        <p class="text-center text-muted mt-3 mb-0"> <a
                                href="{{route('login')}}" class="fw-bold text-body"><u>Back To Login</u></a></p>
                    </div>


                    <div class="col-sm-12 form-group mb-0 text-center">
                        <button type="submit" class="btn btn-primary ">Send Password Reset Link</button>
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
