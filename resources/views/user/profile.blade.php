<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>
    <!-- nav  -->
    @include('user.topNav')

    <section>
        <div class="container mt-3 escort-register">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row jumbotron box8">
                    <div class="col-sm-12 mx-t3 mb-4">
                        <h2 class="text-center text-info">Escort-Profile</h2>
                    </div>
                    {{-- nickname --}}
                    <div class="col-sm-6 form-group">
                        <label for="nickname">Nickname *</label>
                        <input type="text" class="form-control" name="nickname" id="nickname"
                            value="{{ $escort->nickname }}" placeholder="Enter your Nickname."
                            oninput="removeError('nicknameErr')">
                        @error('nickname')
                            <span class="text-danger" id="nicknameErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- phone_number --}}
                    <div class="col-sm-6 form-group">
                        <label for="phone_number">Phone Number *</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            placeholder="Enter Your Contact Number." value="{{ $escort->phone_number }}"
                            oninput="removeError('phoneErr')">
                        @error('phone_number')
                            <span class="text-danger" id="phoneErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- email --}}
                    <div class="col-sm-6 form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $escort->email }}" placeholder="Enter your email."
                            oninput="removeError('emailErr')">
                        @error('email')
                            <span class="text-danger" id="emailErr">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- address --}}
                    <div class="col-sm-6 form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address"
                            value="{{ $escort->address ?? '' }}" placeholder="Enter Your Address">
                    </div>
                    {{-- city --}}
                    <div class="col-sm-6 form-group">
                        <label for="city">City *</label>
                        <input type="text" class="form-control" value="{{ $escort->city }}">
                    </div>
                    {{-- age --}}
                    <div class="col-sm-6 form-group">
                        <label for="age">Age *</label>
                        <input type="text" class="form-control" value="{{ $escort->age }}">
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
