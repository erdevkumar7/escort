@extends('user.layout')
@section('page_content')
    <section>
        <div class="container mt-3 escort-register">
            <form action="{{ route('escorts.register_submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="text-center text-info">Escort-Register</h2>

                <div class="row jumbotron box8 register-inner-content">
               
                    {{-- nickname --}}
                    <div class="col-sm-6 form-group">
                        <label for="nickname">Nickname *</label>
                        <input type="text" class="form-control" name="nickname" id="nickname"
                            value="{{ old('nickname') }}" placeholder="Enter your Nickname."
                            oninput="removeError('nicknameErr')">
                        @error('nickname')
                            <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- phone_number --}}
                    <div class="col-sm-6 form-group">
                        <label for="phone_number">Phone Number *</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="Enter Your Contact Number." value="{{ old('phone_number') }}"
                            oninput="removeError('phoneErr')">
                        @error('phone_number')
                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="col-sm-6 form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                            placeholder="Enter your email." oninput="removeError('emailErr')">
                        @error('email')
                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- address --}}
                    <div class="col-sm-6 form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address"
                            value="{{ old('address') }}" placeholder="Enter Your Address">
                    </div>
                    {{-- city --}}
                    <div class="col-sm-6 form-group city-select">
                        <label for="city">City *</label>
                        <select id="city" name="city" class="form-control browser-default custom-select"
                            oninput="removeError('cityErr')">
                            <option value="">Select City</option>
                            <option value="city1" {{ old('city') == 'city1' ? 'selected' : '' }}>city1
                            </option>
                            <option value="city2" {{ old('city') == 'city2' ? 'selected' : '' }}>city2
                            </option>
                            <option value="city3" {{ old('city') == 'city3' ? 'selected' : '' }}>city3
                            </option>
                            <option value="city4" {{ old('city') == 'city4' ? 'selected' : '' }}>city4
                            </option>
                        </select>
                        @error('city')
                            <span class="text-danger" id="cityErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- age --}}
                    <div class="col-sm-6 form-group age-select">
                        <label for="age">Age *</label>
                        <select id="age" name="age" class="form-control browser-default custom-select"
                            oninput="removeError('ageErr')">
                            <option value="">Select Age</option>
                            <option value="18-25" {{ old('age') == '18-25' ? 'selected' : '' }}>18-25
                            </option>
                            <option value="26-35" {{ old('age') == '26-35' ? 'selected' : '' }}>26-35
                            </option>
                            <option value="36-45" {{ old('age') == '36-45' ? 'selected' : '' }}>36-45
                            </option>
                            <option value="45-55" {{ old('age') == '45-55' ? 'selected' : '' }}>45-55
                            </option>
                            <option value="56+" {{ old('age') == '56+' ? 'selected' : '' }}>56+</option>
                        </select>
                        @error('age')
                            <span class="text-danger" id="ageErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- password --}}
                    <div class="col-sm-6 form-group">
                        <label for="pass">Password</label>
                        <input type="Password" name="password" class="form-control" id="pass"
                            placeholder="Enter your password." oninput="removeError('PasswordErr')">
                        @error('password')
                            <span class="text-danger" id="PasswordErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- password_confirmation --}}
                    <div class="col-sm-6 form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                            placeholder="Re-enter your password." oninput="removeError('C_PasswordErr')">
                    </div>
                    @error('password_confirmation')
                        <span class="text-danger" id="C_PasswordErr">{{ $message }}</span>
                    @enderror

                    <div class="col-sm-12">
                        <p class="text-center text-muted mt-3 mb-0">Have already an account? <a href="{{ route('login') }}"
                                class="fw-bold text-body"><u>Login here</u></a></p>
                    </div>


                    <div class="col-sm-12 form-group mb-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection
