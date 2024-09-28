@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Contributor</h3>
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
                            <form action="{{ route('admin.editContirbutorFormSubmit', $contributor->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="item form-group">
                                    {{-- name --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="name">Contributor Name * </label>
                                        <input type="text" id="name" name="name" value="{{ $contributor->name }}"
                                            class="form-control" oninput="removeError('nameErr')">
                                        @error('name')
                                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $contributor->phone_number }}" oninput="removeError('phoneErr')">
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $contributor->address }}">
                                    </div>

                                </div>

                                <div class="item form-group">
                                    {{-- email --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $contributor->email }}" oninput="removeError('emailErr')">
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password">Password * </label>
                                        <input type="Password" name="password" class="form-control" id="password"
                                            oninput="removeError('PasswordErr')"
                                            value="{{ $contributor->original_password }}">
                                        <i class="fa fa-eye eye-icon-position" id="eyeIcon"></i>
                                        @error('password')
                                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password_confirmation --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password_confirmation">Confirm Password * </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" oninput="removeError('C_PasswordErr')"
                                            value="{{ $contributor->original_password }}">
                                        <i class="fa fa-eye eye-icon-position" id="eyeIconConfirm"></i>
                                        @error('password_confirmation')
                                            <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- role --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="role">Role *</label>
                                        <select class="form-control" id="role" name="role"
                                            oninput="removeError('roleErr')">
                                            <option value="Developer"
                                                {{ $contributor->role == 'Developer' ? 'selected' : '' }}>
                                                Developer
                                            </option>
                                            <option value="SEO" {{ $contributor->role == 'SEO' ? 'selected' : '' }}>SEO
                                            </option>
                                            <option value="Content-writer"
                                                {{ $contributor->role == 'content-writer' ? 'selected' : '' }}>
                                                Content-writer
                                            </option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger" id="roleErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- description --}}
                                    <div class="col-md-8 col-sm-8">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" oninput="removeError('descriptionErr')">{{ $contributor->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                        <a href="{{ route('admin.getAllContributors') }}"> <button class="btn btn-primary"
                                                type="button">Cancel</button></a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
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
