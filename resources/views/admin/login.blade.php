<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action={{ route('admin_login') }} method="POST">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" oninput="removeErr('emailErr')"  />                         
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" />
                        </div>
                        @error('email')
                        <span class="text-danger" id="emailErr">{{$message}}</span>
                        @enderror
                        <div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="{{ route('admin_register_form') }}" class="to_register"> Create Account </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />
                        </div>
                    </form>
                    <script>
                        function removeErr(id) {
                            var errElement = document.getElementById(id);
                            if (errElement) {
                                errElement.style.display = 'none'
                            }
                        }
                    </script>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
