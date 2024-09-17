@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add New User</h3>
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
                            <form action="{{ route('admin.addUserFormSubmit') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="item form-group">
                                    {{-- name --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="first_name">First Name * </label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            value="{{ old('first_name') }}" oninput="removeError('first_nameErr')">
                                        @error('first_name')
                                            <span class="text-danger" id="first_nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- last_name --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="last_name">Last Name * </label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            value="{{ old('last_name') }}" oninput="removeError('last_nameErr')">
                                        @error('last_name')
                                            <span class="text-danger" id="last_nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- gender --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="gender">Gender </label>
                                        <select id="gender" name="gender"
                                            class="form-control browser-default custom-select"
                                            oninput="removeError('genderErr')">
                                            <option value="">Select gender</option>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>male
                                            </option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>female
                                            </option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger" id="genderErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- email --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}" oninput="removeError('emailErr')">
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password">Password * </label>
                                        <input type="Password" name="password" class="form-control" id="pass"
                                            oninput="removeError('PasswordErr')">
                                        @error('password')
                                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- password_confirmation --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="password_confirmation">Confirm Password * </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" oninput="removeError('C_PasswordErr')">
                                        @error('password_confirmation')
                                            <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- submit --}}
                                <div class="item form-group">
                                    <div class="col-md-4 col-sm-4 offset-md-4 mt-3">
                                        <a href="{{ route('admin_allusers') }}"> <button class="btn btn-primary"
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
    <!-- /page content -->
@endsection
