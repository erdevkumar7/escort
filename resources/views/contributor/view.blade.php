@extends('admin.layout')

@section('page_content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Contributor Details</h3>
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
                            <form>
                                <div class="item form-group">
                                    {{-- name --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="name">Contributor Name * </label>
                                        <input type="text" id="name" name="name" value="{{ $contributor->name }}"
                                            class="form-control" oninput="removeError('nameErr')" disabled>
                                        @error('name')
                                            <span class="text-danger" id="nameErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- phone_number --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="phone_number">Phone Number * </label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $contributor->phone_number }}" oninput="removeError('phoneErr')"
                                            disabled>
                                        @error('phone_number')
                                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- address --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="address">Address </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $contributor->address }}" disabled>
                                    </div>

                                </div>

                                <div class="item form-group">
                                    {{-- email --}}
                                    <div class="col-md-4 col-sm-4 ">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $contributor->email }}" oninput="removeError('emailErr')" disabled>
                                        @error('email')
                                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- role --}}
                                    <div class="col-md-4 col-sm-4">
                                        <label for="role">Role *</label>
                                        <select class="form-control" id="role" name="role"
                                            oninput="removeError('roleErr')" disabled>
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

                                    <div class="col-md-4 col-sm-4">
                                        <label for="password">Password *</label>
                                        <input type="text" class="form-control" id="password" name="password"
                                            value="{{ $contributor->original_password ?? 'Not Available' }}" disabled>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    {{-- description --}}
                                    <div class="col-md-12 col-sm-12">
                                        <label for="description">Description *</label>
                                        <textarea class="form-control" id="description" name="description" oninput="removeError('descriptionErr')" disabled>{{ $contributor->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger" id="descriptionErr">{{ $message }}</span>
                                        @enderror
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
