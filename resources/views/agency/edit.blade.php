@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Agency</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if (session('success'))
                                <div>
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('admin.edit_agency', $agency->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- Agency name --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Agency Name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="name" name="name" class="form-control "
                                            value="{{ $agency->name }}" oninput="removeError('nameErr')">
                                    </div>
                                    @error('name')
                                        <span class="text-danger" id="nameErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- phone number --}}
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone
                                        Number<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $agency->phone_number }}" oninput="removeError('phoneErr')">
                                    </div>
                                    @error('phone_number')
                                        <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Address --}}
                                <div class="item form-group">
                                    <label for="address"
                                        class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $agency->address }}">
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="item form-group">
                                    <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $agency->email }}" oninput="removeError('emailErr')">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" id="emailErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="password" class="col-form-label col-md-3 col-sm-3 label-align">New Password
                                        *</label>
                                    <div class="col-md-6 col-sm-6 position-relative">
                                        <input type="password" id="password" name="password" class="form-control"
                                            oninput="removeError('passErr')" value="{{ $agency->original_password ?? '' }}">
                                        <i class="fa fa-eye eye-icon-position-agency" id="eyeIcon"></i>
                                    </div>

                                    @error('password')
                                        <span class="text-danger" id="passErr">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="item form-group">
                                    <label for="password_confirmation"
                                        class="col-form-label col-md-3 col-sm-3 label-align">New Password Confirm
                                        *</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" oninput="removeError('passConErr')"
                                            value="{{ $agency->original_password ?? '' }}">
                                        <i class="fa fa-eye eye-icon-position-agency" id="eyeIconConfirm"></i>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger" id="passConErr">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Submit button --}}
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <a href="{{ route('admin.allagencies') }}"><button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Password field toggle
        document.getElementById('eyeIcon').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var icon = document.getElementById('eyeIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Confirm password field toggle
        document.getElementById('eyeIconConfirm').addEventListener('click', function() {
            var confirmPasswordField = document.getElementById('password_confirmation');
            var icon = document.getElementById('eyeIconConfirm');

            if (confirmPasswordField.type === 'password') {
                confirmPasswordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
    <!-- /page content -->
@endsection
