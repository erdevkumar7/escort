<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ route('admin_register') }}" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" name="name" class="form-control" placeholder="Name" required="" />
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required="" />
                    </div>
                    <div>
                        <input type="text" name="address" class="form-control" placeholder="Address"
                            required="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password"
                            required="" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>

</body>

</html>
