<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('admin_register') }}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="Name" oninput="removeError('nameError')" />
                        @error('name')
                        <span class="text-danger" id="nameError">{{ $message }}</span>
                         @enderror
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" oninput="removeError('emailError')" />
                        @error('email')
                        <span class="text-danger" id="emailError">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" oninput="removeError('passwordError')"
                         />
                         @error('password')
                         <span class="text-danger" id="passwordError">{{$message}}</span>
                         @enderror
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" oninput="removeError('conf_passwordError')" >
                        @error('password_confirmation')
                        <span class="text-danger" id="conf_passwordError">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="{{ route('admin_login_form') }}" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>
    </div>

</body>

</html>
